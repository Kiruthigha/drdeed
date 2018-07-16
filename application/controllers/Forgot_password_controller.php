<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Forgot_password_controller
	 *	- or -
	 * 		http://example.com/index.php/Forgot_password_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Forgot_password_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Forgot_password_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();	
	}	
	
	/**
	 * This function used to show the forgot password page
	 *
	 * @access public
	 * @since unknown
	 */
	public function forgot_password()
	{		
		log_message('info',"forgot_password function Start here");
		$this->load->view('forgot');			
		log_message('info',"forgot_password function end here");
	} // End of forgot_password function
	
	
	/**
	 * This Function Used For Forgot Password
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function get_forgot_password() 
	{	
		log_message('info',"get_forgot_password function Start here");
		
		// Assign post values in variables
		$ctrl_drd_email = $this->input->post('txtEmailNam');
		$ctrl_drd_mobileno = $this->input->post('txtMobileNoNam');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtEmailNam', '','trim|required|valid_email|max_length[60]',
		array(
			'required' => $this->lang->line('m_90509'),
			'valid_email' => $this->lang->line('m_90507'),
		));					
		
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
			$ctrl_drd_Forgot_pswd_data_validation = array(	 
			    'message'=>'',
                'Email' => form_error('txtEmailNam'),
				'MobileNo' => form_error('txtMobileNoNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_Forgot_pswd_data_validation);

		} // End of If Condition
		else
		{
			log_message('info' ,'form validation fails');		  
		   $ctrl_drd_Forgot_pswd_data_validation_success = array(		      
			    'message'=>'Validation Success',     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_Forgot_pswd_data_validation_success);
		}
		
		//echo json_encode("RUN");
		log_message('info',"get_forgot_password function end here");
		return;
		
	} //End of get_forgot_password function
	
	
	/**
	 * This Function Used To Login The User 
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function user_email_checks() 
	{	
		log_message('info',"user_email_checks function Start here");
		log_message('info',"get_forgot_password function Start here");
		
		// Assign post values in variables
		$ctrl_drd_email = $this->input->post('txtEmailNam');
		$ctrl_drd_mobile = $this->input->post('txtMobileNoNam');
		$ctrl_drd_formSub = $this->input->post('formSubmit');
		// Set validation Rules for form
        $this->form_validation->set_rules('txtEmailNam', '','trim|required|valid_email|max_length[60]',
		array(
			'required' => $this->lang->line('m_90509'),
			'valid_email' => $this->lang->line('m_90507'),
		));	
		
		if($ctrl_drd_mobile)
		{	
			$this->form_validation->set_rules('txtMobileNoNam', '', 'trim|required|min_length[10]|max_length[15]',
			array(
				'required' => $this->lang->line('m_90509'),
				'min_length' => $this->lang->line('m_90505'),
				'max_length' => $this->lang->line('m_90505'),
			));			
		}
		
		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{
			log_message('info' ,'form validation fails');	
			$ctrl_drd_forgt_message = array(	 
			    'message'=>'',
				'message_type'=> $this->lang->line('error'),
                'Email' => form_error('txtEmailNam'),
				'MobileNo' => form_error('txtMobileNoNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_forgt_message);
		}
		else
		{
			log_message('info' ,'form validation Pass');		
			// Assign post values in variables
			
			$ctrl_drd_user_details =  $this->user_object->check_user_details($ctrl_drd_email,"FORGOT");
			log_message('info',"USER Status Details  ".print_r($ctrl_drd_user_details['message'],TRUE));
			if($ctrl_drd_user_details['message'] !="")
			{				
				$ctrl_drd_forgt_message = array(		      
					'message'=>$ctrl_drd_user_details['message'],    
					'message_type'=> $this->lang->line('error'),
				);			
				// Return the JSON value to ajax
				echo json_encode($ctrl_drd_forgt_message);
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
				if($ctrl_drd_mobile)
				{
					log_message('info' ,'Inside Student and mobileno exists');	
					if($ctrl_drd_mobile == $ctrl_drd_user_mobile)
					{
						log_message('info' ,'User Mobile# Match');	
						$ctrl_email_data  = array(
							"User_Email" => $ctrl_drd_user_email,
							"User_FName" => $ctrl_drd_first_name,
							"User_LName" => $ctrl_drd_last_name,
							"User_Id" => $ctrl_drd_user_id,
						);
						$this->_send_email($ctrl_email_data);	
						
					} 
					else
					{
						log_message('info' ,'User Mobile# Does not Match');	
						$ctrl_drd_forgt_message = array(		      
							'message'=>$this->lang->line('m_90816'),    
							'message_type'=> $this->lang->line('error'),
						);			
						// Return the JSON value to ajax
						echo json_encode($ctrl_drd_forgt_message);
						return;
					}
					
				}
				else
				{
					log_message('info' ,'Inside Student and mobile# not exists');
					if($ctrl_drd_user_type != "STUDENT") 
					{	
						if(!$ctrl_drd_formSub)
						{
							log_message('info' ,'Inside User Type Student'.$ctrl_drd_user_type);
							$ctrl_email_data  = array(
							"User_Email" => $ctrl_drd_user_email,
							"User_FName" => $ctrl_drd_first_name,
							"User_LName" => $ctrl_drd_last_name,
							"User_Id" => $ctrl_drd_user_id,
							);
							$this->_send_email($ctrl_email_data);
						}	
						else
						{
							log_message('info' ,'Forgot Form Button Submit Button');
						}
						
					}
					else
					{
						log_message('info' ,'Inside Admin/Aduit/Assisant User');	
						$ctrl_drd_forgt_message = array(		      
							'message'=>'',    
							'message_type'=> $this->lang->line('success'),
							'user_id'=> $ctrl_drd_user_id,
							'user_type'=> $ctrl_drd_user_type,
						);			
						// Return the JSON value to ajax
						echo json_encode($ctrl_drd_forgt_message);
						return;						
					}
				}
				
			}	
		}
		//echo json_encode("RUN");
		log_message('info',"user_email_checks function end here");
		
	} //End of login_user function	
	
	/**
	 * This Function Used To Email to User 
	 *
	 * @access private
	 * @since unknown
	 */ 
	public function _send_email($msg_data)
	{
		log_message('info' ,'_send_email function start');   
		$ctrl_drd_to = $msg_data['User_Email'];		
		$email_encript =  $this->encrypt->encode($ctrl_drd_to);
		//$email_encode =  $this->common_functions->url_encode($email_encript);
		$user_id  =  $msg_data['User_Id'];
		$date  =  date('Y-m-d H:i:s');
		$encript_date  =  $this->encrypt->encode($date);
		
		log_message('info','Encode Url '.$email_encript);
		/* $ctrl_drd_subject='Please Verify Your Email Address.';
		
		$ctrl_drd_message='Dear '.$msg_data['User_FName']."  ". $msg_data['User_LName'].' ,
			<br>
			<p>You are receiving this email because a request was received by our system to help you reset your password.</p>
			<p>Please click on the link below to reset your password.  You can also copy and paste the link into your browser in case the URL below is not clickable.</p>			
			<p> <a href='  . site_url() . '/resetpassword'.'/'.$email_encript.'/'.$user_id.'/'.$encript_date.'>'  . site_url() . '/resetpassword'.'/'.$email_encript.'/'.$user_id .'/'.$encript_date.'</a> </p>
			<p> If this was not initiated by you, please ignore this message.</p>
			 <br>
			<p>Regards,</p>
			<p>CBP CE Staff </p>'; */
		$ctrl_drd_subject = $this->lang->line('forgot_password_sub');
		$ctrl_drd_message  = $this->lang->line('forgot_password');
			
		$replace_array = array(
			'<FIRST_NAME>' => $msg_data['User_FName'],
			'<LAST_NAME>' => $msg_data['User_LName'],
			'<ENCRYPT_EMAIL>' => $email_encript,
			'<USER_ID>' => $user_id,
			'<ENCRYPT_DATE>' => $encript_date,
		); 
			
		$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_message);log_message('info','Email Content '.$ctrl_drd_replace_message); 			

		$sendmail = $this->sendmail->send_email_fun($ctrl_drd_to, $ctrl_drd_subject, $ctrl_drd_replace_message); 
        log_message('info' ,'_send_Email function send_email');  
		if($sendmail)
		{			
			log_message('info', ' Email Success !!');
			$ctrl_drd_forgt_message = array(		      
				'message'=>$this->lang->line('m_90820'),    
				'message_type'=> $this->lang->line('success'),
			);			
			// Return the JSON value to ajax
			echo json_encode($ctrl_drd_forgt_message);
			return;		 
		}
		else
		{
			log_message('info', ' Email Failed !!');
			$ctrl_drd_forgt_message= array(
           'message' => $this->lang->line('m_90520'),
		   'message_type'=>$this->lang->line('warning'),
		   );			 
		    echo json_encode($ctrl_drd_forgt_message);
			return;
		}
				
	} // End of send_email function
	
	
} // End of Class