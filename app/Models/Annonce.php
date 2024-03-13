<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='annonce';
    protected $fillable=[
        "titre","contenu","photo","created_at"
    ];
}
