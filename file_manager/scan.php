<?php
header('Content-type: application/json');

echo file_get_contents('file.json');
exit();

$dir = "files";

// Run the recursive function 

$response = scan($dir);


// This function scans the files folder recursively, and builds a large array

function scan($dir){

	$files = array();

	// Is there actually such a folder/file?

	if(file_exists($dir)){
	
		foreach(scandir($dir) as $f) {
		
			if(!$f || $f[0] == '.') {
				continue; // Ignore hidden files
			}

			if(is_dir($dir . '/' . $f)) {

				// The path is a folder

				$files[] = array(
					"name" => $f,
					"type" => "folder",
					"path" => $dir . '/' . $f,
					"items" => scan($dir . '/' . $f) // Recursively get the contents of the folder
				);
			}
			
			else {

				// It is a file
				$path_info = pathinfo($f);
				//if ($path_info  && $path_info.extension )
				$ext =  $path_info['extension'];
				if($ext =='html'||$ext =='jpg' || $ext ==='png' || $ext == 'pdf'){
					$text = ($ext =='html') ?'doc':'image';
					$files[] = array(
						"name" => $f,
						"type" => "file",
						"text" => $text,
						"path" => $dir . '/' . $f,
						"size" => filesize($dir . '/' . $f) // Gets the size of this file
					);
				}
			}
		}
	
	}

	return $files;
}



// Output the directory listing as JSON

header('Content-type: application/json');

$data =  json_encode(array(
	"name" => "files",
	"type" => "folder",
	"path" => $dir,
	"items" => $response
));

echo $data;




