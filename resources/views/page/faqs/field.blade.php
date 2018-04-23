<div class="row">
    <div class="col-md-7 ">
     
        <div class="form-group">
            <label>Question</label>
            <input class="form-control" type="text" name="question" value="{{ @$data->question }}">
            
        </div> 
        <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" class="form-control content" rows="5">{{@$data->answer}}</textarea>
            
        </div>
        
    </div>
</div>
<button class="btn green" type="submit">Save</button>
<a class="btn red" href="{{ route($view.'.index') }}"><span class="hidden-xs"> Cancel </span></a>

@section('js')

@endsection
