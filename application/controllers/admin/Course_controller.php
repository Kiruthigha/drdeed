<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Course_controller
	 *	- or -
	 * 		http://example.com/index.php/Course_controller
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Course_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Course_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() {
		parent::__construct();
		$this->load->helper("file");
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 
	}
	
	/**
	 * this Function is used to display courses page
	 *
	 * @access public
	 * @since unknown
	 */
	public function courses()
	{
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		$course_data=$this->CourseMaster->getcoursegrid(null,'UPDATE_DATE DESC');
		
		$ce_count=0;
		$diplomo_count=0;
		
		foreach($course_data as $courses)
		{
			if($courses['COURSE_STATUS_VALUE'] != 'DELETED')
			{
				if($courses['COURSE_TYPE_ID'] == 'CE')
				{
					$ce_count++;
				}
				if($courses['COURSE_TYPE_ID'] == 'DN')
				{
					$diplomo_count++;
				}
				$course_array[] = $courses;
			}
		}
		$crtl_drd_data['courses'] = $course_array;
		/* Get CE course Type id from keyvalue model */
		$ctrl_drd_ce_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		/* Get DN course Type id from keyvalue model */
		$ctrl_drd_dn_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
				
		/* Get course cost list from CourseCost model */
		$ctrl_drd_course_cost = $this->CourseCost->listAll();
		foreach($ctrl_drd_course_cost as $ctrl_drd_course_cost)
		{
			/* Get Course Type Name in keyvalue controller */
			
			if($ctrl_drd_course_cost['COURSE_TYPE'] == $ctrl_drd_ce_course_type_id)
			{
				$crtl_drd_data['ce_cost']=$ctrl_drd_course_cost['COST'];
			}
			if($ctrl_drd_course_cost['COURSE_TYPE'] == $ctrl_drd_dn_course_type_id)
			{
				$crtl_drd_data['dn_cost']=$ctrl_drd_course_cost['COST'];
			}
		}
		
		$crtl_drd_data['ce_course']=$ce_count;
		$crtl_drd_data['dn_course']=$diplomo_count;
		
		$this->load->view('admin/admin-courses',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * this Function is used to display add course page
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_courses()
	{
		/* Get State list from state master table  */
		$crtl_drd_data['state'] = $this->StateMaster->listAll('STATE_NAME ASC');
		
		/* Get Course Type from keyvalue model  */
		$where_array = array(
			'GROUP_NAME'=>'COURSE',
			'KEY_NAME'=>'TYPE',
			'STATUS'=>'ACTIVE',
		);
		$crtl_drd_data['course_type'] = $this->KeyValue->listWhere($where_array);
		
		/* Get course type from keyvalue model */
		$ctrl_drd_ce_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		/* Get CE course cost fron course cost model */
		$ctrl_drd_ce_course_cost_data = $this->CourseCost->findByUniqueKey($ctrl_drd_ce_course_type_id);
		$crtl_drd_data['ce_course_cost'] = $ctrl_drd_ce_course_cost_data['COST']; 
		
		/* Get course type from keyvalue model */
		$ctrl_drd_dn_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
		
		/* Get CE course cost fron course cost model */
		$ctrl_drd_dn_course_cost_data = $this->CourseCost->findByUniqueKey($ctrl_drd_dn_course_type_id);
		$crtl_drd_data['dn_course_cost'] = $ctrl_drd_dn_course_cost_data['COST']; 
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-addcourses',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * this Function is used to insert data on course table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_course_data() {
		log_message('info' ,'add_course_data function start');
		set_time_limit(3600);

		/* Store Post Values In variables */		   
		$ctrl_drd_course_type  = $this->input->post('selAddCourseNam');
		$ctrl_drd_course_type_name  = $this->input->post('selAddCourseTypeNam');
		$ctrl_drd_course_num  = $this->input->post('txtAddCourseNumNam');
		$ctrl_drd_course_name  = $this->input->post('txtAddTitleNam');
		$ctrl_drd_course_description  = $this->input->post('txtAddCourseDescNam');
		$ctrl_drd_ins_name  = $this->input->post('txtAddInstructorNam');
		$ctrl_drd_course_credit  = $this->input->post('selCECreditsNam');
		$ctrl_drd_course_createdate  = $this->input->post('txtAddDateNam');
		
		$ctrl_drd_dobconvert=$this->common_functions->date_db_format($ctrl_drd_course_createdate);
		log_message('info','Convert date format '.$ctrl_drd_dobconvert);
		
		$ctrl_drd_course_length  = $this->input->post('txtAddCourselength'); 
		$ctrl_drd_crs_video_url  = $this->input->post('txtAddVideoUrlNam');
		
		$ctrl_drd_eassy_quest  = $this->input->post('txtAddEssayQstnNam');
		$ctrl_drd_course_quiz  = $this->input->post('coursequiz');
		$ctrl_drd_course_documents  = $_FILES["files"]['name'];
		$ctrl_drd_course_states  = $this->input->post('coursestate');		
		$ctrl_drd_crs_pass_percentadge  = $this->input->post('selAddScoreNam');

		/* Form Validation Start */
		$this->form_validation->set_rules('selAddCourseNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtAddCourseNumNam', '', 'trim|required|is_unique[course.COURSE_NUM]',
		array(
			'required' => $this->lang->line('m_90509'),
			'is_unique' => $this->lang->line('m_90833'),
		));

		$this->form_validation->set_rules('txtAddTitleNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddCourseDescNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddInstructorNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('selCECreditsNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddDateNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddVideoUrlNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		if($_FILES['files']['name'])
		{		
			$this->form_validation->set_rules('files', '', 'callback_file_check');
		}

		$this->form_validation->set_rules('txtAddQuestion1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn1Ans1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn1Ans2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn1Ans3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn1Ans4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn2Ans1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn2Ans2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn2Ans3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn2Ans4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn3Ans1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn3Ans2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn3Ans3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn3Ans4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn4Ans1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn4Ans2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn4Ans3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn4Ans4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn5Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn5Ans1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn5Ans2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn5Ans3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtAddQstn5Ans4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		if($ctrl_drd_course_type_name == 'DIPLOMATE PROGRAM')
		{
			$this->form_validation->set_rules('txtAddEssayQstnNam', '', 'trim|required',
			array(
			'required' => $this->lang->line('m_90509'),
			));
			$courseValueId ='DN';
		}
		else
		{
			$courseValueId ='CE';
		}
		$this->form_validation->set_rules('selAddScoreNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == FALSE) 
		{
			log_message('info' ,'form Add advertisement validation fails');
		    $ctrl_drd_AddCourseData = array(
                'message' => "",
                'AddCourse' => form_error('selAddCourseNam'),
                'AddCourseNum' => form_error('txtAddCourseNumNam'),
                'AddTitle' => form_error('txtAddTitleNam'),
                'AddCourseDesc' => form_error('txtAddCourseDescNam'),
                'AddInstructor' => form_error('txtAddInstructorNam'),
                'AddCECredits' => form_error('selCECreditsNam'),
                'AddDate' => form_error('txtAddDateNam'),
                'AddVideoUrl' => form_error('txtAddVideoUrlNam'),
                'AddFile' => form_error('files'),
                'AddQuestion1' => form_error('txtAddQuestion1Nam'),
                'AddQstn1Ans1' => form_error('txtAddQstn1Ans1Nam'),
                'AddQstn1Ans2' => form_error('txtAddQstn1Ans2Nam'),
                'AddQstn1Ans3' => form_error('txtAddQstn1Ans3Nam'),
                'AddQstn1Ans4' => form_error('txtAddQstn1Ans4Nam'),
                'AddQuestion2' => form_error('txtAddQstn2Nam'),
                'AddQstn2Ans1' => form_error('txtAddQstn2Ans1Nam'),
                'AddQstn2Ans2' => form_error('txtAddQstn2Ans2Nam'),
                'AddQstn2Ans3' => form_error('txtAddQstn2Ans3Nam'),
                'AddQstn2Ans4' => form_error('txtAddQstn2Ans4Nam'),
                'AddQuestion3' => form_error('txtAddQstn3Nam'),
                'AddQstn3Ans1' => form_error('txtAddQstn3Ans1Nam'),
                'AddQstn3Ans2' => form_error('txtAddQstn3Ans2Nam'),
                'AddQstn3Ans3' => form_error('txtAddQstn3Ans3Nam'),
                'AddQstn3Ans4' => form_error('txtAddQstn3Ans4Nam'),
                'AddQuestion4' => form_error('txtAddQstn4Nam'),
                'AddQstn4Ans1' => form_error('txtAddQstn4Ans1Nam'),
                'AddQstn4Ans2' => form_error('txtAddQstn4Ans2Nam'),
                'AddQstn4Ans3' => form_error('txtAddQstn4Ans3Nam'),
                'AddQstn4Ans4' => form_error('txtAddQstn4Ans4Nam'),
                'AddQuestion5' => form_error('txtAddQstn5Nam'),
                'AddQstn5Ans1' => form_error('txtAddQstn5Ans1Nam'),
                'AddQstn5Ans2' => form_error('txtAddQstn5Ans2Nam'),
                'AddQstn5Ans3' => form_error('txtAddQstn5Ans3Nam'),
                'AddQstn5Ans4' => form_error('txtAddQstn5Ans4Nam'),
                'AddEssayQstn' => form_error('txtAddEssayQstnNam'),
                'AddScore' => form_error('selAddScoreNam')
            );

			echo json_encode($ctrl_drd_AddCourseData); /* Form Validation End 
			return; */
		} 
		else 
		{ 
			log_message('info' ,'form Add Course Validation pass');
			/* Get Course Status id from keyvalue model */
			$ctrl_drd_course_statusid = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
			$ctrl_drd_course_data =  array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"COURSE_CREDIT" => $ctrl_drd_course_credit,
				"COURSE_DESCRIPTION" => $ctrl_drd_course_description,
				"COURSE_LENGTH" => $ctrl_drd_course_length,
				"COURSE_NAME" => $ctrl_drd_course_name,
				"COURSE_NUM" => $ctrl_drd_course_num,
				"COURSE_STATUS_ID" => $ctrl_drd_course_statusid,
				"COURSE_TYPE" => $ctrl_drd_course_type,
				"COURSE_VIDEO_URL" => $this->lang->line('video_url').$ctrl_drd_crs_video_url,
				"INSTRUCTOR_NAME" => $ctrl_drd_ins_name,
				"PASS_PERCENT" => $ctrl_drd_crs_pass_percentadge,
				"PUBLISH_DATE" => $ctrl_drd_dobconvert
			);
			$ctrl_drd_document_array= array();
			$ctrl_drd_document= array();
			log_message('info',"Count ".count($ctrl_drd_course_documents));
			
			log_message('info' ,'Get  User  Expires Id  from Keyvalue table');			
			$ctrl_drd_doc_type_id= $this->KeyValue->getKeyvalueId('DOCUMENT','TYPE','PDF');
			
			if(count($_FILES['files']['name']) >=1)
			{
				$files        = $_FILES;
				$file_count    = count($_FILES['files']['name']);
				$file=1;
				$this->load->library('upload');
				$file_type = 'pdf';
				
				$filepath1 = './uploads/Document/';
				$config['upload_path']           = $filepath1;
				$config['allowed_types']         = $file_type;
				$config['remove_spaces']         = FALSE ;
				$config['convert_dots']          = FALSE ;

				for($i = 0; $i < $file_count; $i++)
				{		
					// Overwrite the default $_FILES array with a single file's data
					// to make the $_FILES array consumable by the upload library
					$_FILES['files']['name']        = $files['files']['name'][$i];
					$_FILES['files']['type']        = $files['files']['type'][$i];
					$_FILES['files']['tmp_name']    = $files['files']['tmp_name'][$i];
					$_FILES['files']['error']        = $files['files']['error'][$i];
					$_FILES['files']['size']        = $files['files']['size'][$i];
					log_message('info' ,'file_name '.$_FILES['files']['name']); 			
					if(isset($_FILES['files']['name']) && $_FILES['files']['name']!="")
					{
						log_message('info' ,'File Name '.$_FILES['files']['name']);
						$folderPath = FCPATH.'uploads/Document';
						if(is_dir($folderPath))
						{
							$ctrl_drd_file_name = $_FILES['files']['name'];
							$file_Name = $this->common_functions->file_name_replace($ctrl_drd_file_name);
							$filepath1 = './uploads/Document/';
							$course_file_name =$courseValueId."-".$ctrl_drd_course_num."-".$file_Name; 
							$filepath = './uploads/Document/'.$course_file_name;
				
							if (file_exists($filepath)) 
							{
								log_message('info',"File already exits");
								log_message('info',"inside upload else file doesnot moved to the folder"); //for log msg
								$file_exists = array( 'message' => $this->lang->line('m_90826'));
								echo json_encode($file_exists);
								return;
							} 
							else
							{
								$config['file_name'] = $course_file_name;
								$this->upload->initialize($config);
								$field_name = "files";
								log_message('info','Field Name '.$field_name);
								if($this->upload->do_upload($field_name)) 
								{
									log_message('info',"File Upload Success");
									$ctrl_drd_course_documents_array = array(
										"CREATE_BY" => $this->session_Useremail,
										"CREATE_DATE" => $this->current_date,
										"UPDATE_BY"  => $this->session_Useremail,
										"UPDATE_DATE" => $this->current_date,
										"DOC_TYPE_ID" =>$ctrl_drd_doc_type_id,
										"DOC_TITLE" =>$file_Name,
										"DOC_FILE_PATH" =>$filepath,	
									);
									array_push($ctrl_drd_document_array,$ctrl_drd_course_documents_array); 
									array_push($ctrl_drd_document,$filepath); 
								}
								else
								{
									log_message('info',"File Upload Error");
									log_message('info',"File Not Uploaded.".$this->upload->display_errors()); //for log msg
									
									$file_error = $this->_unlink_file($ctrl_drd_document);
									echo json_encode($file_error);
									return;
								}
							}
						}
						else
						{
							log_message('info',"Folder Not Available"); //for log msg
							$folder_error = array( 'message' => $this->lang->line('m_90828'));
							echo json_encode($folder_error);
							return;
						} 
					}
					$file++;
				} 
			}
			log_message('info',print_r($ctrl_drd_document_array,TRUE));
			 
			$ctrl_drd_course_state_array = array();
			log_message('info','State Count Array'.count($ctrl_drd_course_states));
			log_message('info','State Array'.print_r(json_decode($this->input->post('coursestate')),TRUE));
			foreach(json_decode($ctrl_drd_course_states) as $objectarray)
			{
				if($objectarray->state_code_name) 
				{					
					$ctrl_drd_state_code_name = $objectarray->state_code_name;							
				}
				else 
				{
					$ctrl_drd_state_code_name = NULL;					
				}	
				$ctrl_drd_course_state = array(
					"CREATE_BY" => $this->session_Useremail,
					"CREATE_DATE" => $this->current_date,
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,
					"STATE_ID" =>$objectarray->state_id,
					"STATE_COURSE_CODE" =>$ctrl_drd_state_code_name,
				);				
				array_push($ctrl_drd_course_state_array,$ctrl_drd_course_state);
			}	
						
			/* Get quiz Status id from keyvalue model */
			$ctrl_drd_quiz_statusid = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
			
			/* Get QUESTION type id from keyvalue model */
			$ctrl_drd_quest_typeid = $this->KeyValue->getKeyvalueId('QUESTION','TYPE','OBJECTIVE');
			
			log_message('info','ctrl_drd_course_quiz_array'.print_r(json_decode($ctrl_drd_course_quiz_array),TRUE));
			
			$ctrl_drd_course_quiz_array = array();
			foreach(json_decode($ctrl_drd_course_quiz) as $quiz_object)
			{
				$ctrl_drd_course_quiz_quest = array(
					"CREATE_BY" => $this->session_Useremail,
					"CREATE_DATE" => $this->current_date,
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,
					"QUIZ_QUESTION" =>$quiz_object->quest_name,
					"QUESTION_TYPE" =>$ctrl_drd_quest_typeid,
					"ANSWER_OPTION_A" =>$quiz_object->answer1,
					"ANSWER_OPTION_B" =>$quiz_object->answer2,
					"ANSWER_OPTION_C" =>$quiz_object->answer3,
					"ANSWER_OPTION_D" =>$quiz_object->answer4,	
					"QUIZ_QUESTION_STATUS_ID" =>$ctrl_drd_quiz_statusid,			
				);
				array_push($ctrl_drd_course_quiz_array,$ctrl_drd_course_quiz_quest);
			}	
			
			if($ctrl_drd_course_type_name == 'DIPLOMATE PROGRAM')
			{
				/* Get QUESTION type id from keyvalue model */
				$ctrl_drd_quest_sub_typeid = $this->KeyValue->getKeyvalueId('QUESTION','TYPE','SUBJECTIVE');
				
				$ctrl_drd_course_quiz = array(
					"CREATE_BY" => $this->session_Useremail,
					"CREATE_DATE" => $this->current_date,
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,
					"QUIZ_QUESTION" =>$ctrl_drd_eassy_quest,
					"QUESTION_TYPE" =>$ctrl_drd_quest_sub_typeid,
					"ANSWER_OPTION_A" =>'',
					"ANSWER_OPTION_B" =>'',
					"ANSWER_OPTION_C" =>'',
					"ANSWER_OPTION_D" =>'',		
					"QUIZ_QUESTION_STATUS_ID" =>$ctrl_drd_quiz_statusid,			
				);
				array_push($ctrl_drd_course_quiz_array,$ctrl_drd_course_quiz);			
			}
			
			$ctrl_drd_insert_course  =  $this->CourseMaster->insertcourse($ctrl_drd_course_data,$ctrl_drd_document_array,$ctrl_drd_course_state_array,$ctrl_drd_course_quiz_array);
			
			if($ctrl_drd_insert_course == 'Success')
			{
				log_message('info','Course Table Insert Successfully');
				log_message('info','Course Documents Table Insert Successfully');
				log_message('info','Course States Table Insert Successfully');
				log_message('info','Course Quiz Table Insert Successfully');
				$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90003'),
					'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;				
			}
			else
			{		
				log_message('info','Course Table Insert Fail');
				log_message('info','Course Documents Table Insert Fail');
				log_message('info','Course States  Table Insert Fail');		
				log_message('info','Course Quiz  Table Insert Fail');
				$file_error = $this->_unlink_file($ctrl_drd_document);				
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		} //End of Else
		log_message('info' ,'add_course_data function end');
	} // End of add_course_data function
	
	/**
	 * Function For Url Regex Validation
	 *
	 * @access public
	 * @since unknown
	 */
	 public function _unlink_file($fieldValue){
		log_message('info','_unlink_file function start');
		foreach($fieldValue as $ctrl_drd_document)
		{
			$file_path = FCPATH."/".$ctrl_drd_document;
			log_message('info','File'.$file_path);
			if(is_file($file_path)) 
			{
				$file_delete= unlink($file_path);// delete file
				log_message('info','file_delete '.print_r($file_delete,TRUE));
				if($file_delete)
				{
					log_message('info','File removed Successfully');
				}
				else
				{
					log_message('info','File removed Fail');
				}
			}
		}
		$file_error = array( 'message' => $this->lang->line('m_90827'));
		log_message('info','_unlink_file function start');
		return $file_error;
    }
	
	/**
	 * Function For Url Regex Validation
	 *
	 * @access public
	 * @since unknown
	 */
	 
	 public function file_check($str)
	 {
		log_message('info' ,'file_check function start');
        $allowed_mime_type_arr = array('pdf');
		$files = count($_FILES["files"]['name']);
		log_message('info' ,'File Count'.$files);
		for ($i = 0; $i < $files; $i++) {							
        $filename = $_FILES['files']['name'][$i];
        $mime = pathinfo($filename, PATHINFO_EXTENSION);
        $maxsize = 3145728;  //3MB Bytes (in binary)
        if(isset($_FILES['files']['name'][$i]) && $_FILES['files']['name'][$i]!="")
		{
            if(in_array(strtolower($mime), $allowed_mime_type_arr))
			{
				log_message('info' ,'File Success'.$_FILES['files']['name'][$i]);
                return true;
            }
			else if(($_FILES['files']['size'] >= $maxsize) || ($_FILES["files"]["size"] == 0)) 
			{
				 $this->form_validation->set_message('file_check', $this->lang->line('m_90832')); 
				 return false;
			}
			else
			{
				log_message('info' ,'Mime Type Error '.$_FILES['files']['name'][$i]);
                $this->form_validation->set_message('file_check', $this->lang->line('m_90522'));
                return false;
            }
        }
		else
		{
			log_message('info' ,'Empty File Error');
            $this->form_validation->set_message('file_check', $this->lang->line('m_90509'));
            return false;
        }
	}
	log_message('info' ,'file_check function end');
    }
	
	
	 /* Update Course Status from Course model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_course_status() 
	{
		log_message('info',"update_course_status function Start");
		
		$ctrl_drd_course_id  = $this->input->post('ajax_course_id');
		$ctrl_drd_course_status  = $this->input->post('ajax_course_status');
		log_message('info',"update_course_status ".$ctrl_drd_course_status);
		if($ctrl_drd_course_status == "DELETE")
		{
			log_message('info' ,'Get Course Status Id from Keyvalue table');
			$ctrl_drd_coursetatus_id= $this->KeyValue->getKeyvalueId('COURSE','STATUS','DELETED');			
		}
		else if($ctrl_drd_course_status == "ACTIVE")
		{
			log_message('info' ,'Get Course Status Id from Keyvalue table');
			$ctrl_drd_coursetatus_id= $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');			
		}
		else
		{
			log_message('info' ,'Get Course Status Id from Keyvalue table');
			$ctrl_drd_coursetatus_id= $this->KeyValue->getKeyvalueId('COURSE','STATUS','HIDE');	
		}
		$where_array  = array(
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"COURSE_STATUS_ID" =>$ctrl_drd_coursetatus_id,
		);
		
		$ctrl_drd_status_update = $this->CourseMaster->update($where_array,array('ID'=>$ctrl_drd_course_id));
		
		if($ctrl_drd_status_update)
		{
			log_message('info',"Course Model Course Status update Success");
			if($ctrl_drd_course_status == "DELETE")
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
			log_message('info',"Course Model Course Status update Fail");$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);
			echo json_encode($ctrl_drd_return_data);
			return;
		}
		log_message('info',"update_course_status function End");
		
	} // End Function 
	
	/* Insert/Update Coures Cost from Course Cost model
	 *
	 * @access public
	 * @since unknown
	*/
	public function insert_course_cost()
	{
		log_message('info',"insert_course_cost function Start");
		/* Store Post Values In variables */		   
		$ctrl_drd_course_type  = $this->input->post('ajax_courseType');
		$ctrl_drd_course_costvalue  = $this->input->post('ajax_courseCost');
		/* Get CE type Value Id in KeyValue Model */
		$where_array = array(
		'GROUP_NAME'=>'COURSE',
		'KEY_NAME'=>'TYPE',
		'VALUE_NAME'=>'CONTINUING EDUCATION',
		);
		
		$ctrl_course_typevalue = $this->KeyValue->listWhere($where_array);
		if(count($ctrl_course_typevalue) >=1)
		{
			$ctrl_course_typevalue = $ctrl_course_typevalue[0];
		}
		
		if($ctrl_drd_course_type == $ctrl_course_typevalue['VALUE_ID']
		)
		{
			$ctrl_course_typeId = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		}
		else
		{
			$ctrl_course_typeId = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');			
		}
		$ctrl_drd_course_cost = $this->CourseCost->findByUniqueKey($ctrl_course_typeId);
		if($ctrl_drd_course_cost['ID'])
		{
			$ctrl_drd_course_data =  array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"COST" => $ctrl_drd_course_costvalue
			);
			$ctrl_return_query = $this->CourseCost->update($ctrl_drd_course_data,array('COURSE_TYPE'=>$ctrl_course_typeId));
			if($ctrl_return_query)
			{
				$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90004'),
					'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;	
			}
			else
			{
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		else
		{
			$ctrl_drd_course_data =  array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"COST" => $ctrl_drd_course_costvalue,
				"COURSE_TYPE" => $ctrl_course_typeId
			);
			$ctrl_return_query = $this->CourseCost->insert($ctrl_drd_course_data);
			if($ctrl_return_query)
			{
				$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90003'),
					'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;	
			}
			else
			{
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		log_message('info',"insert_course_cost function End");
		
	}
}
?>