
<div class="btn-group">
    <a href="{{ url('/admin/disbursements/set_status/1/'.$data->id) }}" class="btn btn-circle btn-sm green" data-toggle="modal"><i class="fa fa-check"></i> Approve </a>
    <a href="{{ url('/admin/disbursements/set_status/2/'.$data->id) }}" class="btn btn-circle btn-sm red" data-toggle="modal"><i class="fa fa-times"></i> Decline </a>
</div>