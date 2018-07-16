<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail extends CI_Loader
{
 
  public function __construct()
	        {	            
				
			 // $this->load->library('email'); // load the library
             // parent::__construct();
	        }  


 public function send_email_fun($to, $subject, $body,$email_count=null)

 {  // parent::__construct();
 log_message('info', 'Comming Email Function = '.$to); 
 
  // Email configuration  

	$CI = get_instance();
	$from = $CI->lang->line('msg_fromemail');
	$fromName = $CI->lang->line('msg_fromname');
	if(!$email_count)
	{
	$CI->load->library('email');
	}
	$CI->email->set_newline("\r\n");
	//$CI->email->initialize($config);
	log_message('info', 'Email Initialize'); 
	//$CI->email->set_newline("\r\n");

   log_message('info', 'Email Send New Line'); 
   $CI->email->from($from, $fromName);
   $CI->email->to($to);
   // $CI->email->cc($ToCCEmail);
   $CI->email->subject($subject);
   $CI->email->message($body);
   
   
  // $data['message'] = "Sorry Unable to send email..."; 
   if($CI->email->send()){ 
	log_message('info', 'Email Send Sucess');    
    //$data['message'] = "Mail sent...";   
   return true;
   } 
 
 }
 
}
?>