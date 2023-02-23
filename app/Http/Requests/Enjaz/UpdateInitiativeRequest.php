<?php

namespace App\Http\Requests\Enjaz;

use Illuminate\Foundation\Http\FormRequest;
use function __;
use Illuminate\Validation\Rule;

class UpdateInitiativeRequest extends FormRequest
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
            'description'=>'required|string|min:10',
            'team'=>'required|string|min:10',
            'target_group'=>'required|string|min:10',
            'start_date'=>'required|date',
            'end_date'=>'required|after:start_date|date',
            'new_image' => 'nullable',
            'new_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'new_file' => 'nullable',
            'new_file.*' => 'nullable|file|mimes:pdf,doc,docx,xls,ppt,pptx',
            'new_youtube' => 'nullable',
            'new_youtube.*' => ['nullable', 'regex:#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#'],
            'old_youtube.*' => ['required', 'regex:#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#'],
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
                'requiredIf' => __('validation.required_if'),
                'after' => __('validation.after'),
                'date' => __('validation.date'),
            ];
    }
}
