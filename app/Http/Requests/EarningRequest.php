<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EarningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('channel')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'value'=>'required|numeric',
            'cek_max'=>'required'
        ];
    }

    public function messages(){
        return [
            'value.required'=>'Amount cannot be empty',
            'value.numeric'=>'Amount should be numeric',
            'cek_max.required'=>'Amount should be less than saldo',
        ];
    }

    public function validationData(){
        $all = parent::all();

        if($all['value']>$all['income']){
            $all['cek_max']='';
        }else{
            $all['cek_max']='oke';
        }

        return $all;
    }
}
