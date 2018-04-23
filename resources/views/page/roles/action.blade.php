        <a href="{{ url('admin/'.$view.'/'.$data->id.'/access') }}" class="btn btn-circle btn-sm green"><i class="fa fa-key"></i> Access </a>
        <a href="{{ url('admin/'.$view.'/'.$data->id.'/edit') }}" class="btn btn-circle btn-sm green"><i class="fa fa-edit"></i> Edit </a>
        <button type="submit"  class="btn btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</button>
    </div>
    <div class="btn-group">
    {{ csrf_field() }}
    {{ method_field('DELETE')}}
</form>
<form method="POST" action="{{ url('admin/'.$view.'/'.$data->id) }}" accept-charset="UTF-8">