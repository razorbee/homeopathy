<b>{{$patient->name}}</b><br>
Patient-Id : {{$patient->id}} 
 <br>
Gender : @if($patient->gender ==1)
    Male
@elseif($patient->gender == 2)
    Female
@else
    Other
@endif
<br>
Age : {{$patient->age()}} <br>
Marital status : {{$patient->marital}} <br>


<a class="view_prescribe" href="javascript:void(0);" onclick="window.location.replace('{{url('/take-patient-to-prescription-page/'.$patient->id)}}')"><i class="ti ti-ink-pen"></i> Prescribe Now </a>
<br>
<a style="white-space:nowrap;" href="javascript:void(0);" onclick="window.location.replace('{{url('/take-patient-to-appointment/'.$patient->id)}}')"><i class="ti ti-calendar"></i> Next Appointment </a>
