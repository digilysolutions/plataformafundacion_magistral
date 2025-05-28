<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsPisaRequest extends FormRequest
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
			'name' => 'string',
			'code' => 'required|string',
			'year' => 'required',
			'question' => 'required|string',
			'activated' => 'required',
			'state' => 'required',
			'resource' => 'string',
			'ai_help' => 'string',
			'specialty_id' => 'required',
			'level_id' => 'required',
			'content_id' => 'required',
        ];
    }
}
