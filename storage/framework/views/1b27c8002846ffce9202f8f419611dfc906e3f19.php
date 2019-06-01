<?php $__env->startSection('title'); ?>
    Homeopathy - Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (\Illuminate\Support\Facades\Blade::check('doctor')): ?>
    <?php echo $__env->make('user.doctor.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('assistant')): ?>
    <?php echo $__env->make('user.assistant.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

      <?php if (\Illuminate\Support\Facades\Blade::check('doctorother')): ?>
    <?php echo $__env->make('user.doctorother.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('pharma')): ?>
    <?php echo $__env->make('user.pharma.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>