<?php $__env->startSection('title'); ?>
    Title
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="float-left">
        <a href="<?php echo e(url('/')); ?>" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="<?php echo e(url('/new-drug')); ?>" class="">New Drug</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new drug</h4>
                <form action="#" method="post" id="newDrug">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <select name="generic_name" id="" required="required">
                            <option  value="Medicine">Medicine</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <input type="text" name="name" required="required" autofocus/>
                        <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Short Note</label><i class="bar"></i>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new disease</h4>
                <form  method="post" id="newDisease">
                    <?php echo e(csrf_field()); ?>


                    
                    <div class="form-group-custom">
                        <input type="text" name="disease" required="required" autofocus/>
                        <label class="control-label">Disease &nbsp;*</label><i class="bar"></i>
                    </div>
                    
                     <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; </button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">View disease</h4>
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <td></td>
                <td>Disease</td>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $disease; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($disease->id); ?></td>
                <td><?php echo e($disease->disease); ?></td>
                </tr>
         
                   
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    
              
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function () {
         

            var form = $("#newDrug");
            form.on('submit',function (e) {
               
                var formData = new FormData(this);
                e.preventDefault();
                $(this).speedPost('<?php echo e(url('/save-drug')); ?>',formData,form);
            });

            var forms = $("#newDisease");
            forms.on('submit',function (e) { 
            
                var formData = new FormData(this);
                e.preventDefault();
                $(this).speedPost('<?php echo e(url('/save-disease')); ?>',formData,form);
            })
        })
        // $(document).ready(function () {
        //     fetch_data();
        //     function fetch_data()
        //     {
        //         $.ajax({
        //             url:"<?php echo e(url('/fetch_disease')); ?>",
        //             datatype:"json",
        //             success:function(data)
        //             {
        //                 var html ='';
        //                 html += '<tr>';
        //                 html += '<td></td>';
        //                 html += '<td contenteditable id="disease"></td>';
        //                 html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
        //                 for(var count=0; count<data.length; count++)
        //                 {
        //                     html += '<tr>';
        //                     html += '<td contenteditable>#</td>';
        //                     html += '<td contenteditable class="column_name" data-column_name="disease" id="'+data[count].id+'">'+data[count].disease+'</td>';
        //                     html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
        //                 }

        //                 $('tbody').html(html);
        //             }

        //         })

        //     }


        // })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>