<?php $__env->startSection('title'); ?>
    Profile Setting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.doctor.setting.profile.change-password', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.profile.about-me', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title"><?php echo e(auth()->user()->name); ?></h4>
                <center>
                    <img class="img-rounded" width="220px" src="<?php echo e(url(auth()->user()->image ? auth()->user()->image : '/dashboard/images/image_placeholder.jpg')); ?>" alt="">
                    <h4><?php echo e(auth()->user()->name); ?></h4>
                    <p>
                        <?php echo e(auth()->user()->email); ?> <br>
                        <?php echo e(auth()->user()->phone); ?> <br>
                        <?php if(auth()->user()->role == 1): ?>
                            <?php echo nl2br(e(auth()->user()->info)); ?>

                        <?php endif; ?>
                    </p>
                    <a href="<?php echo e(url('/edit-profile')); ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
                    <button class="btn btn-success" data-toggle="modal" data-target="#change-password"><i class="fa fa-key"></i> Change Password</button>
                    <?php if(auth()->user()->role == 1): ?>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#about-me"> About Me</button>
                    <?php endif; ?>
                </center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {
            $('#passwordChangeForm').on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    url: '<?php echo e(url('/change-password')); ?>',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $.Notification.notify('success', 'top right', 'Password has been changed successfully');
                        $("#change-password").modal('hide');
                    }, error: function (data) {
                        if(data.status == 422 ){
                            $(this).showValidationError(data);
                        }else if(data.status == 500){
                            $.Notification.notify('error', 'top right', 'Current password not match','Current password not match');
                        }else{
                         $.Notification.notify('error','top right','Internal server error');
                        }
                    }
                });
            });

            $("#saveAboutMe").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    url: '<?php echo e(url('/save-about')); ?>',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $.Notification.notify('success', 'top right', 'About me saved successfully');
                        $("#about-me").modal('hide');
                    }, error: function (data) {
                        if(data.status == 422 ){
                            $(this).showValidationError(data);
                        }else if(data.status == 500){
                            $.Notification.notify('error', 'top right', 'Current password not match','Current password not match');
                        }else{
                            $.Notification.notify('error','top right','Internal server error');
                        }
                    }
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>