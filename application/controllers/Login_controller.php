<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Login_controller
	 *	- or -
	 * 		http://example.com/index.php/Login_controller/index
	 *	- or -
	 * Since this controller is set as the Login_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Login_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $current_Date = null; // To Assign Public variable
	public $fail_count = null; // To Assign Public variable
	public function __construct() 
	{
		parent::__construct();
		$this->current_Date = date("Y-m-d H:i:s"); // Set Date Format
	}	
	
	/**
	 * This function used to show the Login page
	 *
	 * @access public
	 * @since unknown
	 */
	public function login() 
	{
		$this->load->view('login');			
	} // End of login function
	
	/**
	 * This function used to destroy all Session values
	 *
	 * @access public
	 * @since unknown
	 */
	function logout()
	{		
		log_message('info' ,'logout Function Start.');
		$this->session->sess_destroy();
		log_message('info' ,'logout Function End.');
		redirect(site_url().'/login');
	}//End of logout function
	
	/**
	 * This Function Used To Login The User 
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function login_user() 
	{	
		log_message('info',"login_user function Start here");
		
		// Assign post values in variables
		$ctrl_drd_email = $this->input->post('txtEmailNam');
		$ctrl_drd_password = $this->input->post('pwdPasswordNam');
		$ctrl_drd_failcount = $this->input->post('txtFailCountNam');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtEmailNam', '','trim|required|valid_email|max_length[60]',
		array(
			'required' => $this->lang->line('m_90509'),
			'valid_email' => $this->lang->line('m_90507'),
		));	
		
		$this->form_validation->set_rules('pwdPasswordNam', '','trim|required',
		array(
			'required' => $this->lang->line('m_90509')));	

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_login_validation = array(		      
			    'message'=>'',
                'Email' => form_error('txtEmailNam'),
				'Password' => form_error('pwdPasswordNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_login_validation);

		} // End of If Condition
		else
		{			
			log_message('info' ,'form validation Pass');
			$ctrl_drd_user_details =  $this->user_object->check_user_details($ctrl_drd_email);
			log_message('info',"USER Status Details  ".print_r($ctrl_drd_user_details['message'],TRUE));		
			
			$ctrl_drd_user_id = $ctrl_drd_user_details['data']['ID'];
			$ctrl_drd_user_email =  $ctrl_drd_user_details['data']['EMAIL_ID'];
			$ctrl_drd_user_type =  $ctrl_drd_user_details['data']['USER_TYPE_VALUE'];
			$ctrl_drd_user_status =  $ctrl_drd_user_details['data']['USER_STATUS_VALUE'];
			$ctrl_drd_user_logincount =  $ctrl_drd_user_details['data']['TOTAL_LOGIN_COUNT'];
			$ctrl_drd_user_password = $ctrl_drd_user_details['data']['PASSWORD'];
			$login_array = ['STUDENT','AUDITOR'];
				
			if($ctrl_drd_user_details['message'] !="")
			{	
				log_message('info' ,"Fail Count  ".$ctrl_drd_failcount);
				log_message('info' ,"Login  User Is Student ".$ctrl_drd_user_type); // For Log Message	
				if((($ctrl_drd_failcount > 5) OR ($ctrl_drd_failcount == 5)) && (($ctrl_drd_user_type =='STUDENT') OR($ctrl_drd_user_type =="")))
				{
					
					$ctrl_drd_login_message = array(		      
						'message'=>'Go To ForgotPassword',    
						'message_type'=> $this->lang->line('success'),
						'page'=> 'ForgotPassword',
					);			
					// Return the JSON value to ajax
					echo json_encode($ctrl_drd_login_message);
					return;
				}
				else
				{	//$this->fail_count = $ctrl_drd_failcount+1;
					log_message('info','Message  Empty'.$ctrl_drd_failcount+1);
					$ctrl_drd_login_message = array(		      
						'message'=>$ctrl_drd_user_details['message'],    
						'message_type'=> $this->lang->line('error'),
						'failcount'=> $ctrl_drd_failcount+1,
					);			
					// Return the JSON value to ajax
					echo json_encode($ctrl_drd_login_message);
					return;
				}
			}
			else
			{
				if (password_verify($ctrl_drd_password, $ctrl_drd_user_password))
				{
					log_message('info' ,"Password is correct"); // For Log Message	
						if((($ctrl_drd_failcount > 5) OR ($ctrl_drd_failcount == 5)) && (($ctrl_drd_user_type =='STUDENT') OR($ctrl_drd_user_type =="")))
						{
							log_message('info' ,"Login  User Is Student ".$ctrl_drd_user_type); // For Log Message	
							$ctrl_drd_login_message = array(		      
								'message'=>'Go To ForgotPassword',    
								'message_type'=> $this->lang->line('success'),
								'page'=> 'ForgotPassword',
							);			
							// Return the JSON value to ajax
							echo json_encode($ctrl_drd_login_message);
							return;
						}
						else
						{
							//Set Session Values
							$this->session->set_userdata(array(
								'drd_userId'  => $ctrl_drd_user_id,
								'drd_userEmail' => $ctrl_drd_user_email,
								'drd_userType'  => $ctrl_drd_user_type,
								'drd_userStatus'  => $ctrl_drd_user_status
							));			
							log_message('info' ,'Session Email '.$this->session->userdata('drd_userEmail'));							
							/* Assign Values To Column for Update Data into User Profile Table */
							$ctr_drd_upt_last_login = array(
								'TOTAL_LOGIN_COUNT' => $ctrl_drd_user_logincount+1,
								'LAST_SUCCESS_LOGIN_DATE' => $this->current_Date,
								'LAST_LOGIN_IP' => $_SERVER['REMOTE_ADDR'],
								'UPDATE_BY' => $ctrl_drd_user_email,
								'UPDATE_DATE' => $this->current_Date
							) ;
							$whereArray = array('EMAIL_ID' => $ctrl_drd_user_email);
							
							/* Pass the Values To User Profile Model for Update Data into Table */
							$ctr_drd_login_Update = $this->User->update($ctr_drd_upt_last_login, $whereArray);	
								if($ctr_drd_login_Update)
								{
									log_message('info' ,'Last Success Login Update Success ');
								}
								else
								{
									log_message('info' ,'Last Success Login Update Failed ');
								}
							if(in_array($ctrl_drd_user_type,$login_array))
							{
								$ctrl_drd_login_message = array(		      
									'message'=>'Go To UserDashboard',    
									'message_type'=> $this->lang->line('success'),
									'page'=> 'UserDashboard',
								);			
								// Return the JSON value to ajax
								echo json_encode($ctrl_drd_login_message);
								return;
							}
							else if($ctrl_drd_user_type == 'ADMIN')
							{
								$ctrl_drd_login_message = array(		      
									'message'=>'Go To AdminDashboard',    
									'message_type'=> $this->lang->line('success'),
									'page'=> 'AdminDashboard',
								);			
								// Return the JSON value to ajax
								echo json_encode($ctrl_drd_login_message);
								return;
							}
							else
							{
								$ctrl_drd_login_message = array(		      
									'message'=>'Go To Certificate',    
									'message_type'=> $this->lang->line('success'),
									'page'=> 'Certificate',
								);			
								// Return the JSON value to ajax
								echo json_encode($ctrl_drd_login_message);
								return;
							}
						}
					} 
					else
					{
						log_message('info' ,"Password is worng"); // For Log Message
						$ctr_drd_upt_last_login = array( 	
							'LAST_FAILED_LOGIN_DATE' => $this->current_Date
						);
						$ctr_drd_login_Update = $this->User->update($ctr_drd_upt_last_login, array('EMAIL_ID'=>$ctrl_drd_email));
						if($ctr_drd_login_Update)
						{
							log_message('info' ,'Last Failed Login Update Success ');
						}
						else
						{
							log_message('info' ,'Last Failed Login Update Failed ');
						}
						if((($ctrl_drd_failcount > 5) OR ($ctrl_drd_failcount == 5)) && $ctrl_drd_user_type=='STUDENT')
						{
							$ctrl_drd_login_message = array(		      
								'message'=>'Go To ForgotPassword',    
								'message_type'=> $this->lang->line('success'),
								'page'=> 'ForgotPassword',
							);	
							echo json_encode($ctrl_drd_login_message);
							return;
						}
						else
						{
							//$this->fail_count = $this->fail_count+1;
							log_message('info',$ctrl_drd_failcount+1);
							$ctrl_drd_login_message = array(		      
								'message'=>$this->lang->line('m_90811'),    
								'message_type'=> $this->lang->line('error'),
								'failcount'=> $ctrl_drd_failcount+1
							);			
							// Return the JSON value to ajax
							echo json_encode($ctrl_drd_login_message);
							return;	
						}
							
					}
				}
			}
		
		//echo json_encode("RUN");
		log_message('info',"login_user function end here");
		return;
		
	} //End of login_user function	
	
} // End of Class
?>