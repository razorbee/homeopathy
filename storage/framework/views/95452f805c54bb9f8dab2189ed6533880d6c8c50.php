<?php $__env->startSection('title'); ?>
    All Drug
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="float-left">
        <a href="<?php echo e(url('/')); ?>" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="<?php echo e(url('/all-drug')); ?>" class="">All Drug</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">All Drug</h4>
            </div>

            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                <tr>
                    <th width="5px">#</th>
                    <th>Generic name</th>
                    <th>Drug name</th>
                    <th>Total Use</th>
                    <th>Status</th>
                    <th width="25px">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.js')); ?>"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo e(route('drug.datatable')); ?>",
                "columns": [
                    { "data" : "#"},
                    { "data": "generic_name" },
                    { "data": "name" },
                    { "data" : "total_use"},
                    { "data": "status" },
                    { "data" : "action"}
                ]
            });

            <?php if(session('delete_drug')): ?>
                $.Notification.notify('success','top right','Drug deleted','Drug has been deleted successfully');
            <?php endif; ?>
            <?php if(session('delete_fail')): ?>
                $.Notification.notify('error','top right','Delete Failed','We cannot delete the durg, coz it is used in temllate or prescription');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>