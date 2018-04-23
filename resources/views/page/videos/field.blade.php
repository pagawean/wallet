<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Nama Channel</label>
            {!! Template::selectbox(['' => ' - Pilih Channel - '] + $listChannel->toArray(), @$data->channel_id, "channel_id", ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label>Kategori Video</label>
            {!! Template::selectbox(['' => ' - Pilih Kategori - '] + $listVideoCategory->toArray(), @$data->video_category_id, "video_category_id", ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" type="text" name="title" value="{{ @$data->title }}">
        </div>
        <div class="form-group">
            <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
        <div class="form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image" accept="image/*" id="inputgambar" value="{{ @$data->image }}">
        </div>

        <div class="form-group">
            <label>Video</label>
            <input class="form-control" id="inputvideo" accept="video/*" type="file" name="path" value="{{ @$data->path }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{@$data->description}}</textarea>
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
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png':
            alert("an image");
            break;
            default:
                $(this).val('');
                // error message here
                alert("not an image");
                break;
        }
    });

    $("#inputvideo").change(function () {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'mp4':
            alert("File an video");
            break;
            default:
                $(this).val('');
                // error message here
                alert("File not an Video");
                break;
        }
    });

</script>
@endsection
