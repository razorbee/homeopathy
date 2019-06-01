<?php $__env->startSection('title'); ?>
    Edit Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title"><?php echo e(auth()->user()->name); ?></h4>
                <form action="#" method="post" id="updateProfile" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <div class="row">
                        <div class="col-md-4" style="padding-left: 81px;">
                            <div id="image-preview" style="background-image: url('<?php echo e(url(auth()->user()->image ? auth()->user()->image : '/dashboard/images/image_placeholder.jpg')); ?>')">
                                <label for="image-upload" id="image-label">Profile Pic</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group-custom">
                                <input type="text" name="name" value="<?php echo e(auth()->user()->name); ?>" required="required" autofocus/>
                                <label class="control-label">Name &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="email" name="email" value="<?php echo e(auth()->user()->email); ?>" required="required"/>
                                <label class="control-label">Email &nbsp;*</label><i class="bar"></i>
                            </div>

                            <div class="form-group-custom">
                                <input type="text" value="<?php echo e(auth()->user()->phone); ?>" name="phone" required="required"/>
                                <label class="control-label">Phone &nbsp;*</label><i class="bar"></i>
                            </div>
                            <?php if(auth()->user()->role == 1): ?>
                                <div class="form-group-custom">
                                    <textarea name="info" required="required" rows="4"><?php echo e(auth()->user()->info); ?></textarea>
                                    <label class="control-label">Info</label><i class="bar"></i>
                                </div>
                            <?php endif; ?>

                            <div class="form-group-custom">
                                <textarea name="address" required="required"><?php echo e(auth()->user()->address); ?></textarea>
                                <label class="control-label">Address</label><i class="bar"></i>
                            </div>

                        </div>
                    </div>

                    <div style="padding-left: 35%;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {
            $("#updateProfile").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                console.log('submit');
                $(this).speedPost('<?php echo e(url('/update-profile')); ?>',data);
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>