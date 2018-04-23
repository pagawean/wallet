<div class="row">
    <div class="col-md-6 ">
        <div class="form-group">
            <label>Role</label>
            {!! Template::selectbox($listRole,@$data->role_id,'role_id',['class' => 'form-control']) !!}
            
        </div>
        <div class="form-group">
            <label>Menu</label>
            {!! Template::selectbox($listMenu,@$data->menu_id,'menu_id',['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}">Cencel</a>
