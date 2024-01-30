<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $list_errors = [];
        foreach ($errors as $key => $error) {
            if (!empty($error[0])) {
                $list_errors[$key] = $error[0];
            }
        }

        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation Error',
                'errors' => $list_errors,
            ], Response::HTTP_BAD_REQUEST)
        );
    }
}
