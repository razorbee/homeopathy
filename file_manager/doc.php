<?php
error_reporting(E_ERROR | E_PARSE);
$path = $_POST['path'];

function kv_read_word($input_file){	
	 $kv_strip_texts = ''; 
         $kv_texts = ''; 	
	if(!$input_file || !file_exists($input_file)) return false;
		
	$zip = zip_open($input_file);
		
	if (!$zip || is_numeric($zip)) return false;
	
	
	while ($zip_entry = zip_read($zip)) {
			
		if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			
		if (zip_entry_name($zip_entry) != "word/document.xml") continue;

		$kv_texts .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			
		zip_entry_close($zip_entry);
	}
	
	zip_close($zip);
		

	$kv_texts = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $kv_texts);
	$kv_texts = str_replace('</w:r></w:p>', "\r\n", $kv_texts);
	$kv_strip_texts = nl2br(strip_tags($kv_texts,’‘));

	return $kv_strip_texts;
}


$kv_texts = kv_read_word($path);

if($kv_texts !== false) {		
	$kv_texts =  nl2br($kv_texts);	
}
else {
	$kv_texts = 'error!';
}

echo $kv_texts;
?>

