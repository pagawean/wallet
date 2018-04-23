<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

use App\Models\Setting;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class SettingsController extends Controller
{
    public $view;
    public $main_model;

    public function __construct(Setting $main_model){
        $this->view         = 'settings';
        $this->title        = 'Setting';
        $this->main_model   = $main_model;
        $this->validate     = 'SettingRequest';
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index()
    {
        $datas = $this->main_model->get();

//        if($request->ajax())
//        {
//            $datas = $this->main_model->select(['*']);
//            return Datatables::of($datas)
//                ->addColumn('action',function($data){
//                        return view('page.'.$this->view.'.action',compact('data'));
//                    })
//                ->escapeColumns(['actions'])
//                ->make(true);
//        }
     	return view('page.'.$this->view.'.edit')
			->with(compact('datas'));

    }

    public function store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        foreach($input as $key=>$data){
            $setting = Setting::where('key',$key)->update(['value' => $data]);
        }
        return redirect()->back();
    }

}
