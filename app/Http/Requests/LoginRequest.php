<?php

namespace App\Http\Requests;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'user_name' => 'required',
            'password' => 'required',
        ];
    }
}
