@extends('layouts.default')

@section('title','Video')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <video style="width:100%; height:450px;" id="myvideo" class="video-js vjs-big-play-centered" controls preload="none" data-id="{{ $data->id }}" poster="{{url('uploads/'.$data->image)}}" data-setup='{"fluid": false}'>
            <source src="{{url($data->path)}}" type="video/mp4">
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
    </div>
    <div class="col-md-12">
        <form action="{{url('user_pages/update', $data->id)}}" id="editVideo" method="post" enctype="multipart/form-data"  style="padding:10px;">
            {{csrf_field()}}
            <input type="hidden" value="{{$data->id}}">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required="" value="{{ @$data->title }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Category</label>
                    {!! Template::selectbox(['' => ' - Pilih Kategori Video - '] + $listVideoCategory->toArray(), @$data->video_category_id, "video_category_id", ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="https://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="image" required=""> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">            
                <div class="form-group col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" rows="4" class="form-control" required> {{ @$data->description }} </textarea>
                </div>
            </div>
            <div class="row">            
                <div class="form-group col-md-12">
                    <button class="btn btn-primary pull-right" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
{!! $validator_edit_video->render() !!}
@endsection

@push('css_plugin')
<link href="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endpush

@push('js_plugin')
<script src="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@section('js')

<script>
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
</script>
@endsection

