<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table="frais";
    protected $fillable=["montantFrais,motif","etudiant_id","annee_id","promotion_id"];
}
