<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Parent</label><br/>
            {!! Template::selectbox([''=>' - Pilih Menu - '] + $listMenus->toArray(),@$data->parent_id,"parent_id",["class" => "form-control"]) !!}
            
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
        <div class="form-group">
            <label>URL</label>
            <input class="form-control" type="text" name="url" value="{{ @$data->url }}">
            
        </div>
        <div class="form-group">
            <label>Icon</label>
            <input class="form-control" type="text" name="icon" id="icon" value="{{ @$data->icon }}">
            
            <div class="input-icon right">
                <i id="show_icon" class=""></i>
            </div>
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

@section('js')
<script>
$("#icon").keyup(function(){
    $("#show_icon").attr("class", $(this).val());
});
$("#icon").keyup();
</script>
@endsection
