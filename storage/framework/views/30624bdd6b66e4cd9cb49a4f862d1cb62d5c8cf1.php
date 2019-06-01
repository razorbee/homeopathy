<?php $__env->startSection('title'); ?>
    New Appointment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('has_patient')): ?>
        <?php $patient = session('has_patient') ?>
        <input type="hidden" value="<?php echo e($patient->id); ?>" id="defaultPatient">
    <?php endif; ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">New Appointment</h4>
                <form action="#" method="post" id="newAppointment">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom ">
                                <select class="form-control select2" name="patient_id" id="" required="required">
                                    <option></option>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?> | <?php echo e($patient->phone); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <!-- <input type="date" name="date" id="date" required="required"/> -->
                                <input id="datepicker" name="date" onchange="checkDate()" required class="datepicker-input" type="date" data-date-format="yyyy-mm-dd" >
                                <label class="control-label">Date &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="time" required="required" name="time"/>
                                <label class="control-label">Time</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <select required="required" class="form-control select3" name="appointment_id" id="">
                                    <option value="">Select Place</option>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($schedule->id); ?>"><?php echo e($schedule->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group-custom">
                                <input type="text" name="payment"/>
                                <label class="control-label">Payment Amount &nbsp;</label><i class="bar"></i>
                            </div>
                        </div> -->

                        <div class="col-md-6">
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Note</label><i class="bar"></i>
                    </div>
                  </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: "Please select a patient *",
                width: '100%'
            });
            $(".select3").select2({
                placeholder: "Please select a schedule *",
                width: '100%'
            });

            var defaultPatient = $("#defaultPatient").val();
            if(defaultPatient != '' || defaultPatient != null){
                $(".select2").val(defaultPatient).change();
            }
            
                
            $("#newAppointment").on('submit',function (e) {
                e.preventDefault();
                var formId = $("#newAppointment");
                var data = new FormData(this);
                $.ajax({
                    url:'<?php echo e(url('/save-appointment')); ?>',
                    type:'POST',
                    data:data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function (data) {
                        $.Notification.notify('success','top right','Appointment make successfully');
                        formId.get(0).reset();
                        $('.select2').val('').change();
                        $('.select3').val('').change();
                    },error:function (data) {
                        $.Notification.notify('error','top right','Doctor will not available on that day in selected place')
                    }
                })
            });
        })
        function checkDate() {
   var selectedText = document.getElementById('datepicker').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
   }
 }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>