<?php

namespace App\Http\Requests;

use App\Helpers\Qs;
use App\Models\branch;
use App\Models\Designation;
use App\Models\Year;
use App\Rules\EmailValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $user = Auth::user();
        $branches = branch::pluck('id')->toArray();
        $years = Year::pluck('id')->toArray();
        $designations = Designation::pluck('id')->toArray();
        $roles = ModelsRole::all()->pluck('name')->toArray();
        // dd($roles);
        // dd($branches);
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'profile_picture' => ['mimes:jpeg,jpg,png,gif', 'max:10000'],
            'branch_id' => ['required', Rule::In($branches)],
            'year_id' => [$user->hasRole('Student') ? 'required' : '', Rule::In($years)],
            'designation_id' => [(!$user->hasRole('Student')) ? 'required' : '' . Rule::In($designations)],
            'role' => [Rule::in($roles)],
        ];

        // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new EmailValidationRule],
    }
}
