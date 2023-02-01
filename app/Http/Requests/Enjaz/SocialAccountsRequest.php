<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use function __;
use Illuminate\Validation\Rule;

class SocialAccountsRequest extends FormRequest
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
            'social_platforms_id'=> 'required',
            'link'=> 'required|url',

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
                'url'=>__('validation.url'),
            ];
    }
}
