<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailValidationRule implements Rule
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
        $allowed = [
            'gmail.com',
            'zealeducation.com',
            'zealeduaction.edu'
        ];
        $parts = explode('@', $value);
        $domain = array_pop($parts);

        if (in_array($domain, $allowed)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email should Be of Zeal College.';
    }
}
