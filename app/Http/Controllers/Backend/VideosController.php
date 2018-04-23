<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Models\Channel;
use App\Models\VideoCategory;
use Illuminate\Support\Facades\Storage;


use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;

class VideosController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Video $main_model){
        $this->view         = 'videos';
        $this->title        = 'Video';
        $this->main_model   = $main_model;
        $this->validate     = 'VideoRequest';

        $listChannel              = Channel::pluck('channel','id');
        $listVideoCategory        = VideoCategory::pluck('name','id');

        View::share('listChannel', $listChannel);
        View::share('listVideoCategory', $listVideoCategory);
        View::share('view', $this->view);
        View::share('title', $this->title);

    }

    public function index(Request $request)
    {
        $columns = [
            'channel_id',
            'video_category.name',
            'title',
            'description',
            'action',
        ];
        $datas = $this->main_model->with([ 'video_category'])->select(['*']);
        if($request->ajax())
        {
            return Datatables::of($datas)
                ->addColumn('action', function($data){
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

    public function store(VideoRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            $input['path'] = General::setFile($request->file('path'),$this->view);
            $input['image'] = General::setImage($request->file('image'),$this->view);
//            $input['path_type'] = $request->file('path')->getMimeType();
            $data = $this->main_model->create($input);
//            $input['path'] = $request->file('path');
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

    public function update(VideoRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try{
            $input['path'] = General::setFile($request->file('path'),$this->view);
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
//            Storage::delete([$data->image, $data->path]);
            $data->delete();
            DB::commit();
            toast()->success('Data berhasil hapus', $this->title);
            return redirect()->back();
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);                        
            DB::rollback();
        }
        return redirect()->back();
    }
}
