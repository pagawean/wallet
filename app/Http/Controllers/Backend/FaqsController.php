<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;

use App\Models\Faq;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class FaqsController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Faq $main_model){
        $this->view         = 'faqs';
        $this->title        = 'Faq';
        $this->main_model   = $main_model;
        $this->validate     = 'FaqRequest';

        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {
        $columns = [
            'question',
            'answer',
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
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
        return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    public function store(FaqRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            // $input['image'] = General::setImage($request->file('image'),$this->view);
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
        //
    }

    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
        return view('page.'.$this->view.'.edit')->with(compact('validator','data'));
    }

    public function update(FaqRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try{
            // $input['image'] = General::setImage($request->file('image'),$this->view);
            $data->fill($input)->save();
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try{
            $data->delete();
            DB::commit();
            toast()->success('Data berhasil hapus', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }
}
