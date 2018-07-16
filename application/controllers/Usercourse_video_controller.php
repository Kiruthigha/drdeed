<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercourse_video_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Usercourse_video_controller
	 *	- or -
	 * 		http://example.com/index.php/Usercourse_video_controller/index
	 *	- or -
	 * Since this controller is set as the Usercourse_video_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Usercourse_video_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() 
	{
		parent::__construct();	
		
		/* To get session UserId,EmailId and declare public variables */
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 	
		$this->load->library('mathcaptcha'); // Load Captcha library
		$config=array(
			'operation' => 'addition',
			'question_format'   => 'numeric', 
			'answer_format'   => 'numeric',
			);
		$this->mathcaptcha->init($config);
	}
	
	/**
	 * This function used to show user course
	 *
	 * @access public
	 * @since unknown
	 */
	public function user_course($course_id) 
	{		
		log_message('info',"user_course function Start here");
		$this->load->view('header');		
		$this->load->view('topmenu');
		
		/* Get Course details from Course table*/
		$ctrl_drd_data['coursedata'] = $this->CourseMaster->findByPrimaryKey($course_id);
		
		/* Get user course details from usercourse table*/
		$wherearray  = array(
			'USER_ID'=>$this->session_Userid,
			'COURSE_ID'=>$course_id
		);
		
		 $ctrl_drd_usercoursedata= $this->UserCourse->listWhere($wherearray,'TAKE_COUNT DESC');
		if(count($ctrl_drd_usercoursedata) == 1)
		{
			$ctrl_drd_usercoursedata =  $ctrl_drd_usercoursedata[0];
			$ctrl_drd_data['usercoursedata'] =  $ctrl_drd_usercoursedata;
			$ctrl_drd_data['usercourseid'] =  $ctrl_drd_usercoursedata['ID'];
			$ctrl_drd_data['quizcount'] =  $ctrl_drd_usercoursedata['QUIZ_ATTEMPT_COUNT'];
			$ctrl_drd_data['smsconfirmtion'] =  $ctrl_drd_usercoursedata['CREDIT_OPTION_CONFIRMATION'];
			$ctrl_drd_data['resumeposition'] =  $ctrl_drd_usercoursedata['RESUME_POSITION'];
			$ctrl_drd_data['timeonpage'] =  $ctrl_drd_usercoursedata['TIME_ON_PAGE'];
			$ctrl_drd_quiz_status_id =  $ctrl_drd_usercoursedata['QUIZ_STATUS_ID'];
			
			/* Get quiz status from keyvalue model */
			$crtl_drd_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_status_id);
			$ctrl_drd_data['quizstatus'] = $crtl_drd_status['VALUE_NAME'];
			
			$ctrl_drd_course_status_id =  $ctrl_drd_usercoursedata['USER_COURSE_STATUS_ID'];
			
			/* Get  user course status from keyvalue model */
			$crtl_drd_course_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_course_status_id);
			$ctrl_drd_data['coursestatus'] = $crtl_drd_course_status['VALUE_NAME'];
			
			
			$ctrl_drd_data['smscode'] =  $ctrl_drd_usercoursedata['SMS_CONFIRM_CODE'];
			$ctrl_drd_data['creditstatus'] =  $ctrl_drd_usercoursedata['CREDIT_STATUS'];
			$ctrl_drd_data['courseid'] =  $course_id;
		}
		else
		{
			$ctrl_drd_data['usercoursedata'] =  '';
			$ctrl_drd_data['usercourseid'] =  '';
			$ctrl_drd_data['quizcount'] =  '';
			$ctrl_drd_data['smsconfirmtion'] =  '';
			$ctrl_drd_data['resumeposition'] =  '';
			$ctrl_drd_data['timeonpage'] =  '';
			$ctrl_drd_data['quizstatus'] =  '';
			$ctrl_drd_data['coursestatus'] =  '';
			$ctrl_drd_data['smscode'] =  '';
			$ctrl_drd_data['creditstatus'] =  '';
			$ctrl_drd_data['courseid'] =  '';
		}
		
		/* Get T&C from ContentMaster table  */
		$ctrl_drd_doc_type_id = $this->KeyValue->getKeyvalueId('DOCUMENT','TYPE','PDF');
		
		/* Get Course documents from Course table*/
		$ctrl_drd_data['documents'] = $this->CourseDocuments->listWhere(array('DOC_TYPE_ID'=>$ctrl_drd_doc_type_id,'COURSE_ID'=>$course_id));		
				
		/* Get State General  Active from Keyvaluemodel table*/
		$ctrl_drd_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
					
		/* Get State General  Active from Keyvaluemodel table*/
		$ctrl_drd_quest_type_id = $this->KeyValue->getKeyvalueId('QUESTION','TYPE','OBJECTIVE');
			
		/* Get Course quiz from CourseQuizQuestion table*/
		$ctrl_drd_quiz_data = $this->CourseQuizQuestion->listWhere(array('QUIZ_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,'COURSE_ID'=>$course_id,'QUESTION_TYPE'=>$ctrl_drd_quest_type_id),'rand()');
		$ctrl_drd_quiz = [];
		foreach($ctrl_drd_quiz_data as $ctrl_drd_quiz_data)
		{
			$crtl_drd_qustion_type = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_data['QUESTION_TYPE']);
			$answer_array =array($ctrl_drd_quiz_data['ANSWER_OPTION_A'],$ctrl_drd_quiz_data['ANSWER_OPTION_B'],$ctrl_drd_quiz_data['ANSWER_OPTION_C'],$ctrl_drd_quiz_data['ANSWER_OPTION_D']);
			$answer_array = $this->shuffle_assoc($answer_array);
			$ctrl_drd_quiz[]  =  array_merge(array('QUESTION_NO'=>$ctrl_drd_quiz_data['ID'],'QUESTION_NAME'=>$ctrl_drd_quiz_data['QUIZ_QUESTION'],'QUESTION_TYPE'=>$crtl_drd_qustion_type['VALUE_NAME']),$answer_array);
		}
		log_message('info',"Array  Suffle ".print_r($ctrl_drd_quiz,TRUE));
		$ctrl_drd_data['quiz'] = $ctrl_drd_quiz;
		
		$where_surveyarray = array(
			'SURVEY_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,
		);
		$ctrl_drd_data['survey'] = $this->CourseSurvey->listWhere($where_surveyarray);
		
		/* Get T&C from ContentMaster table  */
		$ctrl_drd_ce_course_congrat_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','CE_COURSE CONGRATULATIONS');

		/* Get T&C from ContentMaster table  */
		$ctrl_drd_congrat_content = $this->ContentMaster->findByUniqueKey($ctrl_drd_ce_course_congrat_id);
		$ctrl_drd_data['congratulation_content'] = $ctrl_drd_congrat_content['CONTENT'];
		
		log_message('info',"Return Data ".print_r($ctrl_drd_data,TRUE));
		
		$ctrl_drd_data['math_captcha_question'] = $this->mathcaptcha->get_question();
		
		$this->load->view('coursework',$ctrl_drd_data);
		$this->load->view('footer');
		log_message('info',"user_course function Start here");
	} // End of user_course Function
	
	/**
	 * This function used Insert User Course Quiz details and calculate Quiz Result 
	 *
	 * @access public
	 * @since unknown
	 */
	public function insert_quiz() 
	{		
		log_message('info',"insert_quiz function Start here");
		$ctrl_drd_user_score = 0;
		$ctrl_drd_quiz_array= array();
		$return_msg =  0;
		$ctrl_drd_courseid = $this->input->post('ajx_drd_course_id');
		$ctrl_drd_user_courseid = $this->input->post('ajx_drd_user_course_id');
		
		/* Get User Course Details  From  UserCourse  Model */
		$ctrl_drd_usercourse_details = $this->UserCourse->findByPrimaryKey($ctrl_drd_user_courseid);
		$ctrl_drd_attempt_count	= $ctrl_drd_usercourse_details['QUIZ_ATTEMPT_COUNT'];
		log_message('info',"Quiz Count ".$ctrl_drd_attempt_count);
		
		log_message('info',"Count ".count($this->input->post('ajx_drd_quiz_data')));
		for($i=0;$i<count($this->input->post('ajx_drd_quiz_data'));$i++)
		{
			$ctrl_drd_qutn_id = $this->input->post('ajx_drd_quiz_data')[$i]['Question_No'];
			$ctrl_drd_qutn_name = $this->input->post('ajx_drd_quiz_data')[$i]['Question_Name'];
			$ctrl_drd_user_ans = $this->input->post('ajx_drd_quiz_data')[$i]['Answer'];
			
			/* Get Quiz Question list from QuizModel table */
			$ctrl_drd_quiz_list = $this->CourseQuizQuestion->findByPrimaryKey($ctrl_drd_qutn_id);
			$ctrl_drd_valid_answer  =  $ctrl_drd_quiz_list['ANSWER_OPTION_A'];
			
			/* Check user answer pass or fail */
			if(trim($ctrl_drd_user_ans) == trim($ctrl_drd_valid_answer))
			{
				/* Get Quiz Pass Value from keyvalue model*/
				$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','PASS');
				$ctrl_drd_user_score=$ctrl_drd_user_score+20;					
			}
			else
			{
				/* Get Quiz Fail Value from keyvalue model*/
				$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','FAIL');
			}
			
			$user_course_quiz_id = $this->UserCourseQuiz->listWhere(array('USER_COURSE_ID'=>$ctrl_drd_user_courseid,'QUIZ_QUESTION_ID'=>$ctrl_drd_qutn_id));
			/* Check Quiz Already exists in Quiz Model.*/
			if(count($user_course_quiz_id)==1)
			{
				$user_course_quiz_id = $user_course_quiz_id[0];
				$ctrl_drd_update_quiz_data = array(
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,				
					"ID" => $user_course_quiz_id['ID'],				
					"USER_COURSE_ID" =>$ctrl_drd_user_courseid,
					"QUIZ_QUESTION" =>$ctrl_drd_qutn_name,
					"QUIZ_QUESTION_ID" =>$ctrl_drd_qutn_id,
					"USER_ANSWER" =>$ctrl_drd_user_ans,	
					"VALID_ANSWER" =>$ctrl_drd_valid_answer,
					"QUIZ_QUESTION_STATUS_ID" =>$ctrl_drd_user_quiz_statusid,		
				);
				$ctrl_drd_quiz_query ='UPDATE';
				//log_message('info',"Quiz data  ".print_r($ctrl_drd_update_quiz_data,TRUE));
				array_push($ctrl_drd_quiz_array,$ctrl_drd_update_quiz_data);
			}
			else
			{
				log_message('info','Return UserQuiz Id Get Fail');			
				
				$ctrl_drd_insert_quiz_data = array(
					"CREATE_BY" => $this->session_Useremail,
					"CREATE_DATE" => $this->current_date,
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,				
					"USER_COURSE_ID" =>$ctrl_drd_user_courseid,
					"QUIZ_QUESTION" =>$ctrl_drd_qutn_name,
					"QUIZ_QUESTION_ID" =>$ctrl_drd_qutn_id,
					"USER_ANSWER" =>$ctrl_drd_user_ans,	
					"VALID_ANSWER" =>$ctrl_drd_valid_answer,
					"QUIZ_QUESTION_STATUS_ID" =>$ctrl_drd_user_quiz_statusid,		
				);
				$ctrl_drd_quiz_query ='INSERT';
				//log_message('info',"Quiz data  ".print_r($ctrl_drd_insert_quiz_data,TRUE));
				array_push($ctrl_drd_quiz_array,$ctrl_drd_insert_quiz_data);
			}
			
		}//End ForLoop
		
		/* Get Quiz Fail Value from keyvalue model*/
		$ctrl_drd_course_data = $this->CourseMaster->findByPrimaryKey($ctrl_drd_courseid);
		$ctrl_drd_pass_percent = $ctrl_drd_course_data['PASS_PERCENT'];
		
		log_message('info',"User Score ".$ctrl_drd_user_score);
		
		if($ctrl_drd_pass_percent <= $ctrl_drd_user_score)
		{
			/* Get Quiz Pass Value from keyvalue model*/
			$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','PASS');
			$ctrl_quiz_status = 'PASS';
		}
		else
		{
			/* Get Quiz Fail Value from keyvalue model*/
			$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','FAIL');
			$ctrl_quiz_status = 'FAIL';
		}
		$ctrl_drd_user_course_data = array(				
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"QUIZ_ATTEMPT_COUNT" =>$ctrl_drd_attempt_count+1,
			//'TIME_ON_PAGE'=>$this->input->post('ajx_drd_TotalTimeOnPage'),
			"PERCENT_SCORED" =>$ctrl_drd_user_score,
			"QUIZ_STATUS_ID" =>$ctrl_drd_user_quiz_statusid	
		);
		$ctrl_drd_query_data['QUIZ']=$ctrl_drd_quiz_array;
		$ctrl_drd_query_data['QUIZ_QUERY']=$ctrl_drd_quiz_query;
		$ctrl_drd_query_data['UPDATE_USER_COURSE']=$ctrl_drd_user_course_data;
		$ctrl_drd_query_data['UPDATE_USER_COURSE_ID']=array('ID'=>$ctrl_drd_user_courseid);
		
		$ctrl_drd_usercourse_update = $this->UserCourseQuiz->update_user_quiz($ctrl_drd_query_data);
		
		if($ctrl_drd_usercourse_update !=0)
		{
			log_message('info','Return Success Message');			
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90822'),
			'message_type'=>$this->lang->line('success'),
			'quiz_status'=>$ctrl_quiz_status,
			'quiz_count'=>$ctrl_drd_attempt_count+1,
			'score'=>$ctrl_drd_user_score,
			);		
			echo json_encode($ctrl_drd_return_data);
			return;	
		}
		else
		{
			log_message('info','Return Error Message');			
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			'quiz_status'=>$ctrl_quiz_status,
			'quiz_count'=>$ctrl_drd_attempt_count+1,
			'score'=>$ctrl_drd_user_score,
			);	
			echo json_encode($ctrl_drd_return_data);
			return;	
		}
		
		log_message('info',"insert_quiz function Start here");
	} // End of insert_quiz Function
	 
	/**
	 * This function used Insert User Survey details and Finish Course
	 *
	 * @access public
	 * @since unknown
	 */
	public function insert_survey() 
	{		
		log_message('info',"insert_survey function Start here");
		$ctrl_drd_insert_survey_array= array();
		$ctrl_drd_update_survey_array= array();
		$ctrl_drd_user_courseid = $this->input->post('ajx_drd_user_course_id');
		$ctrl_drd_courseid = $this->input->post('ajx_drd_course_id');
		$ctrl_drd_credit_status = $this->input->post('ajx_drd_credit_status');

		$option1='N';
		$option2='N';
		$option3='N';
		$option4='N';
		$option5='N';

		log_message('info',"Count ".count($this->input->post('ajx_drd_survey_data')));
		for($i=0;$i<count($this->input->post('ajx_drd_survey_data'));$i++)
		{
			$ctrl_drd_qutn_id = $this->input->post('ajx_drd_survey_data')[$i]['Survey_No'];
			$ctrl_drd_qutn_name = $this->input->post('ajx_drd_survey_data')[$i]['Survey_Name'];
			$ctrl_drd_user_ans = $this->input->post('ajx_drd_survey_data')[$i]['Answer'];
			log_message('info','Survey Ans  '.$ctrl_drd_user_ans);
			if($ctrl_drd_user_ans == 1)
			{
				$option1='Y';
				$option2='N';
				$option3='N';
				$option4='N';
				$option5='N';
			}
			if($ctrl_drd_user_ans == 2)
			{
				$option1='N';
				$option2='Y';
				$option3='N';
				$option4='N';
				$option5='N';
			}
			if($ctrl_drd_user_ans == 3)
			{
				$option1='N';
				$option2='N';
				$option3='Y';
				$option4='N';
				$option5='N';
			}
			if($ctrl_drd_user_ans == 4)
			{
				$option1='N';
				$option2='N';
				$option3='N';
				$option4='Y';
				$option5='N';
			}
			if($ctrl_drd_user_ans == 5)
			{
				$option1='N';
				$option2='N';
				$option3='N';
				$option4='N';
				$option5='Y';
			}
			
			$ctrl_drd_insert_survey_data = array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,				
				"USER_COURSE_ID" =>$ctrl_drd_user_courseid,
				"SURVEY_QUESTION" =>$ctrl_drd_qutn_name,
				"SURVEY_ID" =>$ctrl_drd_qutn_id,
				"OPTION_1" =>$option1,		
				"OPTION_2" =>$option2,		
				"OPTION_3" =>$option3,		
				"OPTION_4" =>$option4,		
				"OPTION_5" =>$option5,		
			);
			//log_message('info',"Quiz data  ".print_r($ctrl_drd_insert_quiz_data,TRUE));
			array_push($ctrl_drd_insert_survey_array,$ctrl_drd_insert_survey_data);
					
		}//End ForLoop
			
		/* Get Quiz Pass Value from keyvalue model*/
		$ctrl_drd_user_statusid = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		$course_complete_score = 100; // hot coded after Survey complete update course precent score

		$ctrl_drd_user_course_data = array(				
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"COMPLETE_DATE" =>$this->current_date,
			"PERCENT_COMPLETE" =>$course_complete_score,
			//'TIME_ON_PAGE'=>$this->input->post('ajx_drd_TotalTimeOnPage'),
			"USER_COURSE_STATUS_ID" =>$ctrl_drd_user_statusid	
		);
		if($ctrl_drd_credit_status == 'Y')
		{	
			$ctrl_drd_course_id = $this->UserCourse->listWhere(array("ID"=>$ctrl_drd_user_courseid),"UPDATE_DATE DESC")[0]['COURSE_ID'];
	
			$certificate_array =array(
				'COURSE_ID'=>$ctrl_drd_course_id,
				'USER_ID'=>$this->session_Userid,
				'COMPLETED_DATE'=>$this->common_functions->date_display_format($this->current_date)
			);
			$certificate_path = $this->_genPdf($certificate_array);		
		}
		else
		{
			$certificate_path = NULL;
		}
		
		$ctrl_drd_certificate_array =  array(
			'CREATE_BY'=>$this->session_Useremail,
			'CREATE_DATE'=>$this->current_date,
			'UPDATE_BY'=>$this->session_Useremail,
			'UPDATE_DATE'=>$this->current_date,
			'COURSE_ID'=>$ctrl_drd_courseid,
			'USER_COURSE_ID'=>$ctrl_drd_user_courseid,
			'USER_ID'=>$this->session_Userid,
			'COURSE_CERTIFICATE_PATH'=>$certificate_path,
		);
		$ctrl_drd_query_data['SURVEY']=$ctrl_drd_insert_survey_array;
		$ctrl_drd_query_data['UPDATE_USER_COURSE']=$ctrl_drd_user_course_data;
		$ctrl_drd_query_data['UPDATE_USER_COURSE_ID']=array('ID'=>$ctrl_drd_user_courseid);
		$ctrl_drd_query_data['COURSE_CERTIFICATE']=$ctrl_drd_certificate_array;
		
		$ctrl_drd_usercourse_data = $this->UserCourseSurvey->update_user_survey($ctrl_drd_query_data);
		if($ctrl_drd_usercourse_data !=0)
		{
			log_message('info',"UserCourseSurvey Insert SUCCESS");
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90823'),
			'message_type'=>$this->lang->line('success'),
			);	
			echo json_encode($ctrl_drd_return_data);
			return;						
		}
		else
		{
			log_message('info',"UserCourseSurvey Insert Query Fail");
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);	
			echo json_encode($ctrl_drd_return_data);
			return;					
		}	
		log_message('info',"insert_survey function Start here");
		
	} // End of insert_quiz Function
	
	/**
	 * This function used to resend sms code to user
	 *
	 * @access public
	 * @since unknown
	 */
	public function resend_smscode() 
	{		
		log_message('info',"resend_smscode function Start here");
		
		/* Get Usercourse list from UserCourseModel */
		$ctrl_drd_usercourseid =  $this->input->post('ajx_drd_user_course_id');
		$ctrl_drd_usercourse_data =  $this->UserCourse->findByPrimaryKey($ctrl_drd_usercourseid);
		
		$ctrl_drd_smscode = $ctrl_drd_usercourse_data['SMS_CONFIRM_CODE'];
		
		/* Get User list from UserModel */
		$ctrl_drd_mobile_no =  $this->StudentProfile->findByUniqueKey($this->session_Userid)['MOBILE_NUM'];
		
		$ctrl_drd_subject = $this->lang->line('ce_course_smscode_sub');
		$ctrl_drd_email_id = $this->session_Useremail;
		
		$ctrl_drd_sms_content = $this->lang->line('ce_course_smscode');
		$replace_array = array(
			'<SMS_CODE>' => $ctrl_drd_smscode,
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
		$sendmail = $this->sendmail->send_email_fun($ctrl_drd_email_id, $ctrl_drd_subject, $ctrl_drd_replace_message); 
        log_message('info' ,'send_Email function send_email');  
		if($sendmail)
		{			
			log_message('info', ' Email Success !!');
			$ctrl_drd_data = array(		      
				'message'=>'',    
				'message_type'=> $this->lang->line('success'),
			);			
			// Return the JSON value to ajax
			echo json_encode($ctrl_drd_data);
			return;		 
		}
		else
		{
			log_message('info', ' Email Failed !!');
			$ctrl_drd_data= array(
           'message' =>'',
		   'message_type'=>$this->lang->line('success'),
		   );			 
		    echo json_encode($ctrl_drd_data);
			return;
		}
		log_message('info',"resend_smscode function Start here");
		
	} // End of insert_quiz Function
	
	/**
	 * This function used to Update  Sms Confirmation to  usercourse  model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_smscode() 
	{		
		log_message('info',"update_smscode function Start here");
		
		/* Get Usercourse list from UserCourseModel */
		$ctrl_drd_usercourseid =  $this->input->post('ajx_drd_user_course_id');
		$ctrl_drd_smscode =  $this->input->post('ajx_drd_sms_code');
		
		//Get SMS Code In UserCourseModel
		$ctrl_drd_user_sms_code =  $this->UserCourse->findByPrimaryKey($ctrl_drd_usercourseid)['SMS_CONFIRM_CODE'];
		if($ctrl_drd_user_sms_code == $ctrl_drd_smscode)
		{
			$where_array = array(
			'UPDATE_BY'=>$this->session_Useremail,
			'UPDATE_DATE'=>$this->current_date,
			'CREDIT_OPTION_CONFIRMATION'=>'Y',
			);
			
			$ctrl_drd_update_usercourse =  $this->UserCourse->update($where_array,array('ID'=>$ctrl_drd_usercourseid));
			
			if($ctrl_drd_update_usercourse)
			{			
				log_message('info', ' Usercourse model credit_option_infn  update success');
				$ctrl_drd_data = array(		      
					'message'=>'',    
					'message_type'=> $this->lang->line('success'),
				);			
				// Return the JSON value to ajax
				echo json_encode($ctrl_drd_data);
				return;		 
			}
			else
			{
				log_message('info', ' Usercourse model credit_option_infn  update fail');
				$ctrl_drd_data= array(
			   'message' =>$this->lang->line('m_90008'),
			   'message_type'=>$this->lang->line('error'),
			   );			 
				echo json_encode($ctrl_drd_data);
				return;
			}
		}
		else
		{
			$ctrl_drd_data= array(
				'message' =>$this->lang->line('m_90825'),
				'message_type'=>$this->lang->line('error'),
			);			 
		    echo json_encode($ctrl_drd_data);
			return;
		}
		log_message('info',"update_smscode function Start here");
		
	} // End of insert_quiz Function
	
	/**
	 * This function used to shuffle array columns
	 *
	 * @access public
	 * @since unknown
	 */
	public function shuffle_assoc($list) 
	{ 
		log_message('info',"shuffle_assoc function Start here");
		if (!is_array($list)) return $list; 
		$keys = array_keys($list); 
		shuffle($keys); 
		$random = array(); 
		foreach ($keys as $key) 
		{ 
			$random[$key] = $list[$key]; 
		}
		log_message('info',"shuffle_assoc function End");
		return array_values($random); 
	} 
	
	/**
	 * check_math_captcha Function is Used To Check Captcha Validation
	 *
	 * @access public
	 * @since unknown
	 */
	public function check_math_captcha() 
	{
		log_message('info' ,'check_math_captcha Function Start');
		$ctrl_drd_captcha = $this->input->post('ajx_drd_user_captcha');
		log_message('info' ,'check_math_captcha Function Start'.$ctrl_drd_captcha);
		if (!$ctrl_drd_captcha)
		{
			log_message('info' ,'Captcha Value Empty');
			$return_message = array('message'=>$this->lang->line('m_90509'));
		}
		else if ($this->mathcaptcha->check_answer($ctrl_drd_captcha)) 
		{
			log_message('info' ,'Captcha Validation Pass');
			$return_message = array('message'=>'');
		} 
		else 
		{
			log_message('info' ,'Captcha Validation Fail');
			$return_message = array('message'=>$this->lang->line('m_90532'));
		}
		log_message('info' ,'End of check_math_captcha Function');	
		echo json_encode($return_message);
		return;		
	}
	
	/**
	 * This function used Update User Course current running position in UserCourseModel 
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_user_course() 
	{		
		log_message('info',"update_user_course function Start here");
		
		//Check Video Running Status
		if($this->input->post('ajx_drd_VideoStatus') !="FINISHED")
		{
			$ctrl_drd_percent_complete = intval($this->input->post('ajx_drd_UserCoursePercentage'))+intval($this->input->post('ajx_drd_AddPercentage'));	
		}
		else
		{
			$ctrl_drd_percent_complete = 99; //Hotcoded For Video FInished but Quiz Enable condition
		}
		$ctrl_drd_user_course_array = array(
			'UPDATE_BY'=>$this->session_Useremail,
			'UPDATE_DATE'=>$this->current_date,
			'PERCENT_COMPLETE'=>$ctrl_drd_percent_complete,
			'RESUME_POSITION'=>$this->input->post('ajx_drd_CurrentCurrDuration'),
			'TIME_ON_PAGE'=>$this->input->post('ajx_drd_TotalTimeOnPage'),
			'IP_ADDRESS'=>$_SERVER['REMOTE_ADDR'],
		);
		$ctrl_drd_update_usercourse =  $this->UserCourse->update($ctrl_drd_user_course_array,array('ID'=>$this->input->post('ajx_drd_UserCourseId')));
		
		if($ctrl_drd_update_usercourse)
		{			
			log_message('info', ' Usercourse model update success');
			$ctrl_drd_data = array(		      
				'message'=>'',    
				'COMPLETE_PERCENTAGE'=> $ctrl_drd_percent_complete,
			);			
			// Return the JSON value to ajax
		}
		else
		{
			log_message('info', ' Usercourse model update fail');
			$ctrl_drd_data= array(
				'message' =>$this->lang->line('m_90008'),
		   );	
		}
		log_message('info',"update_user_course function End here");
		echo json_encode($ctrl_drd_data);
		return;		 
	}
   /* End of Function Captcha Validation */
   
   
	/**
	 * Generate Certificate For Course Completion
	 *
	 * @access public
	 * @since unknown
	 */ 
	function _genPdf($data)
	{
		log_message('info', 'genPdf function starts');	
		// ini_set('memory_limit', '256M');
         // load library
		 
         $this->load->library('Drdeed_pdf');
		 
		 //get Student Name in User Model
		 $ctrl_drd_stdnt_data = $this->User->findByPrimaryKey($data['USER_ID']);
		 $ctrl_drd_data['user_name'] = 'DR '.$ctrl_drd_stdnt_data['FIRST_NAME']." ".$ctrl_drd_stdnt_data['LAST_NAME'];
		 //get Course Name,Code in Course Model
		 $ctrl_drd_course_data = $this->CourseMaster->findByPrimaryKey($data['COURSE_ID']);
		 log_message('info','course Data Id'. $data['COURSE_ID']);
		 log_message('info','course Data'.print_r($data,TRUE));
		 $ctrl_drd_data['course_name'] = $ctrl_drd_course_data['COURSE_NAME'];
		 $ctrl_drd_data['course_code'] = $ctrl_drd_course_data['COURSE_NUM'];
		 $ctrl_drd_data['course_length'] = $ctrl_drd_course_data['COURSE_LENGTH'];
		 $ctrl_drd_data['course_credit'] = $ctrl_drd_course_data['COURSE_CREDIT'];
		 $ctrl_drd_data['completed_date'] = $data['COMPLETED_DATE'];
		 
		 //get State Id StudentprofileModel
		 $ctrl_drd_state_id= $this->StudentProfile->findByUniqueKey($data['USER_ID'])['STATE'];
		 
		 //get State Name StateModel
		 $ctrl_drd_data['state_name']= $this->StateMaster->findByPrimaryKey($ctrl_drd_state_id)['STATE_NAME'];
		 
		 //get State License Number UserLicense
		 $ctrl_drd_data['license_num']= $this->UserLicense->listwhere(array('USER_ID'=>$data['USER_ID'],'STATE_ID'=>$ctrl_drd_state_id))['LICENSE_NUM'];
		 log_message('info','certificate Data'.print_r($ctrl_drd_data,TRUE));
         $pdf = $this->drdeed_pdf->load();   
         $html = $this->load->view('ce-certificate', $ctrl_drd_data, true); 
		 $output = 'userdocuments/usercertificate/ce-certificate' . date('Y_m_d_H_i_s') . '_.pdf';
         $pdf->AddPage('L',0,0,0,0,0,0,0,0,0,0);
         // write the HTML into the PDF
         $pdf->WriteHTML($html); 
		 //$pdf->Output($output,'F');
		 $pdf->Output();
			log_message('info', 'genPdf function ends');		
		 return  $output;
         //$pdf->Output('directory_name/pdf_file_name.pdf', 'F');
	}//
	
} // End of Class 
?>
