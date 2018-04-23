<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" value="{{ @$data->slug }}">
            
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}">Cencel</a>