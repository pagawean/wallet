<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Comment;
use App\Models\ContentComment;
use App\Models\Love;
use App\Models\Content;
use App\Models\Playlist;
use App\Models\QueryLove;
use App\Models\QueryLook;
use App\Models\History;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\Subcribe;
use App\Models\PlaylistDetail;
use DB,General,View,JsValidator;
use Auth;
class FrontController extends Controller
{
    private $now, $last_date;
    public function __construct()
    {
        $this->setDate();
    }

    private function setDate(){
        $now        = date('Y-m-d');
        $now        = strtotime('+1 day',strtotime($now));
        $now        = date ( 'Y-m-d' , $now );
        $last_date  = strtotime('-7 day',strtotime($now));
        $last_date  = date ( 'Y-m-d' , $last_date );

        $this->now          = $now;
        $this->last_date    = $last_date;
    }

    public function index()
    {

        $playlists = Video::paginate(General::getSetting('pagging_index_playlist',6));
        $json = [];
        foreach($playlists as $k=>$playlist){
            $json[$k]['name']                   = $playlist->name;
            $json[$k]['description']            = $playlist->description;
            // $json[$k]['duration']               = 60;
            if(!empty($playlist->image)){
                $json[$k]['poster']                 = url('uploads/'.$playlist->image);
            } else {
                $json[$k]['poster']                 = url('front/images/no-video.jpg');
            }
            $json[$k]['sources'][0]["src"]      = url($playlist->path);
            $json[$k]['sources'][0]["type"]     = "video/mp4";
            if(!empty($playlist->image)){
                $json[$k]['thumbnail'][0]["srcset"] = url('uploads/'.$playlist->image);
            } else {
                $json[$k]['thumbnail'][0]["srcset"] = url('front/images/no-video.jpg');
            }
            $json[$k]['thumbnail'][0]["type"]   = "video/mp4";
            $json[$k]['thumbnail'][0]["media"]  = "(min-width: 400px;)";
            if(!empty($playlist->image)){
                $json[$k]['thumbnail'][0]["src"] = url('uploads/'.$playlist->image);
            } else {
                $json[$k]['thumbnail'][0]["src"] = url('front/images/no-video.jpg');
            }
        }
        $json = json_encode($json);
        
        // trendings

        $trendings = QueryLove::where('created_at','<=',$this->now)
                    ->where('created_at','>=',$this->last_date)
                    ->orderBy('count_love','DESC')
                    ->paginate(General::getSetting('pagging_index_trending',6));

        $mostPopular = QueryLook::where('created_at','<=',$this->now)
                    ->where('created_at','>=',$this->last_date)
                    ->orderBy('count_looks','DESC')
                    ->first();
        if(!empty($mostPopular)){
            $otherVidios = QueryLook::whereNotIn('id',[@$mostPopular->id])
                        ->where('created_at','<=',$this->now)
                        ->where('created_at','>=',$this->last_date)
                        ->orderBy('count_looks','DESC')
                        ->paginate(General::getSetting('pagging_index_popular',6));
        } else {
            $otherVidios = [];
        }

        $banners = Banner::all();

    	return view('page.front_pages.index')
            ->with(compact('trendings','json', 'banners','mostPopular','otherVidios'));
    }

    public function video_details($id, $title)
    {
        $detail     = Video::findOrFail($id);
        $terkaits   = Video::where('video_category_id', $detail->video_category_id)
                        ->whereNotIn('id', [$detail->id])
                        ->paginate(General::getSetting('pagging_video_detail',6));
        $subcribe   = Subcribe::whereFromId(@Auth::guard('channel')->user()->id)
                                ->whereToId($detail->channel_id)
                                ->count();
        
    	return view('page.front_pages.video_details')
            ->with(compact('detail','terkaits','subcribe'));
    }

    public function trending()
    {
      
        $trendings = QueryLove::where('created_at','<=',$this->now)
                            ->where('created_at','>=',$this->last_date)
                            ->orderBy('count_love','DESC')
                            ->paginate(General::getSetting('pagging_tending',6));
        return view('page.front_pages.trendings')
            ->with(compact('trendings'));
    }

    

    public function popular()
    {
        $datas = QueryLook::where('created_at','<=',$this->now)
                            ->where('created_at','>=',$this->last_date)
                            ->orderBy('count_looks','DESC')
                            ->paginate(General::getSetting('pagging_popular',6));

        return view('page.front_pages.popular')
            ->with(compact('datas'));
    }

    public function history()
    {
        $histories = History::orderBy('created_at','DESC')->paginate(General::getSetting('pagging_history',6));
        return view('page.front_pages.histories')
            ->with(compact('histories'));
    }

    public function news()
    {
        $newsed = Content::where('type','news')->paginate(General::getSetting('pagging_news',6));
        $update_newsed = Content::where('type','news')->paginate(General::getSetting('update_news',6));
        return view('page.front_pages.news')
            ->with(compact('newsed','update_newsed'));
    }

    public function artikel()
    {
        $newsed = Content::where('type','artikel')->paginate(General::getSetting('pagging_articel',6));
        $update_newsed = Content::where('type','artikel')->paginate(General::getSetting('update_article',6));
//        dd($update_newsed);
        return view('page.front_pages.artikel')
            ->with(compact('newsed','update_newsed'));
    }

    public function search_video(Request $request)
    {
        $input = $request->all();
        $trendings = new Video;

        if(!empty($input['Search']))
            $trendings = $trendings->where('title', 'like', '%'.$input['Search'].'%');

        $trendings = $trendings->paginate(General::getSetting('pagging_search',6));
        return view('page.front_pages.search')
            ->with(compact('trendings'));
    }

