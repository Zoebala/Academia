<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Section;
use App\Rules\Majorite;
use App\Models\Etudiant;
use App\Models\Anneeacad;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mediumart\Orange\SMS\SMS;
use App\Models\Elementsdossier;
use App\Rules\ValidationNumero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mediumart\Orange\SMS\Http\SMSClient;

class EtudiantController extends Controller
{
    public function InsertData(Request $req){
        $req->validate([
            "photo"=>["required","image","mimes:jpg,jpeg,png","max:3072"],
            "nom"=>["required","string","max:25"],
            "postnom"=>["required","string","max:25"],
            "prenom"=>["required","string","max:25"],
            "sexe"=>["required","string","max:1"],
            "date"=>["required","date", new Majorite($req->date)], //vérification de l'âge du candidat(validité du candidat)
            "nompere"=>["required","string","max:25"],
            "nommere"=>["required","string","max:25"],
            "teletudiant"=>["required","string","max:10","unique:etudiants", new ValidationNumero],
            "teltutaire"=>["required","string","max:10"],
            "adressetutaire"=>["required","string","max:50"],
            "nationalite"=>["required","string","max:25"],
            "ecole"=>["required","string","max:50"],
            "option"=>["required","string","max:50"],
            "province"=>["required","string","max:50"],
            "territoire"=>["required","string","max:50"],
            "territoireEcole"=>["required","string","max:50"],
            "adresseEcole"=>["required","string","max:50"],
            "pourcent"=>["required","int","min:50","max:100"],
            "user_id"=>["required","int","unique:etudiants"]

        ]);
       
        
        $Etudiant=new Etudiant;
        $Etudiant->nom=strip_tags($req->nom);
        $Etudiant->province=strip_tags($req->province);
        $Etudiant->territoire=strip_tags($req->territoire);
        $Etudiant->territoireEcole=strip_tags($req->territoireEcole);
        $Etudiant->adresseEcole=strip_tags($req->adresseEcole);
        $Etudiant->optionSecondaire=strip_tags($req->option);
        $Etudiant->ecole=strip_tags($req->ecole);
        $Etudiant->postnom=strip_tags($req->postnom);
        $Etudiant->prenom=strip_tags($req->prenom);
        $Etudiant->sexe=strip_tags($req->sexe);
        $Etudiant->datenais=strip_tags(date("Y-m-d",strtotime($req->date)));
        $Etudiant->nompere=strip_tags($req->nompere);
        $Etudiant->nommere=strip_tags($req->nommere);
        $Etudiant->nationalite=strip_tags($req->nationalite);
        $Etudiant->pourcentage=strip_tags($req->pourcent);    
        
        $Etudiant->teletudiant=strip_tags($req->teletudiant);
        $Etudiant->user_id=strip_tags($req->user_id);
       
        $Etudiant->teltutaire=strip_tags($req->teltutaire);
        if($req->hasfile("photo")){
            $file=$req->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move("uploads/etudiant",$filename);
            $Etudiant->photo=$filename;
        }
        $Etudiant->adresse=$req->adressetutaire;
        $Etudiant->save();
        // génération du matricule
        $num=Etudiant::where("teletudiant",$req->teletudiant)
        ->select("id")
        ->get();
        $Etudiant->matricule=date("Y").'/'.$num[0]->id; 
        $Etudiant->update();
        $req->session()->flash("msg","Enregistrement effectué avec succès!");        
        
        //redirection et chargement des données de la page optionpage      
        if(null == session("Etudiant")){
            $req->session()->put("IdEtudiant",$num[0]->id);
            $req->session()->put("Etudiant",$req->nom." ".$req->postnom);
            $req->session()->put("photo",$Etudiant->photo);
        }
        
        $Sections=Section::all();
        $Options=DB::table("options")
        ->join("departements","departements.id","=","options.depart_id")
        ->join("Sections","sections.id","=","departements.section_id")
        ->select(["libSection","libDepartement","options.id as idOption","departements.id as idDep","sections.id as idSec","libOption","photo"])
        ->get();

    // dd("Enregistr")
        return view("pages.affichages.optionpage",compact("Options","Sections"));

    }

    public function showData(){
        $Etudiants=DB::table("etudiants")->get();
        return view("pages.affichages.afficheEtudiant",compact("Etudiants"));
    }

    public function delete(Etudiant $Etudiant){
        $destination="uploads/Etudiant/".$Etudiant->photo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $Etudiant->delete();
        return redirect()->back()->with("alert","Etudiant supprimé avec succès!");

    }

    public function editer(Etudiant $Etudiant){
        return view("pages.modifications.editerEtudiant",compact("Etudiant"));
    }

