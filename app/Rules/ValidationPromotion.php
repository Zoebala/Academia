<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class ValidationPromotion implements Rule
{
    private $etud_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($etudiant_id)
    {
        //
        $this->etud_id=$etudiant_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //vérification de la conformité promotion candidat!
        $bool=DB::table("etudiants")
        ->join("inscriptions","inscriptions.etudiant_id","=","etudiants.id")
        ->join("promotions","inscriptions.promotion_id","=","promotions.id")
        ->where("inscriptions.promotion_id",$value)
        ->exists();
      
        return $bool;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        //rechercher de la promotion du candidat
        $Promotion=DB::table("inscriptions")
        ->join("promotions","promotions.id","=","inscriptions.promotion_id")
        ->join("etudiants","etudiants.id","=","inscriptions.etudiant_id")        
        ->where("inscriptions.etudiant_id",$this->etud_id)
        ->first();
       
        return 'Veuillez choisir votre promotion '.$Promotion->libpromotion;
    }
}
