<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use function __;

class ExperienceRequest extends FormRequest
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
            'name'=> 'required|string|max:100|min:5',
            'organization'=> 'required|string|max:100|min:5',
            'from'=> 'required',
            'to'=> 'required',
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
                'required_without' => __('validation.required_without'),
                'mimes' => __('validation.mimes'),
                'image' => __('validation.image'),
                'file' => __('validation.file'),
                'arabic' => __('validation.arabic'),
            ];
    }
}
