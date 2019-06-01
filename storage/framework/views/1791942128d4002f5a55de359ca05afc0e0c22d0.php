<!-- <p><?php echo e($appointment->schedule->name); ?></p> -->
<p>
    At : <b><?php echo e(\Carbon\Carbon::parse($appointment->date)->format('d-M-Y')); ?></b> -
    <b><?php echo e(\Carbon\Carbon::parse($appointment->time)->format('h:i A')); ?></b>
</p>
<p>
    Arranged By : <b><?php echo e($appointment->user->name); ?></b>
</p>
<p>
    <!-- Payment : <b><?php echo e($appointment->payment ? $appointment->payment->payment : '0'); ?></b> -->
</p>
