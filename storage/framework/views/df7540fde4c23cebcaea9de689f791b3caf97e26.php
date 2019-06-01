<?php $__env->startSection('title'); ?>
    Title
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="float-left">
        <a href="<?php echo e(url('/')); ?>" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="<?php echo e(url('/new-drug')); ?>" class="">New Drug</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new drug</h4>
                <form action="#" method="post" id="newDrug">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <select name="generic_name" id="" required="required">
                            <option  value="Medicine">Medicine</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <input type="text" name="name" required="required" autofocus/>
                        <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Short Note</label><i class="bar"></i>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {
            var form = $("#newDrug");
            form.on('submit',function (e) {
                var formData = new FormData(this);
                e.preventDefault();
                $(this).speedPost('<?php echo e(url('/save-drug')); ?>',formData,form);
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>