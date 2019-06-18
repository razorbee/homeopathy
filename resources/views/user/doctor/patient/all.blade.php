@extends('layouts.app')

@section('title')
    All Patient
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">
<style>
.role_2 .view_medical , .role_4 .view_medical, .role_2 .view_medical_add , .role_4 .view_medical_add,.role_2 .view_prescribe , .role_4 .view_prescribe {
display :none
}


</style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="fa fa-users fa-2x"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">All Patient</h4>
        </div>

		
        <form id="advancesearch" class="m-b-20" style="background:#f9f9f9">	
        <div class="row" style="margin-left:50px;">		
			
            <div class="col-2">	
                <div><b>Name</b></div>		
                <input type="text" id="search_name">		
            </div>	
         
            <div class="col-2">	
            <div><b>Age</b></div>		
            <select name="age" id="search_age" class="advselect">		
                <option  value="0">select age</option>		
                    <option  value="1-10">0-10</option>		
                    <option  value="11-20">11-20</option>		
                    <option  value="21-30">21-30</option>		
                    <option  value="31-40">31-40</option>		
                    <option  value="41-50">41-50</option>		
                    <option  value="51-60">51-60</option>		
                    <option  value="60-200">60+</option>		
                </select>		
            </div>	

            <div class="col-2">	
                <div><b>Gender</b></div>		
                <select id="search_gender" class="advselect"><option value='0'>select gender</option><option value='1'>Male</option><option value='2'>female</option></select>	
            </div>	
		
         		
            <div class="col-2">		
                <div ><b>Disease</b></div>		
                <select name="disease" id="search_disease" class="advselect">		
                    <option  value="">select disease</option>		
                    @foreach($patient as $diseases)
                                <option value="{{$diseases -> disease}}">{{$diseases -> disease}}
                                </option>
                            @endforeach	
                </select>		
            </div>	
            <div class="col-2">		
                <div >&nbsp;</div>		
                <input type="submit" id="search_submit" value="submit" class="advselect"/>	
            </div>	
        </div>
        </form>  


        <!-- <table class="table table-striped" id="datatable"> -->
        <table class="table table-striped role_{{{auth()->user()->role}}}" id="datatable">
            <thead>
            <tr>
                <th width="5px">#</th>
                <th>Patient Pic</th>
                <th>Patient Info</th>
                <th>Contact Info</th>
                <th>Medical Info</th>
                <th>Disease</th>
                {{--<th>Status</th>--}}
                <th width="25px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
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
                    url: 'api/data-table/all-patient',		
                    data: function (d) {		
                        d.name = $('#search_name').val(),		
                        d.gender = $('#search_gender').val(),		
						d.age = $('#search_age').val(),		
						d.disease = $('#search_disease').val()		
                }		
            },
                columns: [
                    { "data" : "#"},
                    { "data": "image" },
                    { "data": "patient_info" },
                    { "data": "contact_info" },
                    { "data": "medical_info" },
                    { "data": "disease" },
                    { "data" : "actions"}
                ],
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    },
                    sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }

            });

            @if(session('delete_patient'))
                $.Notification.notify('success','top right',"Patient deleted",'Patient has been deleted successfully');
            @endif
                   
        });

        $("#advancesearch").submit(function( e ) {		
                e.preventDefault();		
                oTable = $('#datatable').DataTable(); 		
                oTable.draw(); 
            });
    </script>
@endsection
