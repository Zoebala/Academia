<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametrageController extends Controller
{
    //
    public function ChargementData(){
        $Sections=Section::all();
        return view("pages.insertions.formParametrage",compact("Sections"));
    }
}
