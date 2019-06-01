<div class="">
    <a href="javascript:void(0)" onclick="$(this).getDrugDoseDetails('<?php echo e($id); ?>')" data-toggle="modal" data-target="#edit-drug-dose" class="btn btn-primary"><i class="ti-pencil-alt"></i>Edit &nbsp;&nbsp;</a>
	</div>
	<div class="" style="margin-top:10px;">
    <a href="javascript:void(0)" onclick="$(this).confirmDelete('<?php echo e(url('/delete-drug-dose/'.$id)); ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
</div>