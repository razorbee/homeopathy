@extends('layouts.app')

@section('title')
    All Prescription
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="ti-write" style="font-size: 30px;"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">All Prescription</h4>
        </div>
        <form id="advancesearch" class="m-b-20" style="background:#f9f9f9">	
        <div class="row" style="margin-left:50px;">		
			
            <div class="col-2">	
                <div><b>Patient_Id</b></div>		
                <input type="number" id="search_patient_id">		
            </div>	
         	
            <div class="col-2">		
                <div >&nbsp;</div>		
                <input type="submit" id="search_submit" value="submit" class="advselect"/>	
            </div>	
        </div>
        </form>  
        <table class="table table-striped" id="datatable" class="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th width="5px">#</th>
                <th>Date</th>
                <th>Patient id</th>
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
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/plugins/datatables/datatable.min.js')}}"></script>
	
    <script>
        $(document).ready( function () {
          
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
           
                ajax: {		              
                    url: 'api/data-table/all-prescription',		
                  
                    data: function (d) {		
                        d.patient_id = $('#search_patient_id').val()		
                           	
                }		
            },
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
$("#advancesearch").submit(function( e ) {		
                e.preventDefault();		
                oTable = $('#datatable').DataTable(); 		
                oTable.draw(); 
            });
    </script>
@endsection