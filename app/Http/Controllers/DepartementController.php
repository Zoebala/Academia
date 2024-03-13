<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Departement;
use App\Rules\DepartementUnique;
use App\Rules\SectionValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    //
    public function showData(){
        $Departements=DB::table("departements")
        ->join("sections","sections.id","=","departements.section_id")
        ->select(["departements.id as idDep","libSection","libDepartement"])
        ->get();
        return view("pages.affichages.afficheDepartement",compact("Departements"));
        
      }
      public function insertDepartData(Request $req){
        $req->validate([
            'inputDepart'=>["required","String","min:5","max:75", new DepartementUnique],
            'selectSection'=>["required","int",new SectionValidate],// on vérifie l'existence d'une section
                                   
        ]);        
        
        $depart= new Departement;
        $depart->section_id=$req->selectSection;
        $depart->libDepartement=$req->inputDepart;

        $depart->save();
        $req->session()->flash("msg","Enregistrement effectué avec succès!");
        return redirect()->back();

  }

//  affichage des données avant modification
  public function editerDep($id){
      
    $Departement= DB::table("departements")
      ->join("sections","sections.id","=","departements.section_id")
      ->select(["departements.id as id","libSection","LibDepartement as Dep","section_id"])
      ->where("departements.id","=",$id)
      ->get(); 
      $Section=Section::all();
      return view("pages.modifications.EditerDepartement",["Departements"=>$Departement,"Sections"=>$Section]);
    }

    // modification proprement dite des données
    public function updateDepart(Request $req){
      $req->validate([
        'inputDepart'=>'required|string|min:5',
        'selectSection'=>'required|int',
                  
    ]);

      $depart=Departement::find($req->inputId);
      $depart->section_id=$req->selectSection;
      $depart->libDepartement=$req->inputDepart;
      
      $depart->update();
      return redirect("afficheDepart")->with("msg","Modification effectuée avec succès!");
}

  public function deleteDepart(Departement $id){
    $id->delete();
    return redirect()->back()->with("alert","Departement supprimé avec succès!");
  }
}
