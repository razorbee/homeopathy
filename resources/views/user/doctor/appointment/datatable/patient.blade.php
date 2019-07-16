<p>
    <img width="60px" height="60px" class="img-fluid"
         src="{{url($appointment->patient->image != null ? $appointment->patient->image : "dashboard/images/patient.png")}}"
         alt=""
         align="right"
    >
<div>
    <span>
    {{$appointment->patient->name}} || Patient_id : {{$appointment->patient->id}}
    </span>
    <br>
    <span>
    Phone : <b>{{$appointment->patient->phone}}</b> <br>
    Email : <b>{{$appointment->patient->email}}</b>
   </span> <br>
 
    <a href="javascript:void(0);" onclick="window.location.replace('{{url('/take-patient-to-prescription-page/'.$appointment->patient->id)}}')" class="btn btn-default view_medical"><i class="ti-pencil"></i> Write new prescription</a>
  
</div>

</p>

