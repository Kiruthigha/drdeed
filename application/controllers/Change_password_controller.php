<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Change_password_controller
	 *	- or -
	 * 		http://example.com/index.php/Change_password_controller
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/changepassword
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Change_password_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public $session_userid = null; // To Assign Public variable
	public $session_user_emailid = null; // To Assign Public variable
	
	public function __construct() {
		parent::__construct();
			
		// to get session UserId,EmailId and declare public variables
		$this->session_userid  = $this->session->userdata('drd_userId'); 
		$this->session_user_emailid = $this->session->userdata('drd_userEmail');
	}		
	
	/* Form Ajax call this check_changePassword function for check validations, password Regex function and upadte password */
	public function check_changePassword() {
		log_message('info' ,'Change Password Controller check_changePassword function start'); // For Log Message
		log_message('info' ,'Change Password Validation set_rules Start'); // For Log Message
		$ctr_UserId = $this->session_userid; // to get session store userId
		$ctr_UserEmailId = $this->session_user_emailid; // to get session store userEmail
		
		$this->form_validation->set_rules('txtCurrentPwd', '', 'trim|required|min_length[6]',
		array(
		'required' => $this->lang->line('m_90509'),
		'min_length' => $this->lang->line('m_90819'),
		));
		$this->form_validation->set_rules('txtNewPwd', '', 'trim|required|min_length[6]',
		array(
		'required' => $this->lang->line('m_90509'),
		'min_length' => $this->lang->line('m_90511'),
		));
		$this->form_validation->set_rules('txtConfirmPwd', '', 'trim|required|min_length[6]|matches[txtNewPwd]',
		array(
		'required' => $this->lang->line('m_90509'),
		'min_length' => $this->lang->line('m_90511'),
		'matches' => $this->lang->line('m_90512'),
		));
		$this->form_validation->set_error_delimiters('', ''); 
		if ($this->form_validation->run() == FALSE) 
		{ 
		    log_message('info' ,'form validation fails');
			$data = array(
				'message'=>'',
                'CurrentPassword' => form_error('txtCurrentPwd'),
                'NewPassword' => form_error('txtNewPwd'),
                'ConfirmPassword' => form_error('txtConfirmPwd'),
            );			
			// Return the JSON value to ajax
	        echo json_encode($data);  //return message form UI
		} else if( $this->oldpassword_check($this->input->post('txtCurrentPwd'),$ctr_UserId) == FALSE) {
			log_message('info' ,"Current password not match.");
			 $data = array(
				'message'=>'',
                'CurrentPassword' => $this->lang->line('m_90811'),
            );
			// Return the JSON value to ajax
	        echo json_encode($data);  //return message form UI	
		}
		else if( $this->oldpassword_check($this->input->post('txtNewPwd'),$ctr_UserId) == TRUE) {
			log_message('info' ,"Current password not match.");
			 $data = array(
				'message'=>'',
                'NewPassword' => $this->lang->line('m_90824'),
            );
			// Return the JSON value to ajax
	        echo json_encode($data);  //return message form UI	
		}
		else {
			log_message('info' ,'Change Password validation Success');
			$ctr_newPassword = $this->input->post('txtNewPwd');
			$this->user_password_update($ctr_newPassword,$ctr_UserEmailId);	
			//echo "Validation Success.";
		}	
		log_message('info' ,'Change Password Controller check_changePassword Function End'); // For Log Message		
	} 
	
	/* This function call form user profile model call in findByUniqueValue method */	
	function oldpassword_check($old_password,$userid)
	{	
		log_message('info' ,'Check current password in User Profile Model'); // For Log Message	
		$old_password_db_hash = $this->User->findByUniqueValue(array('ID'=>$userid));
		if($old_password_db_hash){
			log_message('info' ,"get password".$old_password_db_hash['PASSWORD']);
			if (password_verify($old_password, $old_password_db_hash['PASSWORD'])){
				log_message('info' ,"Change Password Controller Current Password is correct"); // For Log Message	
				return TRUE;	
			} else {
				log_message('info' ,"Change Password Controller Current Password is worng"); // For Log Message
				return FALSE;
			}
		}
		log_message('info' ,'old password function end');  // For Log Message	
	}
	
	/* This function call form User Model call in user_password_update method */	
	public function user_password_update($user_password,$user_email)
	{
		log_message('info' ,'user_password_update Function Start'); // For Log Message
		
		// Encrypt The Random Password Generate
		log_message('info' ,'Regenerate Hash Password'); // For Log Message
		$ctrl_drd_encryptpassword =  password_hash($user_password, PASSWORD_BCRYPT) ;
		
		
		// Get the Value for User Profile data 
		$ctrl_drd_userprofiledata = array(
			'PASSWORD'=>$ctrl_drd_encryptpassword,
			'UPDATE_BY'=>$user_email,
			'UPDATE_DATE'=>$this->current_Date,
		);
		//Pass the value to Model 
		log_message('info' ,'Call User Model in user_password_update method'); // For Log Message
		$ctr_ProfileUpdateData=$this->User->update($ctrl_drd_userprofiledata,array('EMAIL_ID'=>$user_email)); 
		if($ctr_ProfileUpdateData) 
		{	
			log_message('info', 'Password Reset Successfully. Please Re-login With New Password.');		
			$returnMessage= array(
               'message' => $this->lang->line('m_90812'),
               'message_type' => $this->lang->line('success'),
			   );
			echo json_encode($returnMessage); //return message form UI
			return; 
			
		}
		else 
		{
			log_message('info', 'Password Reset Fail. DB Error ');
		    $returnMessage= array(
			    'message' => $this->lang->line('m_90016'),
				'message_type' => $this->lang->line('error'),
			   );
			echo json_encode($returnMessage); //return message form UI
			return; 
		}
		log_message('info' ,'User_password_update Function End'); // For Log Message
	}
}
?>