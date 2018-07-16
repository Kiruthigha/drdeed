<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_functions
{
	public function __construct() {        
		//parent::__construct();
	}
	 	
	/* This function call from password regex validation */
	public function _checkPasswordRegex($fieldValue) {
		log_message('info' ,'Password check validation start'); // For Log Message	
		if (preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6}$/', $fieldValue ) ) {
			log_message('info' ,'Password Pattern Pass');
			return TRUE;
		} else {
			log_message('info' ,'Password pattern fail');
			return FALSE;
		}
		log_message('info' ,'Password check validation End '); // For Log Message	
	}
	
	/**
	* Replace string to array values
	 * @access public
	 * @since unknown
	 */
	
	public function str_replace_assoc(array $replace, $subject)
	{
		return str_replace(array_keys($replace), array_values($replace), $subject);   
	} 
	
	/**
	* To  Use display date_display_format (M dd, yy)
	 * @access public
	 * @since unknown
	 */	
	public function date_display_format($date)
	{
		//$replace_date = str_replace('/', '-', $date);
		$convert_date= date('M d, Y', strtotime($date));
		return $convert_date;
	} 
	
	/**
	* To Use convert date format (Y-m-d)
	 * @access public
	 * @since unknown
	 */	
	public function date_db_format($date)
	{
		$replace_date = str_replace('/', '-', $date);
		$convert_date= date('Y-m-d', strtotime($replace_date));
		return $convert_date;
	} 
	
	/**
	* To Use file_name_replace method remove special keys in file name
	 * @access public
	 * @since unknown
	 */
	
	public function file_name_replace($filename)
	{
		$filenamenew = substr($filename, 0, strrpos($filename, '.'));
		$ext = substr($filename, strrpos($filename, '.') + 1);
		log_message('info','get extension '.$filenamenew);
		//$file = preg_replace("/[^-_a-z0-9]+/i", "_", $filenamenew);
		$file = preg_replace('/[^A-Za-z0-9-\-]/', '',$filenamenew);
		$file_Name = strtolower($file. '.' . $ext);
		return $file_Name;
	}

	/* this function will get the 1st 100 words
	*Added By Rajee on june 22 2018
	*
	*/	 
	function word_teaser($string, $count)
	{
		$original_string = $string;
		$words = explode(' ', $original_string);
	 
		if (count($words) > $count)
		{
			$words = array_slice($words, 0, $count);
			$string = implode(' ', $words);
		}
		return $string;
	}
	
	/* this function will get the 1st remaining words after 100 
	*Added By Rajee on june 22 2018
	*
	*/	
	function word_teaser_end($string, $count)
	{
		$words = explode(' ', $string);
		$words = array_slice($words, $count);
		$string = implode(' ', $words);
		return $string;
	} 
}
?>