<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function __;

class UserQualificationRequest extends FormRequest
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
        return [
            'graduation_year'=> 'required',
            'qualificationName'=> Rule::requiredIf($this->qualification_id == -1),'string|min:5|max:255',
            'qualification_id'=> 'required',
            'specializationName'=> Rule::requiredIf($this->specialization_id == -1),'string|min:5|max:255',
            'specialization_id'=> 'required',
            'universityName'=> Rule::requiredIf($this->university_id == -1),'string|min:5|max:255',
            'university_id'=> 'required',
            'graduatedCountryName'=> Rule::requiredIf($this->graduated_country_id == -1),'string|min:5|max:255',
            'graduated_country_id'=> 'required',
        ];
    }
    public function messages()
    {
        return
        [
            'required' => __('validation.required'),
            'string' =>  __('validation.string'),
            'max' => __('validation.max.string'),
            'min' => __('validation.min.string'),
            'after' => __('validation.after'),
            'requiredIf' => __('validation.after'),
        ];
    }
}
