@extends('layouts.app')

@section('title')
    New Appointment
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/select2/css/select2.min.css')}}">
    <style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
@endsection

@section('content')
    @if(session('has_patient'))
        <?php $patient = session('has_patient') ?>
        <input type="hidden" value="{{$patient->id}}" id="defaultPatient">
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-calendar fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">New Appointment</h4>
                <form action="#" method="post" id="newAppointment">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom ">
                                <select class="form-control select2" name="patient_id" id="" required="required">
                                    <option>Select the patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{$patient->id}}">{{$patient->name}} | {{$patient->phone}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-1">
                        <button onclick="myFunction()">see schedule</button>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <!-- <input type="date" name="date" id="date" required="required"/> -->
                                <input id="datepicker" name="date" onchange="checkDate()" required class="datepicker-input" type="date" data-date-format="yyyy-mm-dd" >
                                <label class="control-label">Date &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group-custom">
                                <input type="time" required="required" name="time"/>
                                <label class="control-label">Time</label><i class="bar"></i>
                                
                                   
                                
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <select required="required" class="form-control select3" name="appointment_id" id="">
                                    <button class="accordion" onclick="myFunction()">Select Place</button>
                                    <option>Select the schedule</option>
                                    @foreach($schedules as $schedule)
                                        <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group-custom">
                                <input type="text" name="payment"/>
                                <label class="control-label">Payment Amount &nbsp;</label><i class="bar"></i>
                            </div>
                        </div> -->

                        <div class="col-md-6">
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Note</label><i class="bar"></i>
                    </div>
                  </div>
                    </div>
                   
            
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
             
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light m-l-10 m-l-10">Cancel</button> -->
                    <button type="reset" class="btn btn-danger waves-effect waves-light m-l-10 m-l-10" onclick=" window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
    
    <div class="panel" id="panel" style="display:none;">
                <!-- <h4 class="text-center"><strong>Appointment Schedule</strong></h4> -->
           
            <div class="panel-body">
            <h4 class="text-center red"><strong>Appointment Schedule</strong></h4>
                @foreach($schedules as $appointment)
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="color:#000;">{{$appointment->name}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color:#000;">Contact :</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="padding-left: 45px;">
                            @foreach($appointment->dateTime as $date)
                                <p style="color:#000;"><b><u>{{$date->days}}</u></b> <br>
                                    Chamber Time : <b>{{\Carbon\Carbon::parse($date->start_time)->format('g:i a')}}</b> to
                                   <b> {{\Carbon\Carbon::parse($date->end_time)->format('g:i a')}}</b></p>
                            @endforeach
                        </div>
                        <div class="col-md-6" style="padding-left: 45px;">
                            <h4 style="font-size: 20px;color:#000;">
                                {{$appointment->contact_person_name}}
                            </h4>
                            <dl class="row">
                                <dt class="col-sm-1"><i class="fa fa-phone-square" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="tel:{{$appointment->phone}}">{{$appointment->phone}}</a></dd>
                                <dt class="col-sm-1"><i class="fa fa-envelope" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"><a href="mailto:{{$appointment->email}}">{{$appointment->email}}</a></dd>
                                <dt class="col-sm-1"><i class="fa fa-map-marker" aria-hidden="true"></i></dt>
                                <dd class="col-sm-11"> {!! nl2br(e($appointment->address)) !!}</dd>
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>
         
        </div>
    
    </div>
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: "Please select a patient *",
                width: '100%'
            });
            $(".select3").select2({
                placeholder: "Please select a schedule *",
                width: '100%'
            });

            var defaultPatient = $("#defaultPatient").val();
            if(defaultPatient != '' || defaultPatient != null){
                $(".select2").val(defaultPatient).change();
            }
            
                
            $("#newAppointment").on('submit',function (e) {
                e.preventDefault();
                var formId = $("#newAppointment");
                var data = new FormData(this);
                $.ajax({
                    url:'{{url('/save-appointment')}}',
                    type:'POST',
                    data:data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function (data) {
                        $.Notification.notify('success','top right','Appointment make successfully');
                        formId.get(0).reset();
                        $('.select2').val('').change();
                        $('.select3').val('').change();
                    },error:function (data) {
                        $.Notification.notify('error','top right','Doctor will not available on that day in selected place')
                    }
                })
            });
        })
//         function checkDate() {
//    var selectedText = document.getElementById('datepicker').value;
//    var selectedDate = new Date(selectedText);
//    var now = new Date();
//    if (selectedDate < now) {
//     alert("Date must be in the future");
//    }
//  }
function myFunction() {
  document.getElementById("panel").style.display = "block";
}
    </script>
@endsection