<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;

use App\Models\ContactUs;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class ContactUsController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(ContactUs $main_model){
        $this->view         = 'contact_us';
        $this->title        = 'Contact Us';
        $this->main_model   = $main_model;
        $this->validate     = 'FaqRequest';

        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {
        $columns = [
            'name',
            'email',
            'massage',
            'action'
        ];

        if($request->ajax())
        {
            $datas = $this->main_model->select(['*']);
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                        return view('page.'.$this->view.'.action',compact('data'));
                    })
                ->escapeColumns(['actions'])
                ->make(true);
        }
        return view('page.'.$this->view.'.index')
            ->with(compact('datas','columns'));

    }

    public function create()
    {

    }

    public function store(FaqRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            $input['name'] = $request->first_name.'&nbsp;'.$request->last_name;
            dd($input['name']);
            $data = $this->main_model->create($input);
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
        return view('page.'.$this->view.'.edit')->with(compact('validator','data'));
    }

    public function update(FaqRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
