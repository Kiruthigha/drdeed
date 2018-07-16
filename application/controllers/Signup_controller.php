<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Signup_controller
	 *	- or -
	 * 		http://example.com/index.php/Signup_controller/index
	 *	- or -
	 * Since this controller is set as the Signup_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Signup_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $current_Date = null; // To Assign Public variable
	
	public function __construct()
	{	            
		parent::__construct();
		$this->current_Date = date("Y-m-d H:i:s"); // Set Date Format
	}			
       
	/**
	 * This function used to show the user signup page
	 *
	 * @access public
	 * @since unknown
	 */
	public function signup()		
	{	
	$crtl_drd_data['ip_address'] =$_SERVER['REMOTE_ADDR'];
	log_message('info',$_SERVER['REMOTE_ADDR']);
	
	/* Get State list from state master table  */
	$crtl_drd_data['state'] = $this->StateMaster->listAll('STATE_NAME');
	
	/* Get State list from state master table  */
	$crtl_drd_data['stateName'] = $this->StateMaster->listAll('STATE_NAME');
	
	/* Get country list from country master table  
	$crtl_drd_data['country'] = $this->CountryMaster->listAll('COUNTRY_NAME');*/
	
	/* Get T&C from ContentMaster table  */
	$ctrl_drd_content_fun_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','REGISTER');

	$crtl_drd_content_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_content_fun_id);
	$crtl_drd_data['content'] = $crtl_drd_content_data['CONTENT'];
	
	log_message('info',print_r($crtl_drd_data['content'],TRUE));
	$this->load->view('signup',$crtl_drd_data);
	}// Enf of signup Function
	
	/**
	 * this Function is used to insert data on user,student profile and user license table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_signup_data() 
	{
		log_message('info' ,'add_signup_data function start');
		set_time_limit(3600);
		
		/* Store Post Values In variables */
		   
		$ctrl_drd_first_name  = $this->input->post('txtFirstNam');
		$ctrl_drd_last_name  = $this->input->post('txtLastNam');
		$ctrl_drd_emailid  = strtolower($this->input->post('txtEmailNam'));
		$ctrl_drd_password  = $this->input->post('txtPwdNam');
		$ctrl_drd_mobile_no  = $this->input->post('txtCellNumNam');
		$ctrl_drd_dob  = $this->input->post('txtDobNam');
		$ctrl_drd_practice_name  = $this->input->post('txtPracticeNam');
		$ctrl_drd_country_id  = $this->input->post('selCountryNam');
		$ctrl_drd_state_id  = $this->input->post('selStateNam');
		$ctrl_drd_city_name  = $this->input->post('txtCityNam');
		$ctrl_drd_street_address  = $this->input->post('txtStAddrNam');
		$ctrl_drd_postal_code  = $this->input->post('txtZipNam');
		$ctrl_drd_cer_infn  = $this->input->post('chkAgreeNam');
		$ctrl_drd_system_IP  = $this->input->post('txtIpAddrNam');
		//$ctrl_drd_system_IP  = '192.168.1.78';
		
		$ctrl_drd_license_state = $this->input->post('selLicenseStateNam'); 
		$ctrl_drd_license =$this->input->post('txtLicenseNam'); 
		
		// Encrypt The Random Password Generate
		
		//log_message('info','Current Password '.$ctrl_drd_password);
		$ctrl_drd_encryptpassword =  password_hash($ctrl_drd_password, PASSWORD_BCRYPT) ;
		//log_message('info','Encript Password '.$ctrl_drd_encryptpassword);
		
		// Get the Date of Birth value and change the format 
		log_message('info','Current DOB '.$ctrl_drd_dob);
		/* $ctrl_drd_dobreplace = str_replace('/', '-', $ctrl_drd_dob);
		$ctrl_drd_dobconvert= date('Y-m-d', strtotime($ctrl_drd_dobreplace)); */
		$ctrl_drd_dobconvert=$this->common_functions->date_db_format($ctrl_drd_dob);
		log_message('info','Convert DOB format '.$ctrl_drd_dobconvert);
			   
		/* Form Validation Start */
		$this->form_validation->set_rules('txtFirstNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		log_message('info' ,'txtFirstNam');
		$this->form_validation->set_rules('txtLastNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),		
		));

		$this->form_validation->set_rules('txtPracticeNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
				
		$this->form_validation->set_rules('txtStAddrNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtCityNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('selStateNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtZipNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('selCountryNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtDobNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEmailNam', '', 'trim|required|valid_email|is_unique[users.EMAIL_ID]',
		array(
		'required' => $this->lang->line('m_90509'),
		'valid_email' => $this->lang->line('m_90507'),
		'is_unique' => $this->lang->line('m_90009'),
		));
		
		$this->form_validation->set_rules('txtPwdNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtCellNumNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('chkAgreeNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE)
		{
			log_message('info' ,'form validation fails');
		    $ctrl_drd_add_signup_data = array(
                'message' => "",
                'FirstName' => form_error('txtFirstNam'),
                'LastName' => form_error('txtLastNam'),
                'PracticeName' => form_error('txtPracticeNam'),
                'Address' => form_error('txtStAddrNam'),
                'City' => form_error('txtCityNam'),
                'State' => form_error('selStateNam'),
                'ZipCode' => form_error('txtZipNam'),
                'Country' => form_error('selCountryNam'),
                'Dob' => form_error('txtDobNam'),
                'Email' => form_error('txtEmailNam'),
                'Password' => form_error('txtPwdNam'),
                'CellNum' => form_error('txtCellNumNam'),
                'AgreeTerms' => form_error('chkAgreeNam')
            );

			echo json_encode($ctrl_drd_add_signup_data); /* Form Validation End */
			return;
		}
		else
		{
			log_message('info' ,'form validation pass');
			
			log_message('info' ,'Get  User  Expires Id  from Keyvalue table');			
			$ctrl_drd_user_expires_id= $this->KeyValue->getKeyvalueId('USER','VALIDITY','NEVER EXPIRES');
					
			log_message('info' ,'Get  User Type from Keyvalue table');			
			$ctrl_drd_user_type_id = $this->KeyValue->getKeyvalueId('USER','TYPE','STUDENT');
			
			log_message('info' ,'Get  User Status from Keyvalue table');			
			$ctrl_drd_user_status_id = $this->KeyValue->getKeyvalueId('USER','STATUS','ACTIVE');
			
			log_message('info' ,'Get  Subscription type from Keyvalue table');	
			$ctrl_drd_sub_arry = array(
				"GROUP_NAME"=>"SUBSCRIPTION",
				"KEY_NAME" =>"TYPE",
				"STATUS" =>"ACTIVE",
			);
			$ctrl_drd_user_sub_array = $this->KeyValue->listWhere($ctrl_drd_sub_arry);
			
			log_message('info' ,'Get  User Status from Keyvalue table');			
			$ctrl_drd_sub_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
					
			log_message('info' ,'Get Certified  Information Keyvalue table');
			if($ctrl_drd_cer_infn == 'Y')
			{
				$ctrl_drd_certified_key = $this->KeyValue->getKeyvalueId('CERTIFICATE','INFO','YES');
			}
			else
			{
				$ctrl_drd_certified_key = $this->KeyValue->getKeyvalueId('CERTIFICATE','INFO','NO');
			}
			if($this->session->userdata('drd_userEmail'))
			{
				$user_email = $this->session->userdata('drd_userEmail');
			}
			else
			{
				$user_email = $ctrl_drd_emailid;
			}
			$ctrl_drd_user_insertdata  = array(
				"CREATE_BY" => $user_email,
				"CREATE_DATE" => $this->current_Date,
				"UPDATE_BY"  => $user_email,
				"UPDATE_DATE" => $this->current_Date,
				"FIRST_NAME" => $ctrl_drd_first_name,
				"LAST_NAME"   =>$ctrl_drd_last_name,
				"EMAIL_ID"    =>$ctrl_drd_emailid,
				"PASSWORD"    =>$ctrl_drd_encryptpassword,
				"USER_EXPIRES"=>$ctrl_drd_user_expires_id,
				"USER_TYPE"   =>$ctrl_drd_user_type_id,
				"USER_STATUS_ID" =>$ctrl_drd_user_status_id,
			);
			
			$ctrl_drd_stdnt_insert_data =  array(
				"CREATE_BY" => $user_email,
				"CREATE_DATE" => $this->current_Date,
				"UPDATE_BY"  => $user_email,
				"UPDATE_DATE" => $this->current_Date,
				"DOB" =>$ctrl_drd_dobconvert,
				'PROFILE_PICTURE_PATH'=>'img/avatar5.png',
				"MOBILE_NUM" =>$ctrl_drd_mobile_no,
				"PRACTICE_NAME" =>$ctrl_drd_practice_name,
				"POSTAL_ADDRESS" =>$ctrl_drd_street_address,
				"POSTAL_CODE" =>$ctrl_drd_postal_code,
				"CITY" =>$ctrl_drd_city_name,
				"STATE" =>$ctrl_drd_state_id,
				"COUNTRY" =>$ctrl_drd_country_id,
				"CERTIFIED_INFORMATION" =>$ctrl_drd_certified_key,
				"REGISTERD_IP" =>$ctrl_drd_system_IP,
			);
			$ctrl_drd_license_array= array();
			log_message('info',"Count ".count($this->input->post('ajx_dl_licenseData')));
			for($i=0;$i<count($this->input->post('ajx_dl_licenseData'));$i++)
			{				
				if(($this->input->post('ajx_dl_licenseData')[$i]['license_state']  && $this->input->post('ajx_dl_licenseData')[$i]['license_no'])){
					$ctrl_drd_stdnt_license = array(
					"CREATE_BY" => $user_email,
					"CREATE_DATE" => $this->current_Date,
					"UPDATE_BY"  => $user_email,
					"UPDATE_DATE" => $this->current_Date,
					"STATE_ID" =>$this->input->post('ajx_dl_licenseData')[$i]['license_state'],
					"LICENSE_NUM" =>$this->input->post('ajx_dl_licenseData')[$i]['license_no'],	
					);
					log_message('info',"License data  ".print_r($this->input->post('ajx_dl_licenseData')[$i]['license_state'],TRUE));
					array_push($ctrl_drd_license_array,$ctrl_drd_stdnt_license);
				}	
			}
			
			log_message('info',print_r($ctrl_drd_license_array,TRUE));
			
			$ctrl_drd_stdnt_subscription  = array();
			for($j=0;$j<count($ctrl_drd_user_sub_array);$j++)
			{
				$ctrl_drd_stdnt_sub = array(
				"CREATE_BY" => $user_email,
				"CREATE_DATE" => $this->current_Date,
				"UPDATE_BY"  => $user_email,
				"UPDATE_DATE" => $this->current_Date,
				"SUBSCRIPTION_TYPE" =>$ctrl_drd_user_sub_array[$j]['ID'],
				"SUBSCRIPTION_STATUS_ID" =>$ctrl_drd_sub_status_id,	
			);
			array_push($ctrl_drd_stdnt_subscription,$ctrl_drd_stdnt_sub);
			}	
			
			log_message('info',"Test Subscription".print_r($ctrl_drd_stdnt_subscription,TRUE));
			
			$ctrl_drd_insert_user  =  $this->User->insertuser($ctrl_drd_user_insertdata,$ctrl_drd_stdnt_insert_data,$ctrl_drd_license_array,$ctrl_drd_stdnt_subscription);
			
			if($ctrl_drd_insert_user == 'Success')
			{
				log_message('info','User Table Insert Successfully');
				log_message('info','User License Table Insert Successfully');
				$ctrl_email_data  = array(
					"User_Email" => $ctrl_drd_emailid,
					"User_FName" => $ctrl_drd_first_name,
					"User_LName" => $ctrl_drd_last_name,
					"User_Password" => $ctrl_drd_password,
					"MOBILE_NUM" =>$ctrl_drd_mobile_no,
					"IP_ADDRESS" => $ctrl_drd_system_IP,
					"ADDRESS" => $ctrl_drd_street_address,
					"CITY_NAME" => $this->input->post('txtCityName'),
					"STATE_NAME" => $this->input->post('selStateName'),
					"ZIP_CODE" => $ctrl_drd_postal_code,
					"COUNTRY_NAME" => $this->input->post('selCountryName'),
				);
				$this->_send_email($ctrl_email_data);				
			}
			else
			{		
			log_message('info','User Table Insert Fail');			
				$ctrl_drd_add_signup_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_add_signup_data);
				return;
			}
		} //End of Else
		
	} // End of add_signup_data function	
	
	/**
	 * This Function Used To Email to Student / Admin 
	 *
	 * @access private
	 * @since unknown
	 */ 
	
	
	function _send_email($msg_data)
	{
		log_message('info' ,'_send_email function start');   		
		$this->load->library('email');
		$ctrl_drd_to = $msg_data['User_Email'];
		$ctrl_drd_subject = $this->lang->line('register_sub');
		$ctrl_drd_message  = $this->lang->line('register');
			
		$replace_array = array(
			'<FIRST_NAME>' => $msg_data['User_FName'],
			'<LAST_NAME>' => $msg_data['User_LName'],
			'<EMAIL_ID>' => $msg_data['User_Email'],
			'<PASSWORD>' => $msg_data['User_Password']
		); 
			
		$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_message); 
		log_message('info','Email Content '.$ctrl_drd_replace_message);
		$sendmail = $this->sendmail->send_email_fun($ctrl_drd_to, $ctrl_drd_subject, $ctrl_drd_replace_message,2); 
		
		$ctrl_drd_admin_to = $this->lang->line('msg_fromemail');;
		$ctrl_drd_admin_subject = $this->lang->line('admin_registeration_sub');
		$ctrl_drd_admin_message  = $this->lang->line('admin_registeration');
		
		$replace_admin_array = array(
			'<FIRST_NAME>' => $msg_data['User_FName'],
			'<LAST_NAME>' => $msg_data['User_LName'],
			'<MOBILE_NUM>' => $msg_data['MOBILE_NUM'],
			'<EMAIL_ID>' => $msg_data['User_Email'],
			'<IP_ADDRESS>' => $msg_data['IP_ADDRESS'],
			'<ADDRESS>' => $msg_data['ADDRESS'],
			'<CITY>' => $msg_data['CITY_NAME'],
			'<STATE>' => $msg_data['STATE_NAME'],
			'<ZIP_CODE>' => $msg_data['ZIP_CODE'],
			'<COUNTRY>' => $msg_data['COUNTRY_NAME'],
		); 
			
		$ctrl_drd_admin_replace_message = $this->common_functions->str_replace_assoc($replace_admin_array,$ctrl_drd_admin_message); 
		
		$admin_sendmail = $this->sendmail->send_email_fun($ctrl_drd_admin_to, $ctrl_drd_stdnt_subject, $ctrl_drd_admin_replace_message,2); 
		
        log_message('info' ,'_send_email function send_email');  
		if(($sendmail  && $admin_sendmail) == true)
		{			
			log_message('info', ' Email Success !!');
			$ctrl_drd_add_signup_data= array(
           'message' =>$this->lang->line('m_90003'),
		   'message_type'=>$this->lang->line('success'),
		   );	
		    echo json_encode($ctrl_drd_add_signup_data);
			return;			 
		}
		else
		{
			log_message('info', ' Email Failed !!');
			$ctrl_drd_add_signup_data= array(
           'message' => $this->lang->line('m_90831'),
		   'message_type'=>$this->lang->line('warning'),
		   );			 
		    echo json_encode($ctrl_drd_add_signup_data);
			return;
		}
				
	 } // End of send_Email function
	
	/**
	 * This Function Used To Check Email Already Exists from USERModel
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function email_exists()
	{	
		log_message('info',"email_exists function Start here");

		// Set validation Rules for form
     
		$this->form_validation->set_rules('ajx_txtEmailNam', '', 'trim|is_unique[users.EMAIL_ID]',
		array(
			'is_unique' => $this->lang->line('m_90009'),
		));

		$this->form_validation->set_error_delimiters('', '');	
		
		if ($this->form_validation->run() == FALSE)
		{
	    log_message('info' ,'form validation Email Exists');		  
		   $data = array(		      
			    'message'=>form_error('ajx_txtEmailNam')    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);

		} // End of If Condition
		else 
		{
			log_message('info' ,'form validation Email Not Found');
			$data = array(		      
			    'message'=>''    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);
		} // End of Else Block
		log_message('info',"email_exists function end here");
		return;
		
	} //End of studentRegister function	
} // End of Class
?>