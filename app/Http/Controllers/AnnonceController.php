<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Anneeacad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AnnonceController extends Controller
{
    //
    public function index(){
        return view('pages.insertions.formAnnonce');
    }

    public function create(Request $req){
        $req->validate([
            "titre"=>"required|string|max:30",
            "photo"=>"required|image|mimes:jpg,jpg,png|max:2048",
            "contenu"=>'required|string|max:255'
        ]);
        if($req->hasFile('photo')){
            $file=$req->file('photo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/annonce/',$filename);
        }

        Annonce::create([
            "titre"=>$req->titre,
            'contenu'=>$req->contenu,
            "photo"=>$filename,
            "created_at"=>now()
        ]);

        return redirect()->back()->with('msg','Enregistrement effectué succès!');
    }
    public function show(){
        $Annonces=Annonce::all();
        $Annee=Anneeacad::first();
        return view("pages.affichages.afficheAnnonce",compact('Annonces','Annee'));
    }
    public function delete(Annonce $Annonce){
        $destination="uploads/annonce/".$Annonce->photo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $Annonce->delete();
        return redirect()->back()->with("alert","Annonce supprimée avec succès!");
    }
    public function editer(Annonce $Annonce){

      return view("pages.modifications.editerAnnonce",compact("Annonce"));  
    }

    public function update(Request $req){
        $req->validate([
            "titre"=>"required|string|max:25",
            "contenu"=>"required|string|max:255",
            "annonce_id"=>"required|int",
            "photo"=>"image|mimes:jpg,png,jpeg|max:2048"
        ]);
        $Annonce=Annonce::find($req->annonce_id);       
        if($req->hasfile("photo")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/annonce/".$req->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$req->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move("uploads/annonce",$filename);
            $Annonce->photo=$filename;
        }
        $Annonce->titre=$req->titre;
        $Annonce->contenu=$req->contenu;
        $Annonce->updated_at=now();
        $Annonce->update();
       
        return redirect()->back()->with('msg','Modification effectuée avec succès!');
    }
}
