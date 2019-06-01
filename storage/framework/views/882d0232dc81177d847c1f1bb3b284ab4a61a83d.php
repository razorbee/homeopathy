<div class="">
    <a href="<?php echo e(url('/edit-appointment/'.$id)); ?>" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp; </a></div>
	<div class="">
    <a style="margin-top:10px;" href="javascript:void(0)" onclick="$(this).confirmDelete('<?php echo e(url('/delete-appointment/'.$id)); ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
</div>
