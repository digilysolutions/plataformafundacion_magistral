<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudyCenterRequest extends FormRequest
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
            'name' => 'required|string',
            'mail' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],

        ];
    }
    public function messages(): array
    {
        return [
            'mail.required' => 'El campo de correo electrónico es obligatorio.',
            'mail.email' => 'Debes proporcionar una dirección de correo electrónico válida.',
            'mail.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'mail.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'mail.unique' => 'El correo electrónico ya está en uso. Por favor, elige otro.',
            'name.required' => 'El nombre es obligatorio.',
            'state.required' => 'El estado es obligatorio.',
        ];
    }
}
