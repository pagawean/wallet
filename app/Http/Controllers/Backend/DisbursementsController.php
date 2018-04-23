<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\DisbursementRequest;

use App\Models\Disbursement;
use App\Models\Channel;
use App\Traits\ImagesTrait;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class DisbursementsController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Disbursement $main_model){
        $this->view         = 'disbursements';
        $this->title        = 'Disbursement';
        $this->main_model   = $main_model;
        $this->validate     = 'DisbursementRequest';
        $listChannel              = Channel::pluck('channel','id');

        View::share('listChannel', $listChannel);
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {
        $columns = [
            'channel.channel',
            'value',
            'created_at',
            'status',
            'action'
        ];

        if($request->ajax())
        {
            $datas = $this->main_model->with([ 'channel'])->get();
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                    return view('page.'.$this->view.'.action',compact('data'));
                })
                ->editColumn('status',function($data){
                    if($data->status == 0){
                        $text_status = "Need Approval";
                    } elseif($data->status == 1){
                        $text_status = "Approved";
                    } elseif($data->status == 2){
                        $text_status = "Declined";
                    }
                    return $text_status;
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

    public function store(DisbursementRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            $input['image'] = General::setImage($request->file('image'),$this->view);
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

    public function update(DisbursementRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try{
            $input['image'] = General::setImage($request->file('image'),$this->view);
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

    public function setStatus($status, $id)
    {
        $disbursement = Disbursement::whereId($id)->update(['status'=>$status]);
        return redirect()->back();
    }
}
