<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transcations_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Transcations_controller
	 *	- or -
	 * 		http://example.com/index.php/Transcations_controller/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Transcations_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Transcations_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public $session_user_id = null; // To Assign Public variable (Session)
	public $session_email_id = null; // To Assign Public variable (Session)
	public $session_user_type = null; // To Assign Public variable (Session)
	
	public function __construct() 
	{
		parent::__construct();
		$this->session_user_id = $this->session->userdata('drd_userId');
		$this->session_email = $this->session->userdata('drd_userEmail');
		$this->session_user_type = $this->session->userdata('drd_userType');
		$this->current_date = date("Y-m-d H:i:s");
	}	
	
	/**
	 * This function used to display transactions page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_transcations() 
	{
		log_message('info',"view_transcations function Start here");

		if($this->session_user_type == 'AUDITOR') 
		{
			// get user transaction data from dd_user_transactions_view
			$ctrl_drd_transaction_data['user_transactions'] = $this->StudentProfile->getusertransactions();	
		}
		else 
		{
			// get user transaction data from dd_user_transactions_view
			$ctrl_drd_transaction_data['user_transactions'] = $this->StudentProfile->getusertransactions(array('USER_ID'=>$this->session_user_id));	
		}		
		
		log_message('info',"ctrl_drd_transaction_data= ".print_r($ctrl_drd_transaction_data,true) );
		
		$this->load->view('header');		
		$this->load->view('topmenu');
		$this->load->view('usertranscations',$ctrl_drd_transaction_data);
		$this->load->view('footer');	
		
		log_message('info',"view_transcations function end here");
	}// End of view_transcations function
	
}// End of Class
?>