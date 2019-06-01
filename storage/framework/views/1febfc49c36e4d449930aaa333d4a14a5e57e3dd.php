<?php $__env->startSection('title'); ?>
    Print
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <style>
        <?php if(config('app.fancy_font') == 1): ?>
        p > b {
            font-family: 'Lobster', cursive;
        }

        .prescription-p-title{
            font-family: 'Lobster', cursive;
            font-weight: 100;
            font-size: 16px;
        }
        <?php endif; ?>
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-print fa-2x"></i>
            </div>
            <div class="card-content">
                <div id="printPage">
                    <div class="text-right">
                        <h3><?php echo e($prescription->user->name); ?></h3>
                        <p><?php echo nl2br(e($prescription->user->info)); ?></p>
                    </div>

                    <div id="print_prescription">

                        <style>
                            @media  print {
                                <?php if(config('app.fancy_font') == 1): ?>
                                p > b {
                                    font-family: 'Lobster', cursive;
                                }
                                .prescription-p-title{
                                    font-family: 'Lobster', cursive;
                                    font-weight: 100;
                                    font-size: 16px;
                                }
                                <?php endif; ?>
                                .col-md-4 {
                                    width: 40%;
                                }

                                .col-md-8 {
                                    width: 60%;
                                }
                            }
                        </style>


                        <table width="100%" style="margin-bottom: 10px;">
                            <thead>
                            <tr>
                                <th> <span class="prescription-p-title">Name</span> : <?php echo e($prescription->patient->name); ?>

								</th>
                                <th> <span class="prescription-p-title">Age</span>
                                    : <?php echo e($prescription->patient->date_of_birth->diff($prescription->created_at)->format('%y years,%m month,%d days')); ?></th>
                                <th><span class="prescription-p-title">Gender</span>
                                    : <?php if($prescription->patient->gender ==1): ?>
                                        Male
                                    <?php elseif($prescription->patient->gender ==2): ?>
                                        Female
                                    <?php else: ?>
                                        Other
                                    <?php endif; ?>
                                </th>
                                <th>
                                    <span class="prescription-p-title">Date :</span>
                                    <?php echo e($prescription->prescription_date->format('d-M-Y')); ?>

                                </th>
                            </tr>
                            </thead>
                        </table>
                        <div class="row">
                        <div class="col-md-2"></div>
                              
                            <div class="col-md-6" style="margin-top: 10px;">
                                <img src="<?php echo e(url('/dashboard/images/rx.png')); ?>" width="30px" alt="">

                                <ol>
                                    <?php $__currentLoopData = $prescription->drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="print_class"><b>Drug-Type:</b> <i><?php echo e($drug->type); ?></i> <b>Drug Name:</b> <?php echo e($drug->drug['name']); ?>

                                            <?php if(config('app.generic_name') == 1): ?>
                                                (<?php echo e($drug->drug['generic_name']); ?>)
                                            <?php endif; ?>
                                            <br>
                                            <b>Drug-Strength:</b> <?php echo e($drug->strength); ?>

                                            <ul style="padding-left: 0px">
                                                <li style="list-style: none">
                                                <b>Drug-Dose:</b> <?php echo e($drug->dose); ?> &emsp; <b>Drug Duration</b><?php echo e($drug->duration); ?></li>
                                                <li style="list-style: none"><b> Advice:</b> <?php echo e($drug->advice); ?></li>
                                            </ul>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                             <div class="col-md-4 m-t-40">
                            
							  <b>Frequencies:</b>
                             <?php echo e(join('  -  ', $prescription->frequencies)); ?>

							 </div>
                            <div class="col-md-2">
                                <?php if($prescription->next_visit != null || $prescription->next_visit != ''): ?>
                                <p><b>Next Visit :</b>
                                    <?php echo e($prescription->next_visit); ?>

                                </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <p class="prescription-p-title" style="border-top: 1px solid black; width: 150px;float: right;">Seal and
                                    Signature</p>
                            </div>
                        </div>

                    </div>
                </div>
                <button id="print" class="btn btn-inverse pull-right" ><i class="fa fa-print"></i> &nbsp; Print Prescription</button>
                <button id="printPageBtn" class="btn btn-success pull-right" style="margin-right: 15px;"><i class="fa fa-print"></i> &nbsp; Print Page</button>
                <br>
                <br>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/printthis/printThis.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $("#print").on('click', function () {
                $("#print_prescription").printThis();
            });

            $("#printPageBtn").on('click',function () {
                $("#printPage").printThis();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>