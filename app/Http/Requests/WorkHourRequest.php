<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;
class WorkHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:work_hours,name,'.Request::segment(3)
        ];
    }

}
