
@extends('layouts.default')
@section('content')
<div class="container mt20">
    <h4 class="latest-text w3_latest_text ml0">Earning <span class="pull-right">Saldo Rp {{number_format($income,0,',','.')}}</span></h4>
    <div class="row">
        <div class="col-md-12 ">
            <div class="portlet green-sharp box">
                <div class="portlet-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" role="form" class="form" action="{{route('earning.store')}}" method="POST">
                        <div class="row">
                        <div class="col-md-12">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="label-control col-md-4">Amount to issue</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="value" value=""/>
                                        <input class="form-control" type="hidden" name="income" value="{{$income}}"/>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12" style="padding:10px;">
                                <input type="submit" value="Send" class="pull-right btn btn-sm btn-primary">
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
@endsection
