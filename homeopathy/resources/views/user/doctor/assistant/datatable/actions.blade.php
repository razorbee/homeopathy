<div class="">
    <a href="{{url('/edit-assistant/'.$id)}}" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp;</a>
	</div>
    {{--<a href="#" class="btn btn-success"><i class="fa fa-info"></i></a>--}}
	<div class="" style="margin-top:10px;">
    <a href="javascript:void(0)" onclick="$(this).confirmDelete('{{url('/delete-assistant/'.$id)}}')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
</div>
