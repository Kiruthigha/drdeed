<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Dashboard_controller
	 *	- or -
	 * 		http://example.com/index.php/Dashboard_controllerd/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Dashboard_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Dashboard_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_drd_user_id = null; // To Assign Public variable (Session)
	public $session_drd_email_id = null; // To Assign Public variable (Session)
	public function __construct() {
		parent::__construct();
		$this->session_drd_user_id = $this->session->userdata('drd_userId');
		$this->session_drd_email_id = $this->session->userdata('drd_userEmail');
		$this->ctrl_drd_current_date = date("Y-m-d H:i:s");
	}		
	public function admin_dashboard() {
		log_message('info' ,'admin_dashboard Function Start');
		$this->load->view('admin/header');
		/* Get User Information in User Model*/
		$user_details = $this->User->findByPrimaryKey($this->session_drd_user_id);
		$ctrl_drd_data['Email'] =  $user_details['EMAIL_ID'];
		$ctrl_drd_data['Login_Date'] = date('l, M d,Y', strtotime($user_details['LAST_SUCCESS_LOGIN_DATE'])); 
		$this->load->view('admin/admin-dashboard',$ctrl_drd_data);
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/footer');
		log_message('info' ,'admin_dashboard Function End');		
	}
}
?>