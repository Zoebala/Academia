<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Etudiant extends Model
{
    use HasFactory,Notifiable;
    public $timestamps=false;

    public function routeNotificationForNexmo($notification)
    {
        return $this->telEtudiant;
    }
}
