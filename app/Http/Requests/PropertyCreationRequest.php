<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PropertyCreationRequest extends FormRequest
{

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
          'address' => ['required', 'array'],
          'address.line_1' => ['required', 'string'],
          'address.line_2' => ['required', 'string'],
          'address.postcode' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'address.line_1.required' => 'Address line 1 is required',
            'address.line_2.required' => 'Address line 2 is required',
            'address.postcode.required' => 'Address postcode is required',
        ];
    }
}
