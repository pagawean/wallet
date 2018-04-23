<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'  => 'required'
        ];
    }

}