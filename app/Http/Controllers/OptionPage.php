<?php

namespace App\Http\Controllers;

use App\Models\Option;
use \App\Models\Section;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OptionPage extends Controller
{
    //affichages des sections avec leurs options incluses
    public function loadData(){
        
        $Sections=Section::all();
        $Options=DB::table("options")
        ->join("departements","departements.id","=","options.depart_id")
        ->join("Sections","sections.id","=","departements.section_id")
        ->select(["libSection","libDepartement","options.id as idOption","departements.id as idDep","sections.id as idSec","libOption","photo"])
        ->get();
        return view("pages.affichages.optionpage",compact("Sections","Options"));
    }

    // affichage au niveau de la grille
    public function index(){
        $Options=DB::table("options")
        ->join("departements","departements.id","=","options.depart_id")
        ->join("Sections","sections.id","=","departements.section_id")
        ->select(["libSection","libDepartement","options.id as idOption","libOption","photo"])
        ->get();
        return view("pages.affichages.afficheOption",compact("Options"));
    }
     //chargement des departement dans la liste déroulante
     public function getData(){
        $Depart=Departement::all();
        return view("pages.insertions.formOption",compact("Depart"));
    }
    // insertions des options
    public function InsertData(Request $req){
        $req->validate([
            "photo"=>"required|image|mimes:jpg,jpeg,png|max:2048",
            "departement"=>"required|int",
            "option"=>"required|string|min:5,max:30",
        ]);
        $Option=new Option;
        $Option->libOption=$req->option;
        $Option->depart_id=$req->departement;
        if($req->hasfile("photo")){
            $file=$req->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move("uploads/options/",$filename);
            $Option->photo=$filename;
        }
        $Option->Save();
        return redirect()->back()->with("msg","Enregistrment effectué avec succès!");
    }

    public function deleteData(Option $key){
        $destination="uploads/options/".$key->photo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $key->delete();
        return redirect()->back()->with("alert","option supprimée avec succès!");
    }
    // affichage des données avant modification
    public function editerData($id){
        $data=DB::table("options")
        ->join("Departements","Departements.id","=","options.depart_id")
        ->select(["Departements.id as idDep","libDepartement","libOption","options.photo as photo","options.id as idOption"])
        ->where("options.id",$id)
        ->get();
        $Depart=Departement::all();
        return view("pages.modifications.editerOption",compact("data","Depart"));
    }
// modification des données
    public function updateData(Request $req){
        $req->validate([
            "photo"=>"image|mimes:jpg,jpeg,png|max:2048",
            "departement"=>"required|int",
            "option"=>"required|string|min:5",
        ]);
        $Option=Option::find($req->idoption);
        $Option->libOption=$req->option;
        $Option->depart_id=$req->departement;
        if($req->hasfile("photo")){
            $destination="uploads/options/".$Option->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$req->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move("uploads/options/",$filename);
            $Option->photo=$filename;
        }
        $Option->update();
        $req->session()->flash("msg","Modification effectuée avec succès!");
        return redirect("afficheOption");

    }

    
}
