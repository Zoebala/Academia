<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Etudiant;
use App\Models\Anneeacad;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscriptionAdminController extends Controller
{
    //
    public function index(){
        $Etudiants=Etudiant::orderBy("id","desc")->get();
        $Options=Option::all();   
        $Annees=Anneeacad::all(); 

        return view("pages.insertions.inscriptionAdmin",compact("Etudiants","Options","Annees"));
    }

    //Enregistrement Etudiant
    public function create(Request $req){
        
        $req->validate([
            "idAnnee"=>"required|int",
            "etudiant_id"=>"required|int|unique:inscriptions",
            "idOption"=>"required|int",
            "dateIncription"=>"required|date"
        ]);
        $Inscription= new Inscription();
        $Inscription->dateInscription=$req->dateIncription;
        $Inscription->annee_id=$req->idAnnee;
        $Inscription->etudiant_id=$req->etudiant_id;
        $Inscription->option_id=$req->idOption;
        $Inscription->save();
        //Destruction de la session de l'Etudiant venant d'effectuer son payement
        // if(session()->has("Etudiant") && session()->has("IdEtudiant")){
        //     session()->pull("Etudiant");
        //     session()->pull("IdEtudiant");            
        // }
        
        return redirect()->back()->with("msg","Enregistrement effectué avec succès!");
    }
}
