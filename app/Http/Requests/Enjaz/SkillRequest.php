<?php

namespace App\Http\Requests\Enjaz;

use App\Models\Rawafed\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function __;

class SkillRequest extends FormRequest
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
            'name'=> 'required|string|max:100|min:3',
            'skill_level'=> 'required|integer|max:100|min:0',
        ];
    }
    public function messages()
    {
        return
        [
            'required' => __('validation.required'),
            'string' =>  __('validation.string'),
            'integer' =>  __('validation.integer'),
            'max' => __('validation.max.string'),
            'min' => __('validation.min.string'),
        ];
    }
}
