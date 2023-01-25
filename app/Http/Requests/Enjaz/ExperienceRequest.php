<?php

namespace App\Http\Requests\Enjaz;

use App\Models\Rawafed\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'job_id'=> 'required',
            'organization'=> 'required|string|max:100|min:3',
            'from'=> 'required',
            'to'=> 'required|after:from',
            'notes'=> 'nullable|string|min:5|max:255',
            'name'=> Rule::requiredIf($this->job_id == -1),'string|min:5|max:255',
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
