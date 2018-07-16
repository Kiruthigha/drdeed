<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_email_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Forgot_email_controller
	 *	- or -
	 * 		http://example.com/index.php/Forgot_email_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Forgot_email_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Forgot_email_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct() 
	{
		parent::__construct();	
	}		
	
	/**
	 * This function used to show the forgot email page
	 *
	 * @access public
	 * @since unknown
	 */
	public function forgot_email() 
	{		
		log_message('info',"get_forgot_email function Start here");
		$this->load->view('forgotemail');		
		log_message('info',"get_forgot_email function end here");
	} // End of forgotEmail Function
		
	/**
	 * This Function Used For Forgot Email
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function get_forgot_email() 
	{	
		log_message('info',"get_forgot_email function Start here");
		
		// Assign post values in variables
		$ctrl_drd_mobileno = $this->input->post('txtMobileNoNam');
		$ctrl_drd_dob = $this->input->post('txtDobNam');
		
		// Get the Date of Birth value and change the format 
		log_message('info','Current DOB '.$ctrl_drd_dob);
/* 		$ctrl_drd_dobreplace = str_replace('/', '-', $ctrl_drd_dob);
		$ctrl_drd_dobconvert= date('Y-m-d', strtotime($ctrl_drd_dobreplace)); */
		$ctrl_drd_dobconvert= $this->common_functions->date_db_format($ctrl_drd_dob); 
		log_message('info','Convert DOB format '.$ctrl_drd_dobconvert);
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtDobNam', '','trim|required',
		array(
			'required' => $this->lang->line('m_90509')));					
		
		$this->form_validation->set_rules('txtMobileNoNam', '', 'trim|required|min_length[10]|max_length[20]',
		array(
			'required' => $this->lang->line('m_90509'),
			'min_length' => $this->lang->line('m_90505'),
			'max_length' => $this->lang->line('m_90505'),
			));	

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_forgot_email_data = array(		      
			    'message'=>'',
                'DOB' => form_error('txtDobNam'),
				'MobileNo' => form_error('txtMobileNoNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_forgot_email_data);
			return;

		} // End of If Condition
		else
		{
			log_message('info' ,'form validation Pass');		
			// Assign post values in variables
			
			$ctrl_drd_user_details =  $this->user_object->check_user_details($ctrl_drd_email,"FORGOT",$ctrl_drd_mobileno,$ctrl_drd_dobconvert);
			log_message('info',"USER Status Details  ".print_r($ctrl_drd_user_details['message'],TRUE));
			if($ctrl_drd_user_details['message'] !="")
			{				
				$ctrl_drd_forgot_email_data = array(		      
					'message'=>$ctrl_drd_user_details['message'],    
					'message_type'=> $this->lang->line('error'),
				);			
				// Return the JSON value to ajax
				echo json_encode($ctrl_drd_forgot_email_data);
				return;
			}
			else
			{
				$ctrl_drd_user_id = $ctrl_drd_user_details['data']['USER_ID'];
				$ctrl_drd_user_email =  $ctrl_drd_user_details['data']['EMAIL_ID'];
				$ctrl_drd_user_type =  $ctrl_drd_user_details['data']['USER_TYPE_VALUE_NAME'];
				$ctrl_drd_user_mobile =  $ctrl_drd_user_details['data']['MOBILE_NUM'];
				$ctrl_drd_first_name =  $ctrl_drd_user_details['data']['FIRST_NAME'];
				$ctrl_drd_last_name =  $ctrl_drd_user_details['data']['LAST_NAME'];
				
				//$ctrl_drd_sms_content = "Your Email id -  $ctrl_drd_user_email Please login after some time."
				$ctrl_drd_sms_content = $this->lang->line('forgot_email');
				$replace_array = array(
					'<EMAIL_ID>' => $ctrl_drd_user_email,
				); 
			
				$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_sms_content);
				log_message('info','SMS Content '.$ctrl_drd_replace_message); 	

				log_message('info' ,'Inside Student and mobileno exists');	
				if($ctrl_drd_user_type == "STUDENT")
				{
					log_message('info' ,'Inside Student Register type');	
					$ctrl_drd_sms_send = $this->sendsms->send_sms_message($ctrl_drd_user_mobile,$ctrl_drd_replace_message);
					
					log_message('info' ,'Mobile Response'.print_r(json_decode($ctrl_drd_sms_send->status),TRUE));
					$mod_adminuser_list = new stdClass();
					$mod_adminuser_list = $ctrl_drd_sms_send;
					$Arr = $this->object_to_array($ctrl_drd_sms_send);
					log_message('info' ,'Mobile Response mod_adminuser_list'.print_r($Arr['status'],TRUE));
					
					if($ctrl_drd_sms_send)
					{
						log_message('info' ,'Sms Send to registerd mobile number.');	
						$ctrl_drd_forgot_email_data = array(		      
							'message'=>$this->lang->line('m_90818'),    
							'message_type'=> $this->lang->line('success'),
						);			
						// Return the JSON value to ajax
						echo json_encode($ctrl_drd_forgot_email_data);
						return;	
					}
					else
					{
						log_message('info' ,'Sms not send.');
						$ctrl_drd_forgot_email_data = array(		      
						'message'=>$this->lang->line('m_90524'),  
						'message_type'=> $this->lang->line('warning'),
						);			
						// Return the JSON value to ajax
						echo json_encode($ctrl_drd_forgot_email_data);
						return;
					}					
				} 
				else
				{
					log_message('info' ,'User Mobile# Does not Match');	
					$ctrl_drd_forgot_email_data = array(		      
						'message'=>$this->lang->line('m_90816'),    
						'message_type'=> $this->lang->line('error'),
					);			
					// Return the JSON value to ajax
					echo json_encode($ctrl_drd_forgot_email_data);
					return;
				}
			}
		}
		//echo json_encode("RUN");
		log_message('info',"get_forgot_email function end here");
		
	} //End of get_forgot_email function
	
	function object_to_array($data)
{
    if (is_array($data) || is_object($data))
    {
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}

}// End of Class