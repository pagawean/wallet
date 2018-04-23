<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disbursement;
use App\Models\Look;
use App\Models\Love;
use App\Http\Requests\EarningRequest;
use Yajra\DataTables\Facades\DataTables;
use View, Auth, JsValidator, DB;
class EarningController extends Controller
{
    public $view;
    public $main_model;
    protected $validate;

    public function __construct(Disbursement $main_model){
        $this->view         = 'earning';
        $this->title        = 'Earning';
        $this->main_model   = $main_model;
        $this->validate        = 'EarningRequest';

        View::share('view', $this->view);
        View::share('title', $this->title);
        $this->middleware(function ($request, $next) {
            View::share('income',$this->get_income());
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $columns = ['created_at', 'value','status'];
        if($request->ajax())
        {
            $datas = $this->main_model->with(['channel'])->where('channel_id',Auth::guard('channel')->user()->id)->get();
            return Datatables::of($datas)
                ->addColumn('action',function($data){
                        
                })
                ->escapeColumns(['actions'])
                ->make(true);
        }
        return view('page.'.$this->view.'.index')
            ->with(compact('datas','columns'));

    }
   
    public function get_income(){
        $income_look = Look::whereHas('video', function($query){
            return $query->whereChannelId(Auth::guard('channel')->user()->id);
        })->sum('value');
        $income_love = Love::whereHas('video', function($query){
            return $query->whereChannelId(Auth::guard('channel')->user()->id);
        })->sum('value');
        // $income_subcribe = Subcribe::whereChannelId(Auth::guard('channel')->user()->id)->sum('value');
        $income_subcribe = 0;

        $income = $income_look + $income_love + $income_subcribe;

        return $income; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\'.$this->validate);
		return view('page.'.$this->view.'.create')->with(compact('validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EarningRequest $request)
    {
        //
        $input = $request->all();
        @$input['status']=0;
        @$input['channel_id']=Auth::guard('channel')->user()->id;
        DB::beginTransaction();
        try {
            $data = $this->main_model->create($input);
            DB::commit();
            toast()->success('Earning successfully issued', 'Earning');
            return redirect()->route($this->view.'.index');
            
        } catch(\Exception $e) {
            echo $e->getMessage();
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            // return redirect()->back();
            
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
