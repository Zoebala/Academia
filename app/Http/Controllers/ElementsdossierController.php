<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Etudiant;
use App\Models\Anneeacad;
use App\Models\Promotion;
use App\Models\Typefrais;
use App\Models\Tranchepay;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Rules\ValidationAnnee;
use App\Models\Elementsdossier;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ElementsdossierController extends Controller
{
    //
    public function index($idEtudiant,$idOption){
        $Annees=Anneeacad::all();
        $Promotions=Promotion::all();

        $Inscriptions=Inscription::where("etudiant_id",$idEtudiant)
        ->first();

        session()->put("idOption",$idOption);
        return view("pages.insertions.formUploadFiles",compact("Annees","idEtudiant","idOption","Promotions"));

    }

    public function create(Request $req){
        $req->validate([
            "annee"=>["required","max:10","string",new ValidationAnnee],
            "promotion_id"=>"required|int",
            "idOption"=>"required|int",
            "etudiant_id"=>"required|int|unique:inscriptions",
            "bulletin5"=>"required",
            "bulletin6"=>"required",
            "carteidentite"=>"required",
            "demandeinscription"=>"required",
            "diplomeetat"=>"required",

        ]);
        //Enregistrement Inscription
        $Inscription=new Inscription;
        $Inscription->annee_id=$req->annee;
        $Inscription->etudiant_id=$req->etudiant_id;
        $Inscription->dateInscription=now();
        $Inscription->option_id=$req->idOption;
        $Inscription->promotion_id=$req->promotion_id;
        $Inscription->save();

        //Enregistrement Element Dossier
        $ElementsDossier= new Elementsdossier;
        $ElementsDossier->etudiant_id=$req->etudiant_id;
        //Upload bulletin5e
        if($req->hasfile("bulletin5")){
            $file=$req->file("bulletin5");
            $extension=$file->getClientOriginalExtension();
            $filename=time().rand(1,100).'.'.$extension;
            
            $file->move("uploads/ElementsDossierEtudiant/",$filename);
            $ElementsDossier->bulletin5e=$filename;
            
        }
        //Upload bulletin6e
        if($req->hasfile("bulletin6")){
            $file1=$req->file("bulletin6");
            $extension1=$file1->getClientOriginalExtension();
            $filename1=time().rand(1,100).'.'.$extension1;
            
            $file1->move("uploads/ElementsDossierEtudiant/",$filename1);
            $ElementsDossier->bulletin6e=$filename1;
            
        }
        //Upload carteidentite
        if($req->hasfile("carteidentite")){
            $file2=$req->file("carteidentite");
            $extension2=$file2->getClientOriginalExtension();
            $filename2=time().rand(1,100).'.'.$extension2;
            
            $file2->move("uploads/ElementsDossierEtudiant/",$filename2);
            $ElementsDossier->carteIdentite=$filename2;
            
        }
        //Upload demandeinscription
        if($req->hasfile("demandeinscription")){
            $file3=$req->file("demandeinscription");
            $extension3=$file3->getClientOriginalExtension();
            $filename3=time().rand(1,100).'.'.$extension3;
            
            $file3->move("uploads/ElementsDossierEtudiant/",$filename3);
            $ElementsDossier->demandeInscript=$filename3;
            
        }
        //Upload attestmariage
        if($req->hasfile("attestmariage")){
            $file4=$req->file("attestmariage");
            $extension4=$file4->getClientOriginalExtension();
            $filename4=time().rand(1,100).'.'.$extension4;
            
            $file4->move("uploads/ElementsDossierEtudiant/",$filename4);
            $ElementsDossier->attestationStatut=$filename4;
            
        }
        //Upload attestbcvm
        if($req->hasfile("attestbcvm")){
            $file5=$req->file("attestbcvm");
            $extension5=$file5->getClientOriginalExtension();
            $filename5=time().rand(1,100).'.'.$extension5;
            
            $file5->move("uploads/ElementsDossierEtudiant/",$filename5);
            $ElementsDossier->attestationBCVM=$filename5;
            
        }
        //Upload attestnation
        if($req->hasfile("attestnation")){
            $file6=$req->file("attestnation");
            $extension6=$file6->getClientOriginalExtension();
            $filename6=time().rand(1,100).'.'.$extension6;
            
            $file6->move("uploads/ElementsDossierEtudiant/",$filename);
            $ElementsDossier->attestationNation=$filename6;
            
        }
        //Upload diplomeetat
        if($req->hasfile("diplomeetat")){
            $file7=$req->file("diplomeetat");
            $extension7=$file7->getClientOriginalExtension();
            $filename7=time().rand(1,100).'.'.$extension7;
            
            $file7->move("uploads/ElementsDossierEtudiant/",$filename7);
            $ElementsDossier->diplomeEtat=$filename7;
            
        }
        //Upload attestnais
        if($req->hasfile("attestnais")){
            $file8=$req->file("attestnais");
            $extension8=$file8->getClientOriginalExtension();
            $filename8=time().rand(1,100).'.'.$extension8;
            
            $file8->move("uploads/ElementsDossierEtudiant/",$filename8);
            $ElementsDossier->attestationNais=$filename8;
            
        }
        //Upload profil L1 LMD
        if($req->hasfile("profil1")){
            $file9=$req->file("profil1");
            $extension9=$file9->getClientOriginalExtension();
            $filename9=time().rand(1,100).'.'.$extension9;
            
            $file9->move("uploads/ElementsDossierEtudiant/",$filename9);
            $ElementsDossier->profil1=$filename9;
            
        }
        //Upload profil L2 LMD
        if($req->hasfile("profil2")){
            $file10=$req->file("profil2");
            $extension10=$file10->getClientOriginalExtension();
            $filename10=time().rand(1,100).'.'.$extension10;
            
            $file9->move("uploads/ElementsDossierEtudiant/",$filename10);
            $ElementsDossier->profil2=$filename10;
            
        }
        //Upload profil L3 LMD
        if($req->hasfile("profil3")){
            $file11=$req->file("profil3");
            $extension11=$file11->getClientOriginalExtension();
            $filename11=time().rand(1,100).'.'.$extension11;
            
            $file9->move("uploads/ElementsDossierEtudiant/",$filename11);
            $ElementsDossier->profil3=$filename11;
            
        }
        $ElementsDossier->save();

        
        // if(session("Etudiant")){
        //     session()->pull("Etudiant");
        //     session()->pull("idEtudiant");
        // }
        session()->flash("msg","Enregistrement effectué avec succès!");
        $Etudiants=Etudiant::orderBy("id","desc")->get();
        // $Tranches=Tranchepay::orderBy("libTranche","asc")->get();
        $Frais =Typefrais::all();
        $Promo_id=Inscription::where("etudiant_id","=",$req->etudiant_id)        
        ->first();
         $Annees=Anneeacad::all();
         $Promotions=Promotion::all();
        
        return view("pages.insertions.formPayement",compact("Etudiants","Frais",'Promotions',"Promo_id","Annees"));
    }

    public function editer($idEtudiant,$idOption){

        $Elements=DB::table("elementsdossiers")
        ->Where("etudiant_id",$idEtudiant)
        ->first();
        
        $AnneeAcademique=DB::table("inscriptions")
        ->join("anneeacads","anneeacads.id","=","inscriptions.annee_id")
        ->select("anneeacads.*")
        ->Where("inscriptions.etudiant_id",$idEtudiant)
        ->first();
        $Annees=Anneeacad::all();

        $Inscription=DB::table('inscriptions')
        ->Where("inscriptions.etudiant_id",$idEtudiant)
        ->first();

        $Promotions=Promotion::all();
        

        $Options=DB::table("options")
            ->join("inscriptions","inscriptions.option_id","=","options.id")
            ->where("etudiant_id",$idEtudiant)
            ->first();
      $Etudiant=Etudiant::find($idEtudiant);
    
     return view("pages.modifications.editerElementsDossier",compact("Elements","AnneeAcademique","Options","Etudiant","Promotions","Inscription","Annees"));
    }


    public function updateDossier(Request $req){
        $req->validate([
            "annee_id"=>"required|int",
            "idOption"=>"required|int",
            "etudiant_id"=>"required|int",
            "Dossier_id"=>"required|int",
            "promotion_id"=>"required|int"
        ]);
        
    

        //Enregistrement Element Dossier
        
        $ElementsDossier=ElementsDossier::find($req->Dossier_id);

        $Inscription=Inscription::find($ElementsDossier->etudiant_id);
        

        $Inscription->promotion_id=$req->promotion_id;
        $Inscription->annee_id=$req->annee_id;
        // $ElementsDossier->etudiant_id=$req->etudiant_id;
        //Upload bulletin5e
        if($req->hasfile("bulletin5")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->bulletin5e;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$req->file("bulletin5");
            $extension=$file->getClientOriginalExtension();
            $filename=time().rand(1,100).'.'.$extension;
            
            $file->move("uploads/ElementsDossierEtudiant/",$filename);
            $ElementsDossier->bulletin5e=$filename;
            
        }
        //Upload bulletin6e
        if($req->hasfile("bulletin6")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->bulletin6e;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file1=$req->file("bulletin6");
            $extension1=$file1->getClientOriginalExtension();
            $filename1=time().rand(1,100).'.'.$extension1;
            
            $file1->move("uploads/ElementsDossierEtudiant/",$filename1);
            $ElementsDossier->bulletin6e=$filename1;
            
        }
        //Upload carteidentite
        if($req->hasfile("carteidentite")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->carteIdentite;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file2=$req->file("carteidentite");
            $extension2=$file2->getClientOriginalExtension();
            $filename2=time().rand(1,100).'.'.$extension2;
            
            $file2->move("uploads/ElementsDossierEtudiant/",$filename2);
            $ElementsDossier->carteIdentite=$filename2;
            
        }
        //Upload demandeinscription
        if($req->hasfile("demandeinscription")){
            //vérification et suppression de l'ancienne photo si celle-ci existe
            $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->demandeInscript;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file3=$req->file("demandeinscription");
            $extension3=$file3->getClientOriginalExtension();
            $filename3=time().rand(1,100).'.'.$extension3;
            
            $file3->move("uploads/ElementsDossierEtudiant/",$filename3);
            $ElementsDossier->demandeInscript=$filename3;
            
        }
        //Upload attestmariage
        if($req->hasfile("attestmariage")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationStatut;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file4=$req->file("attestmariage");
            $extension4=$file4->getClientOriginalExtension();
            $filename4=time().rand(1,100).'.'.$extension4;
            
            $file4->move("uploads/ElementsDossierEtudiant/",$filename4);
            $ElementsDossier->attestationStatut=$filename4;
            
        }
        //Upload attestbcvm
        if($req->hasfile("attestbcvm")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationBCVM;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file5=$req->file("attestbcvm");
            $extension5=$file5->getClientOriginalExtension();
            $filename5=time().rand(1,100).'.'.$extension5;
            
            $file5->move("uploads/ElementsDossierEtudiant/",$filename5);
            $ElementsDossier->attestationBCVM=$filename5;
            
        }
        //Upload attestnation
        if($req->hasfile("attestnation")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationNation;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file6=$req->file("attestnation");
            $extension6=$file6->getClientOriginalExtension();
            $filename6=time().rand(1,100).'.'.$extension6;
            
            $file6->move("uploads/ElementsDossierEtudiant/",$filename);
            $ElementsDossier->attestationNation=$filename6;
            
        }
        //Upload diplomeetat
        if($req->hasfile("diplomeetat")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->diplomeEtat;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file7=$req->file("diplomeetat");
            $extension7=$file7->getClientOriginalExtension();
            $filename7=time().rand(1,100).'.'.$extension7;
            
            $file7->move("uploads/ElementsDossierEtudiant/",$filename7);
            $ElementsDossier->diplomeEtat=$filename7;
            
        }
        //Upload attestnais
        if($req->hasfile("attestnais")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationNais;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file8=$req->file("attestnais");
            $extension8=$file8->getClientOriginalExtension();
            $filename8=time().rand(1,100).'.'.$extension8;
            
            $file8->move("uploads/ElementsDossierEtudiant/",$filename8);
            $ElementsDossier->attestationNais=$filename8;
            
        }
        //Upload profil1 LMD
        if($req->hasfile("profil1")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationNais;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file9=$req->file("profil1");
            $extension9=$file9->getClientOriginalExtension();
            $filename9=time().rand(1,100).'.'.$extension9;
            
            $file9->move("uploads/ElementsDossierEtudiant/",$filename9);
            $ElementsDossier->attestationNais=$filename9;
            
        }
        //Upload profil2 LMD
        if($req->hasfile("profil2")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationNais;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file10=$req->file("profil2");
            $extension10=$file10->getClientOriginalExtension();
            $filename10=time().rand(1,100).'.'.$extension10;
            
            $file10->move("uploads/ElementsDossierEtudiant/",$filename10);
            $ElementsDossier->attestationNais=$filename10;
            
        }
        //Upload profil3 LMD
        if($req->hasfile("profil3")){
             //vérification et suppression de l'ancienne photo si celle-ci existe
             $destination="uploads/ElementsDossierEtudiant/".$ElementsDossier->attestationNais;
             if(File::exists($destination)){
                 File::delete($destination);
             }
            $file11=$req->file("profil3");
            $extension11=$file11->getClientOriginalExtension();
            $filename11=time().rand(1,100).'.'.$extension11;
            
            $file11->move("uploads/ElementsDossierEtudiant/",$filename11);
            $ElementsDossier->attestationNais=$filename11;
            
        }
        $Inscription->update();
        $ElementsDossier->update();

        return redirect()->back()->with("msg","Modification effectuée avec succès!");
        
    }
}
