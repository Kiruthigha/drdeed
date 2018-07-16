<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/view_users
	 *	- or -
	 * 		http://example.com/index.php/view_users/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/view_users
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/view_users/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() 
	{
		parent::__construct();
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 
	}		
	public function users() 
	{
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		/* Get User list from User table  */
		$user_data = $this->User->getuserdetails('','UPDATE_DATE DESC');
		$admin_user =0;
		$assistant_user =0;
		$audit_user =0;
		foreach($user_data as $user_array)
		{
			if(($user_array['USER_STATUS_VALUE'] != 'DELETE') && ($user_array['USER_TYPE_VALUE'] != 'STUDENT'))
			{
				if($user_array['USER_TYPE_VALUE'] == 'ADMIN')
				{ 
					$admin_user++;
				}
				if($user_array['USER_TYPE_VALUE'] == 'ASSISTANT')
				{ 
					$assistant_user++;
				}
				if($user_array['USER_TYPE_VALUE'] == 'AUDITOR')
				{ 
					$audit_user++;
				}
				$user_array_data[]=$user_array;
			}
			
		}
		$crtl_drd_data['user_details'] =$user_array_data;
		$crtl_drd_data['admin_user'] = $admin_user;
		$crtl_drd_data['assistant_user'] = $assistant_user;
		$crtl_drd_data['audit_user'] = $audit_user;
		log_message('info',"User user_details ".print_r($crtl_drd_data,TRUE));
		$this->load->view('admin/admin-users',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * This Function Used To View Add User Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_user() 
	{
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		/* Get user_type Type from keyvalue model  */
		$user_type_array = array(
			'GROUP_NAME'=>'USER',
			'KEY_NAME'=>'TYPE',
			'STATUS'=>'ACTIVE',
		);
		$crtl_drd_data['user_type'] = $this->KeyValue->listWhere($user_type_array);
		
		/* Get user_validity Type from keyvalue model  */
		$where_array = array(
			'GROUP_NAME'=>'USER',
			'KEY_NAME'=>'VALIDITY',
			'STATUS'=>'ACTIVE',
		);
		$crtl_drd_data['user_expires'] = $this->KeyValue->listWhere($where_array);
		$this->load->view('admin/admin-adduser',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * This Function Used To View Edit User Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_user($user_id) 
	{
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		/* Get user_type Type from keyvalue model  */
		$user_type_array = array(
			'GROUP_NAME'=>'USER',
			'KEY_NAME'=>'TYPE',
			'STATUS'=>'ACTIVE',
		);
		$crtl_drd_data['user_type'] = $this->KeyValue->listWhere($user_type_array);
		
		/* Get user_validity Type from keyvalue model  */
		$where_array = array(
			'GROUP_NAME'=>'USER',
			'KEY_NAME'=>'VALIDITY',
			'STATUS'=>'ACTIVE',
		);
		$crtl_drd_data['user_expires'] = $this->KeyValue->listWhere($where_array);
		
		/* Get User details from user table  */
		$crtl_drd_data['user_data'] = $this->User->findByPrimaryKey($user_id);
		
		$this->load->view('admin/admin-edituser',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * This Function Used To Insert User Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function add_user_details() 
	{	
		log_message('info',"add_user_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_usertype = $this->input->post('selUserTypeNam');
		$ctrl_drd_email = $this->input->post('txtEmailNam');
		$ctrl_drd_password = $this->input->post('pwdPasswordNam');
		$ctrl_drd_repeatpassword = $this->input->post('pwdRepeatPasswordNam');
		$ctrl_drd_firstname = $this->input->post('txtFirstNameNam');
		$ctrl_drd_lastname = $this->input->post('txtLastNameNam');
		$ctrl_drd_oraganization = $this->input->post('txtOrgNam');
		$ctrl_drd_userexpires = $this->input->post('selUserExpNam');
		
		$ctrl_drd_encryptpassword =  password_hash($ctrl_drd_password, PASSWORD_BCRYPT) ;
		
		// Set validation Rules for form
        $this->form_validation->set_rules('selUserTypeNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('txtEmailNam', '','trim|required|valid_email|max_length[60]|is_unique[users.EMAIL_ID]',
		array(
			'required' => $this->lang->line('m_90509'),
			'valid_email' => $this->lang->line('m_90507'),
			'is_unique' => $this->lang->line('m_90009'),
		));	
		
		$this->form_validation->set_rules('pwdPasswordNam', '','trim|required|min_length[8]|max_length[20]',
		array(
			'required' => $this->lang->line('m_90509'),
			'min_length' => $this->lang->line('m_90511'))
		);
		
		$this->form_validation->set_rules('pwdRepeatPasswordNam', '', 'trim|required|matches[pwdPasswordNam]',
		array(
			'required' => $this->lang->line('m_90509'),
			'matches' => $this->lang->line('m_90512'))
		);	
		
        $this->form_validation->set_rules('txtFirstNameNam', '', 'trim|required|max_length[60]' ,  
		array('required' => $this->lang->line('m_90509'))
		);	
		
        $this->form_validation->set_rules('txtLastNameNam', '', 'trim|required|max_length[60]' ,  
		array('required' => $this->lang->line('m_90509'))
		);	
		
        $this->form_validation->set_rules('txtOrgNam', '', 'trim' );		
		
        $this->form_validation->set_rules('selUserExpNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_userDataValidation = array(		      
			    'message'=>'',
                'UserType' => form_error('selUserTypeNam'),
                'Email' => form_error('txtEmailNam'),
				'Password' => form_error('pwdPasswordNam'),    				
				'RepeatPassword' => form_error('pwdRepeatPasswordNam'),
				'FirstName' => form_error('txtFirstNameNam'),
				'LastName' => form_error('txtLastNameNam'),     			'Organization' => form_error('txtOrgNam'),     				
				'UserExpires' => form_error('selUserExpNam'),
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_userDataValidation);
			} // End of If Condition
			else
			{
			log_message('info' ,'form validation fails');	
			
			log_message('info' ,'Get  User Status from Keyvalue table');			
			$ctrl_drd_user_status_id = $this->KeyValue->getKeyvalueId('USER','STATUS','ACTIVE');
			
			$ctrl_drd_user_insertdata  = array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" =>$this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" =>$this->current_date,
				"FIRST_NAME" => $ctrl_drd_firstname,
				"LAST_NAME"   =>$ctrl_drd_lastname,
				"EMAIL_ID"    =>$ctrl_drd_email,
				"PASSWORD"    =>$ctrl_drd_encryptpassword,
				"USER_EXPIRES"=>$ctrl_drd_userexpires,
				"USER_TYPE"   =>$ctrl_drd_usertype,
				"ORGANIZATION"=>$ctrl_drd_oraganization,
				"USER_STATUS_ID" =>$ctrl_drd_user_status_id,
			);
			$ctrl_drd_insert_user  =  $this->User->insert($ctrl_drd_user_insertdata);
			if($ctrl_drd_insert_user)
			{
				log_message('info','User Table Insert Success');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90003'),
				'message_type'=>$this->lang->line('success'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
				
			}
			else
			{
				log_message('info','User Table Insert Fail');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		//echo json_encode("RUN");
		log_message('info',"add_user_details function end here");
		return;
		
	} //End of Add User Details function	
	
	/**
	 * This Function Used To Update User Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function edit_user_details() {	
		log_message('info',"edit_user_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_editusertype = $this->input->post('selEditUserTypeNam');
		//$ctrl_drd_editemail = $this->input->post('txtEditEmailNam');
		$ctrl_drd_editpassword = $this->input->post('pwdEditPasswordNam');
		//$ctrl_drd_editrepeatpassword = $this->input->post('pwdEditRepeatPasswordNam');
		$ctrl_drd_editfirstname = $this->input->post('txtEditFirstNameNam');
		$ctrl_drd_editlastname = $this->input->post('txtEditLastNameNam');
		$ctrl_drd_editoraganization = $this->input->post('txtEditOrgNam');
		$ctrl_drd_edituserexpires = $this->input->post('selEditUserExpNam');
		$ctrl_drd_userid = $this->input->post('txtUserNam');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('selEditUserTypeNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        /* $this->form_validation->set_rules('txtEditEmailNam', '','trim|required|valid_email|max_length[60]',
		array(
			'required' => $this->lang->line('m_90509'),
			'valid_email' => $this->lang->line('m_90507'),
		));	 */
		
		/* $this->form_validation->set_rules('pwdEditPasswordNam', '','trim|callback__checkPasswordRegex');
				
		$this->form_validation->set_rules('pwdEditRepeatPasswordNam', '', 'trim|required|matches[pwdEditPasswordNam]',
		array(
			'required' => $this->lang->line('m_90509'),
			'matches' => $this->lang->line('m_90512'))
		); */	
		
		$this->form_validation->set_rules('pwdEditPasswordNam', '','trim|required|min_length[8]|max_length[20]',
		array(
			'required' => $this->lang->line('m_90509'),
			'min_length' => $this->lang->line('m_90511'))
		);
		
        $this->form_validation->set_rules('txtEditFirstNameNam', '', 'trim|required|max_length[60]' ,  
		array('required' => $this->lang->line('m_90509'))
		);	
		
        $this->form_validation->set_rules('txtEditLastNameNam', '', 'trim|required|max_length[60]' ,  
		array('required' => $this->lang->line('m_90509'))
		);	
		
        $this->form_validation->set_rules('txtEditOrgNam', '', 'trim' );		
		
        $this->form_validation->set_rules('selEditUserExpNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_edituserDataValidation = array(		      
			    'message'=>'',
                'EditUserType' => form_error('selEditUserTypeNam'),
                //'EditEmail' => form_error('txtEditEmailNam'),
				'EditPassword' => form_error('pwdEditPasswordNam'),     				
				//'EditRepeatPassword' => form_error('pwdEditRepeatPasswordNam'),     				
				'EditFirstName' => form_error('txtEditFirstNameNam'),     				
				'EditLastName' => form_error('txtEditLastNameNam'),     				
				'EditOrganization' => form_error('txtEditOrgNam'),     				
				'EditUserExpires' => form_error('selEditUserExpNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_edituserDataValidation);

		} 
		else
		{
			$ctrl_drd_user_updatedata  = array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" =>$this->current_date,
				"PASSWORD" => password_hash($ctrl_drd_editpassword, PASSWORD_BCRYPT),
				"FIRST_NAME" => $ctrl_drd_editfirstname,
				"LAST_NAME"   =>$ctrl_drd_editlastname,
				"USER_EXPIRES"=>$ctrl_drd_edituserexpires,
				"USER_TYPE"   =>$ctrl_drd_editusertype,
				"ORGANIZATION"=>$ctrl_drd_editoraganization,
			);
			$ctrl_drd_update_user  =  $this->User->update($ctrl_drd_user_updatedata,array('ID'=>$ctrl_drd_userid));
			if($ctrl_drd_update_user)
			{
				log_message('info','User Table Update Success');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
			else
			{
				log_message('info','User Table Update Fail');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		
		//echo json_encode("RUN");
		log_message('info',"edit_user_details function end here");
		return;
		
	} //End of Edit User Details function	
	
	 /* Update User Status from user model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_user_status() 
	{
		log_message('info',"update_user_status function Start");
		
		$ctrl_drd_user_id  = $this->input->post('ajax_user_id');
		$ctrl_drd_user_status  = $this->input->post('ajax_user_status');
		if($ctrl_drd_user_status == "DELETE")
		{
			log_message('info' ,'Get  User user Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','DELETE');			
		}
		else if($ctrl_drd_user_status == "ACTIVE")
		{
			log_message('info' ,'Get  User user Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','ACTIVE');			
		}
		else
		{
			log_message('info' ,'Get  User user Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','DEACTIVATED');	
		}
		$where_array  = array(
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"USER_STATUS_ID" =>$ctrl_drd_userstatus_id,
		);
		
		$ctrl_drd_status_update = $this->User->update($where_array,array('ID'=>$ctrl_drd_user_id));
		
		if($ctrl_drd_status_update)
		{
			log_message('info',"User Model user Status update Success");
			if($ctrl_drd_user_status == "DELETE")
			{				
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90007'),
				'message_type'=>$this->lang->line('success'),
				);
			}
			else
			{
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				);
			}
			echo json_encode($ctrl_drd_return_data);
			return;
		}
		else
		{
			log_message('info',"User Model user Status update Fail");$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);
			echo json_encode($ctrl_drd_return_data);
			return;
		}
		log_message('info',"update_user_status function End");
		
	} // End Function 
	
}
?>