<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typefrais extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table="typefrais";
    protected $fillable=["Motif", "Montanttypefrais","annee_id","created_at","promotion_id"];
}
