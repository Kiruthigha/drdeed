<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_course_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Edit_course_controller
	 *	- or -
	 * 		http://example.com/index.php/Edit_course_controller
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Edit_course_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Edit_course_controller/<method_name>
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
	
	public function edit_courses($course_id)
	{
		
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
		
		/* Get course list from course model */
		$crtl_drd_data['courses'] = $this->CourseMaster->findByPrimaryKey($course_id);
		$crtl_drd_data['course_credit']  = $crtl_drd_data['courses']['COURSE_CREDIT'];
		$crtl_drd_calculate_time  =$crtl_drd_data['course_credit'] * 60.00;
		$crtl_drd_data['time']  ="00.".$crtl_drd_calculate_time.".00";
		
		if($crtl_drd_data['courses']['COURSE_TYPE'] ==$ctrl_drd_ce_course_type_id)
		{
			$crtl_drd_calculate_cost =$crtl_drd_data['ce_course_cost'];
			$crtl_drd_data['course_type_name']='CE';
		}
		else
		{
			$crtl_drd_calculate_cost =0;
			$crtl_drd_data['course_type_name']='DN';
		}
		$crtl_drd_data['cost']= $crtl_drd_calculate_cost;
		/* Get course type from keyvalue model */
		$ctrl_drd_quest_type_id = $this->KeyValue->getKeyvalueId('QUESTION','TYPE','OBJECTIVE');
		
		/* Get course type from keyvalue model */
		$ctrl_drd_quest_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		/* Get course list from course quiz question model */
		$crtl_drd_course_questions = $this->CourseQuizQuestion->listWhere(array('QUIZ_QUESTION_STATUS_ID'=>$ctrl_drd_quest_status_id,'COURSE_ID'=>$course_id));
		foreach($crtl_drd_course_questions as $crtl_drd_course_questions)
		{
			if($crtl_drd_course_questions['QUESTION_TYPE'] == $ctrl_drd_quest_type_id)
			{
				$obj_questions[] = $crtl_drd_course_questions;
			}
			else
			{
				$sub_questions[] = $crtl_drd_course_questions;
				$crtl_drd_data['question_type'] = 'SUBJECTIVE';
			}
		}
		$crtl_drd_data['obj_questions'] =$obj_questions;
		$crtl_drd_data['sub_questions'] =$sub_questions[0];		
		
		/* Get course states from course states model */
		$crtl_drd_data['course_states'] = $this->CourseStates->getcoursestates(array('COURSE_ID'=>$course_id));
		
		/* Get course documents coursedocumentss model */
		$crtl_drd_data['course_doc'] = $this->CourseDocuments->listWhere(array('COURSE_ID'=>$course_id));
		
		log_message('info','Return View Data '.print_r($crtl_drd_data,TRUE));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editcourse',$crtl_drd_data);
		$this->load->view('admin/footer');		
	}
		
	/**
	 * this Function is used to insert data on course table
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_course_data() {
		log_message('info' ,'edit_course_data function start');
		set_time_limit(3600);
		/* Store Post Values In variables */		   
		$ctrl_drd_course_type  = $this->input->post('selEditCourseNam');
		$ctrl_drd_course_type_name  = $this->input->post('selEditCourseTypeNam');
		$ctrl_drd_course_num  = $this->input->post('txtEditCourseNoNam');
		$ctrl_drd_course_name  = $this->input->post('txtEditCourseTitleNam');
		$ctrl_drd_course_description  = $this->input->post('txtEditCourseDescNam');
		$ctrl_drd_ins_name  = $this->input->post('txtEditInstructorNameNam');
		$ctrl_drd_course_credit  = $this->input->post('selEditCECreditsNam');
		$ctrl_drd_course_createdate  = $this->input->post('txtEditCreationDateNam'); 
		
		$ctrl_drd_dobconvert=$this->common_functions->date_db_format($ctrl_drd_course_createdate);
		log_message('info','Convert date format '.$ctrl_drd_dobconvert);
		
		$ctrl_drd_course_length  = $this->input->post('txtEditCourselength'); 
		$ctrl_drd_crs_video_url  = $this->input->post('txtEditVideoUrlNam');
		$ctrl_course_id  = $this->input->post('txtEditCourseId');
		 
		$ctrl_drd_eassy_quest_id  = $this->input->post('txtEditEssayQuestionId');
		$ctrl_drd_eassy_quest  = $this->input->post('txtEditEssayQuestionNam');
		$ctrl_drd_course_quiz  = $this->input->post('coursequiz');
		$ctrl_drd_course_documents  = $_FILES["files"]['name'];
		$ctrl_drd_course_states  = $this->input->post('coursestate');		
		$ctrl_drd_doc_delete  = $this->input->post('doc_deletearray');		
		$ctrl_drd_crs_pass_percentadge  = $this->input->post('selEditPassingScoreNam');

		/* Form Validation Start */
		$this->form_validation->set_rules('selEditCourseNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtEditCourseNoNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509')
		));

		$this->form_validation->set_rules('txtEditCourseTitleNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditCourseDescNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditInstructorNameNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('selEditCECreditsNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditCreationDateNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditVideoUrlNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		if($_FILES['files']['name'])
		{
			$this->form_validation->set_rules('files', '', 'callback_file_check');
		}
		
		$this->form_validation->set_rules('txtEditQuestion1Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ1CorrectAnswerNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ1Answer2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ1Answer3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ1Answer4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQuestion2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ2CorrectAnswerNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ2Answer2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ2Answer3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ2Answer4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQuestion3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ3CorrectAnswerNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ3Answer2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ3Answer3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ3Answer4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQuestion4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ4CorrectAnswerNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ4Answer2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ4Answer3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ4Answer4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQuestion5Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ5CorrectAnswerNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ5Answer2Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ5Answer3Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('txtEditQ5Answer4Nam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		if($ctrl_drd_course_type_name == 'DIPLOMATE PROGRAM')
		{
			$this->form_validation->set_rules('txtEditEssayQuestionNam', '', 'trim|required',
			array(
			'required' => $this->lang->line('m_90509'),
			));
			$courseValueId  = 'DN';
		}
		else
		{
			$courseValueId  = 'CE';
		}
		
		$this->form_validation->set_rules('selEditPassingScoreNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == FALSE) {
			log_message('info' ,'form edit course validation fails');
		    $ctrl_drd_editCourseDataValidation = array(
                'message' => "",
                'EditCourse' => form_error('selEditCourseNam'),
                'EditCourseNo' => form_error('txtEditCourseNoNam'),
                'EditCourseTitle' => form_error('txtEditCourseTitleNam'),
                'EditCourseDesc' => form_error('txtEditCourseDescNam'),
                'EditInstructor' => form_error('txtEditInstructorNameNam'),
                'EditCECredits' => form_error('selEditCECreditsNam'),
                'EditCreationDate' => form_error('txtEditCreationDateNam'),
                'EditVideoUrl' => form_error('txtEditVideoUrlNam'),
                'EditFiles' => form_error('files'),
                'EditStateCode' => form_error('hiddenstatecodeNam'),
                'EditQuestion1' => form_error('txtEditQuestion1Nam'),
                'EditQstn1CrtAns' => form_error('txtEditQ1CorrectAnswerNam'),
                'EditQstn1Ans2' => form_error('txtEditQ1Answer2Nam'),
                'EditQstn1Ans3' => form_error('txtEditQ1Answer3Nam'),
                'EditQstn1Ans4' => form_error('txtEditQ1Answer4Nam'),
                'EditQuestion2' => form_error('txtEditQuestion2Nam'),
                'EditQstn2CrtAns' => form_error('txtEditQ2CorrectAnswerNam'),
                'EditQstn2Ans2' => form_error('txtEditQ2Answer2Nam'),
                'EditQstn2Ans3' => form_error('txtEditQ2Answer3Nam'),
                'EditQstn2Ans4' => form_error('txtEditQ2Answer4Nam'),
                'EditQuestion3' => form_error('txtEditQuestion3Nam'),
                'EditQstn3CrtAns' => form_error('txtEditQ3CorrectAnswerNam'),
                'EditQstn3Ans2' => form_error('txtEditQ3Answer2Nam'),
                'EditQstn3Ans3' => form_error('txtEditQ3Answer3Nam'),
                'EditQstn3Ans4' => form_error('txtEditQ3Answer4Nam'),
                'EditQuestion4' => form_error('txtEditQuestion4Nam'),
                'EditQstn4CrtAns' => form_error('txtEditQ4CorrectAnswerNam'),
                'EditQstn4Ans2' => form_error('txtEditQ4Answer2Nam'),
                'EditQstn4Ans3' => form_error('txtEditQ4Answer3Nam'),
                'EditQstn4Ans4' => form_error('txtEditQ4Answer4Nam'),
                'EditQuestion5' => form_error('txtEditQuestion5Nam'),
                'EditQstn5CrtAns' => form_error('txtEditQ5CorrectAnswerNam'),
                'EditQstn5Ans2' => form_error('txtEditQ5Answer2Nam'),
                'EditQstn5Ans3' => form_error('txtEditQ5Answer3Nam'),
                'EditQstn5Ans4' => form_error('txtEditQ5Answer4Nam'),
                'EditEssayQstn' => form_error('txtEditEssayQuestionNam'),
                'EditPassingScore' => form_error('selEditPassingScoreNam')
            );

			echo json_encode($ctrl_drd_editCourseDataValidation); /* Form Validation End */
			return;
		}
		else 
		{
			log_message('info' ,'form Edit Course Validation pass');
			/* Get Course Status id from keyvalue model */
			$ctrl_drd_course_statusid = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
			$ctrl_drd_course_data =  array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"ID"=>$ctrl_course_id,
				"COURSE_CREDIT" => $ctrl_drd_course_credit,
				"COURSE_DESCRIPTION" => $ctrl_drd_course_description,
				"COURSE_LENGTH" => $ctrl_drd_course_length,
				"COURSE_NAME" => $ctrl_drd_course_name,
				"COURSE_NUM" => $ctrl_drd_course_num,
				"COURSE_STATUS_ID" => $ctrl_drd_course_statusid,
				"COURSE_TYPE" => $ctrl_drd_course_type,
				"COURSE_VIDEO_URL" => $ctrl_drd_crs_video_url,
				"INSTRUCTOR_NAME" => $ctrl_drd_ins_name,
				"PASS_PERCENT" => $ctrl_drd_crs_pass_percentadge,
				"PUBLISH_DATE" => $ctrl_drd_dobconvert
			);
			$ctrl_drd_document_array= array();
			$ctrl_drd_document= array();
			log_message('info',"Count ".count($ctrl_drd_course_documents));
			
			log_message('info' ,'Get  User  Expires Id  from Keyvalue table');			
			$ctrl_drd_doc_type_id= $this->KeyValue->getKeyvalueId('DOCUMENT','TYPE','PDF');
			
			if(count($ctrl_drd_doc_delete)>=1)
			{
				$ctrl_drd_doc_delete_array = array();
				foreach(json_decode($ctrl_drd_doc_delete) as $doc_delete)
				{
					$file_path = FCPATH."/".$doc_delete->FilePath;
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
					array_push($ctrl_drd_doc_delete_array,$doc_delete->DocId);
					
				}				
			}
			$implode_del_doc_array = implode(", ", $ctrl_drd_doc_delete_array);


			$files        = $_FILES;
			$file_count    = count($_FILES['files']['name']);
			
			if($file_count >=1)
			{
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
										"COURSE_ID" =>$ctrl_course_id,
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
									foreach($ctrl_drd_document as $ctrl_drd_document)
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
				} //  End Forloop
			} //End If
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
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,
					"COURSE_ID" => $ctrl_course_id,
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
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,
					"ID" => $quiz_object->quest_id,
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
				
				$ctrl_drd_course_Essayquiz = array(
					"UPDATE_BY"  => $this->session_Useremail,
					"UPDATE_DATE" => $this->current_date,					
					"ID" => $ctrl_drd_eassy_quest_id,
					"QUIZ_QUESTION" =>$ctrl_drd_eassy_quest,
					"QUESTION_TYPE" =>$ctrl_drd_quest_sub_typeid,
					"ANSWER_OPTION_A" =>'',
					"ANSWER_OPTION_B" =>'',
					"ANSWER_OPTION_C" =>'',
					"ANSWER_OPTION_D" =>'',		
					"QUIZ_QUESTION_STATUS_ID" =>$ctrl_drd_quiz_statusid,			
				);
				array_push($ctrl_drd_course_quiz_array,$ctrl_drd_course_Essayquiz);			
			}
			
			$ctrl_drd_update_course  =  $this->CourseMaster->updatecourse($ctrl_drd_course_data,$ctrl_drd_document_array,$ctrl_drd_course_state_array,$ctrl_drd_course_quiz_array,$implode_del_doc_array);
			
			if($ctrl_drd_update_course == 'Success')
			{
				log_message('info','Course Table update Successfully');
				log_message('info','Course Documents Table update Successfully');
				log_message('info','Course States Table update Successfully');
				log_message('info','Course Quiz Table update Successfully');
				$ctrl_drd_return_data = array(
					'message' => $this->lang->line('m_90004'),
					'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;	
			}
			else
			{		
				log_message('info','Course Table update Fail');
				log_message('info','Course Documents Table update Fail');
				log_message('info','Course States  Table update Fail');		
				log_message('info','Course Quiz  Table update Fail');	
				foreach($ctrl_drd_document as $ctrl_drd_document)
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
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		} //End of Else
		log_message('info' ,'Edit_course_data function end');
	} // End of add_course_data function
		
	public function checkUrlRegex($fieldValue){
		
		if (!$fieldValue){
			$this->form_validation->set_message('checkUrlRegex', $this->lang->line('m_90509'));
			return FALSE;
		} else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$fieldValue))
            {
				$this->form_validation->set_message('checkUrlRegex', $this->lang->line('m_90508'));
                return FALSE;
            }

            return TRUE;
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
		$maxsize = 3145728;  //3MB Bytes (in binary)
        $mime = pathinfo($filename, PATHINFO_EXTENSION);
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
	
	/**
	 * This Function Used To Check Course Number Already exists in Course Model
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function course_num_exists()
	{	
		log_message('info',"course_num_exists function Start here");

		// Set validation Rules for form
     
		$this->form_validation->set_rules('ajx_txtCourseNum', '', 'trim|is_unique[course.COURSE_NUM]',
		array(
			'is_unique' => $this->lang->line('m_90833'),
		));

		$this->form_validation->set_error_delimiters('', '');	
		
		if ($this->form_validation->run() == FALSE)
		{
	    log_message('info' ,'form validation Course Number Exists');		  
		   $data = array(		      
			    'message'=>form_error('ajx_txtCourseNum')    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);

		} // End of If Condition
		else 
		{
			log_message('info' ,'form validation Course Number Not Found');
			$data = array(		      
			    'message'=>''    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);
		} // End of Else Block
		log_message('info',"course_num_exists function end here");
		return;
		
	} //End of studentRegister function	
}
?>