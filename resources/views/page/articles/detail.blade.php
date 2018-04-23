<tr>
	<td style="width: 50%">
	    <div class="form-group form-md-line-input has-success">
	        <input type="file" name="name[]" class="form-control" value="{{ @$detail->name }}">
			<input type="hidden" name="type_media" value="blog">

	    </div>
	</td>
	<button type="submit"  class="btn btn-outline btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</button>
	<td>
		<a class="hapus btn btn-outline btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</a>
	</td>
</tr>