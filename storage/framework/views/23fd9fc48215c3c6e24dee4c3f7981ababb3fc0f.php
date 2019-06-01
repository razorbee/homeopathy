<?php $__env->startSection('title'); ?>
    Prescription Setting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Prescription Setting</h4>
                <ul class="nav nav-tabs tabs">
                    <li class="tab">
                        <a href="ui-tabs.html#drug-type" data-toggle="tab" aria-expanded="false">
                            Drug Types
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#drug-strength" data-toggle="tab" aria-expanded="false">
                            Drug Strength
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#drug-dose" data-toggle="tab" aria-expanded="true">
                            Dose
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#duration" data-toggle="tab" aria-expanded="false">
                            Duration
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#drug-advice" data-toggle="tab" aria-expanded="false">
                            Drug Advice
                        </a>
                    </li>
                    <li class="tab">
                        <a href="ui-tabs.html#advice" data-toggle="tab" aria-expanded="false">
                            Advice
                        </a>
                    </li>
                    <!--<li class="tab">
                        <a href="ui-tabs.html#print-setup" data-toggle="tab" aria-expanded="false">
                            Print Setup
                        </a>
                    </li>-->
                </ul>
                <div class="tab-content">
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-types.drug-types', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-strength.drug-strength', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-dose.drug-dose', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-duration.drug-duration', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-advice.drug-advice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.advice.advice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.print-setup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.js')); ?>"></script>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-types.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-strength.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-dose.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-duration.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.drug-advice.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.advice.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
        $(document).ready(function () {
            $("#prescriptionPrintSetup").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                console.log('prescription print setup submit');
                $(this).speedPost('<?php echo e(url('/prescription-print-setting')); ?>',data);
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>