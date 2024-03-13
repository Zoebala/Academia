<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidationNumero implements Rule
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
        //les numéros de téléphone autorisés
        $autorises=["089","084","080","085","082","081","083","090","097","099"];
        $initials=substr($value,0,3);
     
        
        return (in_array($initials,$autorises));

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'le numéro de téléphone saisi n\'est pas valide';
    }
}
