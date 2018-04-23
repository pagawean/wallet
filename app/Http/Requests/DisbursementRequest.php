<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class DisbursementRequest  extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'channel_id' => 'required',
            'status' => 'required',
            'earning' => 'required',
        ];
    }

}
