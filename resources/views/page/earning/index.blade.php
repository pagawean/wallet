
@extends('layouts.default')
@section('content')
<div class="container mt20">
<h4 class="latest-text w3_latest_text ml0">Earning <span class="pull-right">Saldo Rp {{number_format($income,0,',','.')}}</span></h4>

    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-info" href="{{ route($view.'.create') }}">
                <i class="fa fa-money"></i>
                <span class="hidden-xs"> New Earning Issue </span>
            </a>
        </div>
    </div>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="portlet green-sharp box">
                <div class="portlet-body">
                    <table id="datatable" class="table table-striped table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Issued at</th>
                            <th>Total Earning</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
