@extends('layouts.app') @section('title') Edit Patient @endsection @section('extra-css') @endsection @section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="fa fa-user-circle-o fa-2x"></i>
        </div>
        <div class="card-content">
        @if(auth()->user()->role == 1 || auth()->user()->role == 3)
            <a href="javascript:void(0);" onclick="window.location.replace('{{url('/take-patient-to-prescription-page/'.$patient->id)}}')" class="btn btn-success pull-right"><i class="ti ti-pencil-alt"></i> Prescribe</a>
            @endif
            <span class="pull-right">&nbsp;|&nbsp;</span>
            <a href="{{url('/patient-medical-file/'.$patient->id)}}" class="btn btn-success pull-right">
                <!-- <img src="{{url('/')}}/dashboard/images/document.png">--><i class="ti ti-files"></i> Upload documents</a>
            <span class="pull-right">&nbsp;|&nbsp;</span>
            <a class="btn btn-success pull-right" href="javascript:void(0);" onclick="window.location.replace('{{url('/take-patient-to-appointment/'.$patient->id)}}')"><i class="ti ti-calendar"></i> New Appointment </a>
            <span class="pull-right">&nbsp;|&nbsp;</span>
            <a href="{{url('/view-patient/'.$patient->id)}}" class="btn btn-success pull-right"><i class="fa fa-info"></i> View</a>
            <h4 class="card-title">Edit patient - {{$patient->name}}</h4>
            <form action="#" method="post" id="updatePatient" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4">
                        <center>
                            <!-- <div id="image-preview" style="background-image: url({{url($patient->image != null ? $patient->image : "/dashboard/images/patient.png")}})"> -->
                            <div class="image-src" id="image-preview"><img id="default_image" src="{{url('/')}}/{{$patient->image}}" class="img-responsive" style="width:250px;height:250px;margin-bottom: -200px;" alt="">
                                <label for="image-upload" id="image-label"><img src="{{url('/')}}/dashboard/images/pencil.png" height="20" /></label>
                                <input type="file" name="image" id="image-upload"  onchange='hidedefault()' />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group-custom">
                            <input value="{{$patient->name}}" type="text" name="name" required="required" autofocus/>
                            <label class="control-label">Name &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <select name="gender" id="" required="required">
                                        <option {{$patient->gender ==1 ? 'selected' : ''}} value="1">Male</option>
                                        <option {{$patient->gender ==2 ? 'selected' : ''}} value="2">Female</option>
                                        <option {{$patient->gender ==3 ? 'selected' : ''}} value="3">Other</option>
                                    </select>
                                    <label class="control-label">Gender &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <input value="{{$patient->age()}}" type="text" name="date_of_birth" required="required" />
                                    <label class="control-label">Age &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-custom">
                                    <select name="marital" id="" required="required">
                                        <option {{$patient->marital =='married' ? 'selected' : ''}} value="married">Married</option>
                                        <option {{$patient->marital =='single' ? 'selected' : ''}} value="single">Single</option>
                                        <option {{$patient->marital =='widowed' ? 'selected' : ''}} value="widowed">Widowed</option>
                                        <option {{$patient->marital =='divorcee' ? 'selected' : ''}} value="divorcee">Divorcee</option>
                                        <option {{$patient->marital =='widower' ? 'selected' : ''}} value="widower">Widower</option>
                                    </select>
                                    <label class="control-label">Marital status &nbsp;</label><i class="bar"></i>
                                </div>
                        <div class="form-group-custom">
                            <input value="{{$patient->phone}}" type="text" name="phone" maxlength="13"/>
                            <label class="control-label">Phone &nbsp;<span class="text-danger"></span></label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <input value="{{$patient->email}}" type="text" name="email" />
                            <label class="control-label">Email</label><i class="bar"></i>
                        </div>
                        <div class="form-group-custom">
                            <textarea name="address">{{$patient->address}}</textarea>
                            <label class="control-label">Address &nbsp;</label><i class="bar"></i>
                        </div>

                    </div>
                </div>

                

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group-custom">
                        @if(auth()->user()->role == 1 || auth()->user()->role == 3)    
                        <div style="margin-bottom:10px;margin-top:-10px;">
                                <strong >Patient History</strong>
                        </div>
                            <div style="display:none" id="detailsarea_div">
                                <input type='hidden' id="patientdetails" name='patientdetails' value='' />
                                <textarea name="ck_patientdetails" id="ck_patientdetails" style="display:none">{{$patient->patientdetails}}</textarea>
                            </div>
                            
                            
                            
                           
                            <div id = "details"> details....</div>
                        </div>

                    </div>
                </div>
               
                <button id="edit_history" type="button" class="btn btn-danger waves-effect waves-light">edit history</button>
                <button id="addreport"  type="button" class="btn btn-danger waves-effect waves-light">+Add Today's Report</button>
                @endif
                <div style="display:none" id="detailsarea_div_add">
                <br/>   
                    <textarea name="ck_patientdetails_add" id="ck_patientdetails_add"><strong>{{date("m/d/Y")}}</strong></textarea>
                </div>


                <div style="padding-left: 35%;">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit<i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                    <button type="reset" class="btn btn-primary waves-effect waves-light" onclick=" window.history.back();">Cancel</button>
                </div>
               
            </form>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="confmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to cancel your changes?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="go2view">Yes</button>
      </div>
    </div>
  </div>
</div>

@include('user.doctor.patient.modal.success-modal') @endsection @section('extra-js')
<script>

    function decodeHtml(html) {
                 return $('<div>').html(html).text();
    }
    var patientdetails = decodeHtml("{{$patient->patientdetails}}");

     $(document).ready(function() {


        var details = $('#ck_patientdetails').text();
	    $("#details").html(details)


        var patientId = null;

        $.fn.newPatientSetPatientId = function(id) {
            patientId = id;
        };
        $("#go2view").on('click', function() {
            CKEDITOR.instances['ck_patientdetails'].setData(patientdetails);
                $("#edit_history").text("edit history");
                $("#detailsarea_div").hide();
                $("#details").show();

        })
        
        $("#edit_history").on('click', function() {
            if ($(this).text() =="edit history"){
                $("#detailsarea_div").show();
                $("#details").hide();
                $(this).text("cancel");
            }else{
                $("#confmodel").modal('show');
            }
        });

        $("#addreport").on('click', function() {
            $(this).hide();
            $("#detailsarea_div_add").show();
            
        });


        $("#modalBtnPrescribeNow").on('click', function() {
            console.log(patientId);
            window.location.replace('take-patient-to-prescription-page/' + patientId);
        });

        $("#updatePatient").on('submit', function(e) {
            e.preventDefault();
            var value = CKEDITOR.instances['ck_patientdetails'].getData();
            if( $("#detailsarea_div_add").is(":visible")){
                value += CKEDITOR.instances['ck_patientdetails_add'].getData();
            }
            document.getElementById("patientdetails").value = value;
            var data = new FormData(this);
            showLoader();
            // $(this).speedPost('update-patient/{{$patient->id}}',data);
            $(this).speedPost("{{url('/')}}/update-patient/{{$patient->id}}", data);
        })
        hideLoader();
    });

    function hidedefault(){
        debugger;
        $('#default_image').hide();
    }
</script>
@endsection