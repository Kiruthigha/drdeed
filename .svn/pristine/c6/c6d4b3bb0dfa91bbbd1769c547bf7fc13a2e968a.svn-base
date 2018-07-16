<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_page_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Sales_page_controller
	 *	- or -
	 * 		http://example.com/index.php/Sales_page_controller/index
	 *	- or -
	 * Since this controller is set as the Sales_page_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Sales_page_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('string');
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 			
	}

	/**
	 * This function used to show the sales page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_sale_page($course_id) 
	{
		$this->load->view('header');		
		
		/* Get State list from state master table  */
		$crtl_drd_data['stateName'] = $this->StateMaster->listAll('STATE_NAME');
		
		/* Get T&C from ContentMaster table  */
		$ctrl_drd_content_fun_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','CE_PAYMENT');

		$crtl_drd_content_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_content_fun_id);
		$crtl_drd_data['content'] = $crtl_drd_content_data['CONTENT'];	
		
		/* Get Payment Thankyou from ContentMaster table  */
		$ctrl_drd_thankyou_fun_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','CE_PAYMENT_THANKYOU');

		$crtl_drd_thankyou_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_thankyou_fun_id);
		$crtl_drd_data['thankyou_content'] = $crtl_drd_content_data['CONTENT'];	
		
		/* Get Payment Thankyou from ContentMaster table  */
		$ctrl_drd_promo_ce_id = $this->KeyValue->getKeyvalueId('PROMO CODE','TYPE','CE');
		$ctrl_drd_promo_all_id = $this->KeyValue->getKeyvalueId('PROMO CODE','TYPE','BOTH');
		
		/* Get course type from keyvalue model */
		$ctrl_drd_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		/* Get CE course cost fron course cost model */
		$ctrl_drd_course_cost_data = $this->CourseCost->findByUniqueKey($ctrl_drd_course_type_id);
		$ctrl_drd_course_cost = $ctrl_drd_course_cost_data['COST']; 
		log_message('info',"Course cost ".$ctrl_drd_course_cost);
		
		/* Get Course cost from Course table*/
		$ctrl_drd_course_data = $this->CourseMaster->findByPrimaryKey($course_id);
		$ctrl_drd_course_credit = $ctrl_drd_course_data['COURSE_CREDIT'];
		log_message('info',"Course credit  ".$ctrl_drd_course_credit);
		
		/* Get Course details from Course table*/
		$crtl_drd_data['coursedata'] = $ctrl_drd_course_data;
		
		$ctrl_drd_course_price = ($ctrl_drd_course_credit * $ctrl_drd_course_cost) *2;
		$crtl_drd_data['std_price'] = $ctrl_drd_course_price;
		log_message('info',"Course Std  Price  ".$ctrl_drd_course_price);
		
		/* Get User  state  from student  profile model*/
		$crtl_drd_user_data = $this->StudentProfile->findByUniqueKey($this->session_Userid );
		
		/* Get State regulations from state regulation table*/
		$crtl_drd_data['user_state'] = $this->StateRegulations->findByUniqueKey($crtl_drd_user_data['STATE']);
		log_message('info',"user_state=  ".$crtl_drd_data['user_state']);
		$ctrl_drd_promo_status = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','ACTIVE');

		$crtl_drd_promo_list = $this->PromoCode->listWhere(array('PROMO_CODE_STATUS'=>$ctrl_drd_promo_status));
		foreach($crtl_drd_promo_list as $crtl_drd_promo_list)
		{
			$code_applied = $crtl_drd_promo_list['CODE_APPLIES']; 
			$start_date = $crtl_drd_promo_list['START_DATE']; 
			$end_date = $crtl_drd_promo_list['END_DATE']; 
			$current_date = date('Y-m-d'); 
			log_message('info',"Start Date  ".strtotime($start_date));
			log_message('info',"End Date  ".strtotime($end_date));
			if((strtotime($current_date)) <= strtotime($start_date))
			{
				if((($code_applied == $ctrl_drd_promo_ce_id) OR ($code_applied == $ctrl_drd_promo_all_id)) && ((strtotime($start_date)) < (strtotime($end_date))) )
				{
					$returnarray[]=$crtl_drd_promo_list;				
					log_message('info',print_r($returnarray,TRUE));
				}
			}
			
		}
		
		$crtl_drd_data['promolist'] = $returnarray;	
		$crtl_drd_data['courseId'] = $course_id;	
		log_message('info',print_r($crtl_drd_data,TRUE));
		log_message('info',"view_sale_page function Start here");
		$this->load->view('topmenu');
		$this->load->view('sales-page',$crtl_drd_data);
		$this->load->view('footer');
		log_message('info',"view_sale_page function Start here");
	} // End of view_sale_page Function
		
	/**
	 * This function get usercourse promotion amount
	 *
	 * @access public
	 * @since unknown
	 */
	public function get_promotion_amount($fun_name) 
	{		
		log_message('info',"get_promotion_amount function Start here");
		/* Store Post Values In variables */
		   
		$ctrl_drd_promo_code  = $this->input->post('ajx_promo_id');
		$ctrl_drd_crs_std_price  = $this->input->post('ajx_std_price');
		log_message('info',"course Price ".$ctrl_drd_crs_std_price);
		
		/* Get Payment Thankyou from ContentMaster table  */
		log_message('info',"Fun Name ".$fun_name);
		if($fun_name == 'CE')
		{
			$ctrl_drd_promo_ce_id = $this->KeyValue->getKeyvalueId('PROMO CODE','TYPE','CE');
		}
		else
		{
			$ctrl_drd_promo_ce_id = $this->KeyValue->getKeyvalueId('PROMO CODE','TYPE','DIPLOMO');
		}
		$ctrl_drd_promo_all_id = $this->KeyValue->getKeyvalueId('PROMO CODE','TYPE','BOTH');
		
		/* Get Promotion details from PromotCode table*/
		$ctrl_drd_promo_data = $this->PromoCode->listWhere(array('PROMO_CODE'=>$ctrl_drd_promo_code));
		if($ctrl_drd_promo_data)
		{
			foreach($ctrl_drd_promo_data as $crtl_drd_promo_list)
			{
				$code_applied = $crtl_drd_promo_list['CODE_APPLIES']; 
				$start_date = $crtl_drd_promo_list['START_DATE']; 
				$end_date = $crtl_drd_promo_list['END_DATE']; 
				$current_date = date('Y-m-d'); 
				log_message('info',"Start Date  ".$start_date);
				log_message('info',"End Date  ".$end_date);
				log_message('info',"Current Date  ".$current_date);
				if((strtotime($current_date)) >= strtotime($start_date) && (strtotime($current_date)) <= strtotime($end_date) )
				{
					if((($code_applied == $ctrl_drd_promo_ce_id) OR ($code_applied == $ctrl_drd_promo_all_id)) && ((strtotime($start_date)) < (strtotime($end_date))) )
					{
						log_message('info','Get promo code success');
						$ctrl_drd_promo_discount = $crtl_drd_promo_list['PERCENT_DISCOUNT'];
						log_message('info',"discount percentage ".$ctrl_drd_promo_discount);
						
						/* Calculate promo  amount*/
						$ctrl_drd_promo_amount = ($ctrl_drd_promo_discount / 100) * $ctrl_drd_crs_std_price;
						log_message('info',"promotion_amount ".$ctrl_drd_promo_amount);
						
						/* Calculate User Course total discount amount*/
						$ctrl_drd_discount_amount = $ctrl_drd_crs_std_price - $ctrl_drd_promo_amount;
						log_message('info',"discount_amount ".$ctrl_drd_discount_amount);
								
						$ctrl_drd_return_array = array(
						'message' =>'',
						'PROMO_ID'=>$crtl_drd_promo_list['ID'],
						'PROMO_AMOUNT'=>$ctrl_drd_promo_amount,
						'TOTAL_DISCOUNT_AMOUNT'=>$ctrl_drd_discount_amount,
						);		
						log_message('info',print_r($returnarray,TRUE));
						echo json_encode($ctrl_drd_return_array);
						return;						
					}
					else
					{		
						log_message('info',"CE/BOTH or start date greater than end  date  Error" );						
						$ctrl_drd_return_array = array('message' => $this->lang->line('m_90834'));
						echo json_encode($ctrl_drd_return_array);
						return;
					}
				}
				else
				{		
					log_message('info',"Promo Code promotion not working" );
					$ctrl_drd_return_array = array('message' => $this->lang->line('m_90834'));
					echo json_encode($ctrl_drd_return_array);
					return;					
				}			
			}			
		}
		else
		{
			log_message('info','Promo Code not valid');			
			$ctrl_drd_return_array = array('message' => $this->lang->line('m_90834'));
			echo json_encode($ctrl_drd_return_array);
			return;
		}
		
		log_message('info',"get_promotion_amount function End here");
	} // End of user_course Function
	
	
	/**
	 * This function get state guidelines from state regulation Model
	 *
	 * @access public
	 * @since unknown
	 */
	public function get_state_guidelines() 
	{		
		log_message('info',"get_state_guidelines function Start here");
		/* Store Post Values In variables */
		   
		$ctrl_drd_state_id  = $this->input->post('ajx_drd_state_id');
		$crtl_drd_state_regulations = $this->StateRegulations->findByUniqueKey($ctrl_drd_state_id);
		log_message('info',"Get State list".print_r($crtl_drd_state_regulations,TRUE));
		if($crtl_drd_state_regulations)
		{					
			$ctrl_drd_return_array = array(
			'message' =>'',
			'STATE_GUIDELINES'=>$crtl_drd_state_regulations['STATE_GUIDELINES'],
			'STATE_URL'=>$crtl_drd_state_regulations['STATE_REF_URL']
			);		
			log_message('info',print_r($returnarray,TRUE));
			echo json_encode($ctrl_drd_return_array);
			return;						
		}
		else
		{
			log_message('info','Promo Code not valid');			
			$ctrl_drd_return_array = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
			);
			echo json_encode($ctrl_drd_return_array);
			return;
		}
		
		log_message('info',"get_state_guidelines function Start here");
	} // End of user_course Function	
	
	/**
	 * This function used insert user course details from usercourse model
	 *
	 * @access public
	 * @since unknown
	 */
	public function insert_user_course_payment() 
	{	
		log_message('info',"insert_user_course_payment function Start here");
		
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
		$ctrl_drd_course_id  = $this->input->post('ajx_drd_courseid');
		$ctrl_drd_std_price  = intval($this->input->post('ajx_drd_std_price'));
		$ctrl_drd_promo_amount  = substr($this->input->post('ajx_drd_promo_amount'), 1);
		$ctrl_drd_promo_code_id  = $this->input->post('ajx_drd_promo_codeid');
		$ctrl_drd_promo_net_amt  = $this->input->post('ajx_drd_net_amount');
		$ctrl_drd_IP_address  = $_SERVER['REMOTE_ADDR'];
		
		log_message('info',"ctrl_drd_promo_net_amt= ".$ctrl_drd_promo_net_amt);
				
		$current_date  = date('Y-m-d');
		/* Get T&C from ContentMaster table  */
		$ctrl_usercourse_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');
		
		/* Check usercourse status already  exists  count increase  */
		$where_array  =  array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_ID'=>$ctrl_drd_course_id,
		);
		$ctrl_usercourse = $this->UserCourse->listWhere($where_array,'TAKE_COUNT DESC');
		 if(count($ctrl_usercourse)>=1)
		{
			$take_count = $ctrl_usercourse[0]['TAKE_COUNT']+1;
		}
		else 
		{
			$take_count = 1;
		}
		if($ctrl_drd_credit_status_id == 'Y')
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
		
		$ctrl_drd_usercourse_insertdata  = array(
			"CREATE_BY" => $this->session_Useremail,
			"CREATE_DATE" => $this->current_date,
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			'COURSE_ID' => $ctrl_drd_course_id,
			'CREDIT_STATE' => $ctrl_drd_credit_state_id,
			'CREDIT_STATUS' => $ctrl_drd_credit_status_id,
			'ENROLL_DATE' => $current_date,
			'IP_ADDRESS' => $ctrl_drd_IP_address,
			'PROMO_AMOUNT' => $ctrl_drd_promo_amount,
			'PROMO_CODE_ID' => $ctrl_drd_promo_code_id,
			'SMS_CONFIRM_CODE' => $ctrl_drd_sms_code,
			'CREDIT_OPTION_CONFIRMATION' => $ctrl_drd_confirm_code,
			'STD_PRICE' => $ctrl_drd_std_price,
			'TAKE_COUNT' => $take_count,
			'USER_ID' => $this->session_Userid,
			'USER_COURSE_STATUS_ID' => $ctrl_usercourse_status_id
		);
		
		$ctrl_drd_insert_usercourse  =  $this->UserCourse->insert($ctrl_drd_usercourse_insertdata);
		
		if($ctrl_drd_insert_usercourse)
		{			
			/* Get User list from UserModel */
			$ctrl_drd_user_data =  $this->StudentProfile->getstudentprofile(array('USER_ID'=>$this->session_Userid));
			$ctrl_drd_user_data = $ctrl_drd_user_data[0];
			log_message('info',"ctrl_drd_user_data= ".print_r($ctrl_drd_user_data,TRUE));
			
			$ctrl_drd_course_data =  $this->CourseMaster->findByPrimaryKey($ctrl_drd_course_id);
			log_message('info',"ctrl_drd_course_data= ".print_r($ctrl_drd_course_data,TRUE));
			
			$ctrl_drd_fname = $ctrl_drd_user_data['FIRST_NAME'];
			$ctrl_drd_lname = $ctrl_drd_user_data['LAST_NAME'];
			$ctrl_drd_course = $ctrl_drd_course_data['COURSE_NAME'];
			$ctrl_drd_credit = $ctrl_drd_course_data['COURSE_CREDIT'];
			$ctrl_drd_amount = $ctrl_drd_promo_net_amt;
			$ctrl_drd_date = date("M dd, yy"); 
			
			$ctrl_drd_subject = $this->lang->line('ce_course_smscode_sub');
			$ctrl_drd_mobile_no = $ctrl_drd_user_data['MOBILE_NUM'];
			$ctrl_drd_email_id = $this->session_Useremail;
			
			$ctrl_drd_sms_content = $this->lang->line('ce_course_smscode');
			$replace_array = array(
				'<SMS_CODE>' => $ctrl_drd_sms_code,
			); 
			$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_sms_content);
			
			$ctrl_drd_sms_send = $this->sendsms->send_sms_message($ctrl_drd_mobile_no,$ctrl_drd_replace_message);			
			
			$ctrl_email_data  = array(
				"User_Email" => $ctrl_drd_email_id,
				"User_FName" => $ctrl_drd_fname,
				"User_LName" => $ctrl_drd_lname,
				"Course_Name" => $ctrl_drd_course,
				"Credit" => $ctrl_drd_credit,
				"Amount" => $ctrl_drd_amount,
				"Date" => $ctrl_drd_date,
			);
			$ctrl_drd_email_data = $this->send_email($ctrl_email_data);		
			log_message('info' ,'ctrl_drd_email_data= .'.$ctrl_drd_email_data);	
			
			if($ctrl_drd_sms_send && $ctrl_drd_email_data)
			{
				log_message('info' ,'Inside IF.');	
				log_message('info' ,'Sms Send to registerd mobile number.');	
				
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90003'),
				'message_type'=>$this->lang->line('success'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_return_message);
				return;
			}
			else if(!$ctrl_drd_email_data) 
			{
				log_message('info' ,'Inside Else IF.');	
				log_message('info', ' Email Failed !!');
				$ctrl_drd_return_message= array(
				'message' => $this->lang->line('m_90831'),
				'message_type'=>$this->lang->line('warning'),
				);			 
				echo json_encode($ctrl_drd_return_message);
				return $ctrl_drd_return_message;
			} 
			else 
			{
				log_message('info' ,'Else .');	
				log_message('info' ,'Sms not send.');
				$ctrl_drd_return_message = array(
					'message' => $this->lang->line('m_90008'),
					'message_type'=>$this->lang->line('warning'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_return_message);
				return;
			}						
		}
		else
		{		
		log_message('info','UserCourse Table Insert Fail');			
			$ctrl_drd_return_message = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);		
			log_message('info' ,'add_signup_data function end');
			//echo json_encode($ctrl_drd_return_message);
			return;
		}	
			
		log_message('info',"insert_user_course_payment function End here");
	}
	
	/**
	 * This will used for course payment
	 * using autherization.net
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function do_user_payment() 
	{
		log_message('info',"payment function start here");

		$ctrl_drd_name_on_card = $this->input->post('txtt2cardname');
		$ctrl_drd_cardno = $this->input->post('txtt2cardnoname');
		$ctrl_drd_expiry_date = $this->input->post('txtt2expname');
		$ctrl_drd_cvv = $this->input->post('txtt2cvvname');
		$ctrl_drd_address = $this->input->post('txtt2address');
		$ctrl_drd_city = $this->input->post('txtt2city');
		$ctrl_drd_state = $this->input->post('txtt2state');
		$ctrl_drd_zipcode = $this->input->post('txtt2zip');				
		$ctrl_drd_amount = number_format($this->input->post('txtAmountName'),2);
		log_message('info',"ctrl_drd_amount= ".$ctrl_drd_amount);
		$this->load->library('Authorize');	
		$card_expiration = $ctrl_drd_expiry_date;
		   
		$ctrl_drd_login  	 = "7dCTk328tV7Y";
		$ctrl_drd_tran_key  = "66Vw538yPdm4L59S";
		$ctrl_drd_card_number = $ctrl_drd_cardno; 
		$ctrl_drd_date = date("YmdHis");
		
		$ctrl_drd_randomid = random_string('alnum',8);	
		$ctrl_drd_invoice_num = $ctrl_drd_randomid.$ctrl_drd_date;
			   
		$ctrl_drd_card_code = $ctrl_drd_cvv;
		
		$post_values = '
		<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
		  <merchantAuthentication>
			<name>'.$ctrl_drd_login.'</name>
			<transactionKey>'.$ctrl_drd_tran_key.'</transactionKey>
		  </merchantAuthentication>
		  <transactionRequest>
			<transactionType>authCaptureTransaction</transactionType>
			<amount>'.$ctrl_drd_amount.'</amount>
			<payment>
			  <creditCard>
				<cardNumber>'.$ctrl_drd_card_number.'</cardNumber>
				<expirationDate>'.$ctrl_drd_expiry_date.'</expirationDate>
				<cardCode>'.$ctrl_drd_card_code.'</cardCode>
			  </creditCard>
			</payment>
			<order>
			  <invoiceNumber>'.$ctrl_drd_invoice_num.'</invoiceNumber>
			  <description></description>
			</order>

			<billTo>
			  <firstName>'.$ctrl_drd_name_on_card.'</firstName>
			  <lastName>'.$ctrl_drd_name_on_card.'</lastName>
			  <address>'.$ctrl_drd_address.'</address>
			  <city>'.$ctrl_drd_city.'</city>
			  <state>'.$ctrl_drd_state.'</state>
			  <zip>'.$ctrl_drd_zipcode.'</zip>
			  <country>USA</country>
			</billTo>
		  </transactionRequest>
		</createTransactionRequest>';
		
		$post_url = "https://apitest.authorize.net/xml/v1/request.api";	
		
		//Calling Payment function				  
		$paymentResponse = $this->_sendXmlOverPost($post_url,$post_values);		
		log_message('info',"paymentResponse= ".print_r($paymentResponse,TRUE));
		
		if($paymentResponse[0]==1 && $paymentResponse[1]==1 && $paymentResponse[2]==1)
		{
			log_message('info',"payment is successful.");
			// payment is successful. Do your action here
		}
		else
		{
			log_message('info',"payment failed.");
			// payment failed.
			return $paymentResponse[3]; // return error
		}
			
		log_message('info',"payment function end here");
	}
		
	/**
	 * send Xml Values to autherization.net
	 *
	 * @access public
	 * @since unknown
	 */ 
	function _sendXmlOverPost($url, $xml) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);

		// For xml, change the content-type.
		curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned

		// Send to remote and return data to caller.
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}		
		
	/**
	 * This will Call for Email Integration function
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function send_email($msg_data)
	{
		log_message('info' ,'send_email function start');   		
		
		$ctrl_drd_to = $msg_data['User_Email'];
		$ctrl_drd_subject = $this->lang->line('course_enroll_sub');
		$ctrl_drd_message  = $this->lang->line('course_enroll_msg');
			
		$replace_array = array(
			'<FIRST_NAME>' => $msg_data['User_FName'],
			'<LAST_NAME>' => $msg_data['User_LName'],
			'<EMAIL_ID>' => $msg_data['User_Email'],
			'<COURSE>' => $msg_data['Course_Name'],
			'<CREDIT>' => $msg_data['Credit'],
			'<AMOUNT>' => $msg_data['Amount'],
			'<DATE>' => $msg_data['Date']
		);   
			
		$ctrl_drd_replace_message = $this->common_functions->str_replace_assoc($replace_array,$ctrl_drd_message); 
		log_message('info','Email Content '.$ctrl_drd_replace_message);
		$sendmail = $this->sendmail->send_email_fun($ctrl_drd_to, $ctrl_drd_subject, $ctrl_drd_replace_message); 
        log_message('info' ,'send_Email function send_email'); 
		
		return $sendmail;			
	} // End of send_Email function
	
} // End of Class 
?>
