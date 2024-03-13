<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function showData(){
        $data=Section::all();
        return view("pages.affichages.afficheSection",["Sections"=>$data]);

    }

    public function validateSection(Request $req){
        
        $req->validate([
            "inputSection"=>"required|string|min:8"
        ]);       
         $section=new Section;
         $section->libSection=$req->inputSection;
         $section->save();
         $req->session()->flash("msg","Enregistrement effectué avec succès!");
         return redirect("afficheSection");  
      
     }
     public function showBeforeEdit($id){
        $Section=Section::find($id);
        return view("pages.modifications.editerSection",["Section"=>$Section]);

    }
    public function editerSection(Request $req){
        $req->validate([
            "inputSection"=>"required|string|min:8",
             
        ]);
        $section=Section::find($req->section_id);
        $section->libSection=$req->inputSection;
        $section->update();
        return redirect('afficheSection')->with("msg","La section a été modifiée avec succès!");
    }

    public function Delete($id){
        $data=Section::find($id);
        $data->delete();
        return redirect()->back()->with("msg","Section supprimée avec succès!");

    }
}
