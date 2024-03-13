<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data=DB::table("options")->get();
        //Récupération de l'étudiant correspondant au user authentifié!
        if(Auth::user()){

            if(Auth::user()->Admin==0){
                $user=DB::table("users")
                ->join("etudiants","etudiants.user_id","=","users.id")
                ->select("etudiants.*")
                ->where("etudiants.user_id",Auth::user()->id)
                ->first();
                if(Etudiant::where("user_id",Auth::user()->id)->exists()){

                    session()->put("IdEtudiant",$user->id);
                    session()->put("Etudiant",$user->nom." ".$user->postnom);
                    session()->put("photo",$user->photo);
                }
            }
        }
        
        $max=DB::table("options")->count();
        session()->put("data",$data);
        session()->put("max",$max);

        $dataAnnonce=DB::table("annonce")->get();
        $maxAnnonce=DB::table("annonce")->count();
        // session()->put("dataAnnonce",$dataAnnonce);
        // session()->put("maxAnnonce",$maxAnnonce);


        // A enlever lors de la restriction des éléments d'accueil pour admin
        $NombreSection=DB::table("sections")->count();
        $NombreOptions=DB::table("options")->count();
        $NombreDepartements=DB::table("departements")->count();
        //un étudiant inscrit qui a terminé tous les processus d'inscription (payer Frais inscription)
        $NombreInscriptions=DB::table("inscriptions")
        ->join("etudiants","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->count();
        $MontantPaye=DB::table("tranchepays")
        ->select("montantTranche")        
        ->sum("montantTranche");
        $NombreAnnonce=DB::table("annonce")->count();

         $PourcentageInf=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->where('pourcentage','<',60)
        ->count();

        $PourcentageSup=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("frais","frais.etudiant_id","=","etudiants.id")
        ->where('pourcentage','>=',60)
        ->count();
       
        $Infos=[
        "max"=>$max,"NombreSection"=>$NombreSection,"NombreOptions"=>$NombreOptions,
        "NombreDepartements"=>$NombreDepartements,
        "NombreInscriptions"=>$NombreInscriptions,"MontantPaye"=>$MontantPaye,
        "NombreAnnonce"=>$NombreAnnonce,"dataAnnonce"=>$dataAnnonce,
         "PourcentageInf"=>$PourcentageInf,"PourcentageSup"=>$PourcentageSup
        ];

        return view("pages.affichages.Accueil",compact("data","Infos","dataAnnonce"));
    }
}
