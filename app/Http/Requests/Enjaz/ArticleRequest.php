<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use function __;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:3',
            'classification_id'=>'required',
            'name'=> Rule::requiredIf($this->classification_id == -1),'string|min:5|max:255',
            'details'=>'required|string|min:10',
            'image' => ['required_without:id',
                Rule::when($this->image != null,'image|mimes:jpeg,png,jpg,gif,svg,webp')]
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
                'image'=>__('validation.image'),
            ];
    }
}
