<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;
use Spatie\Permission\Models\Permission;

class PermissionValidationRule implements Rule
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
        $user = Auth::user();

        if ($user->hasRole('SuperAdmin')) {

            $allowedpermission =  Permission::all()->pluck('name')->toArray();
        } else {

            $allowedpermission = Auth::user()->getAllPermissions()->toArray();
        }

        foreach ($value as $permission) {
            ValidationRule::in($allowedpermission);
        }
        return true;
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
