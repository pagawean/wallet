@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet green-sharp box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings"></i>
                    <span class="caption-subject font-white sbold uppercase">{{ $view }}</span>
                    <small>managemen data {{ $view }}</small>
                </div>
                <div class="actions">

                </div>
            </div>

            <div class="portlet-body">
                <table id="datatable" class="table table-striped table-bordered table-hover table-checkable">
                <thead>
                    <tr>
                        <th>Channel</th>
                        <th>Pendapatan</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
