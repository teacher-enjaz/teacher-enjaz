<?php

namespace App\Http\Requests\Enjaz;

use App\Models\Rawafed\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function __;

class UserAwardRequest extends FormRequest
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
            'award_id'=> 'required',
            'name'=> Rule::requiredIf($this->award_id == -1),'string|min:3|max:255',
            'donor'=> Rule::requiredIf($this->award_id == -1),'string|min:3|max:255',
            'description'=> Rule::requiredIf($this->award_id == -1),'string|min:10',
            'obtained_date'=> 'required|date',
            'image' => ['required_without:id', Rule::when($this->image != null,'image|mimes:jpeg,png,jpg,gif,svg,webp')],
            'youtube_link'=> ['nullable', 'regex:#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#'],
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
