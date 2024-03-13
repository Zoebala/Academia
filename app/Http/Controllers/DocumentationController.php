<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DocumentationController extends Controller
{
    //

    public function affiche(){
        $data=DB::table("options")->get();
        $max=DB::table("options")->count();
        session()->put("data",$data);
        session()->put("max",$max);
        return view("pages.affichages.documentation",compact('max'));
    }
}
