<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyCenterRequest extends FormRequest
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
			'address' => 'string',
			'phone' => 'string',
			'mail' => 'string',		
			'regional_id' => 'required',
			'district_id' => 'required',			
			'membership_id' => 'required',
        ];
    }
}
