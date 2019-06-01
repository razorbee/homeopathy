<?php $__env->startSection('title'); ?>
    App Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <a href="<?php echo e(url('/config-cache')); ?>" class="btn btn-success pull-right">Clear Cache</a>
                <h4 class="card-title">App Setting</h4>
                <p>After save your app setting you need to clear the application cache. to make change the application behavior . <i>You might need to re login after config the cache</i> </p>

                <ul class="nav nav-tabs tabs">
                    <li class="tab">
                        <a href="ui-tabs.html#mail-setup" data-toggle="tab" aria-expanded="false">
                            Mail Setup
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#application-setup" data-toggle="tab" aria-expanded="false">
                            Application Setup
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <?php echo $__env->make('user.doctor.setting.app-setting.tab-body.mail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.app-setting.tab-body.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <?php if(session('cache-config')): ?>
        <script>
            $(document).ready(function () {
                console.log('ddd');
                $.Notification.notify('success','top right','Application configuration cache updated')
            });
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(function () {
            console.log('Ready');
            $('#mailSettingForm').on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $(this).speedPost('<?php echo e(url('/mail-setting')); ?>',data);
                console.log('Submit');
            });

            $("#appSetupForm").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                $(this).speedPost('<?php echo e(url('/app-setting')); ?>',data);
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>