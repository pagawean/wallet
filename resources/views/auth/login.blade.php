@extends('layouts.login')

@section('content')                 
<!-- BEGIN LOGIN FORM -->
<form class="login-form"  method="POST" action="{{ route('login') }}">
                         {{ csrf_field() }}
                        
    <h3 class="form-title"><center>Administrator</center></h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter any username and password. </span>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username"  name="username" value="{{ old('username') }}" required autofocus /> 
            @if ($errors->has('username'))          
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif               
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
            @if ($errors->has('password'))           
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif             
        </div>
    </div>
    <div class="form-actions">
        <label class="rememberme mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" value="1"  {{ old('remember') ? 'checked' : '' }}/> Remember me
                                
            <span></span>
        </label>
        <button type="submit" class="btn green pull-right"> Login </button>
    </div>
    <div class="forget-password">
        <h4>Forgot your password ?</h4>
        <p> no worries, click
                                
            <a href="{{ route('password.request') }}" id="forget-password"> here </a> to reset your password. 
        </p>
    </div>
</form>
                    

@endsection
