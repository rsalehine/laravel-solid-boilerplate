<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>[
                'required',
                'email'
            ],
            'name'=>[
                'sometimes',
                'string',
                'min:3'
            ],
            'password'=>[
                'required',
                'min:8'
            ]
        ];
    }
}
