@extends('layouts.app')

@section('title')
    All Appointment
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">
    <style>
.role_2 .view_medical , .role_4 .view_medical {
display :none
}


</style>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar-check-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Appointments</h4>
            </div>
            
            <table class="table table-striped role_{{{auth()->user()->role}}}" id="datatable">
                <thead>
                <tr>
                    <th width="5px">#</th>
                    <th>Patient Name</th>
                    <th>Appointment</th>
                    <th>Status</th>
                    <th width="25px">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/plugins/datatables/datatable.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/data-table/all-appointment') }}",
                "columns": [
                    { "data" : "#"},
                    { "data": "patient" },
                    { "data": "appointment" },
                    { "data" : "status"},
                    { "data" : "actions"}
                ],
                                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    },
                    sProcessing : '<div class="loader"></div>'
                }
            });
            @if(session('delete_appointment'))
                $.Notification.notify('success','top right','Appointment Deleted','Appointment has been deleted');
            @endif
        });
      
           
    </script>
@endsection