<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Reset_password_controlle
	 *	- or -
	 * 		http://example.com/index.php/Reset_password_controlle/index
	 *	- or -
	 * Since this controller is set as the Reset_password_controlle in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Reset_password_controlle/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $current_Date = null; // To Assign Public variable
	public function __construct() 
	{
		parent::__construct();
		$this->current_Date = date("Y-m-d H:i:s"); // Set Date Format
	}	
	
	/**
	 * This function used to show the resetpassword page
	 *
	 * @access public
	 * @since unknown
	 */
	public function reset_password($user_email,$user_id,$url_date) 
	{		
		$email_encript =  $this->encrypt->decode($user_email);  // decrypt function
		$date_encript =  $this->encrypt->decode($url_date);  // decrypt function
		
		//$now = time(); // or your date as well
		$current_date = strtotime(date('y-m-d')); // or your date as well
		$url_encript_date = strtotime($date_encript);
		$datediff =intval($current_date - $url_encript_date);
		
					
		$calculate_date  =  round($datediff / (60 * 60 * 24)); 
		$calculate_date  =  preg_replace("/[^0-9]/", '', $calculate_date);
		log_message('info','Calculate Date '.$calculate_date);
		log_message('info','Encrypt Date '.$date_encript);
		
		$ctrl_drd_data['email'] = $email_encript;
		$ctrl_drd_data['id'] = $user_id;

		if(($calculate_date == 0)  OR ($calculate_date == 1 ))
		{
			log_message('info','Url  Date is Valid');
			$this->load->view('resetpassword',$ctrl_drd_data);
		}
		else
		{
			log_message('info','Url  Date is expired');
		}	
		
	} // End of login function
	
	/* Form Ajax call this update_password function for check validations, password Regex function and upadte password */
	public function update_password() {
		log_message('info' ,' update_password function start'); // For Log Message

		$ctrl_drd_password = $this->input->post('txtNewPwd');
		$ctrl_drd_email = $this->input->post('txtEmailNam');
		
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
                'NewPassword' => form_error('txtNewPwd'),
                'ConfirmPassword' => form_error('txtConfirmPwd'),
            );			
			// Return the JSON value to ajax
	        echo json_encode($data);  //return message form UI
			return;
		}
		else
		{
			$this->user_password_update($ctrl_drd_password,$ctrl_drd_email);	
			//echo "Validation Success.";
		}	
		log_message('info' ,'update_password Function End'); // For Log Message		
	} 

	/* This function call form User Model call in user_password_update method */	
	public function user_password_update($user_password,$user_email)
	{
		log_message('info' ,'user_password_update Function Start'); // For Log Message
		log_message('info' ,'user_password_update email id '.$user_email); // For Log Message
		log_message('info' ,'user_password_update Password'.$user_password); // For Log Message
		
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
               'message_type' =>$this->lang->line('success'),
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
	
} // End of Class
?>
