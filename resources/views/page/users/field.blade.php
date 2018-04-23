<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Role</label><br/>
            {!! Template::selectbox([''=>' - Pilih Role - '] + $listRole->toArray(),@$data->role_id, "role_id",["class" => "form-control"]) !!}
            
        </div>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username" value="{{ @$data->username }}">
            
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="">
            
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

{{--@section('js')--}}
{{--<script>--}}
{{--$("#icon").keyup(function(){--}}
    {{--$("#show_icon").attr("class", $(this).val());--}}
{{--});--}}
{{--$("#icon").keyup();--}}
{{--</script>--}}
{{--@endsection--}}