    public function update(Request $req){
        $req->validate([
            "photo"=>"image|mimes:jpg,jpeg,png|max:2048",
            "nom"=>"required|string|max:25",
            "postnom"=>"required|string|max:25",
            "prenom"=>"required|string|max:25",
            "sexe"=>"required|string|max:1",
            "date"=>"required|date",
            "nompere"=>"required|string|max:25",
            "nommere"=>"required|string|max:25",
            "teletudiant"=>["required","string","max:15", new ValidationNumero],
            "teltutaire"=>"required|string|max:15",
            "adressetutaire"=>"required|string|max:50",
            "nationalite"=>"required|string|max:25",
            "pourcent"=>"required|int|min:50|max:100",
            "ecole"=>["required","string","max:50"],
            "option"=>["required","string","max:50"],
            "province"=>["required","string","max:50"],
            "territoire"=>["required","string","max:50"],
            "territoireEcole"=>["required","string","max:50"],
            "adresseEcole"=>["required","string","max:50"],
        ]);
        $Etudiant=Etudiant::find($req->idEtud);
        $Etudiant->nom=strip_tags($req->nom);       
        $Etudiant->province=strip_tags($req->province);
        $Etudiant->territoire=strip_tags($req->territoire);
        $Etudiant->territoireEcole=strip_tags($req->territoireEcole);
        $Etudiant->adresseEcole=strip_tags($req->adresseEcole);
        $Etudiant->optionSecondaire=strip_tags($req->option);       
        $Etudiant->postnom=strip_tags($req->postnom);
        $Etudiant->prenom=strip_tags($req->prenom);
        $Etudiant->sexe=strip_tags($req->sexe);
        $Etudiant->datenais=strip_tags(date("Y-m-d",strtotime($req->date)));
        $Etudiant->nompere=strip_tags($req->nompere);
        $Etudiant->nommere=strip_tags($req->nommere);
        $Etudiant->ecole=strip_tags($req->ecole);
        $Etudiant->nationalite=strip_tags($req->nationalite);
        $Etudiant->pourcentage=strip_tags($req->pourcent);    
        
       
        $Etudiant->teltutaire=strip_tags($req->teltutaire);
        if($req->hasfile("photo")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/etudiant/".$Etudiant->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$req->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move("uploads/etudiant",$filename);
            $Etudiant->photo=$filename;
        }
        $Etudiant->adresse=$req->adressetutaire;
        $Etudiant->update();

        $Option=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","options.id","=","inscriptions.option_id")
        ->join("departements","departements.id","=","options.depart_id")
        ->select(["libOption","libDepartement"])
        ->where("etudiants.id",$req->idEtud)
        ->first();
        //Notification par sms
        
        // $tel=str_replace('0','+243',$Etudiant->teletudiant); 
        // dd(config('orangemoney.client_id'));
        // dd(config('orangemoney.merchant_key'));
        
        // $client = SMSClient::getInstance(config('orangemoney.client_id'), config('orangemoney.merchant_key')); 
        // $sms = new SMS($client);   
        // $response = $sms->to(Str::replaceFirst('0','+243',$Etudiant->teletudiant))
        //         ->from('+243896071804', config('app.name'))
        //         ->message( $Etudiant->nom.' '.$Etudiant->postnom.' '.$Etudiant->prenom .' Vous venez de modifier vos inforamtions d\'inscription, option : '.$Option->libOption.' - departement : '.$Option->libDepartement)
        //         ->send();
            // checking SMS statistics
             // with optional country code filter
            // and optional appID filter
            //  $response = $sms->statistics('<country_code>', '<app_id>');      
       
        $req->session()->flash("msg","Modification effectuée avec succès!");
        if(Auth::user()->admin==1){

            return redirect("afficheEtudiant");
        }elseif(Auth::user()->admin==0){
            $Etudiant_id=$req->idEtud;
            $idOption=DB::table("options")
            ->join("inscriptions","inscriptions.option_id","=","options.id")
            ->where("etudiant_id",$req->idEtud)
            ->first();

            if(Auth::user()->Admin==1){
                return redirect()->back()->with("msg","Modification effectuée avec succès");
            }else{

                return view("pages.affichages.accueilEtudiantInscrit",compact("Etudiant_id","idOption"));
            }

        }
       
        

    }

    public function ListInscrit(){
        $Etudiants=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","options.id","=","inscriptions.option_id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->join("anneeacads","anneeacads.id","=","inscriptions.annee_id")
        ->select([
            "matricule","datenais","montantPayer","nompere","dateInscription","etudiants.photo",
            "teletudiant","teltutaire","pourcentage","adresse","nom","postnom","prenom","sexe",
            "libAnnee","nationalite","libOption","nommere"
            ])
        ->get();
        return view("pages.affichages.afficheEtudiantInscrit",compact("Etudiants"));
    }

    public function accueilEtudiantInscrit(Etudiant $Etudiant){
        $Etudiant_id=$Etudiant->id;
        $idOption=DB::table("options")
        ->join("inscriptions","inscriptions.option_id","=","options.id")
        ->where("etudiant_id",$Etudiant->id)
        ->first();
        
        // $ElementDossier= DB::table("elementsdossiers")
        // ->join("etudiants","etudiants.id","=","Elementsdossiers.etudiant_id")
        // ->join("payers","payers.etudiant_id","=","etudiants.id")
        // ->join("tranchepays","tranchepays.id","=","payers.tranche_id")
        // ->join("anneeacads","anneeacads.id","=","tranchepays.annee_id")
        // ->select(["anneeacads.*","elementsdossiers.*"])
        // ->first();
        // dd($ElementDossier);
        
        return view("pages.affichages.accueilEtudiantInscrit",compact("Etudiant_id","idOption"));
    }

    public function DetailEtudiant()
    {
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","frais.created_at as dateInscription","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
            
        ->orderBy("inscriptions.etudiant_id","desc")
        ->get();
        $Annee=Anneeacad::first();


        return view("pages.affichages.detailEtudiant",compact("NewInscrits","Annee"));
    }

    public function PourcentageInf(){
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","frais.created_at as dateInscription","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
        ->where('pourcentage','<',60)        
        ->orderBy("inscriptions.etudiant_id","desc")
        ->get();
        $Annee=Anneeacad::first();


        return view("pages.affichages.detailEtudiant",compact("NewInscrits","Annee"));
    }
    public function PourcentageSup(){
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","frais.created_at as dateInscription","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
        ->where('pourcentage','>=',60)        
        ->orderBy("inscriptions.etudiant_id","desc")
        ->get();
        $Annee=Anneeacad::first();


        return view("pages.affichages.detailEtudiant",compact("NewInscrits","Annee"));
    }
}
