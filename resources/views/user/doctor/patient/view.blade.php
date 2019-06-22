@extends('layouts.app')

@section('title')
    Medical History
@endsection

@section('extra-css')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Medical History of - {{$patient->name}}</h4>

				
			 
			 <a href="{{url('/edit-patient/'.$patient->id)}}" class="pull-right btn btn-success"><i class="ti-pencil-alt"></i>Edit</a>
                <div class="row">
                    <div class="col-md-4">
                        <img width="90px" src="{{url($patient->image != null ? $patient->image : "/dashboard/images/patient.png")}}" alt="">

                    </div>
                    <div class="col-md-8">
					<div class="row">
                        <div class="col-sm-3"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Name : </b></span>{{$patient->name}}</div>
                        <div class="col-sm-3"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>ID: </b></span>
							{{$patient->id}}</div>
                            <div class="col-sm-3"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Gender :</b></span>
							{{$patient->gender ==1 ? "Male" : $patient->gender ==2 ? "Female" : "Other" }}</div>
							 
							<div class="col-sm-3"><span class="title_p"  style="font-size:16px!important;font-weight:bold; color:#fe5314!important;"><b>Age : </b></span>
							{{$patient->age()}}</div>
                            
                          
			   
                   <!-- <div class="col-md-12" style="margin-top:20px;">
                   <dl class="dl-horizontal">
                   @foreach($patient->prescriptions as $prescribes)
                            Disease::{{$prescribes->disease}}<br>
                            @endforeach
                    </dl>
                       
                   </div> -->
                </div>
				</div>
                </div>
                <hr>

                <dl class="dl-horizontal">
                            <dt>Patient History</dt>
							<input type='hidden' id = "_details" value="{{$patient->patientdetails}}"/>
														<div id = "details"></div>

                            <dd></dd>
                            
                        </dl>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Medical document (Image) <a style="font-size: 15px;"
                                                        href="{{url('/patient-medical-file/'.$patient->id)}}"
                                                        class="pull-right"> <i class="fa fa-plus"></i> Add Medical file</a>
                        </h4>
                        @foreach($patient->medicalFiles as $file)
                            <a href="{{url($file->path)}}" target="_blank" class="swipebox" title="My Caption">
                                <img src="{{url($file->path)}}" class="img-thumbnail" width="220px" alt="image">
                            </a>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                  
                        <h4>Prescription Info 
                        @if(auth()->user()->role == 1 || auth()->user()->role == 3)<a style="font-size: 15px;" href="{{url('take-patient-to-prescription-page/'.$patient->id)}}" class="pull-right btn btn-success"> <i class="ti ti-ink-pen"></i> Write new prescription</a>
                        @endif</h4>
                        <ul class="list-group">
                            @foreach($patient->prescriptions as $pres)
                                <li class="list-group-item" style="margin-top:20px;"> <a href="{{url('/print-prescription/'.$pres->id)}}" class="btn btn-default pull-right"><i class="fa fa-eye"></i> View</a> {{$pres->created_at->format('d-M-Y')}} </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Appointment Info <a style="font-size: 15px;margin-bottom:20px;" href="javascript:void(0);" onclick="window.location.replace('{{url('take-patient-to-appointment/'.$patient->id)}}')" class="pull-right btn btn-success"> <i class="ti ti-calendar"></i> Make an appointment</a> </h4>
                        <!-- <ul class="list-group">
                            @foreach($patient->payments as $payment)
                                <li class="list-group-item">{{$payment->payment}} <span class="pull-right">{{$payment->created_at->format('d-M-Y')}}</span> </li>
                            @endforeach
                        </ul> -->
                        <ul class="list-group">
  @foreach($patient->appointment as $appoint)
                                <li class="list-group-item" style="margin-top:20px;width:500px;"> 
								<table>
								<tr>
								<td class="m-r-10" style="padding-right:40px;"> {{$patient->name}}</td> 
                              <td  class="m-r-10" style="padding-right:40px;padding-left:40px;"> {{$appoint->date->format('d-M-Y')}}</td>
                             <td  class="m-r-10 m-r-10" style="padding-right:40px;text-align:center;"> {{$appoint->time}}</td>
                           <td  style="padding-right:40px;"> {{$appoint->note}}</td>
						   </tr>
						   </table>
                         </li>
  @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.history.back();" id="myBtn"><img src="{{url('/')}}/dashboard/images/back.png"></button>
    <button type="submit"  class="btn btn-primary waves-effect waves-light" id="myBtn1"><a href="{{url('/')}}"  style="color:#ffffff;"><i class="fa fa-home"></i></a></button>
@endsection





@section('extra-js')

    <script>
        $(document).ready(function () {


	  var details = $('<textarea />').html($("#_details").val()).text();
	  $("#details").html(details)
	
        });
    </script>
@endsection