<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^(?=.*[A-Za-z])/', $value))
        {
            $fail('The :attribute must have letters.');
        }
        if(!preg_match('/^(?=.*[A-Z])/', $value))
        {
            $fail('The :attribute must have uppercase letters.');
        }
        if(!preg_match('/^(?=.*\d)/', $value))
        {
            $fail('The :attribute must have digit.');
        }
        if(!preg_match('/^(?=.*[@$!%?&#])/', $value))
        {
            $fail('The :attribute must have special symbol.');
        }
    }
}
