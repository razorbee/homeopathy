@extends('layouts.app')

@section('title')
    Medical Files
@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="icon icon-pill"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Add New File of - {{$patient->name}}</h4>
            <div style="padding-left: 30%;">
                <form id="savemedicalfile" action="{{url('/save-medical-file/'.$patient->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="image-preview">
                        <label for="image-upload" id="image-label"><i class="ti-pencil-alt"></i></label>
                        <input required type="file" name="image" id="image-upload"/>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light m-t-10 m-t-20">Submit &nbsp; <i id="loading"
                                                                                                            class="fa fa-refresh fa-spin"></i>
                    </button>
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                    <button type="reset" class="btn btn-danger waves-effect waves-light m-t-10 m-t-20 m-l-10" onclick=" window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($patient->medicalFiles as $image)
                <div class="col-md-4">
                    <a href="{{url($image->path)}}" target="_blank">
                        <img src="{{url($image->path)}}" class="img-fluid" alt="">
                    </a>
                    <p>{{$image->created_at->format('d-M-Y')}}
                        <button onclick="$(this).confirmDelete('{{url('/delete-medical-file/'.$image->id)}}')" class="btn btn-danger pull-right m-t-20"><i class="fa fa-trash"></i> Delete</button>
                    </p>
                </div>
            @endforeach
        </div>

    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.history.back();" id="myBtn"><img src="{{url('/')}}/dashboard/images/back.png"></button>
   <button type="submit"  class="btn btn-primary waves-effect waves-light" id="myBtn1"><a href="{{url('/')}}"  style="color:#ffffff;"><i class="fa fa-home"></i></a></button>
@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            oLanguage: {
                sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }
           @if(session('medical_file_delete'))
            $.Notification.notify('success','top right','Medical file delete','Patient medical file has been deleted successfully');
           @endif
        });
    </script>
@endsection