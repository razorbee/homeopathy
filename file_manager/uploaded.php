<?php  
 if(isset($_POST["btn_zip"]))  
 {  
      $output = '';  
      if($_FILES['zip_file']['name'] != '')  
      {  
           $file_name = $_FILES['zip_file']['name'];  
           $array = explode(".", $file_name);  
           $name = $array[0];  
           $ext = $array[1];  
           if($ext == 'zip')  
           {  
                $path = 'files/';  
                $location = $path . $file_name;  
                if(move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))  
                {  
                     $zip = new ZipArchive;  
                     if($zip->open($location))  
                     {  
                          $zip->extractTo($path);  
                          $zip->close();  
                     }  
                     $files = scandir($path . $name);  
                     //$name is extract folder from zip file  
                     foreach($files as $file)  
                     {  
						$file_name_array = explode(".", $file);  
						$file_ext=strtolower(end($file_name_array));

                        //   $file_ext = end(explode(".", $file));  
                          $allowed_ext = array('jpg', 'png','html','docx','jpeg','pdf');  
                          if(in_array($file_ext, $allowed_ext))  
                          {  
                               $new_name = $file;
                               $output .= '<div class="col-md-6"><div style="padding:16px; border:1px solid #CCC;"><img src="upload/'.$new_name.'" width="170" height="240" /></div></div>';  
                               copy($path.$name.'/'.$file, $path . $new_name);  
                               unlink($path.$name.'/'.$file);  
                          }       
                     }  
                     unlink($location);  
                     rmdir($path . $name);  
                }  
           }  
      }  
 }  
 ?> 
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
  <script src="/homeopathy/dashboard/plugins/notifyjs/js/notify.js"></script>
  <script src="/homeopathy/dashboard/plugins/notifications/notify-metro.js"></script>

   
    <script src="js/script.js"></script>
</head>
<style>
    .status{
        font-size:25px;
        color:green;
    }
    .error{
        font-size:25px;
        color:red;
    }
    .loader  {
    animation: rotate 1s infinite;  
    height: 50px;
    width: 50px;
    left: 700px!important;
    top: 400px!important;
    margin-left: 50%;
    /* margin-top: 20%; */
}
    /* position:absolute; */
    /* left:700px!important;
    top:400px!important; */
  }
  #loader  {
 
     position:absolute; 
  }
  .loader:before,
  .loader:after {   
    border-radius: 50%;
    content: '';
    display: block;
    height: 20px;  
    width: 20px;
  }
  .loader:before {
    animation: ball1 1s infinite;  
    background-color: #cb2025;
    box-shadow: 30px 0 0 #f8b334;
    margin-bottom: 10px;
  }
  .loader:after {
    animation: ball2 1s infinite; 
    background-color: #00a096;
    box-shadow: 30px 0 0 #97bf0d;
  }
  
  @keyframes rotate {
    0% { 
      -webkit-transform: rotate(0deg) scale(0.8); 
      -moz-transform: rotate(0deg) scale(0.8);
    }
    50% { 
      -webkit-transform: rotate(360deg) scale(1.2); 
      -moz-transform: rotate(360deg) scale(1.2);
    }
    100% { 
      -webkit-transform: rotate(720deg) scale(0.8); 
      -moz-transform: rotate(720deg) scale(0.8);
    }
  }
  
  @keyframes ball1 {
    0% {
      box-shadow: 30px 0 0 #f8b334;
    }
    50% {
      box-shadow: 0 0 0 #f8b334;
      margin-bottom: 0;
      -webkit-transform: translate(15px,15px);
      -moz-transform: translate(15px, 15px);
    }
    100% {
      box-shadow: 30px 0 0 #f8b334;
      margin-bottom: 10px;
    }
  }
  
  @keyframes ball2 {
    0% {
      box-shadow: 30px 0 0 #97bf0d;
    }
    50% {
      box-shadow: 0 0 0 #97bf0d;
      margin-top: -20px;
      -webkit-transform: translate(15px,15px);
      -moz-transform: translate(15px, 15px);
    }
    100% {
      box-shadow: 30px 0 0 #97bf0d;
      margin-top: 0;
    }
  }
    </style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
    <ul class="data animated" style="">   
		 </ul> 

		 <form method="post" id="fileupload" enctype="multipart/form-data">  
                     <label>Please Select Zip File</label>  
                     <input type="file" name="zip_file" />  
                     <br />  
                     <input type="submit" name="btn_zip" class="btn btn-info" value="Upload" />  
                </form> 
                <div  style="display:none;    width: 100%;
    height: 800px;
    background: #000;
    margin-top:100px;
    opacity: 0.3;padding-top: 20%;" id="loader">

    <div class="loader" ></div>
</div>
				<?php  
                if(isset($output))  
                {  
                    //  echo $output;  
                     // echo "<script type='text/javascript'>alert(\"uploaded successfully\");</script>";
                    //  $result_json = array('File updated successfully!');
                    //  $str = json_encode($result_json);
                    //  $try = trim(trim(trim(trim($str,"["),'"'),']'),'"');
                     echo '<div class="status">File uploaded successfully</div>';
                }  
                else{
                  // echo '<div class="error">upload the zip file</div>';
                }
                ?>  
                </div>
            </div>
            </div>
                </body>
                <script>
                    function showLoader(){
    if ($('#loader') &&  $('#loader').length >0){
        $("#loader").show();
       setTimeout(() => {
        $("#loader").hide();
       }, 10000); 
    }
}
function hideLoader(){
    if ($('#loader') &&  $('#loader').length >0){
        $("#loader").hide();
    }
}
                    </script>
                </html>