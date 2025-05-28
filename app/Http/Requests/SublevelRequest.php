<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SublevelRequest extends FormRequest
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
			'activated' => 'required',
			'name' => 'required|string',
			'shortname' => 'required|string',
			'description' => 'string',
			'level_id' => 'required',
        ];
    }
}
