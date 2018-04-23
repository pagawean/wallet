<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;
use App\Models\QueryLook;
use App\Models\Playlist;

use View;
use Image,General;
class FrontChannelsController extends Controller
{

    public function __construct()
    {

    }


    public function show()
    {
    	
    }

    public function channel($id){
        $channels = Channel::findOrFail($id);
        $playlists= Playlist::whereChannelId($id)->paginate(General::getSetting('pagging_channel_playlist',6));
        $uploads = Video::orderBy('created_at','desc')->where('channel_id',$id)->paginate(General::getSetting('pagging_channel_upload',6));
        $popularUploads = QueryLook::orderBy('count_looks','DESC')->where('channel_id',$id)->paginate(General::getSetting('pagging_channel_upload_popular',6));
        $videos_channels = Video::orderBy('created_at','desc')->where('channel_id',$id)->get();
        return view('page.front_channels.channel', compact('channels','playlists','videos_channels','popularUploads','uploads'));
    }

    public function playlist($id){
        Playlist::findOrFail($id);
        return view('page.user_pages.playlist');
    }

    public function channel_detail($id){
        $detail = Video::findOrFail($id);
        $datas = PlaylistDetail::paginate(10);
        $data = Playlist::findOrFail($id);
        return view('page.user_pages.channel_details')
                ->with(compact('detail', 'datas', 'data'));
    }

}
