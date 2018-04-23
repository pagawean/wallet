<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:tags,name,'.Request::segment(3)
        ];
    }

}
