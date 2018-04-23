<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:post_categories,name,'.request()->route('post_categories').',id',
        ];
    }

}
