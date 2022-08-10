<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'message' => __('The given data was invalid.'),
            'errors' => $validator->errors()->toArray(),
        ];

        throw new HttpResponseException(response()->json($data, 422));
    }
}
