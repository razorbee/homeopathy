<?php $__env->startSection('title'); ?>
    Drug Report
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
                <h4 class="card-title">Drug Report </h4>
                <form action="javascript:void(0)" method="post" id="drugReport">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom ">
                                <select class="form-control select2" name="drug_id" id="" required="required">
                                    <option value="0" <?php echo e($drug_id ==0 ? 'selected' : ''); ?>>All Drug</option>
                                    <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($drug->id); ?>" <?php echo e($drug_id ==$drug->id ? 'selected' : ''); ?>><?php echo e($drug->generic_name); ?>: <?php echo e($drug->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="date"  value="<?php echo e($start); ?>" id="start" required="required"/>
                                <label class="control-label">Start Date &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="date" required="required" id="end" value="<?php echo e($end); ?>" />
                                <label class="control-label">End Date</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                </form>
                <br>
                <?php if($drug_id == 0): ?>
                    <h4 class="m-t-0 header-title"><b>All Drug Chart</b></h4>

                    <canvas id="allDrug" height="70vh" width="100%"></canvas>
                <?php else: ?>
                    Selected drug chart
                    <canvas id="selectedDrug" height="50vh" width="100%"></canvas>
                    <?php $__currentLoopData = $drug_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1>Date - <?php echo e($drug[0]->created_at->format('M-Y')); ?> </h1>

                            <table class="table table-bordered datatable" >
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $drug; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($d->created_at->format('d-M-Y')); ?></td>
                                        <td><a href="<?php echo e(url('/print-prescription/'.$d->prescription_id)); ?>" target="_blank">View on prescription <i class="fa fa-external-link"></i> </a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

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
            $('#drugReport').on('submit',function (e) {
                e.preventDefault();
                var drugId = $(".select2").val();
                var start = $('#start').val() != '' ?  $('#start').val() : '2017-06-05';
                var end = $('#end').val() != '' ? $('#end').val() : '<?php echo e(\Carbon\Carbon::today()->addDay(1)->toDateString()); ?>';
                window.location.replace('<?php echo e(url('/drug-report')); ?>/drug='+drugId+'/start='+start+'/end='+end);
            });
            $(".select2").select2({
                placeholder: "Please select a drug *",
                width: '100%'
            });
            <?php if($drug_id == 0): ?>
            var barChart = $("#allDrug");
            var myChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: [
                        <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            '<?php echo e($drug->name); ?>',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    datasets: [{
                        label: "Total Use",
                        data: [
                            <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e(count($drug->prescriptions)); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        backgroundColor: [
                            <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(200,300).','.rand(1,300).','.rand(700,900).', 1)'); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        borderColor: [
                            <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(200,300).','.rand(1,300).','.rand(700,900).', 1)'); ?>',
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
            <?php else: ?>
                var selectedDrugChart = $("#selectedDrug");
            var myChart = new Chart(selectedDrugChart, {
                type: 'bar',
                data: {
                    labels: [
                        <?php $__currentLoopData = $drug_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            '<?php echo e($drug[0]->created_at->format('M-Y')); ?>',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    datasets: [{
                        label: "Total Use",
                        data: [
                            <?php $__currentLoopData = $drug_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e(count($drug)); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        backgroundColor: [
                            <?php $__currentLoopData = $drug_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(200,300).','.rand(1,300).','.rand(700,900).', 1)'); ?>',
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        borderColor: [
                            <?php $__currentLoopData = $drug_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                '<?php echo e('rgba('.rand(200,300).','.rand(1,300).','.rand(700,900).', 1)'); ?>',
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

    <?php if($drug_id != 0): ?>
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