<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;
use App\Models\VideoCategory;
use App\Models\Playlist;
use App\Models\PlaylistDetail;
use App\Models\QueryLook;
use App\Models\QueryLove;
use App\Models\Disbursement;
use App\Models\Look;
use App\Models\Love;
use Auth;
use Image;
use App\Traits\ImagesTrait;
use DB,General,View,JsValidator;

class UserPagesController extends Controller
{
    use ImagesTrait;

    public $view;
    public $main_model;

    public function __construct(Video $main_model){
        $this->view         = 'user_pages';
        $this->title        = 'Video';
        $this->main_model   = $main_model;
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function index()
    {
        $trendings      = Video::paginate(6);
        $mostPopular    = Video::first();
        $otherVidios    = Video::paginate(6);
        $income = $this->get_income();
        

        return view('page.user_pages.index')
            ->with(compact('trendings','mostPopular','otherVidios','income'));
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

    public function upload()
    {
    	return view('page.user_pages.upload');
    }

    public function show()
    {

    }

    public function channel(){
        $channels = Channel::findOrFail(Auth::guard('channel')->user()->id);
        $disbursement   = Disbursement::whereChannelId(Auth::guard('channel')->user()->id)->sum('value');
        $income         = $this->get_income();
        $playlists    = Playlist::whereChannelId(Auth::guard('channel')->user()->id)->paginate(General::getSetting('pagging_channel_playlist',6));
        $uploads = Video::orderBy('created_at','desc')->where('channel_id',Auth::guard('channel')->user()->id)->paginate(General::getSetting('pagging_channel_upload',6));
        $popularUploads = QueryLook::orderBy('count_looks','DESC')->where('channel_id',Auth::guard('channel')->user()->id)->paginate(General::getSetting('pagging_channel_upload_popular',6));
        $videos_channels = Video::orderBy('created_at','desc')->where('channel_id',Auth::guard('channel')->user()->id)->get();
        return view('page.user_pages.channel', compact('channels','disbursement', 'playlists','income', 'videos_channels','popularUploads','uploads'));
    }

    public function playlist(){
        return view('page.user_pages.playlist');

    }

    public function channel_detail($id){
        $detail = Video::findOrFail($id);
        return view('page.user_pages.channel_details')
                ->with(compact('detail'));
    }

    public function update_avatar(Request $request)
    {
        $user = Channel::findOrFail( Auth::guard('channel')->user()->id);
        $input['avatar'] = General::setImage($request->file('avatar'),$this->view);
        $user->fill($input)->save();
        return redirect()->back();
    }

    public function update_user(Request $request)
    {
        $input = $request->all();
        $data = Channel::findOrFail( Auth::guard('channel')->user()->id);
        DB::beginTransaction();
        try{
            $input['image'] = General::setImage($request->file('image'),$this->view);
//            dd($input);
            $data->fill($input)->save();
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route('user_pages.user_details');
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }

    public function edit_user()
    {
        $MyAccount_validator = JsValidator::formRequest("App\Http\Requests\MYAccountRequest","#myAccount");
        $akun = Channel::findOrFail( Auth::guard('channel')->user()->id);
        return view('page.user_pages.account')
            ->with(compact('akun','MyAccount_validator'));
    }

    public function post_upload(Request $request)
    {
        $input = $request->all();
        $input['path']          = General::setFile($request->file('fileVideo'),$this->view);
        $input['channel_id']    = Auth::guard('channel')->user()->id;
        $video = Video::create($input);
        return response()->json($video->id);
    }
    public function user_detail()
    {
        return view('page.user_pages.account');
    }

    public function getPostUpload($id)
    {
        $data               = Video::findOrFail($id);
        $validator_edit_video = JsValidator::formRequest("App\Http\Requests\VideoRequest","#editVideo");
        if($data->channel_id != Auth::guard('channel')->user()->id)
            return redirect('/');
        $listVideoCategory  = VideoCategory::pluck('name','id');
        return view('page.user_pages.process', compact('data', 'listVideoCategory','validator_edit_video'));
    }

    public function updatePostData(Request $request, $id)
    {
        $input = $request->all();
        $data  = Video::findOrFail($id);
        DB::beginTransaction();
        try{
            $input['image']     = General::setImage($request->file('image'),$this->view);
//            dd($input);
            $data->fill($input)->save();
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route('user_pages.channels');
        }catch(\Exception $e) {
            toast()->error('Terjadi Kesalahan ' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }

    public function deleteVideo($id)
    {
        $data = Video::findOrFail($id);
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

    public function edit($id)
    {
        $data = Video::findOrFail($id);
        return view('page.user_pages.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Video::findOrFail($id);
        $data->fill($input)->save();

    }

    public function delete($id)
    {
        dd($id);
        $data = Video::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
	
	public function propose_disbursement(Request $request){
		$input 	= $request->all();
        $income	= $this->get_income();
        if($input['value'] > $income){
            $input['channel_id']    = Auth::guard('channel')->user()->id;
            $input['status']        = 0;
            Disbursement::create($input);
        }
    }

    public function PlaylistDetail($id)
    {
        $datas = PlaylistDetail::paginate(10);
        $data = Playlist::findOrFail($id);
        return view('page.user_pages.playlist', compact('data','datas'));
    }
}
