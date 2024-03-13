<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Majorite implements Rule
{
    private $date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($d)
    {
        //
        $this->date=$d;
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
        return (date("Y")-date("Y",strtotime($value))) > 17;
            
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'vous n\'avez pas l\'âge requis pour prendre votre inscription, vous n\'avez que '.(date("Y")-date("Y",strtotime($this->date)))." an(s).";
    }
}
