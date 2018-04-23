<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;
use App\Models\Role;

use DB;
use Hash;
use View;
use Validator;
use JsValidator;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    private $page_title;
    private $controller;
    private $model;
    private $view;
    private $main_model;

    public function __construct(User $main_model)
    {
        $this->page_title = "Users";
        $this->controller = "Users";
        $this->model      = "User";
        $this->view       = "users";
        $this->validate     = 'RoleRequest';
        $this->main_model = $main_model;
        //
        $listRole         = Role::pluck('name', 'id');

        View::share('page_title', $this->page_title);
        View::share('controller', $this->controller);
        View::share('model', $this->model);
        View::share('view', $this->view);
        View::share('main_model', $this->main_model);
        //
        View::share('listRole', $listRole);
    }

    public function index(Request $request)
    {
        $columns = [
            'id',
            'role.name',
            'username',
            'action'
        ];

        if($request->ajax())
        {
            $datas = $this->main_model->with(['role'])->select(['*']);
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

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['remember_token'] = $input['_token'];
        DB::beginTransaction();
        try{
            $data = $this->main_model->create($input);
            DB::commit();
//            Alert::success('Data Berhasil Disimpan', 'Berhasil');
            return redirect()->route($this->view.'.index');
        } catch(\Exception $e) {
            DB::rollback();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
        return view('page.'.$this->view.'.edit')->with(compact('validator','data'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $this->main_model->findOrFail($id);
        $input = $request->all();
        //
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        $input['remember_token'] = $input['_token'];

        DB::beginTransaction();
        try {
            $data->fill($input)->save();
            //
            DB::commit();
            return redirect()->route($this->view.'.index');
        } catch(\Exception $e) {
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
            return redirect()->route($this->view.'.index');
        } catch(\Exception $e) {
            DB::rollback();
        }
        return redirect()->back();
    }
}
