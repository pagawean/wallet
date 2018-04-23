<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;

use App\Traits\ImagesTrait;
use Yajra\DataTables\Facades\DataTables;
use DB,General,View,JsValidator;
class RoleMenusController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(RoleMenu $main_model){
        $this->view         = 'role_menus';
        $this->title        = 'Role Menu';
        $this->main_model   = $main_model;

        View::share('view', $this->view);
        View::share('title', $this->title);
    }
    public function index(Request $request)
    {
        $columns = ['role.name', 'menu.name','menu.url','action'];
        $datas = $this->main_model->with(['role','menu'])->select(['*']);
        if($request->ajax())
        {
//            $datas = $this->main_model->with([''])->select->(['*']);
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

    public function store(Request $request){
        $input = $request->all();
        foreach($input['menu_id'] as $k=>$menu_id){
            $datas[$k]['role_id'] = $input['role_id'];
            $datas[$k]['menu_id'] = $menu_id;
        }
        DB::beginTransaction();
        try{
            $this->main_model->whereRoleId($input['role_id'])->delete();
            $data = $this->main_model->insert($datas);
            DB::commit();
        }catch(\Exception $e) {
            DB::rollback();
        }
        return redirect()->back();
    }
}
