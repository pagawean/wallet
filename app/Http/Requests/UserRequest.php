<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'role_id'     => 'required',
        'password'    => 'required',
        'username'    => 'max:16|unique:users,username',
        ];
    }
//
//    public static function rules($id='')
////    {
////        return [
////            'role_id'     => 'required',
////            'name'        => 'required',
////            'username'    => 'max:16|unique:users,username,'.Request::segment(2),
////        ];
////    }
}
