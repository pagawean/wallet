<form method="POST" action="{{ url('admin/'.$view.'/'.$data->id) }}" accept-charset="UTF-8">
    <!-- {{$data->id}} -->
    {{ method_field('DELETE')}}
    {{ csrf_field() }}
    <div class="btn-group">
        <a href="{{ url('admin/'.$view.'/'.$data->id.'/edit') }}" class="btn btn-outline btn-circle btn-sm green"><i class="fa fa-edit"></i> Edit </a>
        <button type="submit"  class="btn btn-outline btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</button>
    </div>
</form>
