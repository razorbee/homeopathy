@extends('layouts.app')

@section('title')
File manager
@endsection

@section('extra-css')
<link rel="stylesheet" href="{{url('/dashboard/css/style.css')}}">  


 @endsection

@section('content')
  

<div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="ti-write" style="font-size: 30px;"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">File manager</h4>
            </div>


   <div><iframe src="{{url('/file_manager')}}" width="100%" height="700px"></iframe>
</div>
</div>

@endsection

@section('extra-js')	


  



    <script src="{{url('/dashboard/js/script.js')}}"></script>
    
	@endsection	

