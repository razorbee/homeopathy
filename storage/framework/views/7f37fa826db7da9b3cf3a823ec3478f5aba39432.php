<?php $__env->startSection('title'); ?>
    Medical Files
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="icon icon-pill"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Add New File of - <?php echo e($patient->name); ?></h4>
            <div style="padding-left: 30%;">
                <form id="savemedicalfile" action="<?php echo e(url('/save-medical-file/'.$patient->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div id="image-preview">
                        <label for="image-upload" id="image-label">Medical File</label>
                        <input required type="file" name="image" id="image-upload"/>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading"
                                                                                                            class="fa fa-refresh fa-spin"></i>
                    </button>
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                    <button type="reset" class="btn btn-danger waves-effect waves-light" onclick=" window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <?php $__currentLoopData = $patient->medicalFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a href="<?php echo e(url($image->path)); ?>" target="_blank">
                        <img src="<?php echo e(url($image->path)); ?>" class="img-fluid" alt="">
                    </a>
                    <p><?php echo e($image->created_at->format('d-M-Y')); ?>

                        <button onclick="$(this).confirmDelete('<?php echo e(url('/delete-medical-file/'.$image->id)); ?>')" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Delete</button>
                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {
           <?php if(session('medical_file_delete')): ?>
            $.Notification.notify('success','top right','Medical file delete','Patient medical file has been deleted successfully');
           <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>