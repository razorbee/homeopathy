<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?> Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .text-center > h1,h2,h3,h4,p{
            color: #fff;
        }

    </style>
    <?php $doctor = \App\User::first(); ?>
    <div class="container fullpage">

        <div class="row">
         

            <div class="col-md-8 col-sm-4" style="padding-top: 50px;">
                <div class="_text-center home_desc">
                   <!-- <h1><?php echo e($doctor ? $doctor->name : "Demo"); ?></h1>-->
				   <h1>Sri Mahima Multispeciality Homeo Clinic</h1>
                    <p class="home_degree">
                        <!-- <?php echo nl2br(e($doctor ? $doctor->info : "Demo")); ?>-->
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-2">
                <div class="text-center">
                   <!-- <img  src="<?php echo e(\App\User::first() ? \App\User::first()->image : 'http://cdn.24.co.za/files/Cms/General/d/2809/34cbd0492a23476887812102f40f21d7.jpg'); ?>"  class="__img-fluid" alt="">-->
                </div>
            </div>
           <!--<div class="col-md-12" style="padding-top: 85px;">
               <div class="card-box">
                   <div class="panel-heading">
                       <h4 class="text-center"><strong>About Me</strong></h4>
                   </div>
                   <div class="card-content" style="padding-top: 25px;">
                       <center>
                           <?php echo nl2br(e(\App\Model\About::first() ? \App\Model\About::first()->about : "Demo About")); ?>

                       </center>
                   </div>

               </div>
           </div>!-->

</div>
        </div>


    <div class="container-fluid form-zoom-in-up">
      <div class="row">
        <div class="card-box" style="margin-left:10%;">
           <!-- <div class="panel-heading">
                <h4 class="text-center"><strong>Appointment Schedule</strong></h4>
            </div>!-->
            <div class="panel-body">
            <h4 class="text-center red"><strong>Appointment Schedule</strong></h4>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="color:#000;"><?php echo e($appointment->name); ?></h4>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#000;">Contact :</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="padding-left: 45px;">
                            <?php $__currentLoopData = $appointment->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p style="color:#000;"><b><u><?php echo e($date->days); ?></u></b> <br>
                                    Chamber Time : <b><?php echo e(\Carbon\Carbon::parse($date->start_time)->format('g:i a')); ?></b> to
                                   <b> <?php echo e(\Carbon\Carbon::parse($date->end_time)->format('g:i a')); ?></b></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-md-6" style="padding-left: 45px;">
                            <h4 style="font-size: 20px;color:#000;">
                                <?php echo e($appointment->contact_person_name); ?>

                            </h4>
                            <dl class="row">
                                <dt class="col-sm-1"><i class="fa fa-phone-square" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="tel:<?php echo e($appointment->phone); ?>"><?php echo e($appointment->phone); ?></a></dd>
                                <dt class="col-sm-1"><i class="fa fa-envelope" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="mailto:<?php echo e($appointment->email); ?>"><?php echo e($appointment->email); ?></a></dd>
                                <dt class="col-sm-1"><i class="fa fa-map-marker" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"> <?php echo nl2br(e($appointment->address)); ?></dd>
                            </dl>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

      </div>
       
    </div>
    <div class="container mt-3">
  
  <div class="d-flex justify-content-around bg-secondary mb-3" style="color:#fff;">
    <div class="p-2">&#x24B8; Reserved to razorbee <a href="http://www.razorbee.com">razorbee.com</a></div>
    
    <div class="p-2">For contact : support@razorbee.com </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>