<?php

namespace App\Rules;

use App\Models\branch;
use App\Models\Year;
use Illuminate\Contracts\Validation\Rule;

class BranchValidationRule implements Rule
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
        $branches = branch::pluck('id')->toArray();
        // dd($branches);
        if (in_array($value, $branches) || $value == 0) {
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
        return 'The validation error message.';
    }
}
