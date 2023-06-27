<?php

namespace App\Http\Requests;

use App\Models\branch;
use App\Models\Year;
use App\Rules\BranchValidationRule;
use App\Rules\YearValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoticeRequest extends FormRequest
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


        if ($this->isMethod('post')) {

            return [
                'caption' => ['required', 'max:300'],
                'notice' => ['required', 'mimetypes:application/pdf', 'max:10000'],
                'branch_id' => ['required', new BranchValidationRule],
                'year_id' => ['required', new YearValidationRule],
            ];
        }

        if ($this->isMethod('put')) {

            return [
                'caption' => ['required', 'max:300'],
                'branch_id' => ['required', new BranchValidationRule],
                'year_id' => ['required', new YearValidationRule],
            ];
        }
    }
}
