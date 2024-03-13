<?php

namespace App\Rules;

use App\Models\Etudiant;
use Illuminate\Contracts\Validation\Rule;

class EtudiantExists implements Rule
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
        //
        return (Etudiant::where("teletudiant",$value))->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le numéro choisi ne correspond à aucun étudiant de notre base de données!';
    }
}
