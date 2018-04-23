<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class VideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'channel_id'        => 'required',
            'name'              => 'required',
            'title'             => 'required',
            'description'       => 'required',
            'video_category_id' => 'required',
        ];
    }

}
