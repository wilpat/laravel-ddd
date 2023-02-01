<?php

declare(strict_types=1);

namespace Domains\Property\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BatchCreationRequest extends FormRequest
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
          'properties' => ['required', 'array'],
          'properties.*.address' => ['required', 'array'],
          'properties.*.address.line_1' => ['required', 'string'],
          'properties.*.address.line_2' => ['required', 'string'],
          'properties.*.address.postcode' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'properties.*.address.line_1.required' => 'Address line 1 is required',
            'properties.*.address.line_2.required' => 'Address line 2 is required',
            'properties.*.address.postcode.required' => 'Address postcode is required',
        ];
    }
}
