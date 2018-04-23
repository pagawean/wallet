<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Channel;

class ChannelLoginController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:channel');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {

        ini_set('display_errors', 0);
        date_default_timezone_set('Asia/Jakarta');
        $api_url    = "https://otakatik.j-last.com/api/v1/";
        $data       = array(
                          "url"=>$api_url."login",
                          "fields_string"=>
                            array(
                                "email"=>$request->email,
                                "password"=>$request->password,
                                "user_id"=>""
                            )
                        );
        $payload = http_build_query($data['fields_string']);
        $response   = $this->hit_url($data);
        $user = json_decode($response['data'],true);
        if($user['status'] == 1){
            $input['channel']           = $user['data']['name'];
            $input['name']              = $user['data']['name'];
            $input['gender']            = $user['data']['profile']['Gender'];
            $input['email']             = $user['data']['email'];
            $input['phone_number']      = $user['data']['msisdn'];
            $input['username']          = $user['data']['email'];
            $input['avatar']            = $user['data']['foto'];
            $input['api_id']            = $user['data']['id'];
            $channel = Channel::updateOrCreate(['api_id' => $user['data']['id']],$input);
            Auth::guard('channel')->login($channel);
            return redirect("/user_pages/channels");
        }
    }

    public function logout() {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }

    function hit_url($params){
        $ch = curl_init();
        $payload = http_build_query($params['fields_string']);

        curl_setopt($ch, CURLOPT_URL, $params['url']);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded',
                'signature: '.md5(date('Ymd').'b4cny7lst'.$params['fields_string']['user_id'].$payload)
                ]
            );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $result    = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        return array('data' => $result, 'http_code' => $http_code);

    }

}
