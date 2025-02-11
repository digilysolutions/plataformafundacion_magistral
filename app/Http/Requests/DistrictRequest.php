<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
			'tracking_code' => 'string',
			'address' => 'string',
			'phone' => 'string',
			'mail' => 'string',
			'regional_id' => 'required',
        ];
    }
}
