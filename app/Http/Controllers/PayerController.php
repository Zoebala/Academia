<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use App\Models\Etudiant;
use App\Models\Anneeacad;
use App\Models\Promotion;
use App\Models\Typefrais;
use App\Models\Tranchepay;
use App\Models\Inscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mediumart\Orange\SMS\SMS;
use App\Rules\ValidationAnnee;
use App\Rules\ValidationPromotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Mediumart\Orange\SMS\Http\SMSClient;

class PayerController extends Controller
{
    //
    public function index($idEtudiant){
        $Etudiants=Etudiant::orderBy("id","desc")->get();
        $Frais=Typefrais::all();
        $Promotions=Promotion::all();
        $Promo_id=Inscription::where("etudiant_id","=",$idEtudiant)
        ->first();
        $Annees=Anneeacad::all();


        return view("pages.insertions.formPayement",compact("Etudiants","Frais","Promotions","Promo_id","Annees"));
    }

    public function AfficherListe(){
       //affichages promotions
       $Promotions=Promotion::all();




        return view("pages.affichages.afficheListePayement",compact("Listes"));
    }
    public function afficherPromoPayer(){
        $Promotions=Promotion::all();

        return view("pages.affichages.affichePayementPromotion",compact("Promotions"));
    }

    public function promoPayer($id){
         $Payements=DB::table("tranchepays")
        ->join("frais","frais.id","=","tranchepays.frais_id")
        ->join("etudiants","etudiants.id","=","frais.etudiant_id")
        ->join("anneeacads","anneeacads.id","=","frais.annee_id")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("promotions","promotions.id","=","inscriptions.promotion_id")
        ->where("promotions.id","=",$id)
        ->select([
            "matricule","nom","postnom","prenom","dateTranche","tranchepays.id as tranche_id","montantTranche","libtranche","etudiants.photo"
        ])->orderBy("etudiants.nom","asc")
        ->orderBy("etudiants.postnom","asc")
        ->orderBy("etudiants.prenom","asc")
        ->get();


        return view("pages.affichages.afficheListePayement",compact("Payements"));
    }

