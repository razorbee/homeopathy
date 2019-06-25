Disease : @foreach($patient->prescriptions as $prescribes)
                              [{{$prescribes->disease}}]
  @endforeach