<?php

namespace Code16\Formoj\Sharp;

use Illuminate\Foundation\Http\FormRequest;

class FormojFormSharpValidator extends FormRequest
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
            'title' => 'required',
            'published_at' => 'date|nullable',
            'unpublished_at' => 'date|after:published_at|nullable',
            'sections' => 'required',
            'sections.*.title' => 'required',
        ];
    }
}