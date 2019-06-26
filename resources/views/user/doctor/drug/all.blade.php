@extends('layouts.app')

@section('title')
    All Drug
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">

@endsection

@section('breadcrumb')
    <li class="float-left">
        <a href="{{url('/')}}" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="{{url('/all-drug')}}" class="">All Drug</a>
    </li>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">All Drug</h4>
            </div>

            <table class="table table-striped table-bordered" id="datatable">
                <thead>
                <tr>
                    <th width="5px">#</th>
                    <th>Generic name</th>
                    <th>Drug name</th>
                    <th>Total Use</th>
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
                "ajax": "{{ route('drug.datatable') }}",
                "columns": [
                    { "data" : "#"},
                    { "data": "generic_name" },
                    { "data": "name" },
                    { "data" : "total_use"},
                    { "data": "status" },
                    { "data" : "action"}
                ],
                oLanguage: {
                sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }
            });

            @if(session('delete_drug'))
                $.Notification.notify('success','top right','Drug deleted','Drug has been deleted successfully');
            @endif
            @if(session('delete_fail'))
                $.Notification.notify('error','top right','Delete Failed','We cannot delete the durg, coz it is used in temllate or prescription');
            @endif
        });
    </script>
@endsection
