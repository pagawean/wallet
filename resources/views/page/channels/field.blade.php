<div class="row">
    <div class="col-md-6 ">
        
        <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" type="text" name="address" value="{{ @$data->address }}">
            
        </div>
        <div class="form-group">
            <label>No Telpon</label>
            <input class="form-control" type="text" name="phone_number" value="{{ @$data->phone_number }}">
            
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="radio" class="flat" name="gender"  value="Laki-Laki" 
                          {{ @$data->gender == 'Laki-Laki' ? 'checked' : '' }} > Laki-Laki
                          <input type="radio" class="flat" name="gender"  value="Perempuan" 
                          {{ @$data->gender == 'Perempuan' ? 'checked' : '' }} >Perempuan
            
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ @$data->email }}">
            
        </div>
        <div class="form-group">
            <label>Channel</label>
            <input class="form-control" type="text" name="channel" value="{{ @$data->channel }}">
            
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
