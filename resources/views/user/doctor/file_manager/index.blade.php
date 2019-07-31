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


    <div class="filemanager">
   

		<div class="search" action="{{url('/scan')}}">
			<input type="search" placeholder="Find a file..">
		</div>

		<!-- <div class="breadcrumbs">
            <a href="files"><span class="folderName">Files</span></a> <span class="arrow">→</span> <span class="folderName">Files</span>
        </div> -->

		<ul class="data animated" style="">
            
            <li class="folders">
                <a href="files/Important Documents" title="files/Photos" class="folders">
                <span class="icon folder full"></span><span class="name">Important Documents</span> <span class="details">1 item</span></a>
            </li>
            <li class="folders">
                <a href="files/Photos" title="files/Photos" class="folders">
                <span class="icon folder full"></span><span class="name">Photos</span> <span class="details">6 item</span></a>
            </li>
            <li class="folders">
                <a href="files/Movies" title="files/Movies" class="folders">
                <span class="icon folder full"></span><span class="name">Movies</span> <span class="details">1 item</span></a>
            </li>
            <li class="folders">
                <a href="files/Music" title="files/Movies" class="folders">
                <span class="icon folder full"></span><span class="name">Music</span> <span class="details">3 item</span></a>
            </li>
            <li class="folders">
                <a href="files/Videos" title="files/Videos" class="folders">
                <span class="icon folder full"></span><span class="name">Videos</span> <span class="details">3items</span></a>
            </li>
            
         </ul>   
</div>
</div>
</div>

@endsection

@section('extra-js')	
<script src="{{url('/dashboard/js/jquery3.3.1.min.js')}}"></script>

  


    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{url('/dashboard/js/script.js')}}"></script>
    
	@endsection	

