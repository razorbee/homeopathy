<?php $__env->startSection('title'); ?>
    Appointment Today
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar-check-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Today's Appointment</h4>
            </div>
            <table class="table table-striped" id="datatable">
                <thead>
                <tr>
                    <th width="5px">#</th>
                    <th>Patient Name</th>
                    <th>Appointment</th>
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
                "ajax": "<?php echo e(url('/api/data-table/appointment-today')); ?>",
                "columns": [
                    { "data" : "#"},
                    { "data": "patient" },
                    { "data": "appointment" },
                    { "data" : "status"},
                    { "data" : "actions"}
                ],
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    },
                    sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }
            });
            <?php if(\Illuminate\Support\Facades\Session::has('delete_appointment')): ?>
                $.Notification.notify('success','top right','Appointment Deleted','Appointment has been deleted');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>