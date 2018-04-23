<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class JobsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'work_hour_id'     => 'required',
            'company_id'       => 'required',
            'job_category_id'  => 'required',
            'position_id'      => 'required',
            'title'            => 'required',
            'content'          => 'required',
            'deadline'         => 'required'
        ];
    }

}
