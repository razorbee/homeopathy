
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
  
    <title>File Manager</title>
   

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
  <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>


   
	<script src="js/script.js"></script>


	
<style>
    @charset "utf-8";


/*-------------------------
	Simple reset
--------------------------*/

*{
	margin:0;
	padding:0;
}


/*-------------------------
	Demo page
-------------------------*/

body {
/*     background-image: url("background1.jpg");*/
     background-repeat: no-repeat;
  background-size: cover;
/*	background-color: #23232e;*/
	font: 14px normal Arial, Helvetica, sans-serif;
	z-index: -4;
}

    .header{
        color:#23232e;
        text-align:center;
        font-size: 25px;
    }

    .navbar-default .navbar-brand {
    color: #23232e;
}
    
 .navbar-default {
    background-color:	#778899;
    border-color:	#778899;
}   
    
   
/*-------------------------
	File manager
-------------------------*/


.filemanager {
	width: 95%;
	max-width:1340px;
	position: relative;
	margin: 0px auto 50px;
}

@media all and (max-width: 965px) {
	.filemanager {
		margin: 30px auto 0;
		padding: 1px;
	}
}


/*-------------------------
	Breadcrumps
-------------------------*/


.filemanager .breadcrumbs {
	color: #23232e;
	margin-left:20px;
	font-size: 24px;
	font-weight: 700;
	line-height: 35px;
    text-transform: none;
}

.filemanager .breadcrumbs a:link, .breadcrumbs a:visited {
	color: #23232e;
	text-decoration: none;
}

.filemanager .breadcrumbs a:hover {
	text-decoration: underline;
}

.filemanager .breadcrumbs .arrow {
	color:  #6a6a72;
	font-size: 24px;
	font-weight: 700;
	line-height: 20px;
}


/*-------------------------
	Search box
-------------------------*/


.filemanager .search {
	position: absolute;
	padding-right: 30px;
	cursor: pointer;
	right: 0;
	font-size: 17px;
	color: black;
	display: block;
	width: 100px;
	height: 100px;
    border-color:1px black;
}

.filemanager .search:before {
	content: '';
	position: absolute;
	margin-top:12px;
	width: 20px;
	height:17px;
	border-radius: 50%;
	border: 2px solid #000000;
	right: 7px;
}

