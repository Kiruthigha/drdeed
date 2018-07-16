<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_course_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_course_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_course_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_course_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_course_controller/<method_name>
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
	 * This function used to show the diplomate Program page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_diplomate_course($course_id) 
	{
		log_message('info',"view_diplomate_course function Start here");
		
		
		/* Get Course details from Course table*/
		$ctrl_drd_data['coursedata'] = $this->CourseMaster->findByPrimaryKey($course_id);
		
		/* Get user course details from usercourse table*/
		$wherearray  = array(
			'USER_ID'=>$this->session_Userid,
			'COURSE_ID'=>$course_id
		);
		$ctrl_drd_data['firsttime']='No';
		$first_course = $this->CourseMaster->listWhere(array("COURSE_TYPE"=>$ctrl_drd_data['coursedata']['COURSE_TYPE'],
															"COURSE_STATUS_ID"=>$ctrl_drd_data['coursedata']['COURSE_STATUS_ID']),"COURSE_NUM");
															
		$ctrl_drd_data['totalcoursecount'] = count($first_course);	
		$firstcourseid=$first_course[0]['ID'];
		
		log_message('info',"first time course array".print_r($firstcourseid,TRUE));

		$ctrl_drd_firstcoursetc= $this->UserCourse->listWhere(array("COURSE_ID"=>$firstcourseid,"USER_ID"=>$this->session_Userid),'TAKE_COUNT DESC')[0]['TAKE_COUNT'];
				log_message('info',"first time course count array".print_r($ctrl_drd_firstcoursetc,TRUE));

		if ($course_id == $firstcourseid && $ctrl_drd_firstcoursetc==1)
		{
	log_message('info',"inside if ".print_r($ctrl_drd_firstcoursetc,TRUE));
		$ctrl_drd_data['firsttime']=1;
		}

		//$ctrl_drd_firstcourseid= $this->UserCourse->listWhere($wherearray,'TAKE_COUNT DESC');

		 $ctrl_drd_usercoursedata= $this->UserCourse->listWhere($wherearray,'TAKE_COUNT DESC');
		if(count($ctrl_drd_usercoursedata) >= 1)
		{
			$ctrl_drd_data['usercoursedata'] =  $ctrl_drd_usercoursedata[0];
			$ctrl_drd_data['usercourseid'] =  $ctrl_drd_usercoursedata[0]['ID'];
			$ctrl_drd_data['quizcount'] =  $ctrl_drd_usercoursedata[0]['QUIZ_ATTEMPT_COUNT'];
			$ctrl_drd_data['resumeposition'] =  $ctrl_drd_usercoursedata[0]['RESUME_POSITION'];
			$ctrl_drd_data['timeonpage'] =  $ctrl_drd_usercoursedata[0]['TIME_ON_PAGE'];
			$ctrl_drd_quiz_status_id =  $ctrl_drd_usercoursedata[0]['QUIZ_STATUS_ID'];
			$ctrl_drd_data['creditstatus'] =  $ctrl_drd_usercoursedata[0]['CREDIT_STATUS'];
			
			/* Get quiz status from keyvalue model */
			$crtl_drd_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_status_id);
			$ctrl_drd_data['quizstatus'] = $crtl_drd_status['VALUE_NAME'];
			
			$ctrl_drd_course_status_id =  $ctrl_drd_usercoursedata[0]['USER_COURSE_STATUS_ID'];
			
			/* Get  user course status from keyvalue model */
			$crtl_drd_course_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_course_status_id);
			$ctrl_drd_data['coursestatus'] = $crtl_drd_course_status['VALUE_NAME'];
			
		}
		else
		{
			$ctrl_drd_data['usercoursedata'] =  '';
			$ctrl_drd_data['usercourseid'] =  '';
			$ctrl_drd_data['quizcount'] =  '';
			$ctrl_drd_data['resumeposition'] =  '';
			$ctrl_drd_data['timeonpage'] =  '';
			$ctrl_drd_data['quizstatus'] =  '';
			$ctrl_drd_data['coursestatus'] =  '';
			$ctrl_drd_data['creditstatus'] =  '';
		}
		
		/* Get Diplomate course  smscode confirmation list from usercouresdiplomatedetails model */
		
		$diplomate_data =  $this->UserDiplomateDetail->listWhere(array('USER_ID'=>$this->session_Userid));
		
		
		$ctrl_drd_data['smsconfirmtion'] =  $diplomate_data[0]['CREDIT_OPTION_CONFIRMATION'];
		$ctrl_drd_data['smscode'] =  $diplomate_data[0]['SMS_CONFIRM_CODE'];
		
		
		/* Get T&C from ContentMaster table  */
		$ctrl_drd_doc_type_id = $this->KeyValue->getKeyvalueId('DOCUMENT','TYPE','PDF');
		
		/* Get Course documents from Course table*/
		$ctrl_drd_data['documents'] = $this->CourseDocuments->listWhere(array('DOC_TYPE_ID'=>$ctrl_drd_doc_type_id,'COURSE_ID'=>$course_id));		
				
		/* Get State General  Active from Keyvaluemodel table*/
		$ctrl_drd_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
			
		/* Get Course quiz from CourseQuizQuestion table*/
		$ctrl_drd_quiz_data = $this->CourseQuizQuestion->listWhere(array('QUIZ_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,'COURSE_ID'=>$course_id),'rand()');
		$ctrl_drd_quiz = [];
		foreach($ctrl_drd_quiz_data as $ctrl_drd_quiz_data)
		{
			$crtl_drd_qustion_type = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_data['QUESTION_TYPE']);
			$answer_array =array($ctrl_drd_quiz_data['ANSWER_OPTION_A'],$ctrl_drd_quiz_data['ANSWER_OPTION_B'],$ctrl_drd_quiz_data['ANSWER_OPTION_C'],$ctrl_drd_quiz_data['ANSWER_OPTION_D']);
			$answer_array = $this->shuffle_assoc($answer_array);
			if($crtl_drd_qustion_type['VALUE_NAME']=="OBJECTIVE")
			{
			$ctrl_drd_quiz[]  =  array_merge(array('QUESTION_NO'=>$ctrl_drd_quiz_data['ID'],'QUESTION_NAME'=>$ctrl_drd_quiz_data['QUIZ_QUESTION'],'QUESTION_TYPE'=>$crtl_drd_qustion_type['VALUE_NAME']),$answer_array);
			}else
			{
			$ctrl_drd_quiz_s[]  =  array_merge(array('QUESTION_NO'=>$ctrl_drd_quiz_data['ID'],'QUESTION_NAME'=>$ctrl_drd_quiz_data['QUIZ_QUESTION'],'QUESTION_TYPE'=>$crtl_drd_qustion_type['VALUE_NAME']),$answer_array);
			}
		}
			
		$ctrl_drd_data['quiz'] = $ctrl_drd_quiz;
		$ctrl_drd_data['quiz_s'] = $ctrl_drd_quiz_s;
		
		$where_surveyarray = array(
			'SURVEY_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,
		);
		$ctrl_drd_data['survey'] = $this->CourseSurvey->listWhere($where_surveyarray);
		
		/* Get congratulations from ContentMaster table  */
		$ctrl_drd_dn_course_congrat_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DN_COURSE CONGRATULATIONS');

		/* Get T&C from ContentMaster table  */
		$ctrl_drd_congrat_content = $this->ContentMaster->findByUniqueKey($ctrl_drd_dn_course_congrat_id);
		$ctrl_drd_data['congratulation_content'] = $ctrl_drd_congrat_content['CONTENT'];
		$ctrl_drd_data['math_captcha_question'] = $this->mathcaptcha->get_question();
		log_message('info',"Return Data ".print_r($ctrl_drd_data,TRUE));
		
		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('diplomatecourse',$ctrl_drd_data);
		$this->load->view('footer');
		log_message('info',"view_diplomate_course function Start here");
	}//End of view_diplomate_course function
	
	
	/**
	 * This function used to  retake the diplomate Program page
	 *
	 * @access public
	 * @since unknown
	 */
	public function retake_diplomate_course($course_id) 
	{
		log_message('info',"retake_diplomate_course function Start here");
		$ctrl_drd_IP_address  = $_SERVER['REMOTE_ADDR'];
		 $ctrl_drd_usercoursedata= $this->UserCourse->listWhere(array('USER_ID'=>$this->session_Userid,
																	'COURSE_ID'=>$course_id),'TAKE_COUNT DESC');
		/* Get Quiz Pass Value from keyvalue model*/
		$ctrl_drd_user_statusid = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		if($ctrl_drd_usercoursedata[0]['USER_COURSE_STATUS_ID'] == $ctrl_drd_user_statusid )
		{
		$ctrl_dn_course_progress = $this->KeyValue->getKeyvalueId("USER COURSE","STATUS","IN PROGRESS" );
		$usercoursearray=array("CREATE_BY"=>$this->session_Useremail,
					"CREATE_DATE"=>$this->current_date,
					"UPDATE_BY"=>$this->session_Useremail,
					"UPDATE_DATE"=>$this->current_date,
					"USER_ID"=>$this->session_Userid,
					"COURSE_ID"=>$course_id,
					"USER_COURSE_STATUS_ID"=>$ctrl_dn_course_progress,
					'IP_ADDRESS' => $ctrl_drd_IP_address,
					'ENROLL_DATE' => $this->current_date,
					"CREDIT_OPTION_CONFIRMATION" =>$ctrl_drd_usercoursedata[0]['CREDIT_OPTION_CONFIRMATION'],
					"CREDIT_STATE" => $ctrl_drd_usercoursedata[0]['CREDIT_STATE'],
					"CREDIT_STATUS" => $ctrl_drd_usercoursedata[0]['CREDIT_STATUS'],
					"TAKE_COUNT"=>$ctrl_drd_usercoursedata[0]['TAKE_COUNT']+1
					);
		
		$insertusercourse = $this->UserCourse->insert($usercoursearray);
		$lastinsertedid = $this->db->insert_id();
		}
		else
		{
			$lastinsertedid = $ctrl_drd_usercoursedata[0]['ID'];
		}
		/* Get Course details from Course table*/
		$ctrl_drd_data['coursedata'] = $this->CourseMaster->findByPrimaryKey($course_id);
		
		/* Get user course details from usercourse table*/
		
		$ctrl_drd_data['firsttime']='No';
		

		 $ctrl_drd_usercoursedata= $this->UserCourse->listWhere(array('ID'=>$lastinsertedid),'TAKE_COUNT DESC');
		if(count($ctrl_drd_usercoursedata) >= 1)
		{
			$ctrl_drd_data['usercoursedata'] =  $ctrl_drd_usercoursedata[0];
			$ctrl_drd_data['usercourseid'] =  $ctrl_drd_usercoursedata[0]['ID'];
			$ctrl_drd_data['creditstatus'] = $ctrl_drd_usercoursedata[0]['CREDIT_STATUS'];
			$ctrl_drd_data['quizcount'] =  $ctrl_drd_usercoursedata[0]['QUIZ_ATTEMPT_COUNT'];
			$ctrl_drd_data['resumeposition'] =  $ctrl_drd_usercoursedata[0]['RESUME_POSITION'];
			$ctrl_drd_data['timeonpage'] =  $ctrl_drd_usercoursedata[0]['TIME_ON_PAGE'];
			$ctrl_drd_quiz_status_id =  $ctrl_drd_usercoursedata[0]['QUIZ_STATUS_ID'];
			
			/* Get quiz status from keyvalue model */
			$crtl_drd_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_status_id);
			$ctrl_drd_data['quizstatus'] = $crtl_drd_status['VALUE_NAME'];
			
			$ctrl_drd_course_status_id =  $ctrl_drd_usercoursedata[0]['USER_COURSE_STATUS_ID'];
			
			/* Get  user course status from keyvalue model */
			$crtl_drd_course_status = $this->KeyValue->findByPrimaryKey($ctrl_drd_course_status_id);
			$ctrl_drd_data['coursestatus'] = $crtl_drd_course_status['VALUE_NAME'];
			
		}
		else
		{
			$ctrl_drd_data['usercoursedata'] =  '';
			$ctrl_drd_data['usercourseid'] =  '';
			$ctrl_drd_data['quizcount'] =  '';
			$ctrl_drd_data['resumeposition'] =  '';
			$ctrl_drd_data['timeonpage'] =  '';
			$ctrl_drd_data['quizstatus'] =  '';
			$ctrl_drd_data['coursestatus'] =  '';
			$ctrl_drd_data['creditstatus'] =  '';
		}
		
		/* Get Diplomate course  smscode confirmation list from usercouresdiplomatedetails model */
		
		$diplomate_data =  $this->UserDiplomateDetail->listWhere(array('USER_ID'=>$this->session_Userid));
		
		
		$ctrl_drd_data['smsconfirmtion'] =  $diplomate_data[0]['CREDIT_OPTION_CONFIRMATION'];
		$ctrl_drd_data['smscode'] =  $diplomate_data[0]['SMS_CONFIRM_CODE'];
		
		/* Get T&C from ContentMaster table  */
		$ctrl_drd_doc_type_id = $this->KeyValue->getKeyvalueId('DOCUMENT','TYPE','PDF');
		
		/* Get Course documents from Course table*/
		$ctrl_drd_data['documents'] = $this->CourseDocuments->listWhere(array('DOC_TYPE_ID'=>$ctrl_drd_doc_type_id,'COURSE_ID'=>$course_id));		
				
		/* Get State General  Active from Keyvaluemodel table*/
		$ctrl_drd_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
			
		/* Get Course quiz from CourseQuizQuestion table*/
		$ctrl_drd_quiz_data = $this->CourseQuizQuestion->listWhere(array('QUIZ_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,'COURSE_ID'=>$course_id),'rand()');
		$ctrl_drd_quiz = [];
		foreach($ctrl_drd_quiz_data as $ctrl_drd_quiz_data)
		{
			$crtl_drd_qustion_type = $this->KeyValue->findByPrimaryKey($ctrl_drd_quiz_data['QUESTION_TYPE']);
			$answer_array =array($ctrl_drd_quiz_data['ANSWER_OPTION_A'],$ctrl_drd_quiz_data['ANSWER_OPTION_B'],$ctrl_drd_quiz_data['ANSWER_OPTION_C'],$ctrl_drd_quiz_data['ANSWER_OPTION_D']);
			$answer_array = $this->shuffle_assoc($answer_array);
			if($crtl_drd_qustion_type['VALUE_NAME']=="OBJECTIVE")
			{
			$ctrl_drd_quiz[]  =  array_merge(array('QUESTION_NO'=>$ctrl_drd_quiz_data['ID'],'QUESTION_NAME'=>$ctrl_drd_quiz_data['QUIZ_QUESTION'],'QUESTION_TYPE'=>$crtl_drd_qustion_type['VALUE_NAME']),$answer_array);
			}else
			{
			$ctrl_drd_quiz_s[]  =  array_merge(array('QUESTION_NO'=>$ctrl_drd_quiz_data['ID'],'QUESTION_NAME'=>$ctrl_drd_quiz_data['QUIZ_QUESTION'],'QUESTION_TYPE'=>$crtl_drd_qustion_type['VALUE_NAME']),$answer_array);
			}
		}
		$first_course = $this->CourseMaster->listWhere(array("COURSE_TYPE"=>$ctrl_drd_data['coursedata']['COURSE_TYPE'],
															"COURSE_STATUS_ID"=>$ctrl_drd_data['coursedata']['COURSE_STATUS_ID']),"COURSE_NUM");
															
		$ctrl_drd_data['totalcoursecount'] = count($first_course);
		$ctrl_drd_data['quiz'] = $ctrl_drd_quiz;
		$ctrl_drd_data['quiz_s'] = $ctrl_drd_quiz_s;
		
		$where_surveyarray = array(
			'SURVEY_QUESTION_STATUS_ID'=>$ctrl_drd_status_id,
		);
		$ctrl_drd_data['survey'] = $this->CourseSurvey->listWhere($where_surveyarray);
		
		/* Get congratulations from ContentMaster table  */
		$ctrl_drd_dn_course_congrat_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DN_COURSE CONGRATULATIONS');

		/* Get T&C from ContentMaster table  */
		$ctrl_drd_congrat_content = $this->ContentMaster->findByUniqueKey($ctrl_drd_dn_course_congrat_id);
		$ctrl_drd_data['congratulation_content'] = $ctrl_drd_congrat_content['CONTENT'];
		
		log_message('info',"Return Data in retake ".print_r($ctrl_drd_data,TRUE));
		
		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('diplomatecourse',$ctrl_drd_data);
		$this->load->view('footer');
		log_message('info',"retake_diplomate_course function End here");
	}//End of view_diplomate_course function
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
	 * This function used Insert User Course Quiz details for diplomate and calculate Quiz Result 
	 *
	 * @access public
	 * @since unknown
	 */
	public function insert_quiz_diplomate() 
	{		
		log_message('info',"insert_quiz_diplomate function Start here");
		$ctrl_drd_user_score = 0;
		$ctrl_drd_insert_quiz_array= array();
		$ctrl_drd_insert_essay_array= array();
		$ctrl_drd_update_essay_array= array();
		$ctrl_drd_update_quiz_array= array();
		$return_msg =  0;
		$ctrl_drd_courseid = $this->input->post('ajx_drd_course_id');
		$ctrl_drd_user_courseid = $this->input->post('ajx_drd_user_course_id');
		
		/* Get User Course Details  From  UserCourse  Model */
		$ctrl_drd_usercourse_details = $this->UserCourse->findByPrimaryKey($ctrl_drd_user_courseid);
		$ctrl_drd_attempt_count	= $ctrl_drd_usercourse_details['QUIZ_ATTEMPT_COUNT'];
		log_message('info',"Quiz Count ".$ctrl_drd_attempt_count);
		/* Check Quiz Already exists in Quiz Model.*/
		
		
		$ctrl_drd_user_quiz = $this->UserCourseQuiz->listwhere(array('USER_COURSE_ID'=>$ctrl_drd_user_courseid));
		log_message('info',"ctrl_drd_user_quiz ".count($ctrl_drd_user_quiz));
		
		
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
			//log_message('info',"Quiz data  ".print_r($ctrl_drd_insert_quiz_data,TRUE));
			array_push($ctrl_drd_insert_quiz_array,$ctrl_drd_insert_quiz_data);
			
			if(count($ctrl_drd_user_quiz) != 0)
			{
				log_message('info',"Quiz data  Inside if");
				
				$user_course_quiz_id = $this->UserCourseQuiz->listWhere(array('USER_COURSE_ID'=>$ctrl_drd_user_courseid,'QUIZ_QUESTION_ID'=>$ctrl_drd_qutn_id));
				
				if(count($user_course_quiz_id)>=1)
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
					//log_message('info',"Quiz data  ".print_r($ctrl_drd_update_quiz_data,TRUE));
					array_push($ctrl_drd_update_quiz_array,$ctrl_drd_update_quiz_data);
				}
				else
				{
					log_message('info','Return UserQuiz Id Get Fail');			
					$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90008'),
					'message_type'=>$this->lang->line('error'),
					);	
					echo json_encode($ctrl_drd_return_data);
					return;	
				}
			}
		}//End ForLoop
		log_message('info',"ctrl_drd_user_essay values ".print_r($this->input->post('ajx_drd_quiz_data_s'),true));
		// for inserting essay
		
		/* Check Quiz Already exists in Quiz Model.*/
		$ctrl_drd_user_essay = $this->UserDiplomateEssay->listwhere(array('USER_COURSE_ID'=>$ctrl_drd_user_courseid,'USER_ID'=>$this->session_Userid));
		
		log_message('info',"ctrl_drd_user_essay ".count($ctrl_drd_user_essay));
		
		for($i=0;$i<count($this->input->post('ajx_drd_quiz_data_s'));$i++)
		{
			$ctrl_drd_qutn_id = $this->input->post('ajx_drd_quiz_data_s')[$i]['Question_No'];
			$ctrl_drd_qutn_name = $this->input->post('ajx_drd_quiz_data_s')[$i]['Question_Name'];
			$ctrl_drd_user_ans = $this->input->post('ajx_drd_quiz_data_s')[$i]['Answer'];
			
			/* Get Quiz Question list from QuizModel table */
			$ctrl_drd_quiz_list = $this->CourseQuizQuestion->findByPrimaryKey($ctrl_drd_qutn_id);
			$ctrl_drd_essay_status= $this->KeyValue->getKeyvalueId("ESSAY","STATUS","VIEW");

			
			
			$ctrl_drd_insert_essay = array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,				
				"USER_COURSE_ID" =>$ctrl_drd_user_courseid,
				"USER_ID" =>$this->session_Userid,
				"QUIZ_QUESTION_ID" =>$ctrl_drd_qutn_id,
				"COURSE_ID" =>$ctrl_drd_courseid,	
				"USER_ANSWER" =>$ctrl_drd_user_ans,
				"USER_ESSAY_STATUS_ID"=>$ctrl_drd_essay_status,
			);
			//log_message('info',"Quiz data  ".print_r($ctrl_drd_insert_quiz_data,TRUE));
			array_push($ctrl_drd_insert_essay_array,$ctrl_drd_insert_essay);
			
			
			if(count($ctrl_drd_user_essay) != 0)
			{
				log_message('info',"Quiz Diplomate data  Inside if");
				
				$user_course_quiz_id = $this->UserDiplomateEssay->listWhere(array('USER_COURSE_ID'=>$ctrl_drd_user_courseid,'QUIZ_QUESTION_ID'=>$ctrl_drd_qutn_id,'USER_ID'=>$this->session_Userid));
				
				if(count($user_course_quiz_id)>=1)
				{
					$user_course_quiz_id = $user_course_quiz_id[0];
					
					$ctrl_drd_update_essay = array(
						"UPDATE_BY"  => $this->session_Useremail,
						"UPDATE_DATE" => $this->current_date,				
						"ID" => $user_course_quiz_id['ID'],				
						"USER_COURSE_ID" =>$ctrl_drd_user_courseid,
						"USER_ID" =>$this->session_Userid,
						"QUIZ_QUESTION_ID" =>$ctrl_drd_qutn_id,
						"COURSE_ID" =>$ctrl_drd_courseid,	
						"USER_ANSWER" =>$ctrl_drd_user_ans,	
						"USER_ESSAY_STATUS_ID"=>$ctrl_drd_essay_status
					);
					//log_message('info',"Quiz data  ".print_r($ctrl_drd_update_quiz_data,TRUE));
					array_push($ctrl_drd_update_essay_array,$ctrl_drd_update_essay);
				}
				else
				{
					log_message('info','Return UserQuiz Id Get Fail');			
					$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90008'),
					'message_type'=>$this->lang->line('error'),
					);	
					echo json_encode($ctrl_drd_return_data);
					return;	
				}
			}
		
		}
		
		if(count($ctrl_drd_user_essay) == 0)
		{
			$ctrl_drd_quiz_essay = $this->db->insert_batch('dd_user_diplomate_essay',$ctrl_drd_insert_essay_array);
		}
		else
		{
			$ctrl_drd_quiz_essay = $this->db->update_batch('dd_user_diplomate_essay',$ctrl_drd_update_essay_array,'ID');
		}
		
		if($ctrl_drd_quiz_essay !=0)
		{
			log_message('info',"UserCourseQuizModel Insert/Update essay Success ".print_r($ctrl_drd_quiz_essay,TRUE));
		}
		else
		{
			log_message('info',"UserCourseQuizModel Insert/Update Query Fail ".print_r($ctrl_drd_quiz_essay,TRUE));
			$return_msg ++;
		}
		
		
		/* Get Quiz Fail Value from keyvalue model*/
		$ctrl_drd_course_data = $this->CourseMaster->findByPrimaryKey($ctrl_drd_courseid);
		$ctrl_drd_pass_percent = $ctrl_drd_course_data['PASS_PERCENT'];
		
		log_message('info',"User Score ".$ctrl_drd_user_score);
		
		if($ctrl_drd_pass_percent <= $ctrl_drd_user_score)
		{
			/* Get Quiz Pass Value from keyvalue model*/
			$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','PASS');
			$quiz_status="PASS";
		}
		else
		{
			/* Get Quiz Fail Value from keyvalue model*/
			$ctrl_drd_user_quiz_statusid = $this->KeyValue->getKeyvalueId('QUIZ','STATUS','FAIL');
			$quiz_status="FAIL";
		}
		
		
		if(count($ctrl_drd_user_quiz) == 0)
		{
			$ctrl_drd_quiz = $this->db->insert_batch('dd_user_course_quiz',$ctrl_drd_insert_quiz_array);
		}
		else
		{
			$ctrl_drd_quiz = $this->db->update_batch('dd_user_course_quiz',$ctrl_drd_update_quiz_array,'ID');
		}
		
		if($ctrl_drd_quiz !=0)
		{
			log_message('info',"UserCourseQuizModel Insert/Update Query Success ".print_r($ctrl_drd_quiz,TRUE));
		}
		else
		{
			log_message('info',"UserCourseQuizModel Insert/Update Query Fail ".print_r($ctrl_drd_quiz,TRUE));
			$return_msg ++;
		}
		
		$ctrl_drd_user_course_data = array(				
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"QUIZ_ATTEMPT_COUNT" =>$ctrl_drd_attempt_count+1,
			"PERCENT_SCORED" =>$ctrl_drd_user_score,
			"QUIZ_STATUS_ID" =>$ctrl_drd_user_quiz_statusid	
			);
			
		$ctrl_drd_usercourse_update = $this->UserCourse->update($ctrl_drd_user_course_data,array('ID'=>$ctrl_drd_user_courseid));
		
		if($ctrl_drd_usercourse_update)
		{
			log_message('info',"UserCourseModel Update Query Success ");
		}
		else
		{
			log_message('info',"UserCourseModel Update Query Fail");
			$return_msg ++;
		}
		log_message('info',"ReturnMessage ".$return_msg);
		
		
		if($return_msg == 0)
		{
			log_message('info','Return Success Message');			
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90822'),
			'message_type'=>$this->lang->line('success'),
			'quiz_status'=>$quiz_status,
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
			'quiz_status'=>$quiz_status,
			'quiz_count'=>$ctrl_drd_attempt_count+1,
			'score'=>$ctrl_drd_user_score,
			);	
			echo json_encode($ctrl_drd_return_data);
			return;	
		}
		
		log_message('info',"insert_quiz function Start here");
		
	} // End of insert_quiz Function
	
	/**
	 * This function used to Update  Sms Confirmation to  usercourse  model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_dn_smscode() 
	{		
		log_message('info',"update_dn_smscode function Start here");
		
		/* Get Usercourse list from UserCourseModel */
		//$ctrl_drd_diplomateid =  $this->input->post('ajx_drd_user_course_id');
		$coursetype =  $this->input->post('ajx_drd_course_type');
		$ctrl_sms_code =  $this->input->post('ajx_sms_code');
		
		$valid_sms_code = $this->UserDiplomateDetail->listWhere(array("USER_ID"=>$this->session_Userid), "CREATE_DATE DESC");
		
		if ($ctrl_sms_code== $valid_sms_code[0]['SMS_CONFIRM_CODE'])
		{
			$where_array = array(
			'UPDATE_BY'=>$this->session_Useremail,
			'UPDATE_DATE'=>$this->current_date,
			'CREDIT_OPTION_CONFIRMATION'=>'Y',
			);
			$ctrl_drd_sms_confirmation = $this->UserDiplomateDetail->update($where_array,array("ID"=>									$valid_sms_code[0]['ID']) );
			if($ctrl_drd_sms_confirmation)
			{
			$ctrl_drd_data = array(		      
				'message'=>'',    
				'message_type'=> $this->lang->line('success'),
			);			
			// Return the JSON value to ajax
			echo json_encode($ctrl_drd_data);
			return;		 
			}else{
			
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
		log_message('info',"update_dn_smscode function Start here");
		
	} // End of insert_quiz Function
	
	
	/**
	 * This function used Insert User Survey details and Finish Course
	 *
	 * @access public
	 * @since unknown
	 */
	public function insert_dn_survey() 
	{		
		log_message('info',"insert_dn_survey function Start here");
		$ctrl_drd_insert_survey_array= array();
		$ctrl_drd_update_survey_array= array();
		$ctrl_drd_user_courseid = $this->input->post('ajx_drd_user_course_id');
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
		// transaction for survey and course updates
		
		$ctrl_drd_course_id = $this->UserCourse->listWhere(array("ID"=>$ctrl_drd_user_courseid),"UPDATE_DATE DESC")[0]['COURSE_ID'];
		
		if($ctrl_drd_credit_status == 'Y')
		{
			log_message("info","Inside Credit Status ".$ctrl_drd_credit_status);
			$certificate_array =array(
				'COURSE_ID'=>$ctrl_drd_course_id,
				'USER_ID'=>$this->session_Userid,
				'COMPLETED_DATE'=>$this->common_functions->date_display_format($this->current_date),
				'DN_COMPLETE'=>''
			);
			$certificate_path = $this->_genPdf($certificate_array);
			
			//$certificate_path = 'userdocuments/usercertificate/certificate.pdf';
		}
		else
		{
			log_message("info","Credit Status No ".$ctrl_drd_credit_status);
			$certificate_path = NULL;
		}
		//Get the completed status id from key value
		
		$ctrl_drd_user_statusid = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		
		$course_complete_score = 100; // hot coded after Survey complete update course precent score
		
		$completedcourse = array("UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"COMPLETE_DATE" =>$this->current_date,
				"PERCENT_COMPLETE" =>$course_complete_score,
				"USER_COURSE_STATUS_ID" =>$ctrl_drd_user_statusid);
		
		$completedusercourseid= array("ID"=>$ctrl_drd_user_courseid);
		$ctrl_drd_certificate_array =  array(
				'CREATE_BY'=>$this->session_Useremail,
				'CREATE_DATE'=>$this->current_date,
				'UPDATE_BY'=>$this->session_Useremail,
				'UPDATE_DATE'=>$this->current_date,
				'COURSE_ID'=>$ctrl_drd_course_id,
				'USER_COURSE_ID'=>$ctrl_drd_user_courseid,
				'USER_ID'=>$this->session_Userid,
				'COURSE_CERTIFICATE_PATH'=>$certificate_path,
				);
		
		// get the details of the next course in diplomate list
		$ctrl_course_status_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		$ctrl_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
		$ctrl_u_c_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		$ctrl_u_ip_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','ENROLLED');
		$ctrl_e_ip_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');
		
			
		//completed course
		$wherecoursecomarray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COMPLETED_STATUS_ID'=>$ctrl_u_c_course_status_id,
		'ENROLL_STATUS_ID'=>$ctrl_u_ip_course_status_id,
		'INPROGRESS_STATUS_ID'=>$ctrl_e_ip_course_status_id,
		);
	
		log_message("info","where course array for the status completed check".print_r($wherecoursecomarray,true));
		/* Get User enrolled Diplomate courses */
		
		$statusCompleted =$this->StudentProfile->getdiplomateavailablecourse($wherecoursecomarray);
		log_message("info","next course".print_r($statusCompleted,true));
		$nextcourseupdate = false;
		if($statusCompleted)
		{
			$checkcoursestatus = $this->UserCourse->listWhere(array('COURSE_ID'=>$statusCompleted,'USER_ID'=>$this->session_Userid),'TAKE_COUNT DESC');
			
			log_message("info","the status of ctrl_drd_usercourse_status_update OR ctrl_drd_usercourse_check" .print_r($checkcoursestatus , true));
			$inprogess_id = $this->KeyValue->getKeyvalueId("USER COURSE",'STATUS','ENROLLED');
			if (($checkcoursestatus[0]['USER_COURSE_STATUS_ID']== $ctrl_u_ip_course_status_id) || ($checkcoursestatus[0]['USER_COURSE_STATUS_ID']== $ctrl_e_ip_course_status_id))
			{
				$nextcourseupdate = true;
			}else
			{
				$nextcourseupdate = false;
			}
		}
		
		// setting the default values
			$inprogress_statusid=NULL;
			$inprogress_where=NULL;
			$updatediparray=NULL;
											
		if($nextcourseupdate)
		{	
			log_message("info","Next COurse Enable" );
			$inprogress_statusid= array("USER_COURSE_STATUS_ID"=>$ctrl_e_ip_course_status_id);
			$inprogress_where = array('COURSE_ID'=>	$statusCompleted,
									'USER_ID'=>	$this->session_Userid);
		
		}
		else
		{
			if($ctrl_drd_credit_status == 'Y')
			{				
				$certificate_array =array(
					'COURSE_ID'=>$ctrl_drd_course_id,
					'USER_ID'=>$this->session_Userid,
					'COMPLETED_DATE'=>$this->common_functions->date_display_format($this->current_date),
					'DN_COMPLETE'=>1 //hot coded for generate DN Completed Course
				);
				$dn_certificate_path = $this->_genPdf($certificate_array);
				
				//$certificate_path = 'userdocuments/usercertificate/certificate.pdf';
			}
			else
			{
				$dn_certificate_path = NULL;
			}
		
			log_message("info","Diplomate Overall Course Complete " );
			$updatediparray= array(
				'USER_COURSE_STATUS_ID'=>$ctrl_u_c_course_status_id,
				'COMPLETE_DATE' =>$this->current_date,
				'COURSE_CERTIFICATE_PATH'=>$dn_certificate_path,
				'UPDATE_DATE'=>$this->current_date,
				'UPDATE_BY'=>$this->session_Useremail,
				);
		}
		
		$inputdatadiplomatecourse = array("SURVEY_DETAILS" => $ctrl_drd_insert_survey_array,
							"COMPLETED_COURSE_UPDATE"=>$completedcourse,
							"COMPLETED_COURSE_ID"=>$completedusercourseid,
							"CERTIFICATE_ARRAY"=>$ctrl_drd_certificate_array,
							"INPROGRESS_ID"=>$inprogress_statusid,
							"INPROGRESS_WHERE"=>$inprogress_where,
							"DIP_DETAIL_CERTIFICATE"=>$updatediparray,
							"USER_ID" => $this->session_Userid);
		log_message('info','Update Data '.print_r($inputdatadiplomatecourse,TRUE));
		$inserttransactionstatus = $this->UserCourse->updatediplomatecourse($inputdatadiplomatecourse);
		
		if($inserttransactionstatus =="Success")
		{
			log_message('info',"UserCourseModel Update Success");
			$ctrl_drd_user_data =$this->User->findByPrimaryKey($this->session_Userid);
			
			$ctrl_email_data  = array(
					"FIRST_NAME" => $ctrl_drd_user_data['FIRST_NAME'],
					"LAST_NAME" => $ctrl_drd_user_data['LAST_NAME'],
					"COURSE_NAME" => $this->CourseMaster->findByPrimaryKey($ctrl_drd_course_id)['COURSE_NAME'],
					"COMPLETED_DATE" => $this->common_functions->date_display_format($this->current_date),
					"COMPLETED_TIME" =>date('h:i A', strtotime($this->current_date))
				);
				$this->_send_email($ctrl_email_data);	
		} else {
			log_message('info',"UserCourseModel Update Failes");
			log_message('info','Return Error Message');			
			$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);	
			echo json_encode($ctrl_drd_return_data);
			return;	
		
		}
		log_message('info',"insert_dn_survey function Start here");
		
	} // End of insert_quiz Function
	
	/**
	 * This Function Used to DN course complete data to Admin 
	 *
	 * @access private
	 * @since unknown
	 */ 
	
	function _send_email($msg_data)
	{
		log_message('info' ,'send_email function start');   		
		
		$ctrl_dl_admin_to = $this->lang->line('msg_fromemail');;
		$ctrl_dl_admin_subject = $this->lang->line('dn_course_complete_sub');
		$ctrl_dl_admin_message  = $this->lang->line('dn_course_complete');
		
		
		$replace_admin_array = array(
			'<FIRST_NAME>' => $msg_data['FIRST_NAME'],
			'<LAST_NAME>' => $msg_data['LAST_NAME'],
			'<DN_COURSE>' => $msg_data['COURSE_NAME'],
			'<COMPLETED_DATE>' => $msg_data['COMPLETED_DATE'],
			'<COMPLETED_TIME>' => $msg_data['COMPLETED_TIME'],
		); 
			
		$ctrl_dl_admin_replace_message = $this->common_functions->str_replace_assoc($replace_admin_array,$ctrl_dl_admin_message); 
		log_message('info','Admin Email Content '.$ctrl_dl_admin_replace_message);
		
		$admin_sendmail = $this->sendmail->send_email_fun($ctrl_dl_admin_to, $ctrl_dl_stdnt_subject, $ctrl_dl_admin_replace_message); 
		
        log_message('info' ,'send_Email function send_email');  
		if($admin_sendmail == true)
		{			
			log_message('info', 'Admin Student Email Success !!');
			$ctrl_dl_return_data = array(		      
				'message'=>$this->lang->line('m_90823'),    
				'message_type'=> $this->lang->line('success'),
			);			
			 //Return the JSON value to ajax
			echo json_encode($ctrl_dl_return_data);
			return; 
						 
		}
		else
		{
			log_message('info', ' Email Failed !!');
			$ctrl_dl_return_data= array(
			   'message' => $this->lang->line('m_90008'),
			   'message_type' => $this->lang->line('error'),
		    );			 
		    echo json_encode($ctrl_dl_return_data);
		}
		return;		
	 } // End of send_Email function
	
	
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
		 if($data['DN_COMPLETE'] == '')
		 {
			$this->load->library('Drdeed_pdf');
		 }
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
		$pdf->AddPage('L',0,0,0,0,0,0,0,0,0,0);
         if($data['DN_COMPLETE'] == '')
		 {
			$html = $this->load->view('ce-certificate', $ctrl_drd_data, true); 
			$output = 'userdocuments/usercertificate/ce-certificate' . date('Y_m_d_H_i_s') . '_.pdf';
		 }
		 else
		 {
			$html = $this->load->view('de-certificate', $ctrl_drd_data, true); 
			$output = 'userdocuments/usercertificate/dn-certificate' . date('Y_m_d_H_i_s') . '_.pdf';
		 }
         // write the HTML into the PDF
         $pdf->WriteHTML($html); 
		 $pdf->Output($output,'F');
		 //$pdf->Output();
		 log_message('info', 'genPdf function ends');
		 return  $output;
         //$pdf->Output('directory_name/pdf_file_name.pdf', 'F');
	}//
	
}// end of class
?>