    public function news_detail($id, $title)
    {
        $news = Content::findOrFail($id);
        $update_newsed = Content::where('type','news')->paginate(General::getSetting('pagging_update_news',6));
        return view('page.front_pages.news_details')
            ->with(compact('news','update_newsed'));
    } 

    public function artikel_detail($id, $title)
    {
        $news = Content::findOrFail($id);
        $update_newsed = Content::where('type','artikel')->paginate(General::getSetting('pagging_update_article',6));
        return view('page.front_pages.news_details')
            ->with(compact('news','update_newsed'));
    }
    
    public function login()
    {
        $login_validator = JsValidator::formRequest("App\Http\Requests\LoginRequest","#login");
        $register_validator = JsValidator::formRequest("App\Http\Requests\RegisterRequest","#register");
        return view('page.front_pages.login')->with(compact('login_validator','register_validator'));
    }

    public function setLove($video_id)
    {
        $love = Love::whereIp(request()->ip())
                        ->whereVideoId($video_id)
                        ->first();
        if(empty($love) && !empty(Auth::guard('channel')->user()->id)){
            $setting_love           = Setting::where('key','love')->first();
            $input['value']         = $setting_love->value;
            $input['video_id']      = $video_id;
            $input['channel_id']    = Auth::guard('channel')->user()->id;
            $input['ip']            = request()->ip();

            $love = Love::create($input);
        }
        $love = Love::whereVideoId($video_id)->count();
        return response()->json($love);
    }

    public function setSubcribe($channel_id)
    {
        $subcribe = Subcribe::whereToId($channel_id)
                        ->whereFromId(Auth::guard('channel')->user()->id)
                        ->first();
        if(empty($subcribe) && !empty(Auth::guard('channel')->user()->id)){
            $setting_subcribe       = Setting::where('key','subcribe')->first();
            $input['value']         = $setting_subcribe->value;
            $input['to_id']         = $channel_id;
            $input['from_id']       = Auth::guard('channel')->user()->id;
            $subcribe               = Subcribe::create($input);
        }
        $subcribe = Subcribe::whereToId($channel_id)->count();
        return response()->json($subcribe);
    }

    public function setDisubcribe($channel_id)
    {
        $video = Video::whereId($channel_id)->first();
        $disubcribe = Subcribe::whereToId($channel_id)
                        ->whereFromId(Auth::guard('channel')->user()->id)
                        ->delete();
        return response()->json($disubcribe);
    }

    public function setHistory($video_id)
    {
        $history = History::whereIp(request()->ip())
                        ->whereVideoId($video_id)
                        ->whereChannelId(@Auth::guard('channel')->user()->id)
                        ->delete();

        $input['video_id']      = $video_id;
        $input['channel_id']    = @Auth::guard('channel')->user()->id;
        $input['ip']            = request()->ip();

        $history = History::create($input);
        return response()->json($history);
    }

    public function setComment(Request $request, $video_id){
        $input = $request->all();

        $input['video_id']      = $video_id;
        $input['channel_id']    = Auth::guard('channel')->user()->id;
        $comment = Comment::create($input);
        return view('page.front_pages.comment')
            ->with(compact('comment'));
    }

    public function addPlaylist(Request $request){
        $input = $request->all();
        $input['channel_id']    = Auth::guard('channel')->user()->id;
        $playlist = Playlist::create($input);
        return view('page.front_pages.playlist')
            ->with(compact('playlist'));
    }

    public function faq(){
        $faqs = Faq::all();
        return view('page.front_pages.faq')
            ->with(compact('faqs'));
        // return view('page.front_pages.faq');
    }

    public function contact(){
        // $faqs = Faq::all();
        // return view('page.front_pages.faq')
        //     ->with(compact('faqs'));
        return view('page.front_pages.contact');
    }

    public function contact_store(Request $request)
    {
        $input = $request->all();
        dd($input);
        DB::beginTransaction();
        try{
            $input['name'] = $request->first_name.''.$request->last_name;
            $data = $this->main_model->create($input);
            DB::commit();
            return redirect()->back();
        }catch(\Exception $e) {
            DB::rollback();
        }
        return redirect()->back();
    }

    public function addToPlaylist($playlist_id,$video_id){
        $playlist_detail = PlaylistDetail::wherePlaylistId($playlist_id)
                                ->whereVideoId($video_id)
                                ->first();
        if(!empty($playlist_detail)){
            $playlist_name = $playlist_detail->playlist->name;
            PlaylistDetail::wherePlaylistId($playlist_id)
                                ->whereVideoId($video_id)
                                ->delete();
            return "Data Dihapus Dari Playlist ".$playlist_name;
        } else {
            $input['playlist_id']   = $playlist_id;
            $input['video_id']      = $video_id;
            $input['channel_id']    = Auth::guard('channel')->user()->id;
            $playlist_detail = PlaylistDetail::create($input);
            $playlist_name = $playlist_detail->playlist->name;
            return "Data Ditambahkan ke Playlist ".$playlist_name;
        }
    }

    public function setContentComment(Request $request, $content_id){
        $input = $request->all();

        $input['content_id']        = $content_id;
        $input['channel_id']        = Auth::guard('channel')->user()->id;
        $comment = ContentComment::create($input);
        return view('page.front_pages.comment')
            ->with(compact('comment'));
    }
}



