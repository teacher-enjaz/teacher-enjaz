<?php

namespace App\Http\Requests\Enjaz;

use App\Models\Rawafed\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function __;

class UserLanguageRequest extends FormRequest
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
            'language_id'=> 'required',
            'reading_level'=> 'required|integer|min:0|max:100',
            'writing_level'=> 'required|integer|min:0|max:100',
            'speaking_level'=> 'required|integer|min:0|max:100',
            'name'=> Rule::requiredIf($this->language_id == -1),'string|min:5|max:255'
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
            'requiredIf' => __('validation.after'),
        ];
    }
}
