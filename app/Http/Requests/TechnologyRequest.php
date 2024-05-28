<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'il nome è richiesto',
            'title.min'=> ':min caratteri',
            'title.max'=> ':max caratteri',
        ];
    }
}
