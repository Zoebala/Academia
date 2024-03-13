<?php

namespace App\Http\Controllers;

use App\Models\Anneeacad;
use App\Rules\AnneeUnique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnneeController extends Controller
{
    //
    public function insertData(Request $req){

        $req->validate([
            "selectAnnee" => ["required","string","min:8", new AnneeUnique]
        ]);
        $Annee= new Anneeacad;
        $Annee->libAnnee=$req->selectAnnee;
        $Annee->save();       

        return redirect()->back()->with("msg","Enregistrement effectué avec succès!");
    }

    public function showData(){
        $Annees=Anneeacad::all();
        return view("pages.affichages.afficheAnneeAcad",compact("Annees"));
    }
    public function deleteAnnee(Anneeacad $id){
        $id->delete();
        return redirect()->back()->with("msg","Suppresion effectuée avec succès!");
    }
    public function editer($id){
        $Annee=Anneeacad::find($id);
        return view("pages.modifications.editerAnnee",compact("Annee"));
    }

    public function update(Request $req){
        $req->validate([
            "Annee"=>["required","string","min:8", new AnneeUnique],
            "id"=>"required|int",
        ]);
        $Annee=Anneeacad::find($req->id);
        $Annee->libAnnee=strip_tags($req->Annee);
        $Annee->update();
        return redirect("afficheAnneeAcad")->with("msg","Modification effectuée avec succès!");
    }
}
