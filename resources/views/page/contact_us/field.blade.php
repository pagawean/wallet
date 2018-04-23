<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" readonly="" type="text" name="name" value="{{ @$data->name }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" readonly="" type="text" name="email" value="{{ @$data->email }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Email</label>
            <textarea class="form-control" readonly="">{{ @$data->massage }}</textarea>
        </div>
    </div>
</div>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

@section('js')

@endsection
