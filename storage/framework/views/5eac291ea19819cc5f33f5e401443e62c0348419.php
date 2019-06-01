<?php $__env->startSection('title'); ?>
    All Patient
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="fa fa-users fa-2x"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">All Patient</h4>
        </div>
          <div class="row" style="margin-left:50px;">

            <!-- <input type="text" name="generic_name" required="required"/> -->

              <div class="col-1">
                  <label class="control-label">Age &nbsp;*</label><i class="bar"></i>
                </div>
                  <div class="col-3">
            <select name="age" id="" required="required">
                <option  value="0-10">0-10</option>
                <option  value="11-20">11-20</option>
                <option  value="21-30">21-30</option>
                <option  value="31-40">31-40</option>
                <option  value="41-50">41-50</option>
                <option  value="51-60">51-60</option>
                <option  value="60+">60+</option>
            </select>


          </div>


            <!-- <input type="text" name="generic_name" required="required"/> -->
            <div class="col-1">
                <label class="control-label">Gender&nbsp;*</label><i class="bar"></i>
              </div>
                <div class="col-3">
            <select name="gender" id="" required="required">
                <option  value="male">Male</option>
                <option  value="female">Female</option>
                <option  value="Other">Other</option>

            </select>

        </div>


            <!-- <input type="text" name="generic_name" required="required"/> -->
            <div class="col-1">
                <label class="control-label">Disease&nbsp;*</label><i class="bar"></i>
              </div>
                <div class="col-3">
            <select name="disease" id="" required="required">
                <option  value="Autoimmune Diseases">Autoimmune Diseases</option>
<option  value="Allergies & Asthma">Allergies & Asthma</option>
<option  value="Cancer">Cancer</option>
<option  value="Celiac Disease">Celiac Disease</option>
<option  value="Crohn's & Colitis">Crohn's & Colitis</option>
<option  value="Heart Disease">Heart Disease</option>
<option  value="Infectious Disease">Infectious Disease</option>
<option  value="Liver Disease">Liver Disease</option>
<option  value="Lupus">Lupus</option>
<option  value="Relapsing Polychondritis">Relapsing Polychondritis</option>
<option  value="Rheumatoid Arthritis">Rheumatoid Arthritis</option>
<option  value="Scleroderma">Scleroderma</option>
<option  value="Type 1 Diabetes">Type 1 Diabetes</option>
<option  value="Other">Other</option>
            </select>

        </div>

    </div>
        <table class="table table-striped" id="datatable">
            <thead>
            <tr>
                <th width="5px">#</th>
                <th>Patient Pic</th>
                <th>Patient Info</th>
                <th>Contact Info</th>
                <th>Medical Info</th>
                
                <th width="25px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.js')); ?>"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo e(url('/api/data-table/all-patient')); ?>",
                "columns": [
                    { "data" : "#"},
                    { "data": "image" },
                    { "data": "patient_info" },
                    { "data": "contact_info" },
                    { "data": "medical_info" },
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

            <?php if(session('delete_patient')): ?>
                $.Notification.notify('success','top right',"Patient deleted",'Patient has been deleted successfully');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>