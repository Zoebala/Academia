<?php

namespace App\Rules;

use App\Models\Anneeacad;
use Illuminate\Contracts\Validation\Rule;

class ValidationAnnee implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $Annee=Anneeacad::where("id",$value)-> first();
       
       $annee_encours=date("Y");
       $annee_extraite=substr($Annee->libAnnee,0,4);
      
       return (!($annee_extraite < $annee_encours || $annee_extraite > $annee_encours));
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       
        return 'Veillez saisir une annéé Académique correcte ('.date("Y").'-'.(date("Y")+1).')!';
    }

}
