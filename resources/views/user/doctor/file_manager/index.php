@extends('layouts.app')

@section('title')
    Create new prescription
@endsection

@section('extra-css')
   

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 @endsection

@section('content')
  



    <div class="filemanager">
        
        <nav class="navbar navbar-default">
  <div class="container-fluid headernav">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FILE MANAGER</a>
    </div>
</div>
</nav>
<br><br>
        

		<div class="search" action="scan.php">
			<input type="search" placeholder="Find a file..">
		</div>

		<div class="breadcrumbs">
            <a href="files"><span class="folderName">Files</span></a> <span class="arrow">→</span> <span class="folderName">Files</span>
        </div>

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
@endsection

@section('extra-js')	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    


    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="js/script.js"></script>
	@endsection	

