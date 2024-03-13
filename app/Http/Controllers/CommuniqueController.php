<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mediumart\Orange\SMS\SMS;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Rules\EtudiantExists;
use App\Rules\IntervalDestinataire;
use Mediumart\Orange\SMS\Http\SMSClient;

class CommuniqueController extends Controller
{
    //
    public function index(){
        $Etudiants=Etudiant::all();
        return view("pages.insertions.formCommunique",compact("Etudiants"));
    }

    public function createIndivMessage(Request $req){
        $req->validate([
            "telephone"=>["required","max:10","string", new EtudiantExists()],
            "contenu"=>"required|max:255|string",
        ]);

        //récupération de l'id de l'étudiant
        $etudiant_id=Etudiant::where("teletudiant",$req->telephone)
        ->select("id")
        ->first();

        //envoi d'un sms à l'étudiant choisi
        $client = SMSClient::getInstance(config('orangemoney.client_id'), config('orangemoney.merchant_key')); 
        $sms = new SMS($client);         
        $sms->to(Str::replaceFirst('0','+243',$req->telephone))
                ->from('+243896071804','Academia')
                ->message(strip_tags($req->contenu))                
                ->send();

        //insertion du message dans la base de données
        Message::create([
            "contenu"=>htmlspecialchars($req->contenu),
            "etudiant_id"=>$etudiant_id,
            "created_at"=>now(),
            "updated_at"=>now()            
        ]);
        return redirect()->with('msg',"message envoyé avec succès");
    }

    
    public function createColMessage(Request $req){
        $req->validate([
            "etudiants"=>["required","min:1","max:3","int"],
            "contenu"=>"required|max:255|string",
        ]);
        dd("salut");
        switch($req->etudiants){
            case 1://message à tous les étudiants
                $TotalEtudiant=Etudiant::all()->count();
                $Etudiant=Etudiant::select("teletudiant")->get();
                $i=0;
                while($i < $TotalEtudiant){
                    //diffusion des sms à tous les étudiants
                    $client = SMSClient::getInstance(config('orangemoney.client_id'), config('orangemoney.merchant_key')); 
                    $sms = new SMS($client);         
                    $sms->to(Str::replaceFirst('0','+243',$Etudiant[$i]->teletudiant))
                    ->from('+243896071804','Academia')
                    ->message(strip_tags($req->contenu))                
                    ->send();                    
                    $i++;
                }
                
                // Instructions
                break;
                case 2://message aux étudiants ayant obtenu au moins 60%
                    $TotalEtudiant=Etudiant::where("pourcentage",">=",60)->count();                    
                    $Etudiant=Etudiant::where("pourcentage",">=",60)
                    ->select("teletudiant")
                    ->get();                    
                    $i=0;
                    while($i < $TotalEtudiant){
                        //diffusion des sms
                        $client = SMSClient::getInstance(config('orangemoney.client_id'), config('orangemoney.merchant_key')); 
                        $sms = new SMS($client);         
                        $sms->to(Str::replaceFirst('0','+243',$Etudiant[$i]->teletudiant))
                        ->from('+243896071804','Academia')
                        ->message(strip_tags($req->contenu))                
                        ->send();                    
                        $i++;
                    }                  
                    
                    
                    break;
                    case 3://message aux étudiants ayant obtenu moins de 60%
                        $TotalEtudiant=Etudiant::where("pourcentage","<",60)->count();                    
                        $Etudiant=Etudiant::where("pourcentage","<",60)
                        ->select("teletudiant")
                        ->get();                    
                        $i=0;
                        while($i < $TotalEtudiant){
                            //diffusion des sms
                            $client = SMSClient::getInstance(config('orangemoney.client_id'), config('orangemoney.merchant_key')); 
                            $sms = new SMS($client);         
                            $sms->to(Str::replaceFirst('0','+243',$Etudiant[$i]->teletudiant))
                            ->from('+243896071804','Academia')
                            ->message(strip_tags($req->contenu))                
                            ->send();                    
                            $i++;
                        }
                                        
            break;
            default:
               abort(404);

        }

        
         //insertion du message dans la base de données
        //  Message::create([
        //     "contenu"=>htmlspecialchars($req->contenu),            
        //     "destinataire"=>$req->etudiants,
        //     "created_at"=>now(),
        //     "updated_at"=>now()            
        // ]);        
        return redirect()->with('msg',"message envoyé avec succès");
    }
}
