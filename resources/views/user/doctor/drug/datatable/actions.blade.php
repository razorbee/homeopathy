<div class="">
    <a href="{{url('/edit-drug/'.$id)}}" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp; </a>
	</div>
	<div class="" style="margin-top:10px;">
    <a href="javascript:void(0)" onclick="$(this).confirmDelete('{{url('/delete-drug/'.$id)}}')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
</div>
