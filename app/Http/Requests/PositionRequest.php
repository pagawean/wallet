<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;

class PositionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        	'name' => 'required|unique:positions,name,'.Request::segment(3)
        ];
    }

}
