<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use App\Models\Anneeacad;
use App\Models\Promotion;
use App\Models\Typefrais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TypefraisController extends Controller
{
    //
    public function index(){
        $Annees=Anneeacad::all();
        $Promotions=Promotion::all();
        return view("pages.insertions.formTypeFrais",compact("Annees","Promotions"));
    }

    public function create(Request $req){
        $req->validate([
            "motif"=>["required","string","max:50"],
            "montant"=>["required","int","min:5"],
            "annee_id"=>["required","int"],
            "promotion_id"=>["required","int"],
        ]);

        Typefrais::create([
            "Motif"=>strip_tags($req->motif),
            "Montanttypefrais"=>strip_tags($req->montant),
            "promotion_id"=>strip_tags($req->promotion_id),
            "annee_id"=>strip_tags($req->annee_id),
            "created_at"=>now(),
        ]);

        return redirect()->back()->with("msg","Enregistrement effectué avec succès");

    }

    public function show(){
        $Frais=DB::table("typefrais") 
        ->leftjoin("anneeacads","anneeacads.id","=","typefrais.annee_id")               
        ->leftjoin("promotions","promotions.id","=","typefrais.promotion_id")
        ->select(["Motif","Montanttypefrais","libpromotion","typefrais.id as id","typefrais.promotion_id as promo_id","libAnnee"])        
        ->get();
        
        return view("pages.affichages.afficheTypeFrais",compact("Frais"));
    }

    public function delete(Typefrais $frais){
       
        $frais->delete();

        return redirect()->back()->with("msg","Suppression effectuée avec succès!");
    }

    public function editer(Typefrais $frais){

        $Annees=Anneeacad::all();
        $Promotions=Promotion::all();
        $Frais=DB::table("typefrais")
        ->leftjoin("anneeacads","anneeacads.id","=","typefrais.annee_id")               
        ->leftjoin("promotions","promotions.id","=","typefrais.promotion_id")
        ->select("typefrais.*")
        ->where("typefrais.id","=",$frais->id)
        ->first();     


        return view("pages.modifications.editerTypeFrais",compact("Annees","Promotions","Frais"));
    }

    public function update(Request $req){
        $req->validate([
            "motif"=>["required","string","max:50"],
            "montant"=>["required","int","min:5"],
            "annee_id"=>["required","int"],
            "promotion_id"=>["required","int"],
            "id"=>["required","int"],
        ]);

        $TypeFrais=Typefrais::find($req->id);
     
        $TypeFrais->Motif=strip_tags($req->motif);
        $TypeFrais->Montanttypefrais=strip_tags($req->montant);
        $TypeFrais->promotion_id=strip_tags($req->promotion_id);
        $TypeFrais->annee_id=strip_tags($req->annee_id);    
        $TypeFrais->updated_at=now();           
        $TypeFrais->update();
        return redirect("affichefrais")->With("msg","Modification effectuée avec succès!");  
          
        
    }
}