.filemanager .search:after {
	content: '';
	width: 3px;
	height: 11px;
	background-color: #000000;
	border-radius: 2px;
	position: absolute;
	top: 23px;
	right: 6px;
	-webkit-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

.filemanager .search input[type=search] {
	border-radius: 2px;
	color: #4D535E;
	background-color: #fff;
	width: 250px;
	height: 44px;
	margin-left: -215px;
	padding-left: 20px;
	text-decoration-color: #4d535e;
	font-size: 16px;
	font-weight: 400;
	line-height: 20px;
	display: none;
	outline: none;
	border: none;
	padding-right: 10px;
    border-radius: 25px;
	border: 2px solid #000000;
	-webkit-appearance: none;
}

::-webkit-input-placeholder { /* WebKit browsers */
	color:    #4d535e;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
	color:    #4d535e;
	opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
	color:    #4d535e;
	opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
	color:    #4d535e;
}


/*-------------------------
	Content area
-------------------------*/

.filemanager .data {
	margin-top: 60px;
	z-index: -3;
}

.filemanager .data.animated {
	-webkit-animation: showSlowlyElement 700ms; /* Chrome, Safari, Opera */
	animation: showSlowlyElement 700ms; /* Standard syntax */
}

.filemanager .data li {
	border-radius: 3px;
	background-color: #f8f8f8;
	width: 307px;
	height: 118px;
	list-style-type: none;
	margin: 10px;
	display: inline-block;
	position: relative;
	overflow: hidden;
	padding: 0.3em;
	z-index: 1;
	cursor: pointer;
	box-sizing: border-box;
	transition: 0.3s background-color;
}

.filemanager .data li:hover {
	background-color: ;

}

.filemanager .data li a {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.filemanager .data li .name {
	color:;
	font-size: 15px;
	font-weight: 700;
	line-height: 20px;
	width: 150px;
	white-space: nowrap;
	display: inline-block;
	position: absolute;
	overflow: hidden;
	text-overflow: ellipsis; 
	top: 40px;
}

.filemanager .data li .details {
	color: ;
	font-size: 13px;
	font-weight: 400;
	width: 55px;
	height: 10px;
	top: 64px;
	white-space: nowrap;
	position: absolute;
	display: inline-block;
}

.filemanager .nothingfound {
	background-color: #373743;
	width: 23em;
	height: 21em;
	margin: 0 auto;
	display: none;
	font-family: Arial;
	-webkit-animation: showSlowlyElement 700ms; /* Chrome, Safari, Opera */
	animation: showSlowlyElement 700ms; /* Standard syntax */
}

.filemanager .nothingfound .nofiles {
	margin: 30px auto;
	top: 3em;
	border-radius: 50%;
	position:relative;
	background-color: #d72f6e;
	width: 11em;
	height: 11em;
	line-height: 11.4em;
}
.filemanager .nothingfound .nofiles:after {
	content: '×';
	position: absolute;
	color: #ffffff;
	font-size: 14em;
	margin-right: 0.092em;
	right: 0;
}

.filemanager .nothingfound span {
	margin: 0 auto auto 6.8em;
	color: #ffffff;
	font-size: 16px;
	font-weight: 700;
	line-height: 20px;
	height: 13px;
	position: relative;
	top: 2em;
}

@media all and (max-width:965px) {

	.filemanager .data li {
		width: 100%;
		margin: 5px 0;
	}

}

/* Chrome, Safari, Opera */
@-webkit-keyframes showSlowlyElement {
	100%   	{ transform: scale(1); opacity: 1; }
	0% 		{ transform: scale(1.2); opacity: 0; }
}

/* Standard syntax */
@keyframes showSlowlyElement {
	100%   	{ transform: scale(1); opacity: 1; }
	0% 		{ transform: scale(1.2); opacity: 0; }
}


/*-------------------------
		Icons
-------------------------*/

.icon {
	font-size: 23px;
}
.icon.folder {
	display: inline-block;
	margin: 1em;
	background-color: transparent;
	overflow: hidden;
}
.icon.folder:before {
	content: '';
	float: left;
	background-color: #7ba1ad;

	width: 1.5em;
	height: 0.45em;

	margin-left: 0.07em;
	margin-bottom: -0.07em;

	border-top-left-radius: 0.1em;
	border-top-right-radius: 0.1em;

	box-shadow: 1.25em 0.25em 0 0em #7ba1ad;
}
.icon.folder:after {
	content: '';
	float: left;
	clear: left;

	background-color: #a0d4e4;
	width: 3em;
	height: 2.25em;

	border-radius: 0.1em;
}
.icon.folder.full:before {
	height: 0.55em;
}
.icon.folder.full:after {
	height: 2.15em;
	box-shadow: 0 -0.12em 0 0 #ffffff;
}

.icon.file {
	width: 2.5em;
	height: 3em;
	line-height: 3em;
	text-align: center;
	border-radius: 0.25em;
	color: #FFF;
	display: inline-block;
	margin: 0.9em 1.2em 0.8em 1.3em;
	position: relative;
	overflow: hidden;
	box-shadow: 1.74em -2.1em 0 0 #A4A7AC inset;
}
.icon.file:first-line {
	font-size: 13px;
	font-weight: 700;
}
.icon.file:after {
	content: '';
	position: absolute;
	z-index: -1;
	border-width: 0;
	border-bottom: 2.6em solid #DADDE1;
	border-right: 2.22em solid rgba(0, 0, 0, 0);
	top: -34.5px;
	right: -4px;
}

.icon.file.f-avi,
.icon.file.f-flv,
.icon.file.f-mkv,
.icon.file.f-mov,
.icon.file.f-mpeg,
.icon.file.f-mpg,
.icon.file.f-mp4,
.icon.file.f-m4v,
.icon.file.f-wmv {
	box-shadow: 1.74em -2.1em 0 0 #7e70ee inset;
}
.icon.file.f-avi:after,
.icon.file.f-flv:after,
.icon.file.f-mkv:after,
.icon.file.f-mov:after,
.icon.file.f-mpeg:after,
.icon.file.f-mpg:after,
.icon.file.f-mp4:after,
.icon.file.f-m4v:after,
.icon.file.f-wmv:after {
	border-bottom-color: #5649c1;
}

.icon.file.f-mp2,
.icon.file.f-mp3,
.icon.file.f-m3u,
.icon.file.f-wma,
.icon.file.f-xls,
.icon.file.f-xlsx {
	box-shadow: 1.74em -2.1em 0 0 #5bab6e inset;
}
.icon.file.f-mp2:after,
.icon.file.f-mp3:after,
.icon.file.f-m3u:after,
.icon.file.f-wma:after,
.icon.file.f-xls:after,
.icon.file.f-xlsx:after {
	border-bottom-color: #448353;
}

.icon.file.f-doc,
.icon.file.f-docx,
.icon.file.f-psd{
	box-shadow: 1.74em -2.1em 0 0 #03689b inset;
}

.icon.file.f-doc:after,
.icon.file.f-docx:after,
.icon.file.f-psd:after {
	border-bottom-color: #2980b9;
}

.icon.file.f-gif,
.icon.file.f-jpg,
.icon.file.f-jpeg,
.icon.file.f-pdf,
.icon.file.f-png {
	box-shadow: 1.74em -2.1em 0 0 #e15955 inset;
}
.icon.file.f-gif:after,
.icon.file.f-jpg:after,
.icon.file.f-jpeg:after,
.icon.file.f-pdf:after,
.icon.file.f-png:after {
	border-bottom-color: #c6393f;
}

.icon.file.f-deb,
.icon.file.f-dmg,
.icon.file.f-gz,
.icon.file.f-rar,
.icon.file.f-zip,
.icon.file.f-7z {
	box-shadow: 1.74em -2.1em 0 0 #867c75 inset;
}
.icon.file.f-deb:after,
.icon.file.f-dmg:after,
.icon.file.f-gz:after,
.icon.file.f-rar:after,
.icon.file.f-zip:after,
.icon.file.f-7z:after {
	border-bottom-color: #685f58;
}

.icon.file.f-html,
.icon.file.f-rtf,
.icon.file.f-xml,
.icon.file.f-xhtml {
	box-shadow: 1.74em -2.1em 0 0 #a94bb7 inset;
}
.icon.file.f-html:after,
.icon.file.f-rtf:after,
.icon.file.f-xml:after,
.icon.file.f-xhtml:after {
	border-bottom-color: #d65de8;
}

.icon.file.f-js {
	box-shadow: 1.74em -2.1em 0 0 #d0c54d inset;
}
.icon.file.f-js:after {
	border-bottom-color: #a69f4e;
}

.icon.file.f-css,
.icon.file.f-saas,
.icon.file.f-scss {
	box-shadow: 1.74em -2.1em 0 0 #44afa6 inset;
}
.icon.file.f-css:after,
.icon.file.f-saas:after,
.icon.file.f-scss:after {
	border-bottom-color: #30837c;
}


/*----------------------------
	The Demo Footer
-----------------------------*/


footer {

	width: 770px;
	font: normal 16px Arial, Helvetica, sans-serif;
	padding: 15px 35px;
	position: fixed;
	bottom: 0;
	left: 50%;
	margin-left: -420px;

	background-color:#1f1f1f;
	background-image:linear-gradient(to bottom, #1f1f1f, #101010);

	border-radius:2px 2px 0 0;
	box-shadow: 0 -1px 4px rgba(0,0,0,0.4);
	z-index:1;
}

footer a.tz{
	font-weight:normal;
	font-size:16px !important;
	text-decoration:none !important;
	display:block;
	margin-right: 300px;
	text-overflow:ellipsis;
	white-space: nowrap;
	color:#bfbfbf !important;
	z-index:1;
}

footer a.tz:before{
	content: '';
	background: url('http://cdn.tutorialzine.com/misc/enhance/v2_footer_bg.png') no-repeat 0 -53px;
	width: 138px;
	height: 20px;
	display: inline-block;
	position: relative;
	bottom: -3px;
}

footer .close{
	position: absolute;
	cursor: pointer;
	width: 8px;
	height: 8px;
	background: url('http://cdn.tutorialzine.com/misc/enhance/v2_footer_bg.png') no-repeat 0 0px;
	top:10px;
	right:10px;
	z-index: 3;
}

footer #tzine-actions{
	position: absolute;
	top: 8px;
	width: 500px;
	right: 50%;
	margin-right: -650px;
	text-align: right;
	z-index: 2;
}

footer #tzine-actions iframe{
	display: inline-block;
	height: 21px;
	width: 95px;
	position: relative;
	float: left;
	margin-top: 11px;
}

@media (max-width: 1024px) {
	#bsaHolder, footer{ display:none;}
}
    .headernav{
        padding-right: 15px;
    padding-left: 600px;
    margin-right: auto;
    margin-left: auto;
    }
	.button {
  background-color: #F00; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.close_button{
	background-repeat: no-repeat;
    background-image: url(close.png);
    width: 50px;
    height: 50px;
    position: absolute;
    right: 0;
    cursor: pointer;
}
.save_button{
	right: 0;
    position: absolute;
}
.savebutton{
	width:250px;
}
#contains{
	height:150px;
	width:450px;
	border:1px solid black;
	
}
#file{margin-top:20px;
}

