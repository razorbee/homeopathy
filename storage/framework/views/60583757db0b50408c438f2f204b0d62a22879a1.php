<div class="">
    <a href="<?php echo e(url('/edit-assistant/'.$id)); ?>" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp;</a>
	</div>
    
	<div class="" style="margin-top:10px;">
    <a href="javascript:void(0)" onclick="$(this).confirmDelete('<?php echo e(url('/delete-assistant/'.$id)); ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
</div>
