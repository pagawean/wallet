<div class="row">
    <div class="col-md-6 ">
        @foreach($datas as $data)
            <div class="form-group">
                <label>{{  ucwords($data->key) }}</label>
                <input class="form-control" type="{{ $data->type }}" name="{{  $data->key }}" value="{{ @$data->value }}">
            </div>
        @endforeach
    </div>
</div>
<button class="btn green" type="submit">Save</button>

@section('js')
<script>
$("#icon").keyup(function(){
    $("#show_icon").attr("class", $(this).val());
});
$("#icon").keyup();
</script>
@endsection
