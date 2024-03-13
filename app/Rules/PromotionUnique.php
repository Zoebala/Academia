<?php

namespace App\Rules;

use App\Models\Promotion;
use Illuminate\Contracts\Validation\Rule;

class PromotionUnique implements Rule
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
        return (!Promotion::where("libPromotion",$value)->exists());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La promotion séléctionnée existe déjà.';
    }
}
