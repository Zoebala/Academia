<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Anneeacad;
use App\Models\Tranchepay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TranchepayController extends Controller
{
    //Afichage formulaire tranche et chargement des années dans le select année
    public function index(){
        
        $Annees=Anneeacad::all();
        return view("pages.insertions.formTranche",compact("Annees"));
    }

    //Enregistrement tranche
    public function create(Request $req){
        $req->validate([
            "tranche"=>"required|string|max:25",
            "montant"=>"required|string|min:5",
            "frais_id"=>"required|int",
        ]);

        $Tranche=new Tranchepay();
        $Tranche->libTranche=$req->tranche;
        $Tranche->montantTranche=$req->montant;
        $Tranche->frais_id=$req->frais_id;
        $Tranche->save();

        return redirect()->back()->with('msg',"Enregistrement effectué avec succès!");

    }
    //DataTables de tranche payement avec année académique précisée
    public function AfficherListe(){
        $Listes=DB::table("tranchepays")
        ->join("anneeacads","anneeacads.id","=","tranchepays.annee_id")
        ->select(["libAnnee","tranchepays.id as id","montantTranche","libTranche"])->get();
        return view("pages.affichages.afficheListeTranche",compact("Listes"));

    }
    //aperçu avant édition de la tranche
    public function showData($id){        
            $Tranches=Tranchepay::orderBy("libTranche","asc")->get();
            $TrancheUser=Tranchepay::find($id);
        
            // $TrancheUsers=DB::table("tranchepays")
            // ->join("anneeacads","anneeacads.id","=","Tranchepays.id")
            // ->select(["libAnnee","montantTranche","libTranche"])
            // ->where("tranchepays.id",$TrancheUser->id)->get();
            $Annees=Anneeacad::all();
            
            return view("pages.modifications.editerTranche",compact("TrancheUser","Tranches","Annees"));
    }
    //Modification de la tranche
    public function updateTranche(Request $req){
        
        $req->validate([
            "tranche"=>"required|string|max:25",
            "montant"=>"required|string|min:5",
            "annee_id"=>"required|int",
            "tranche_id"=>"required|int",
        ]);

        $Tranche=Tranchepay::find($req->tranche_id);
        $Tranche->libTranche=$req->tranche;
        $Tranche->montantTranche=$req->montant;
        $Tranche->annee_id=$req->annee_id;
        $Tranche->update();

        return redirect("AfficherListeTranche")->with('msg',"Modification effectuée avec succès!");

    }

    public function deleteTranche(Tranchepay $Tranche){
        $Tranche->delete();
        return redirect()->back()->with("alert","Suppression effectuée avec succès!");
    }
}
