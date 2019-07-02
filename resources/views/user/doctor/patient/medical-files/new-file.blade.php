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
                    <div class="image-file" id="image-preview">
                        <label for="image-upload" id="image-label"><i class="ti-pencil-alt"></i></label>
                        <input required type="file" name="image" id="image-upload"/>
                    </div>

                    <button type="submit" id="formsubmit" class="btn btn-primary waves-effect waves-light m-t-10 m-t-20">Submit &nbsp; <i id="loading"
                                                                                                            class="fa fa-refresh fa-spin"></i>
                    </button>
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                    <button type="reset" class="btn btn-danger waves-effect waves-light m-t-10 m-t-20 m-l-10" onclick=" window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
        <hr>
        <!--<div class="loader" style="display:none;" id="loader"></div>-->
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
    
@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            $("#formsubmit").on("click", function(){
             
                 $('.loader').css("display", "block")
            });
           @if(session('medical_file_delete'))
            $.Notification.notify('success','top right','Medical file delete','Patient medical file has been deleted successfully');
           @endif
        });
    </script>
@endsection