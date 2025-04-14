<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
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
        // Obtén el estudiante (esto solo funcionará si el request es para actualizar)
        $student = $this->route('student');

        // Asegúrate de que el estudiante no sea nulo (puedes manejarlo como desees)
        if (is_null($student)) {
            abort(404, 'Estudiante no encontrado.');
        }

        // Aquí obtienes el user_id del estudiante
        $personId = $student?->people_id;

        return [
            'course' => 'string',
            'studycenters_id' => 'required',
            'name' => 'required|string',
            'lastname' => 'nullable|string',
          /*  'email' => [
                'required',
                'email',
                'max:255',
                // Esto revisará si el correo es único, pero ignorará el correo actual si no ha cambiado
                Rule::unique('people')->ignore($personId),
            ],*/
            'phone' => 'nullable|string',
        ];
    }
}
