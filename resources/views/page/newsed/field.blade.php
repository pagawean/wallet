<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="form_control_1">konten Kategori</label><br/>
            {!! Template::selectbox(['' => ' - Pilih Konten Kategori - '] + $listContentCategories->toArray(), @$data->content_category_id, "content_category_id", ["class" => "form-control"]) !!}

        </div>
        <div class="form-group">
            <label for="form_control_1">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ @$data->title }}">

        </div>
        <div class="form-group">
            <label for="form_control_1">Judul Tambahan</label>
            <textarea name="subtitle" class="form-control" rows="3">{{ @$data->subtitle }}</textarea>
            
        </div>
        <div class="form-group">
            <label for="form_control_1">Pratinjau Konten</label>
            <textarea name="content_preview"  class="form-control" rows="3">{{ @$data->content_preview }}</textarea>
        </div>
        <div class="form-group">
            <label for="form_control_1">Konten</label>
            <textarea name="content" class="form-control content" id="content">{{ @$data->content }}</textarea>
        </div>
        <div class="form-group"><br/>
            <label class='text-left'>Tag</label><br/>
                 {!! Template::selectbox($listTags->toArray(), @$data->tag_id, "tag_id[]", [ "class"=>"form-control", "multiple"=>"multiple", "id"=>"tag"]) !!}


        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Upload Media</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" id="add_row"><i class="fa fa-plus"></i> Add</a><br><br>
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="detail">
                            @if(!empty($data->content_media))
                                @foreach($data->content_media as $detail)
                                <tr>
                                    <td style="width: 50%">
                                        <img src="{{url('images/'.$detail->name)}}" class="img-responsive"/>
                                    </td>
                                    <td>
                                        <a class="hapus btn btn-outline btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

@section('js')
<script>
    $(document).ready(function() {
        $("body").on('click','.hapus', function(){
            $('.hapus').eq($('.hapus').index(this)).parent().parent().remove();
        });


        $("#add_row").click(function(){
            var url = "{{ url('admin/content_blogs/detail') }}";
            $.get( url, function( data ) {
                $("#detail").append( data );
            });
        })

        $("#tag").select2({
            tags: true,
            multiple: true,
            tokenSeparators: [',']
        }).val([@if(!empty($data->content_tag))@foreach($data->content_tag as $tag)'{{ $tag->tag_id }}',@endforeach @endif]).trigger("change");
    });
</script>
@endsection
