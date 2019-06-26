Disease :


  @foreach($patient->prescriptions as $prescribes)
    @foreach(explode(',', $prescribes->disease) as $string)
       [ {{ $string }}]
    @endforeach
@endforeach