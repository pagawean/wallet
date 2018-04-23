<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'city_id' => 'required',
            'name'    => 'required',
            'address' => 'required',
            'description' => 'required'
        ];
    }

}
