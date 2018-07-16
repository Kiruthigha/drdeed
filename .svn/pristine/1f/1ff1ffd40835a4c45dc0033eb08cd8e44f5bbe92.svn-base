<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends CI_Loader {

	public function uploadfile($file_path,$filename,$file_type) 
	{
		log_message('info','Lib FIle Path '.$file_path);
		log_message('info','Lib FIle Name '.$filename);
		$CI = get_instance();
		$config['upload_path']           = $file_path;
		$config['allowed_types']         = $file_type;
		$config['file_name']             = $filename;
		$config['remove_spaces']         = FALSE ;
		$config['convert_dots']          = FALSE ;
		$CI->load->library('upload', $config);		
		return $CI;
	}

}
?>
