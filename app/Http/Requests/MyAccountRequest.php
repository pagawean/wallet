<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class MyAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'channel'       => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'name'          => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
        ];
    }

}
