<p>
    Patient Science : <?php echo e($patient->created_at->format('d-M-Y')); ?> <br>
    Total Prescription : <?php echo e(count($patient->prescriptions)); ?> <br>
    <!-- <?php $__currentLoopData = $patient->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescribes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            Disease::<?php echo e($prescribes->disease); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
    
</p>

<a href="<?php echo e(url('/patient-history/'.$patient->id)); ?>"><i class="fa fa-eye"></i> &nbsp; View Medical History</a> <br>
<a href="<?php echo e(url('/patient-medical-file/'.$patient->id)); ?>"><i class="fa fa-plus"></i> &nbsp; Add Medical File </a>