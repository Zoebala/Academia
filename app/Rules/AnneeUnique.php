<?php

namespace App\Rules;

use App\Models\Anneeacad;
use Illuminate\Contracts\Validation\Rule;

class AnneeUnique implements Rule
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
        return (!Anneeacad::where("libAnnee",$value)->exists());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'L\'annnée indiquée existe déjà';
    }
}
