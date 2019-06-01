<?php $__env->startSection('title'); ?>
    Edit Patient
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
			
                <a href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('/take-patient-to-prescription-page/'.$patient->id)); ?>')" class="btn btn-success pull-right"><i class="ti ti-pencil-alt"></i> Prescribe</a>
                <span class="pull-right">&nbsp;|&nbsp;</span>
                <a href="<?php echo e(url('/patient-medical-file/'.$patient->id)); ?>" class="btn btn-success pull-right">
				<!-- <img src="<?php echo e(url('/')); ?>/dashboard/images/document.png">--><i class="ti ti-files"></i>
				Upload documents</a>
				<span class="pull-right">&nbsp;|&nbsp;</span>
                 <a class="btn btn-success pull-right" href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('/take-patient-to-appointment/'.$patient->id)); ?>')"><i class="ti ti-calendar"></i> New Appointment </a>
                 <span class="pull-right">&nbsp;|&nbsp;</span>       
                  <a href="<?php echo e(url('/view-patient/'.$patient->id)); ?>" class="btn btn-success pull-right"><i class="fa fa-info"></i> View</a>
                <h4 class="card-title">Edit patient - <?php echo e($patient->name); ?></h4>
                <form action="#" method="post" id="updatePatient" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-4">
                           <center>
                                <!-- <div id="image-preview" style="background-image: url(<?php echo e(url($patient->image != null ? $patient->image : "/dashboard/images/patient.png")); ?>)"> -->
								<div id="image-preview" ><img src="<?php echo e(url('/')); ?>/<?php echo e($patient->image); ?>" class="img-responsive" style="width:250px;height:250px;margin-bottom: -200px;" alt="">
                                    <label for="image-upload" id="image-label"><img src="<?php echo e(url('/')); ?>/dashboard/images/pencil.png" height="20"/></label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </center>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group-custom">
                                <input value="<?php echo e($patient->name); ?>" type="text" name="name" required="required" autofocus/>
                                <label class="control-label">Name &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <select name="gender" id="" required="required">
                                            <option <?php echo e($patient->gender ==1 ? 'selected' : ''); ?> value="1">Male</option>
                                            <option <?php echo e($patient->gender ==2 ? 'selected' : ''); ?> value="2">Female</option>
                                            <option <?php echo e($patient->gender ==3 ? 'selected' : ''); ?> value="3">Other</option>
                                        </select>
                                        <label class="control-label">Gender &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <input value="<?php echo e($patient->age()); ?>" type="text" name="date_of_birth" required="required" />
                                        <label class="control-label">Age &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-custom">
                                <input value="<?php echo e($patient->phone); ?>" type="text" name="phone"/>
                                <label class="control-label">Phone &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input value="<?php echo e($patient->email); ?>" type="text" name="email" />
                                <label class="control-label">Email</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <textarea name="address"><?php echo e($patient->address); ?></textarea>
                                <label class="control-label">Address &nbsp;</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                              <input type='hidden' id="patientdetails"  name='patientdetails' value=''/>
                                  <textarea name="ck_patientdetails"><?php echo e($patient->patientdetails); ?></textarea>
                                <label class="control-label"><p style="margin-bottom:40px;margin-top:-10px;">Patient History &nbsp;<br/></p></label><i class="bar"></i>
                            </div>
							
					</div>
					</div>
                    <div style="padding-left: 35%;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                        <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.doctor.patient.modal.success-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {

		
            var patientId = null;

            $.fn.newPatientSetPatientId = function (id) {
                patientId = id;
            };

            $("#modalBtnPrescribeNow").on('click',function () {
                console.log(patientId);
                window.location.replace('take-patient-to-prescription-page/'+patientId);
            });


            $("#updatePatient").on('submit',function (e) {
                e.preventDefault();
                var value = CKEDITOR.instances['ck_patientdetails'].getData();
              document.getElementById("patientdetails").value = value;
                var data = new FormData(this);

                // $(this).speedPost('update-patient/<?php echo e($patient->id); ?>',data);
                $(this).speedPost("<?php echo e(url('/')); ?>/update-patient/<?php echo e($patient->id); ?>",data);
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>