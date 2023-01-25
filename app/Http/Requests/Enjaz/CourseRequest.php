<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use function __;

class CourseRequest extends FormRequest
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
            'hours'=> 'required|integer',
            'training_center'=> 'required|string|max:100|min:1',
            'end_date'=> 'required',
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
                'integer'=>__('validation.integer'),
            ];
    }
}
