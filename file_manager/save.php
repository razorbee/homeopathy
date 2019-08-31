<?php

$content =  (isset($_POST['content']))?$_POST['content']:'';
$filename =  isset($_POST['filename'])?$_POST['filename']:'';



if ($content !='' && $filename !='' ){
    $handle = fopen($filename, "w") or die("Unable to open file!");
    if(fwrite($handle, $content) == FALSE){
        $result_json = array('status' => 'error', 'message' => 'not able to write. Please contact with system engineer!');
        echo json_encode($result_json);
    
    }else{
        $result_json = array('status' => 'success', 'message' => 'updated successfully!');
        echo json_encode($result_json);
    }
    fclose($handle);
    
}else{
    $result_json = array('status' => 'error', 'message' => 'content can not be empty');
    echo json_encode($result_json);
}

?>