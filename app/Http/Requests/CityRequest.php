<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;

class CityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        	'name' => 'required|unique:cities,name,'.Request::segment(3)
        ];
    }

}
