<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;

use App\Models\Tag;
use App\Models\ContentTag;
use App\Models\Content;
use App\Models\ContentMedia;
use App\Models\ContentCategory;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator, Validator;

class ArticlesController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Content $main_model){
        $this->title           = 'Artikel';
        $this->view            = 'articles';
        $this->main_model      = $main_model;
        $this->validate        = 'ContentRequest';
        
        $listContentCategories = ContentCategory::pluck('name','id');
        $listTags              = Tag::pluck('name','id');

        View::share('listContentCategories', $listContentCategories);
        View::share('listTags', $listTags);
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index(Request $request)
    {
        $columns = ['id', 'content_category.name', 'type', 'title', 'action'];
        $datas = $this->main_model
            ->with(['content_category'])
            ->where('type', 'artikel')
            ->select(['*']);
        if($request->ajax())
        {
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

    public function store(ContentRequest $request)
    {

        $input = $request->all();
        $input['type'] = 'artikel';
        DB::beginTransaction();

            $data = $this->main_model->create($input);
            DB::commit();
            $input = $request->all();

            foreach ($input['tag_id'] as $k => $v) {
                $contentTag['content_id']   = $data->id;
                if(is_numeric($input['tag_id'][$k])){
                    $contentTag['tag_id']       = $input['tag_id'][$k];
                } else {
                    $input_tag['name'] = $input['tag_id'][$k];
                    $tag = Tag::create($input_tag);
                    $contentTag['tag_id']       = $tag->id;
                }
                ContentTag::create($contentTag);
            }

            if (!empty($request->file('name'))) {
                $files = $request->file('name');
                ContentMedia::whereContentId($data->id)->delete();
                foreach ($input['name'] as $k => $v) {
                    $name = General::setImage($input['name'][$k],$this->view);
                    $input_detail['content_id'] = $data->id;
                    $input_detail['name'] = $name;
                    $input_detail['type_media'] = $input['type_media'][$k];
                    ContentMedia::create($input_detail);
                }
            }
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
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

    public function update(ContentRequest $request, $id)
    {
        $data = $this->main_model->findOrFail($id);
        $input = $request->all();

        DB::beginTransaction();
        try {
            $data->fill($input)->save();

            ContentTag::where('content_id',$data->id)->delete();

            foreach ($input['tag_id'] as $k => $v) {
                $contentTag['content_id']   = $data->id;
                if(is_numeric($input['tag_id'][$k])){
                    $contentTag['tag_id']       = $input['tag_id'][$k];
                } else {
                    $input_tag['name'] = $input['tag_id'][$k];
                    $tag = Tag::create($input_tag);
                    $contentTag['tag_id']       = $tag->id;
                }
                ContentTag::create($contentTag);
            }
            if (!empty($request->file('name'))) {
                $files = $request->file('name');
                ContentMedia::whereContentId($data->id)->delete();
                foreach ($input['name'] as $k => $v) {
                    $name = General::setImage($input['name'][$k],$this->view);
                    $input_detail['content_id'] = $data->id;
                    $input_detail['name'] = $name;
                    $input_detail['type_media'] = $input['type_media'][$k];
                    ContentMedia::create($input_detail);
                }
            }
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view.'.index');
        } catch(\Exception $e) {
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
            ContentMedia::whereContentId($id)->delete();
            ContentTag::whereContentId($id)->delete();
        	$data->delete();
        	DB::commit();
            toast()->success('Data berhasil di hapus', $this->title);
            return redirect()->route($this->view.'.index');
        }catch(\Exception $e) {
    		DB::rollback();
    	}
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }

    public function detail()
    {
        return view('page.'.$this->view.'.detail');
    }
}
