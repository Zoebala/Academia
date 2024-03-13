<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;

class NotificationController extends Controller
{
    //
    public function sendSmsNotification(){
        $basic  = new \Vonage\Client\Credentials\Basic("e71b79c7", "WYT9kEdGhErJIaiW");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("243890117520", config("sms.smsvar"), 'Bonjour Ass...depuis l\'application academia... signé Zoé Bala')
            // new \Vonage\SMS\Message\SMS("243896071804", BRAND_NAME, 'sms envoyé depuis l\'application academia')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "le message a été envoyé avec succès\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    public function affiche_notification(){
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","inscriptions.*","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
        ->Where("statut",1)        
        ->orderBy("inscriptions.etudiant_id","desc")
        ->get();

        Etudiant::Where("id","<>",Null)->update([
            "statut"=>0
        ]);

        return view("notification.notification_page",compact("NewInscrits"));
    }

    public function info_perso($id){
        $NewInscrits=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("options","inscriptions.option_id","=","options.id")
        ->select(["etudiants.*","options.*","inscriptions.*","etudiants.id as etudiant_id","etudiants.photo as Etud_photo"])
        // ->Where("statut",1)        
        ->Where("etudiant_id",$id)        
        ->orderBy("inscriptions.etudiant_id","desc")
        ->get();

        Etudiant::Where("id",$id)->update([
            "statut"=>0
        ]);

        return view("notification.notification_page",compact("NewInscrits"));
    }
}
