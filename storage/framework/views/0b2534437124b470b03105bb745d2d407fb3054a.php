<?php $__env->startSection('title'); ?>
    Medical History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Medical History of - <?php echo e($patient->name); ?></h4>

				
			 
			 <a href="<?php echo e(url('/edit-patient/'.$patient->id)); ?>" class="pull-right btn btn-success"><i class="ti-pencil-alt"></i>Edit</a>
                <div class="row">
                    <div class="col-md-4">
                        <img width="90px" src="<?php echo e(url($patient->image != null ? $patient->image : "/dashboard/images/patient.png")); ?>" alt="">

                    </div>
                    <div class="col-md-8">
					<div class="row">
                        <div class="col-sm-4"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Name : </b></span><?php echo e($patient->name); ?></div>
                           
                            <div class="col-sm-4"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Gender :</b></span>
							<?php echo e($patient->gender ==1 ? "Male" : $patient->gender ==2 ? "Female" : "Other"); ?></div>
							 
							<div class="col-sm-4"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Age : </b></span>
							<?php echo e($patient->age()); ?></div>
                          
			   
                   <div class="col-md-12" style="margin-top:20px;">
                   <dl class="dl-horizontal">
                   <?php $__currentLoopData = $patient->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescribes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            Disease::<?php echo e($prescribes->disease); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </dl>
                       
                   </div>
                </div>
				</div>
                </div>
                <hr>

                <dl class="dl-horizontal">
                            <dt>Patient History</dt>
							<input type='hidden' id = "_details" value="<?php echo e($patient->patientdetails); ?>"/>
														<div id = "details"></div>

                            <dd></dd>
                            
                        </dl>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Medical document (Image) <a style="font-size: 15px;"
                                                        href="<?php echo e(url('/patient-medical-file/'.$patient->id)); ?>"
                                                        class="pull-right"> <i class="fa fa-plus"></i> Add Medical file</a>
                        </h4>
                        <?php $__currentLoopData = $patient->medicalFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(url($file->path)); ?>" target="_blank" class="swipebox" title="My Caption">
                                <img src="<?php echo e(url($file->path)); ?>" class="img-thumbnail" width="220px" alt="image">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Prescription Info <a style="font-size: 15px;" href="<?php echo e(url('take-patient-to-prescription-page/'.$patient->id)); ?>" class="pull-right btn btn-success"> <i class="ti ti-ink-pen"></i> Write new prescription</a></h4>
                        <ul class="list-group">
                            <?php $__currentLoopData = $patient->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item" style="margin-top:20px;"> <a href="<?php echo e(url('/print-prescription/'.$pres->id)); ?>" class="btn btn-default pull-right"><i class="fa fa-eye"></i> View</a> <?php echo e($pres->created_at->format('d-M-Y')); ?> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Appointment Info <a style="font-size: 15px;margin-bottom:20px;" href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('take-patient-to-appointment/'.$patient->id)); ?>')" class="pull-right btn btn-success"> <i class="ti ti-calendar"></i> Make an appointment</a> </h4>
                        <!-- <ul class="list-group">
                            <?php $__currentLoopData = $patient->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($payment->payment); ?> <span class="pull-right"><?php echo e($payment->created_at->format('d-M-Y')); ?></span> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul> -->
                        <ul class="list-group">
  <?php $__currentLoopData = $patient->appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item" style="margin-top:20px;"> 
								<table>
								<tr>
								<td style="padding-right:40px;"> <?php echo e($patient->name); ?></td> 
                              <td  style="padding-right:40px;"> <?php echo e($appoint->date->format('d-M-Y')); ?></td>
                             <td  style="padding-right:40px;"> <?php echo e($appoint->time); ?></td>
                           <td  style="padding-right:40px;"> <?php echo e($appoint->note); ?></td>
						   </tr>
						   </table>
                         </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('extra-js'); ?>

    <script>
        $(document).ready(function () {


	  var details = $('<textarea />').html($("#_details").val()).text();
	  $("#details").html(details)
	
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>