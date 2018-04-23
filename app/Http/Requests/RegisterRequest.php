<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'      => 'required|unique:channels,username',
            'phone_number'  => 'required',
            'email'         => 'required|unique:channels,email',
            'password'      => 'required',
            'terms'        => 'required',
        ];
    }

}
