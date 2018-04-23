<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
        	<label>Nama</label>
            <input class="form-control" type="text" name="name" value="{{ @$data->name }}">
            
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a href="{!! route($view.'.index') !!}" class="btn red">Cancel</a>