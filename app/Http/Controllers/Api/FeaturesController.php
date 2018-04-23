<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Look;
use App\Models\Love;
use App\Models\Comment;
use App\Models\Setting;
use Auth;
class FeaturesController extends Controller
{
    public function setLook($video_id)
    {
    	$look = Look::whereIp(request()->ip())
                        ->whereVideoId($video_id)
                        ->first();
    	if(empty($look)){
            $setting_look       = Setting::where('key','look')->first();
            $input['value']     = $setting_look->value;
    		$input['video_id']	= $video_id;
	        $input['ip'] 		= request()->ip();
	        $look = Look::create($input);
	    }
        $look = Look::whereVideoId($video_id)
                        ->count();
        return response()->json($look);
    }
    public function setLove(Request $request, $video_id)
    {
    	$look = Love::whereIp(request()->ip())->first();
        if(Auth::guard('channel')->check()){
            dd(true);
        }
        // dd(Auth::guard('channel')->user()->name);
    	if(empty($look) && !empty(Auth::guard('channel')->user()->id)){
    		$input['video_id']		= $video_id;
    		$input['channel_id']	= Auth::guard('channel')->user()->id;
	        $input['ip'] 			= request()->ip();

	        $look = Love::create($input);
	        return response()->json($look);
    	}
    	return null;
    }
    public function countComment(Request $request, $video_id)
    {
        return $comment = Comment::whereVideoId($video_id)->count();
    }
}
