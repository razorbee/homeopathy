@extends('layouts.app')

@section('title')
    Appointment Today
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar-check-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Today's Appointment</h4>
            </div>
            <table class="table table-striped" id="datatable">
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
    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.history.back();" id="myBtn"><img src="{{url('/')}}/dashboard/images/back.png"></button>
    <button type="submit"  class="btn btn-primary waves-effect waves-light" id="myBtn1"><a href="{{url('/')}}"  style="color:#ffffff;"><i class="fa fa-home"></i></a></button>
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/plugins/datatables/datatable.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/data-table/appointment-today') }}",
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
                    sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }
            });
            @if(\Illuminate\Support\Facades\Session::has('delete_appointment'))
                $.Notification.notify('success','top right','Appointment Deleted','Appointment has been deleted');
            @endif
        });
    </script>
@endsection