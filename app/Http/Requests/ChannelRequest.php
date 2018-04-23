<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ChannelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function register()
    {
        return [
            'channel' => 'required',
            'name'    => 'required',
            'address' => 'required',
            'email' => 'required|unique:channel,email',
            'phone_number' => 'required',
        ];
    }

}
