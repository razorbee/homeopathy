<p>
    <img width="200px" height="200px" class="img-fluid"
         src="<?php echo e(url($appointment->patient->image != null ? $appointment->patient->image : "dashboard/images/image_placeholder.jpg")); ?>"
         alt=""
         align="right"
    >
<div>
    <span>
    <?php echo e($appointment->patient->name); ?> <br>
    </span>
    <span>
    Phone : <b><?php echo e($appointment->patient->phone); ?></b> <br>
    Email : <b><?php echo e($appointment->patient->email); ?></b>
   </span> <br>
    <a href="javascript:void(0);" onclick="window.location.replace('<?php echo e(url('/take-patient-to-prescription-page/'.$appointment->patient->id)); ?>')" class="btn btn-default"><i class="ti-pencil"></i> Write new prescription</a>

</div>

</p>

