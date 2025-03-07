<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'course' => 'string',
            'studycenters_id' => 'required',
            //Person
            'name' => 'required|string',
            'lastname' => 'nullable|string',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user ? $this->user->id : null),
            ],
            'phone' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Este correo electrónico ya está registrado.',
            // Otros mensajes personalizados...
        ];
    }
}
