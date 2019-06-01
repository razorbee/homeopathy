<?php $__env->startSection('title'); ?>
    Schedule Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Schedule Report</h4>
                <form action="javascript:void(0)" method="post" id="scheduleReportForm">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom ">
                                <select class="form-control select2" name="drug_id" id="" >
                                    <option value="0" <?php echo e($schedule_id == 0 ? 'selected' : ''); ?>>All Place</option>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($schedule->id); ?>" <?php echo e($schedule_id == $schedule->id ? 'selected' : ''); ?>><?php echo e($schedule->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="date" id="start" value="<?php echo e($start); ?>" name="date"/>
                                <label class="control-label">Start Date &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="date" id="end" value="<?php echo e($end); ?>"  name="time"/>
                                <label class="control-label">End Date</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                </form>
                <br>



                <?php if($schedule_id == 0): ?>
                    <h4 class="m-t-0 header-title"><b>Schedule Chart by appointment</b></h4>

                    <canvas id="bar" height="100"></canvas>
                <?php else: ?>
                    <h4 class="m-t-0 header-title"><b>Schedule by Month</b></h4>

                    <canvas id="patientAppointment" height="100"></canvas>
                    <br>
                    <?php $i =0; ?>
                    <?php $__currentLoopData = $patient_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <h3 class=""><?php echo e($appointment[0]->date->format('M-Y')); ?></h3>
                        <table  class="table table-bordered datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient</th>
                                <th>Appointment</th>
                                <th>Appointed by</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                   <td><?php echo e($i++); ?></td>
                                   <td><?php echo e($a->patient->name); ?></td>
                                   <td><?php echo e($a->date->format('d-M-Y')); ?> | <?php echo e(\Carbon\Carbon::parse($a->time)->format('h:g a')); ?></td>
                                   <td><?php echo e($a->user->name); ?></td>
                                   <td><?php echo e($a->status == 1 ? "Appointed " : 'Pending'); ?></td>
                                   <td>
                                       <?php if($a->status ==0): ?>
                                           <div class=" ">
                                               <a href="<?php echo e(url('/edit-appointment/'.$a->id)); ?>" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp; </a></div>
											    <div class=" " style="margin-top:10px;">
                                               <a href="javascript:void(0)" onclick="$(this).confirmDelete('<?php echo e(url('/delete-appointment/'.$a->id)); ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</a>
                                           </div>
                                       <?php endif; ?>
                                   </td>
                               </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                            </tbody>
                        </table>
                        <hr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/dashboard/plugins/chartjs/chart.bundle.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: "Select a schedule",
                width: '100%'
            });

            $("#scheduleReportForm").on('submit',function (e) {
               e.preventDefault();
               var scheduleId = $('.select2').val() != '' ? $('.select2').val() : 0;
               var start = $('#start').val() != '' ?  $('#start').val() : '2017-06-05';
               var end = $('#end').val() != '' ? $('#end').val() : '<?php echo e(\Carbon\Carbon::today()->addDay(1)->toDateString()); ?>';
               window.location.replace('<?php echo e(url('/schedule-report')); ?>/schedule='+scheduleId+'/start='+start+'/end='+end);

            });
           <?php if($schedule_id == 0): ?>
            var barChart = $("#bar");
            var myChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: [
                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            '<?php echo e($schedule->name); ?>',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    datasets: [{
                        label: "Total Appointment",
                        data: [
                            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e(count(\App\Model\PatientAppointment::where('appointment_id',$schedule->id)->whereBetween('date',[$start,$end])->get())); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        backgroundColor: [
                            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(200,300).','.rand(1,300).','.rand(700,900).', 1)'); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            <?php else: ?>
            var patientAppointment = $("#patientAppointment");
            var myChart = new Chart(patientAppointment, {
                type: 'bar',
                data: {
                    labels: [
                        <?php $__currentLoopData = $patient_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            '<?php echo e($appointment[0]->date->format('M-Y')); ?>',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    datasets: [{
                        label: "Total  ",
                        data: [
                            <?php $__currentLoopData = $patient_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e(count($appointment)); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        backgroundColor: [
                            <?php $__currentLoopData = $patient_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(40,120).','.rand(20,70).','.rand(10,200).', 0.6)'); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        borderColor: [
                            <?php $__currentLoopData = $patient_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(301,400).','.rand(300,700).','.rand(1,50).', 1)'); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            <?php endif; ?>
        })
    </script>
    <?php if($schedule_id != 0): ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">
    <script src="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable();
        })
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>