</style>
    
</head>
    
    
    
<body>
	<div class="filemanager">
    
		<br><br>
        
	
		<div class="search" action="scan.php">
			<input type="search" placeholder="Find a file..">
		</div>

		<div class="breadcrumbs">
            <a href="files"><span class="folderName">Files</span></a> <span class="arrow">5655/</span> <span class="folderName">Files</span>
        </div>


		<ul class="data animated" style="">   
		 </ul> 

		 <!-- <form method="post" enctype="multipart/form-data">  
                     <label>Please Select Zip File</label>  
                     <input type="file" name="zip_file" />  
                     <br />  
                     <input type="submit" name="btn_zip" class="btn btn-info" value="Upload" />  
                </form>  -->
				<?php  
                if(isset($output))  
                {  
                     echo $output;  
                }  
                ?>  
        </div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileeditor">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="fileeditor">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="filename"></h3>
		<input type="hidden" id="hidden_path"/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="filedisplay">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save()" id="savebutton">Save changes</button>
      </div>
    </div>
  </div>
</div>


	
	<script>

	$( document ).ready(function() {
		$("#viewfile").click(function(e){
			$("#viewdoc").hide();
			$("ul.data").show();
		})
	});

function showsave(flag){
	if (flag){
		$("#savebutton").show();
	}else{
		$("#savebutton").hide();
	}
}
function save(){
	var formData = {
		'content': CKEDITOR.instances.editor1.getData(),
		'filename': $("#hidden_path").val()
	};

	$.ajax({
		url: "save.php",
		type: "post",
		data: formData,
		success: function(d) {
			d = JSON.parse(d);
			if(d.status=='success'){
				$("#filedisplay").html("<h3>document file updated successfully!</h3>");
				showsave();
			}else{
				alert('could not able to update!');
			}
		},error:function(){
			alert('Error');
		}
	});

}

	</script>
</body>
</html>


