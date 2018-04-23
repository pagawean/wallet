<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest, Request;

class ContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:content_categories,name,'.Request::segment(3)
        ];
    }
}
