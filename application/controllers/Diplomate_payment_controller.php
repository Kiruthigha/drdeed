<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_payment_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_payment_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_payment_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_payment_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_payment_controller/<method_name>
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

	/**
	 * This function used to show the payment page for diplomate Program
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_diplomate_paymentPage($course_state_id,$credit_option) 
	{
		log_message('info',"view_diplomate_paymentPage function Start here");
		$ctrl_drd_content_key = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DIPLOMATE_PAYMENT');
		$ctrl_drd_content_dip = $this->ContentMaster->findByUniqueKey($ctrl_drd_content_key);
		$ctrl_drd_data['course_state_id']= $course_state_id;
		$ctrl_drd_data['credit_option']= $credit_option;
		$ctrl_drd_data['payment_terms']=$ctrl_drd_content_dip['CONTENT'];
		$ctrl_drd_course_type = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
		$ctrl_drd_course_status = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		$ctrl_drd_course_cost = $this->CourseCost->listWhere(array("COURSE_TYPE"=>$ctrl_drd_course_type));
		
		$first_course = $this->CourseMaster->listWhere(array("COURSE_TYPE"=>$ctrl_drd_course_type,
															"COURSE_STATUS_ID"=>$ctrl_drd_course_status),"COURSE_NUM");
		$ctrl_drd_data['first_course_id']=$first_course[0]['ID'];
		$ctrl_drd_data['diplomate_price']=$ctrl_drd_course_cost[0]['COST'];
		
		/* Get Payment Thankyou from ContentMaster table  */
		$ctrl_drd_thankyou_fun_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DIPLOMATE_PAYMENT_THANKYOU');

		$ctrl_drd_thankyou_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_thankyou_fun_id);
		$ctrl_drd_data['thankyou_content'] = $ctrl_drd_thankyou_data['CONTENT'];	
		
		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('diplomatepayment',$ctrl_drd_data);
		$this->load->view('footer');
		log_message('info',"view_diplomate_paymentPage function Start here".print_r($ctrl_drd_data, true));
	}// End of view_diplomate_paymentPage function
	
	public function insert_diplomate_payment() 
	{
	log_message('info',"insert_diplomate_payment function Start here");
		
		/* Store Post Values In variables */
		 
		$ctrl_drd_credit_state_id  = $this->input->post('ajx_drd_credit_state');
		$ctrl_drd_credit_status_id  = $this->input->post('ajx_drd_credit_status');
		$ctrl_drd_card_name  = $this->input->post('ajx_drd_card_name');
		$ctrl_drd_card_no  = $this->input->post('ajx_drd_card_no');
		$ctrl_drd_exp_date  = $this->input->post('ajx_drd_card_exp_date');
		$ctrl_drd_card_cvv  = $this->input->post('ajx_drd_card_cvv');
		$ctrl_drd_address  = $this->input->post('ajx_drd_address');
		$ctrl_drd_city  = $this->input->post('ajx_drd_city');
		$ctrl_drd_state  = $this->input->post('ajx_drd_state');
		$ctrl_drd_zipcode  = $this->input->post('ajx_drd_zip');
		$ctrl_drd_user_id  = $this->session_Userid;
		$ctrl_drd_std_price  = intval($this->input->post('ajx_drd_std_price'));
		$ctrl_drd_promo_amount  = substr($this->input->post('ajx_drd_promo_amount'), 1);
		$ctrl_drd_promo_code_id  = $this->input->post('ajx_drd_promo_codeid');
		$ctrl_drd_credit_option  = $this->input->post('ajx_creditoption');
		$ctrl_drd_credit_state  = $this->input->post('ajx_creditstate');
		$ctrl_drd_IP_address  = $_SERVER['REMOTE_ADDR'];
		log_message('info','Std price '.$this->input->post('ajx_drd_std_price'));
		log_message('info','promo price '.$this->input->post('ajx_drd_promo_amount'));
		
		log_message('info','Int Std price '.intval($this->input->post('ajx_drd_std_price')));
		log_message('info','Int promo price '.intval($this->input->post('ajx_drd_promo_amount')));
		if($ctrl_drd_credit_option == 'Y')
		{
			//$ctrl_drd_sms_code  = random_string('numeric',6);
			$ctrl_drd_sms_code  = '123456'; // Hot coded	
			$ctrl_drd_confirm_code =  'N';
		}
		else
		{
			$ctrl_drd_confirm_code =  'Y';
			$ctrl_drd_sms_code  = ''; 
		}
		$current_date  = date('Y-m-d');
		/* Get T&C from ContentMaster table  */
		$ctrl_usercourse_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','ENROLLED');
		
		/* Check usercourse status already  exists  count increase  */
		
		
		$ctrl_drd_diplcourse_insertdata  = array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				'USER_ID' => $this->session_Userid,
				'STD_PRICE' => $ctrl_drd_std_price,
				'PURCHASE_DATE' => $current_date,
				'PROMO_AMOUNT' => $ctrl_drd_promo_amount,
				'PROMO_CODE_ID' => $ctrl_drd_promo_code_id,
				'CREDIT_OPTION_CONFIRMATION' => $ctrl_drd_confirm_code,
				'SMS_CONFIRM_CODE' => $ctrl_drd_sms_code,
				'USER_COURSE_STATUS_ID' => $ctrl_usercourse_status_id
		);
		$ctrl_drd_insert_dipcourse  =  $this->UserDiplomateDetail->insert($ctrl_drd_diplcourse_insertdata);
			
			if($ctrl_drd_insert_dipcourse)
			{
				$ctrl_dn_course_type = $this->KeyValue->getKeyvalueId("COURSE","TYPE","DIPLOMATE PROGRAM" );
				$ctrl_dn_course_status = $this->KeyValue->getKeyvalueId("USER COURSE","STATUS","ENROLLED" );
				$ctrl_dn_course_active_status = $this->KeyValue->getKeyvalueId("COURSE","STATUS","ACTIVE" );
				$ctrl_dn_course_progress = $this->KeyValue->getKeyvalueId("USER COURSE","STATUS","IN PROGRESS" );
				$ctrl_dn_course_id = $this->CourseMaster->listWhere(array("COURSE_TYPE"=>$ctrl_dn_course_type));
				$ctrl_drd_dn_course_array = array();
				foreach ($ctrl_dn_course_id as $ctrl_dn_course_id)
				{
					$ctrl_drd_dn_course_array[]=array("CREATE_BY"=>$this->session_Useremail,
					"CREATE_DATE"=>$this->current_date,
					"UPDATE_BY"=>$this->session_Useremail,
					"UPDATE_DATE"=>$this->current_date,
					"USER_ID"=>$this->session_Userid,
					"COURSE_ID"=>$ctrl_dn_course_id['ID'],
					'IP_ADDRESS' => $ctrl_drd_IP_address,
					'ENROLL_DATE' => $this->current_date,
					"USER_COURSE_STATUS_ID"=>$ctrl_dn_course_status,
					"CREDIT_OPTION_CONFIRMATION" =>$ctrl_drd_credit_option,
					"CREDIT_STATE" => $ctrl_drd_credit_state,
					"CREDIT_STATUS" => $ctrl_drd_credit_option,
					);
				}
				
				$ctrl_drd_insert_user_course = $this->db->insert_batch('dd_user_course',$ctrl_drd_dn_course_array);
				
				$first_course_inprogress = $this->CourseMaster->listWhere(array("COURSE_TYPE"=>$ctrl_dn_course_type,"COURSE_STATUS_ID"=>$ctrl_dn_course_active_status),"COURSE_NUM");
				//log_message('info',"firstcourse id".$first_course_inprogress);
				
				$updateCourseStatus = $this->UserCourse->update(array("USER_COURSE_STATUS_ID"=>$ctrl_dn_course_progress),array('COURSE_ID'=>$first_course_inprogress[0]['ID']));
															
															
				log_message('info','diplomate detail Table Insert Successfully');
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90003'),
				'message_type'=>$this->lang->line('success'),				
				);		
				log_message('info' ,'add_signup_data function end');
				
				$ctrl_drd_subject = $this->lang->line('ce_course_smscode_sub');
		
		$ctrl_drd_mobile_no = $this->StudentProfile->findByUniqueKey($this->session_Userid)['MOBILE_NUM'];
		$ctrl_drd_email_id = $this->session_Useremail;
		
		$ctrl_drd_sms_content = $this->lang->line('ce_course_smscode');
		$replace_array = array(
			'<SMS_CODE>' => $ctrl_drd_sms_code,
		); 
		$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_sms_content);
		
		$ctrl_drd_sms_send = $this->sendsms->send_sms_message($ctrl_drd_mobile_no,$ctrl_drd_replace_message);
		if($ctrl_drd_sms_send)
		{
			log_message('info' ,'Sms Send to registerd mobile number.');	
			/* $ctrl_drd_data = array(		      
				'message'=>'',    
				'message_type'=> $this->lang->line('success'),
			);			
			// Return the JSON value to ajax
			echo json_encode($ctrl_drd_data);
			return; */	
		}
		else
		{
			log_message('info' ,'Sms not send.');
			/* $ctrl_drd_data = array(		      
			'message'=>'',  
			'message_type'=> $this->lang->line('warning'),
			);			
			// Return the JSON value to ajax
			echo json_encode($ctrl_drd_data);
			return; */
		}
		
		
				echo json_encode($ctrl_drd_return_message);
				return;
			}
			else
			{		
			log_message('info','diplomate detail Table Insert Fail');			
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_return_message);
				return;
			}	
			
		log_message('info',"insert_diplomate_payment function End here");
	
	}

}// End of Class
?>
