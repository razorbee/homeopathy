<?php $__env->startSection('title'); ?>
    Edit drug "<?php echo e($drug->name); ?>"
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
    <li class="float-left">
        <a href="<?php echo e(url('/')); ?>" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="<?php echo e(url('/edit-drug/'.$drug->id)); ?>" class="">Edit Drug</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit drug "<?php echo e($drug->name); ?>" </h4>
                <form action="#" method="post" id="editDrug">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <div class="row">
                        <div class="col-6">
                          <div class="form-group-custom">
                        <select name="generic_name" id="" required="required">
                            <option  <?php echo e($drug->generic_name =='Medicine' ? 'selected' : ''); ?> value="Medicine">Medicine</option>
                            <option  <?php echo e($drug->generic_name =='>Mother-Tinture' ? 'selected' : ''); ?> value="Mother-Tinture">Mother-Tinture</option>
                            <option  <?php echo e($drug->generic_name =='Ointments & Oils' ? 'selected' : ''); ?> value="Ointments & Oils">Ointments & Oils</option>
                            <option  <?php echo e($drug->generic_name =='Syrups' ? 'selected' : ''); ?> value="Syrups">Syrups</option>
                            <option  <?php echo e($drug->generic_name =='Dilutions' ? 'selected' : ''); ?> value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type  &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                      </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group-custom">
                        <input type="text" name="name" value="<?php echo e($drug->name); ?>" required="required" autofocus/>
                        <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                    </div>
                  </div>
                </div>
                    <div class="form-group-custom">
                        <textarea name="note" ><?php echo e($drug->note); ?></textarea>
                        <label class="control-label">Short Note</label><i class="bar"></i>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2" name="status" type="checkbox" <?php echo e($drug->status ==1 ? 'checked' : ''); ?>>
                        <label for="checkbox2">
                            Active
                        </label>
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
            var form = $("#editDrug");
            form.on('submit',function (e) {
                e.preventDefault();
                data = new FormData(this);
                // $(this).speedPost('update-drug/<?php echo e($drug->id); ?>',data);
                 $(this).speedPost("<?php echo e(url('/')); ?>/update-drug/<?php echo e($drug->id); ?>",data);
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>