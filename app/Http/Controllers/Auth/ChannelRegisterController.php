<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

use App\Models\Channel;
use App\Mail\Greeting;

use Auth;
use Mail;
class ChannelRegisterController extends Controller
{
	protected $redirectTo = '/user_pages/channels';
    public function register(RegisterRequest $request)
    {
        $input = $request->all();
//        dd($input);
        $input['password'] = bcrypt($input['password']);
        $input['channel'] =  $input['username'];
        $input['phone_number'] = $input['phone_number'];
        $channel = Channel::create($input);
//        dd($channel);
        if($channel){
            Auth::guard('channel')->login($channel);
            return redirect($this->redirectTo);
        }
    }
}
