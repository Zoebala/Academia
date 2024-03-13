<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Rules\PromotionUnique;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    //
    public function create(Request $req){
        
        $req->validate([
            "promotion" =>["required","String","max:8", new PromotionUnique],
        ]);

        Promotion::create([
            "libPromotion" =>strip_tags($req->promotion) 
        ]);

        return redirect()->back()->with("msg","Enregistrement effectué avec succès!");
    }

    public function show(){
        $Promotions=Promotion::all();

        return view("pages.affichages.affichePromotion",compact("Promotions"));
    }

    public function delete(Promotion $Promo){
        $Promo->delete();
        return redirect()->back()->with("msg","Suppression effectuée avec succès!");
    }

    public function editer($id){
        $Promo=Promotion::find($id);
        $Promotions=Promotion::all();
        return view("pages.modifications.editerPromotion",compact("Promotions","Promo"));
    }

    public function update(Request $req){
        $req->validate([
            "promotion" =>["required","String","max:8", new PromotionUnique],
            "id" =>["required","int"],
        ]);
        $Promo=Promotion::find($req->id);
        
        $Promo->libPromotion = strip_tags($req->promotion); 
        $Promo->update();
        return redirect("affichePromotion")->with("msg","Modification effectuée avec succès!");        
    }

}
