Role : @if($assistant->role == 1)
  Admin
@elseif($assistant->role == 2)
    Receiptionist
@elseif($assistant->role == 3)
    Doctor
@elseif($assistant->role == 4)
    Pharmacist

@else
    Other
@endif

