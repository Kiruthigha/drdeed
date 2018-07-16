<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Subscription_controller
	 *	- or -
	 * 		http://example.com/index.php/Subscription_controller/index
	 *	- or -
	 * Since this controller is set as the Subscription_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Subscription_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_user_id = null; // To Assign Public variable (Session)
	public $session_email_id = null; // To Assign Public variable (Session)
	 
	public function __construct() {
		parent::__construct();
		$this->session_user_id = $this->session->userdata('drd_userId');
		$this->session_email = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s");
	}
	
	/**
	 * This Function Used To display subscription function 
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function view_subscription() {
		log_message('info',"view_subscription function Start here");	
		
		//Get Subscription Status 'Active' From dd_key_value
		$ctrl_drd_get_sub_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		log_message('info',"ctrl_drd_get_sub_status_id= ".$ctrl_drd_get_sub_status_id);		
		//Get Active Subscription List From dd_key_value
		$ctrl_drd_subscription_data = $this->KeyValue->listWhere(array('GROUP_NAME'=>'SUBSCRIPTION','KEY_NAME'=>'TYPE','STATUS'=>'ACTIVE'));		
		log_message('info',"ctrl_drd_subscription_data= ".print_r($ctrl_drd_subscription_data,true));		
		$ctrl_drd_subscriptions['subscriptions'] = $ctrl_drd_subscription_data;
		
		foreach($ctrl_drd_subscription_data as $ctrl_drd_subscription_data) {
			//Get Active User Subscriptions From dd_user_subscription
			$ctrl_drd_user_sub_data = $this->UserSubscription->listWhere(array('SUBSCRIPTION_TYPE'=>$ctrl_drd_subscription_data['ID'],'USER_ID'=>$this->session_user_id,'SUBSCRIPTION_STATUS_ID'=>$ctrl_drd_get_sub_status_id));
			log_message('info',"ctrl_drd_user_sub_data= ".print_r($ctrl_drd_user_sub_data,true));
			
			$ctrl_drd_user_sub_value['user_subscriptions'] = $ctrl_drd_user_sub_data;
			$ctrl_drd_user_sub_value['subscription_list'] = $ctrl_drd_subscription_data;
			
			$ctrl_drd_user_subscription[] = $ctrl_drd_user_sub_value;
		}//End of For Loop
		
		$ctrl_drd_return_data['user_id'] = $this->session_user_id;
		$ctrl_drd_return_data['user_subscription_data'] = $ctrl_drd_user_subscription;
		log_message('info',"user_subscription_data= ".print_r($ctrl_drd_return_data['user_subscription_data'],true));
		
		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('subscription',$ctrl_drd_return_data);
		$this->load->view('footer');
		log_message('info',"view_subscription function end here");
	}// End of view_subscription	
	
	/**
	 * This Function Used to Insert/Update User Subscription Details 
	 *
	 * @access public
	 * @since unknown
	 */ 
	function upt_user_subscription($userID) {
		log_message('info',"upt_user_subscription function Start here");
		$result = '';
		$ctrl_UserId = $this->session_user_id; //Get User Id from Session		
		$ctrl_Date = $this->ctrl_CurrentDate; //Get Current Date	
		
		log_message('info' ,'js_drd_user_subscription_data'.print_r($this->input->post('js_drd_user_subscription_data'),true));		
		
		log_message('info' ,'Count of List'.count($this->input->post('js_drd_user_subscription_data')));			
			
		//Get Subscription Status 'Active' From dd_key_value	
		$ctrl_drd_get_sub_active_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		//Get Subscription Status 'InActive' From dd_key_value		
		$ctrl_drd_get_sub_inactive_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','INACTIVE');			
		
		// Get Data From Ajax Using For loop
		for($i=0; $i<count($this->input->post('js_drd_user_subscription_data')); $i++)
		{	
			$ctrl_drd_subscription_Id = $this->input->post('js_drd_user_subscription_data')[$i]['subscriptionId']; 
			$ctrl_drd_subsciption_status = $this->input->post('js_drd_user_subscription_data')[$i]['chkStatus'];
			$ctrl_drd_user_id = $this->input->post('js_drd_user_subscription_data')[$i]['userId'];
			
			log_message('info' ,' ctrl_drd_subscription_Id ='.$ctrl_drd_subscription_Id);	

			//get Subscription Status
			if($ctrl_drd_subsciption_status == 1) {
				$ctrl_drd_Sub_id = $ctrl_drd_get_sub_active_id;
			} else {					
				$ctrl_drd_Sub_id = $ctrl_drd_get_sub_inactive_id;
				log_message('info' ,'ctrl_drd_Sub_id ='.$ctrl_drd_Sub_id);
			} 
			
			// Get The User Subscription List 
			$ctrl_drd_user_sub_details = $this->UserSubscription->listWhere(array('SUBSCRIPTION_TYPE'=>$ctrl_drd_subscription_Id,'USER_ID'=>$ctrl_drd_user_id));		
			if(count($ctrl_drd_user_sub_details) == 1)
			{
				$ctrl_drd_user_sub_details=$ctrl_drd_user_sub_details[0];
			}			
			log_message('info' ,'ctrl_drd_user_sub_details ='.print_r($ctrl_drd_user_sub_details,true));
			
			if($ctrl_drd_user_sub_details) {				
				//Pass the Values for User Subscription Update
				$Ctrl_drd_user_sub_upt_array = array(	
					'UPDATE_BY'=> $this->session_email,
					'UPDATE_DATE'=>$this->current_date,				
					'USER_ID'=>$ctrl_drd_user_id, 
					'SUBSCRIPTION_TYPE'=>$ctrl_drd_subscription_Id, 
					'SUBSCRIPTION_STATUS_ID'=>$ctrl_drd_Sub_id
					);		
				$where = array('ID'=>$ctrl_drd_user_sub_details['ID']);
				//Update User Subscription Details on User Subscription Table
				$ctrl_drd_user_subscription_upt = $this->UserSubscription->update($Ctrl_drd_user_sub_upt_array,$where);
				log_message('info' ,'Data Updated ='.$ctrl_drd_user_subscription_upt);
				
				if($ctrl_drd_user_subscription_upt) {	
					$result = 1;
				} 
				
			} else {
									
				//Pass the Values for User Subscription Insert Function
				$Ctrl_drd_user_sub_ins_array = array(	      	                       
					'CREATE_BY'=> $this->session_email,
					'CREATE_DATE'=>$this->current_date,	
					'UPDATE_BY'=> $this->session_email,
					'UPDATE_DATE'=>$this->current_date,				
					'USER_ID'=>$ctrl_drd_user_id, 
					'SUBSCRIPTION_TYPE'=>$ctrl_drd_subscription_Id, 
					'SUBSCRIPTION_STATUS_ID'=>$ctrl_drd_Sub_id
					);		
				//Insert User Subscription List on User Subscription Table
				$ctrl_drd_user_sub_insert = $this->UserSubscription->insert($Ctrl_drd_user_sub_ins_array);
				log_message('info' ,'Data Inserted ='.$ctrl_drd_user_sub_insert);
				
				if($ctrl_drd_user_sub_insert) {
					$result = 1;						
				} 
				
			} // End of Else			
		}// End of For Loop
		if($result == 1) {
			log_message('info' ,'Inserted Successfully');
			$msg_drd_upt_success = array( 'message' => $this->lang->line('m_90004') ); 
			echo json_encode($msg_drd_upt_success);	
		} else {
			$msg_drd_upt_failed = array( 'message' => $this->lang->line('m_90008') ); 
			echo json_encode($msg_drd_upt_failed);	
		}		
	} // End upt_user_subscription Function
			
}// End of Class
?>
