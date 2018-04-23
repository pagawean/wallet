@extends('layouts.default')

@section('title','Video')

@section('css')

@endsection
@section('header_dashboard')
@section('content')
<br>
   <div class="general">
        <div class="container">
        <h4 class="latest-text w3_latest_text ml0">Your Account</h4>
            <div class="row">
               <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(!empty(Auth::guard('channel')->user()->avatar))
                        <img id="showgambar" src="{{ url('uploads/'.Auth::guard('channel')->user()->avatar)}} " class="img-responsive img-thumbnail img-circle" style="width:250px; height:250px;">
                        @else
                         <img id="showgambar" src="{{url('front/images/default.jpg')}} " class="img-responsive img-thumbnail img-circle" style="width:250px; height:250px;">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <form enctype="multipart/form-data" action="{{url('user_pages/update_avatar')}}" method="POST">
                            <label>Profile Image</label>
                            <input id="inputgambar" type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                            <input type="submit" class="pull-left btn btn-sm btn-primary" value="Change Image">
                        </form>
                    </div>
                </div>
               </div>
               @if(!isset($akun))
                <div class="col-md-6">
                    <table class="table table-striped">
                        <tr>
                            <td><label>Name :</label></td>
                            <td>{{Auth::guard('channel')->user()->name}}</td>
                        </tr>
                        <tr>
                            <td><label>Channel :</label></td>
                            <td>{{Auth::guard('channel')->user()->channel}}</td>
                        </tr>
                        <tr>
                            <td><label>Username :</label></td>
                            <td>{{Auth::guard('channel')->user()->username}}</td>
                        </tr>
                        <tr>
                            <td><label>Email :</label></td>
                            <td>{{Auth::guard('channel')->user()->email}}</td>
                        </tr>
                        <tr>
                            <td><label>Gender :</label></td>
                            <td>{{Auth::guard('channel')->user()->gender}}</td>
                        </tr>
                        <tr>
                            <td><label>Phone Number :</label></td>
                            <td>{{Auth::guard('channel')->user()->phone_number}}</td>
                        </tr>
                    </table>
                    <div class="col-md-1">
                            <a href="{{url('user_pages/edit_users')}}" class="pull-left btn btn-sm btn-primary">Edit Akun</a>
                    </div>
                </div>
               @else
                <form enctype="multipart/form-data" action="{{url('user_pages/update_users')}}" id="myAccount" method="POST">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            {{ csrf_field() }}
                            <tr>
                                <td><label>Name :</label></td>
                                <td><input class="form-control" type="text" name="name" value="{{ @$akun->name }}"></td>
                            </tr>
                            <tr>
                                <td><label>Channel :</label></td>
                                <td><input class="form-control" type="text" name="channel" value="{{ @$akun->channel }}"></td>
                            </tr>
                            <tr>
                                <td><label>Username :</label></td>
                                <td><input class="form-control" type="text" name="username" value="{{ @$akun->username }}"></td>
                            </tr>
                            <tr>
                                <td><label>Email :</label></td>
                                <td><input class="form-control" type="text" name="email" value="{{ @$akun->email }}"></td>
                            </tr>
                            <tr>
                                <td><label>Gender :</label></td>
                                <td>{!! Template::selectbox(['' => ' - Pilih Gender - ', 'laki-laki' => 'Laki-Laki', 'perempuan' => 'Perempuan'] , @$data->gender, "gender", ["class" => "form-control"]) !!}
                                </td>
                            </tr>
                            <tr>
                                <td><label>Phone Number :</label></td>
                                <td><input class="form-control" type="text" name="phone_number" value="{{ @$akun->phone_number }}"></td>
                            </tr>
                            <tr>
                                <td><label>Foto Sampul :</label></td>
                                <td>
                                    <img id="showBanner" src="{{ url('uploads/'.Auth::guard('channel')->user()->image)}}" style="width:250px; height:100px;"></br><input id="inputBanner" type="file" name="image"></td>
                            </tr>
                        </table>
                        <div class="col-md-1">
                            <input type="submit" value="Update Profile" class="pull-left btn btn-sm btn-primary">
                        </div>
                    </div>
                </form>
                    {!! $MyAccount_validator->render() !!}
               @endif
            </div>
            <br>
        </div>
   </div>
   <script>
         function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   $("#inputgambar").change(function () {
        var val = $(this).val();
        readURL(this);
   });

    function redImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showBanner').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   $("#inputBanner").change(function () {
        var val = $(this).val();
        redImage(this);
   });
    </script>
@endsection
@endsection
@push('js')
<script>
	$(document).ready(function(){
		var screenHeight = $(document).height();
		var headerHeight = $('.header').height();
        var containerHeight = (screenHeight-headerHeight);
		$('.general').css('height',containerHeight+'px')
	})
</script>
@endpush