    public function create(Request $req){

        $req->validate([

            "montantPayer"=>"required|int|min:4",
            // "refPayer"=>"required|string|min:5|unique:payers",
            "etudiant_id"=>"required|string",
            "motif"=>"required|string|max:50",
            "promotion_id"=>["required","int",new ValidationPromotion($req->etudiant_id)],
            "annee_id"=>["required","int", new ValidationAnnee],
        ]);

        //vérification de l'existance de l'étudiant dans la base de données!
        if(Frais::where("etudiant_id",$req->etudiant_id)
        ->where("promotion_id",$req->promotion_id)
        ->where("annee_id",$req->annee_id)
        ->exists()
        ){

            //vérifions si l'étudiant n'a pas déjà atteint son solde des frais Académiques

            // if(   ){

            // }else{

            // }
            //identifions l'id frais de l'étudiant ayant payé
            $Frais=Frais::where("etudiant_id",$req->etudiant_id)
            ->where("promotion_id",$req->promotion_id)
            ->where("annee_id",$req->annee_id)
            ->first();


            $Payer=Frais::find($Frais->id);
            //cumul des frais payé par l'étudiant
            $Payer->montantFrais +=$req->montantPayer;
            $Payer->motif="Frais";
            $Payer->update();

            //Insertions Tranche
              $Tranche= new Tranchepay;
              $Tranche->libTranche=strip_tags($req->motif);
              $Tranche->montantTranche=$req->montantPayer;
              $Tranche->dateTranche=now();
              $Tranche->frais_id=$Frais->id;
              $Tranche->save();



        }else{
            //Insertion Frais

            $Payer=new Frais;
            $Payer->created_at=now();
            $Payer->montantFrais=$req->montantPayer;
            // $Payer->refPayer=Str::random(5).time();
            $Payer->annee_id=$req->annee_id;
            $Payer->motif=strip_tags($req->motif);
            $Payer->etudiant_id=$req->etudiant_id;
            $Payer->promotion_id=$req->promotion_id;

            $Payer->save();
            //récupération id frais payé
            $Frais_id=Frais::where("etudiant_id",$req->etudiant_id)
            ->where("annee_id",$req->annee_id)
            ->where("promotion_id",$req->promotion_id)
            ->where("created_at",$Payer->created_at)
            ->where("motif",$req->motif)
            ->first();

            //Insertions Tranche
            $Tranche= new Tranchepay;
            $Tranche->libTranche=strip_tags($req->motif);
            $Tranche->montantTranche=$req->montantPayer;
            $Tranche->dateTranche=now();
            $Tranche->frais_id=$Frais_id->id;
            $Tranche->save();
        }


        $Etudiant=Etudiant::where("id",$req->etudiant_id)->first();



        //récupération de l'option et département de l'étudiant
        $Option=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","options.id","=","inscriptions.option_id")
        ->join("departements","departements.id","=","options.depart_id")
        ->select(["libOption","libDepartement"])
        ->where("etudiants.id",$req->etudiant_id)
        ->first();

        // dd('Terminez l\'opération de payement et sms avec orange');
        //payement avec orange money
        // $payment = new OrangeMoney();

        // $data = [
        //     "merchant_key"=> '*********',
        //     "currency"=> "OUV",
        //     "order_id"=> "".time()."",
        //     "amount" => $req->montantPayer,
        //     "return_url"=> 'http://www.your-website.com/callback/return',
        //     "cancel_url"=> 'http://www.your-website.com/callback/cancel',
        //     "notif_url"=>'http://www.your-website.com/callback/notif',
        //     "lang"=> "fr",
        //     "reference"=>  $Payer->refPayer
        // ];

        // $payment->webPayment($data);
        //Notification par sms
        // $client = SMSClient::getInstance('<client_id>', '<client_secret>');

        // Envoi sms au candidat
        $client = SMSClient::getInstance('7ArJtMuNdAUmiLQGqAnAm5CoDeoWdRtN', 'AN4zirPjA01zVG34');
        $sms = new SMS($client);

        $response = $sms->to(Str::replaceFirst('0','+243',$Etudiant->teletudiant))
                ->from('+243896071804','Academia')
                ->message( 'Félicitations '.$Etudiant->nom.' '.$Etudiant->postnom.' '.$Etudiant->prenom .', Vous venez de prendre votre inscription à l\'Institut Supérieur Pédagogique de
                Mbanza-Ngungu, option choisie : '.$Option->libOption.' - departement : '.$Option->libDepartement)
                // ->senderName(config('app.name'))
                ->send();


        //return $req->all(); RTF2881
        $Etudiant=Etudiant::where("id",$req->etudiant_id)->first();

        $req->session()->flash("msg",'Payement effectué avec succès '.$Etudiant->nom.' '.$Etudiant->postnom.'!');
        return redirect("accueil");


    }
    //Suppression payement
    public function deletePayer(Frais $id){
        $id->delete();
        return redirect()->back()->with("alert","Suppression effectuée avec succès!");
    }
    //affichage des données avant modification
    public function showData(Frais $payement){

        $Etudiants=Etudiant::find($payement->etudiant_id);
        $TranchePayement=Tranchepay::find($payement->tranche_id);

        $Tranches=Tranchepay::all();

        return view("pages.modifications.editerPayement",compact("payement","Etudiants","Tranches","TranchePayement"));

    }

    public function updatePayement(Request $req){
        $req->validate([

            "montantPayer"=>"required|int|min:4",
            "refPayer"=>"required|string|min:5",
            "etudiant_id"=>"required|string",
            "IdTranche"=>"required|int",
            "payer_id"=>"required|int",
        ]);

        $Payer=Frais::find($req->payer_id);
        $Payer->montantPayer=$req->montantPayer;
        $Payer->refPayer=$req->refPayer;
        $Payer->etudiant_id=$req->etudiant_id;
        $Payer->tranche_Id=$req->IdTranche;
        $Payer->update();
        return redirect("afficherListePayement")->with('msg',"Modification effectuée avec succès!");
    }
}
