<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
             <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
        <div class="form-group">
             <input type="file" name="image" class="form-control" id="inputgambar" value="{{ @$data->image }}">
        </div>
        
            
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{@$data->description}}</textarea>
            
        </div>
        <div class="form-group">
            <label>Url</label>
            <input class="form-control" type="text" name="url" value="{{ @$data->url }}">
            
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

@section('js')
<script type="text/javascript">

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
        readURL(this);
    });

</script>
@endsection
