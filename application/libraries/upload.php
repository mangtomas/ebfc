<?php

class upload{

	public function image($name,$destination){
		$new_file = $_FILES[$name];
		$filename = $new_file['name'];
		$filename = str_replace(' ', '_', $filename);	
		$file_tmp = $new_file['tmp_name'];
		$ext = strtolower(strrchr($filename,'.'));
		$new_filename = '';
		$unique_id = $name."_".time();
		if ($filename != ""){
			$new_filename = $unique_id.$ext;
			$result = (move_uploaded_file($file_tmp,$destination.$new_filename)) ? $new_filename : false;
		
		}
		return $result; 
	}



}