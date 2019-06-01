<?php $__env->startSection('title'); ?>
    All Prescription
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="ti-write" style="font-size: 30px;"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">All Prescription</h4>
        </div>
	  
        <table class="table table-striped" id="datatable" class="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th width="5px">#</th>
                <th>Date</th>
                <th>Patient_id</th>
				<th>Patient</th>
                <th>Age</th>
                <th>Disease</th>
                <th width="25px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
			<tfoot>
            <!-- <tr>
               <th width="5px">#</th>
                <th>Date</th>
                <th>Patient_id</th>
				<th>Patient</th>
                <th width="25px">Action</th>
            </tr> -->
        </tfoot>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script src="<?php echo e(url('/dashboard/plugins/datatables/datatable.min.js')); ?>"></script>
	
    <script>
        $(document).ready( function () {

            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo e(url('/api/data-table/all-prescription')); ?>",
				
            
                "columns": [
                    { "data" : "#"},
                    { "data": "created_at" },
                    { "data": "patient_id" },
					{ "data": "patient_name" },
                    { "data": "patient_age" },
                    { "data": "patient_disease" },
                    
                    { "data" : "action"}
                ]
            });
        });
		
       // $(document).ready(function() {
    // Setup - add a text input to each footer cell
    // $('#datatable tfoot th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // DataTable
    //var table = $('#datatable').DataTable();
 
    // Apply the search
//     table.columns().every( function () {
//         var that = this;
 
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
// } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>