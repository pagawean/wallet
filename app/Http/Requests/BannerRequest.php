<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'required',
            'description'    => 'required',
            'url' => 'required',
        ];
    }

}
