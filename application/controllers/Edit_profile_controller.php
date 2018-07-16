<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Edit_profile_controller
	 *	- or -
	 * 		http://example.com/index.php/Edit_profile_controller/index
	 *	- or -
	 * Since this controller is set as the Edit_profile_controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Edit_profile_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public $session_UserId = null; // To Assign Public variable (Session)
	 public $session_userEmail = null; // To Assign Public variable (Session)
	 public $session_userType = null; // To Assign Public variable (Session)
	 public $session_userStatus = null; // To Assign Public variable (Session)
	 public $usercoursecedetails = null;
	 public $usercoursecedetailscount = null;

	public function __construct()
	{
		parent::__construct();
		$this->session_UserId = $this->session->userdata('drd_userId');
		$this->session_userEmail = $this->session->userdata('drd_userEmail');
		$this->session_userType = $this->session->userdata('drd_userType');
		$this->current_Date = date("Y-m-d H:i:s"); // Set Date Format
		//$this->$session_userStatus = $this->session->userdata('drd_userStatus');
	}

	/**
	 * This function used to show the user Edit Profile page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_profile($userid=null)
	{
		log_message('info',"edit_profile function Start here");
		if($userid)
		{
			$user_id = $userid;
			$crtl_drd_data['login_type'] = "ADMIN";
		}
		else
		{
			$user_id = $this->session_UserId;
			$crtl_drd_data['login_type'] = "STUDENT";
		}
		log_message('info' ,'Session UserId '.$user_id);
		/* Get State list from state master table  */
		$crtl_drd_data['state'] = $this->StateMaster->listAll('STATE_NAME');

		/* Get State list from state master table  */
		$crtl_drd_data['stateName'] = $this->StateMaster->listAll('STATE_NAME');

		/* Get country list from country master table  */
		$crtl_drd_data['country'] = $this->CountryMaster->listAll('COUNTRY_NAME');                

		/* Get profile-> StudentProfile-> getstudentprofile  */
		$crtl_drd_data['profile'] = $this->StudentProfile->getstudentprofile(array('USER_ID'=>$user_id));
        log_message('info' ,'profile All Details '.$crtl_drd_data['profile']);
            if(count($crtl_drd_data['profile']) == 1)
            {
                $crtl_drd_data['profile']=$crtl_drd_data['profile'][0];
            }   
                
		$ctrl_drd_createddate=$this->common_functions->date_display_format($crtl_drd_data['profile']['CREATE_DATE']);                
		$crtl_drd_data['crdate'] = $ctrl_drd_createddate;
		
		$ctrl_drd_dobdate=$this->common_functions->date_display_format($crtl_drd_data['profile']['DOB']);                
		$crtl_drd_data['dob'] = $ctrl_drd_dobdate;
                
		/* Get userlicenses-> StudentProfile-> getuserlicenses  */
		$crtl_drd_data['userlicenses'] = $this->StudentProfile->getuserlicenses(array('USER_ID'=>$user_id),'ID ASC');
        log_message('info' ,'userlicenses '.$crtl_drd_data['userlicenses']);

//		if(count($crtl_drd_data['userlicenses']) == 1)
//      {
//      	$crtl_drd_data['userlicenses']=$crtl_drd_data['userlicenses'][0];
//      }

		/* Get userlicenses-> StudentProfile-> getuserlicenses  */
		$crtl_drd_data['usercoursecedetails'] = $this->UserCourse->getusercedetails(array('USER_ID'=>$user_id));
        log_message('info' ,'user course ce details '.print_r($crtl_drd_data['usercoursecedetails'],TRUE));

		$usercoursecedetails = $crtl_drd_data['usercoursecedetails'];
		$usercoursecedetailscount = count($usercoursecedetails);
		$cecount = 0;
		foreach($usercoursecedetails as $usercoursecedetailsArray)
		{  
			$login_array = ['COMPLETED'];
			if(in_array($usercoursecedetailsArray['USER_COURSE_STATUS_VALUE'],$login_array))
			{
				$cecount++;                       
			}   
		}
		log_message('info' ,'$usercoursecedetails '.$usercoursecedetails);
		log_message('info' ,'$usercoursecedetailscount '.$usercoursecedetailscount);
		$ctrl_user_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
			$ctrl_course_status_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		
		$ctrl_user_enroll_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');
		
		$ctrl_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		$coursecompletedarray = array(
		'USER_ID'=>$user_id,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'USER_COURSE_STATUS_ID'=>$ctrl_user_course_status_id,	
		'COURSE_INPROGRESS_ID'=>$ctrl_user_enroll_id,		
		);
		
		log_message('info' ,'usercoursecedetail completed '.print_r($coursecompletedarray,true));

        $crtl_drd_data['completed_count'] = count($crtl_drd_data['usercoursecedetails'] );
		
		$total_credit  = 0;
		$ce_credit  = 0;
		$total_paid_amount  = 0;
		$diplomate_crs  = 1;
		$crs_taken  = 0;
		 
		$dp_crs_taken  = 0;
		/* Get UserCourse list from usercourse model*/
		$crtl_drd_inprogress_data= count($this->UserCourse->listwhere(array('USER_ID'=>$user_id,'USER_COURSE_STATUS_ID' => $ctrl_user_enroll_id)));
		$crs_taken = $crtl_drd_data['completed_count'] + $crtl_drd_inprogress_data;
		log_message('info' ,'CE courses taken completed '.print_r($crtl_drd_data['completed_count'],true));
		log_message('info' ,'CE courses taken in progress '.print_r($crtl_drd_inprogress_data,true));
		$passid = $this->KeyValue->getKeyvalueId("QUIZ","STATUS","PASS");
		$crtl_drd_usercourse_data= $this->UserCourse->listwhere(array('USER_ID'=>$user_id));
		foreach($crtl_drd_usercourse_data as $crtl_drd_usercourse_data)
		{
			/* Get Course list from course model*/
			$crtl_drd_course = $this->CourseMaster->findByPrimaryKey($crtl_drd_usercourse_data['COURSE_ID']);
			
			/* Get Course type valuename from keyvalue model*/
			$crtl_drd_course_type = $this->KeyValue->findByPrimaryKey($crtl_drd_course['COURSE_TYPE']);			
			
			log_message("info","quiz status ".print_r($crtl_drd_usercourse_data,true));
				if($crtl_drd_usercourse_data['QUIZ_STATUS_ID'] == $passid && $crtl_drd_usercourse_data['CREDIT_STATUS'] == "Y")
				{
					log_message("info","quiz status inside if ".print_r($crtl_drd_course['COURSE_CREDIT'],true));
					$total_credit = $total_credit+$crtl_drd_course['COURSE_CREDIT'];
				}
				
			if($crtl_drd_course_type['VALUE_ID'] == 'CE')
			{
				$price = $crtl_drd_usercourse_data['STD_PRICE']-$crtl_drd_usercourse_data['PROMO_AMOUNT'];
				$total_paid_amount=$total_paid_amount+$price;
				
			}
			else
			{
				$diplomate_crs++;
				$diplomate_taken=1;
			}
		}
		if($diplomate_crs > 1)
		{
			/* Get Course type valuename from keyvalue model*/
			$crtl_drd_diplomatecourse = $this->UserDiplomateDetail->listWhere(array('USER_ID'=>$user_id));
			if(count($crtl_drd_diplomatecourse) >=1)
			{
				$crtl_drd_diplomatecourse=$crtl_drd_diplomatecourse[0];				
				$price = $crtl_drd_diplomatecourse['STD_PRICE']-$crtl_drd_diplomatecourse['PROMO_AMOUNT'];
				$total_paid_amount=$total_paid_amount+$price;
				$dp_crs_taken=$diplomate_taken;
			}
		}
		$crtl_drd_data['total_credit']=$total_credit;
		$crtl_drd_data['total_paid_amount']=$total_paid_amount;
		$crtl_drd_data['total_course_taken']=$crs_taken;
		
		log_message('info' ,'Return message data '.print_r($crtl_drd_data,TRUE));
		if($crtl_drd_data['login_type'] == 'ADMIN')
		{
			$this->load->view('admin/header');
		}
		else
		{
			$this->load->view('header');
		}
		$this->load->view('topmenu');
		$this->load->view('editprofile',$crtl_drd_data);
		$this->load->view('footer');
		log_message('info',"edit_profile function Start here");
	}// Enf of edit_profile Function

	/**
	 * this Function is used to insert data on student table
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_student_data() 
	{
		log_message('info' ,'edit_student_data function start');
		set_time_limit(3600);
                
        //$ctrl_drd_first_name  = $this->input->post('txtFirstNam');
        //$ctrl_drd_last_name  = $this->input->post('txtLastNam');
        $ctrl_drd_password  = $this->input->post('pwdEditPasswordNam');
        //$ctrl_drd_dob  = $this->input->post('txtEditDobNam');
        $ctrl_drd_practice_name  = $this->input->post('txtEditPracticeNam');
        //$ctrl_drd_cer_infn  = $this->input->post('chkAgreeNam');
        //$ctrl_drd_system_IP  = $this->input->post('txtIpAddrNam');
        //$ctrl_drd_emailid  = $this->input->post('txtEditEmailNam');
        $ctrl_drd_mobile_no  = $this->input->post('txtEditMobileNumNam');
        $ctrl_drd_user_id  = $this->input->post('txtEdituserid');            		
        $ctrl_drd_country_id  = $this->input->post('selEditCountryNam');
        $ctrl_drd_state_id  = $this->input->post('selEditStateNam');
        $ctrl_drd_city_name  = $this->input->post('txtEditCityNam');
        $ctrl_drd_street_address  = $this->input->post('txtEditAddressNam');
        $ctrl_drd_postal_code  = $this->input->post('txtEditZipCodeNam');
           
		$this->form_validation->set_rules('txtEditAddressNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtEditCityNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('selEditStateNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtEditZipCodeNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('selEditCountryNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
		
		$this->form_validation->set_rules('pwdEditPasswordNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtEditPracticeNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('txtEditMobileNumNam', '', 'trim|required|min_length[10]|max_length[15]',
		array(
		'required' => $this->lang->line('m_90509'),
		'min_length' => $this->lang->line('m_90505'),
		'max_length' => $this->lang->line('m_90505'),
		));

//		$this->form_validation->set_rules('txtEditDobNam', '', 'trim|required',
//		array(
//		'required' => $this->lang->line('m_90509'),
//		));

		/* $this->form_validation->set_rules('selEditLicenseNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
 */
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'form Edit student validation fails');
		    $ctrl_drd_EditStudentData = array(
                'message' => "",
               // 'EditFirstName' => form_error('txtEditFirstNam'),
               // 'EditLastName' => form_error('txtEditLastNam'),
               // 'EditEmail' => form_error('txtEditEmailNam'),
                'EditPassword' => form_error('pwdEditPasswordNam'),
                'EditAddress' => form_error('txtEditAddressNam'),
                'EditCity' => form_error('txtEditCityNam'),
                'EditState' => form_error('selEditStateNam'),
                'EditZipcode' => form_error('txtEditZipCodeNam'),
                'EditCountry' => form_error('selEditCountryNam'),
				'EditPracticeName' => form_error('txtEditPracticeNam'),
                'EditMobileNum' => form_error('txtEditMobileNumNam'),
               // 'EditDob' => form_error('txtEditDobNam'),
               // 'EditLicense' => form_error('selEditLicenseNam'),
                //'EditInfo' => form_error('chkEditInfoNam')
            );

			echo json_encode($ctrl_drd_EditStudentData); /* Form Validation End */
			return;
		}
		else 
		{
			$ctrl_drd_user_data =array();
			$ctrl_drd_user_data_id =array();
			$ctrl_drd_stdnt_profile_data =array();
			$ctrl_drd_stdnt_profile_id =array();
			$ctrl_drd_add_license_array =array();
			$ctrl_drd_edit_license_array =array();
			$ctrl_drd_delete_license_array =array();
			log_message('info' ,'form Edit student Validation pass');                        
            if(strlen($ctrl_drd_password) <=8 )
			{
				//log_message('info','Current Password '.$ctrl_drd_password);				
				$ctrl_drd_user_data =  array(				
				"UPDATE_BY"  => $this->session_userEmail,
				"UPDATE_DATE" => $this->current_Date,
				"PASSWORD"    =>password_hash($ctrl_drd_password, PASSWORD_BCRYPT),
				);
				$ctrl_drd_user_data_id =array('ID'=>$this->session_UserId);
			}				
            $ctrl_drd_stdnt_profile_data =  array(				
				"UPDATE_BY"  => $this->session_userEmail,
				"UPDATE_DATE" => $this->current_Date,
				//'PROFILE_PICTURE_PATH'=>'img/avatar5.png',
				"PRACTICE_NAME" =>$ctrl_drd_practice_name,
				"MOBILE_NUM" =>$ctrl_drd_mobile_no,				
				"POSTAL_ADDRESS" =>$ctrl_drd_street_address,
				"POSTAL_CODE" =>$ctrl_drd_postal_code,
				"CITY" =>$ctrl_drd_city_name,
				"STATE" =>$ctrl_drd_state_id,
				"COUNTRY" =>$ctrl_drd_country_id,
			);
			$ctrl_drd_stdnt_profile_id =  array('ID'=>$ctrl_drd_user_id);
			
			log_message('info',"Add licenseCount ".count($this->input->post('ajx_drd_add_licenseData')));
			if(count($this->input->post('ajx_drd_add_licenseData')) !=0 )
			{
				for($i=0;$i<count($this->input->post('ajx_drd_add_licenseData'));$i++)
				{
					if($this->input->post('ajx_drd_add_licenseData')[$i]['license_no'])
					{
						$ctrl_drd_add_stdnt_license = array(
						"CREATE_BY"  => $this->session_userEmail,
						"CREATE_DATE"  => $this->current_Date,
						"UPDATE_BY"  => $this->session_userEmail,
						"UPDATE_DATE" => $this->current_Date,
						"USER_ID" => $ctrl_drd_user_id,
						"STATE_ID" =>$this->input->post('ajx_drd_add_licenseData')[$i]['license_state'],
						"LICENSE_NUM" =>$this->input->post('ajx_drd_add_licenseData')[$i]['license_no'],	
						);
						log_message('info',"License data  ".print_r($this->input->post('ajx_drd_add_licenseData')[$i]['license_state'],TRUE));
						array_push($ctrl_drd_add_license_array,$ctrl_drd_add_stdnt_license);
					}
				}	
			}
			
			log_message('info',"Edit licenseCount ".count($this->input->post('ajx_drd_edit_licenseData')));
			if(count($this->input->post('ajx_drd_edit_licenseData')) !=0 )
			{
				for($j=0;$j<count($this->input->post('ajx_drd_edit_licenseData'));$j++)
				{
					if($this->input->post('ajx_drd_edit_licenseData')[$j]['user_license_id'])
					{
						$ctrl_drd_edit_stdnt_license = array(
						"UPDATE_BY"  => $this->session_userEmail,
						"UPDATE_DATE" => $this->current_Date,
						"ID" => $this->input->post('ajx_drd_edit_licenseData')[$j]['user_license_id'],
						"USER_ID" => $ctrl_drd_user_id,
						"STATE_ID" =>$this->input->post('ajx_drd_edit_licenseData')[$j]['license_state'],
						"LICENSE_NUM" =>$this->input->post('ajx_drd_edit_licenseData')[$j]['license_no'],	
						);
						log_message('info',"License data  ".print_r($this->input->post('ajx_drd_edit_licenseData')[$j]['license_state'],TRUE));
						array_push($ctrl_drd_edit_license_array,$ctrl_drd_edit_stdnt_license);
					}
				}	
			}
			
			log_message('info',"delete licenseCount ".count($this->input->post('ajx_drd_delete_licenseData')));
			if(count($this->input->post('ajx_drd_delete_licenseData')) !=0 )
			{
				for($i=0;$i<count($this->input->post('ajx_drd_delete_licenseData'));$i++)
				{
					$ctrl_drd_del_stdnt_license = array(
						"ID" =>$this->input->post('ajx_drd_delete_licenseData')[$i]['user_license_id']	
					);
					array_push($ctrl_drd_delete_license_array,$ctrl_drd_del_stdnt_license);
				}
			}
			$ctrl_drd_query_data['USER_UPDATE']=$ctrl_drd_user_data;
			$ctrl_drd_query_data['USER_UPDATE_ID']=$ctrl_drd_user_data_id;
			$ctrl_drd_query_data['STDNT_PROFILE_UPDATE']=$ctrl_drd_stdnt_profile_data;
			$ctrl_drd_query_data['STDNT_PROFILE_UPDATE_ID']=$ctrl_drd_stdnt_profile_data;
			$ctrl_drd_query_data['ADD_LICENSE']=$ctrl_drd_add_license_array;
			$ctrl_drd_query_data['EDIT_LICENSE']=$ctrl_drd_edit_license_array;
			$ctrl_drd_query_data['DELETE_LICENSE']=$ctrl_drd_delete_license_array;
			
			$ctrl_drd_student_update_data = $this->StudentProfile->update_student_profile($ctrl_drd_query_data);
			if($ctrl_drd_student_update_data =='Success')
			{
				log_message('info','Student Table updated Successfully');
				$ctrl_drd_EditStudentData = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_EditStudentData);
				return;    
            }
			else
			{
				log_message('info','Students Table update Fail');
				$ctrl_drd_edit_student_data = array(
					'message' => $this->lang->line('m_90008'),
					'message_type'=>$this->lang->line('error'),
				);
				log_message('info' ,'edit_student_data function end');
				echo json_encode($ctrl_drd_edit_student_data);
				return;
			}
		} //End of Else
		log_message('info' ,'edit_student_data function end');
	} // End of edit_student_data function
        
    /**
	 * This function used to show the user course certificate details
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_transaction_details()
	{		
		log_message('info',"view_transaction_details function Start here");
		
		//Get data from Ajax
		$ctrl_drd_user_id = $this->input->post('ajx_drd_userId');
		$ctrl_drd_course_id = $this->input->post('ajx_drd_courseId');
		
		/* Get usercoursetrasaction-> StudentProfile-> getusertransactions  */
		$crtl_drd_user_course_transaction_data = $this->StudentProfile->getusertransactions(array('USER_ID'=>$ctrl_drd_user_id,'COURSE_ID'=>$ctrl_drd_course_id));			
		
		// transaction data orderby desc
		$ctrl_drd_user_course_transaction_array  = $crtl_drd_user_course_transaction_data[0];
		
		log_message('info','usercoursetransactions= '.print_r($ctrl_drd_user_course_transaction_array[0],true));		

		header('Content-type: text/x-json');
		echo json_encode($ctrl_drd_user_course_transaction_array);	
		
		log_message('info',"view_transaction_details function end here");		
	}//End of view_transaction_details    
	
	/**
	 * This function used to show the user course quiz details
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_quiz_details()
	{		
		log_message('info',"view_quiz_details function Start here");
		
		//Get data from Ajax
		$ctrl_drd_user_id = $this->input->post('ajx_drd_userId');
		$ctrl_drd_course_id = $this->input->post('ajx_drd_courseId');
		
		/* Get usercourse data from dd_user_course  */
		$crtl_drd_user_course_data = $this->UserCourse->listWhere(array('USER_ID'=>$ctrl_drd_user_id,'COURSE_ID'=>$ctrl_drd_course_id));	

		log_message('info','crtl_drd_user_course_data= '.print_r($crtl_drd_user_course_data,true));
		
		// transaction data orderby desc
		$ctrl_drd_user_course_array  = $crtl_drd_user_course_data;
		$sort = array();
		foreach($ctrl_drd_user_course_array as $k=>$v) 
		{
			$sort['ID'][$k] = $v['ID'];
		}
		array_multisort($sort['ID'], SORT_DESC, $ctrl_drd_user_course_array);		
		log_message('info','ctrl_drd_user_course_array= '.print_r($ctrl_drd_user_course_array[0],true));
		
		$ctrl_drd_user_course_array = $ctrl_drd_user_course_array[0];
		
		/* Get course details from dd_course  */
		$crtl_drd_course_data = $this->CourseMaster->findByPrimaryKey($ctrl_drd_user_course_array['COURSE_ID']);	
		
		log_message('info','crtl_drd_course_data= '.print_r($crtl_drd_course_data,true));

		/* Get quiz details from dd_user_course_quiz  */
		$crtl_drd_course_quiz_data = $this->UserCourseQuiz->listWhere(array('USER_COURSE_ID'=>$ctrl_drd_user_course_array['ID']));	
		
		log_message('info','crtl_drd_course_quiz_data= '.print_r($crtl_drd_course_quiz_data,true));
		
		if (count($crtl_drd_course_quiz_data) > 0) 
		{
			log_message('info',"Inside If");	
			
			echo '<div class="row">
				<div class="col-md-1">
					<p style="font-size:15px;"><strong>'.$crtl_drd_course_data['COURSE_NUM'].'</strong></p>
				</div>
				<div class="col-md-11">
					<p style="font-size:18px;"><strong>'.$crtl_drd_course_data['COURSE_NAME'].'</strong></p>
				</div>
				<p>&nbsp;</p>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-1">';
				foreach ($crtl_drd_course_quiz_data as $crtl_drd_course_quiz_data) 
				{
					/* Get quiz details from dd_user_course_quiz  */
					$crtl_drd_get_status = $this->KeyValue->findByPrimaryKey($crtl_drd_course_quiz_data['QUIZ_QUESTION_STATUS_ID']);
					
					log_message('info','crtl_drd_get_status= '.print_r($crtl_drd_get_status,true));
					
					echo '<div class="row">
						<div class="col-md-9">
							<p>'.$crtl_drd_course_quiz_data['QUIZ_QUESTION'].'</p>
						</div>
						<div class="col-md-3" >';
							if($crtl_drd_get_status['VALUE_NAME'] == 'FAIL') {
								echo '<p class="" style="color:red;"><b>Incorrect</b></p>';
							} 
							else 
							{
								echo '<p class=""><b>Correct</b></p>';
							} 
						echo '</div>
					</div><br>';
				}	
				echo '</div>
				<div class="col-md-3"  style="">
					<p class="labeltext pull-right" style="font-size:55px;">'.$ctrl_drd_user_course_array['PERCENT_SCORED'].'%</p>
				</div>
			</div>';
		}		
		log_message('info',"view_quiz_details function end here");		
	}//End of view_quiz_details
	
	/**
	 * This function used to show the user course survey details
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_survey_details()
	{		
		log_message('info',"view_survey_details function Start here");
		
		//Get data from Ajax
		$ctrl_drd_user_id = $this->input->post('ajx_drd_userId');
		$ctrl_drd_course_id = $this->input->post('ajx_drd_courseId');
		
		/* Get usercourse data from dd_user_course  */
		$crtl_drd_user_course_data = $this->UserCourse->listWhere(array('USER_ID'=>$ctrl_drd_user_id,'COURSE_ID'=>$ctrl_drd_course_id));	
		//log_message('info','crtl_drd_user_course_data= '.print_r($crtl_drd_user_course_data,true));
		
		// user course data orderby desc
		$ctrl_drd_user_course_array  = $crtl_drd_user_course_data;
		$sort = array();
		foreach($ctrl_drd_user_course_array as $k=>$v) 
		{
			$sort['ID'][$k] = $v['ID'];
		}
		array_multisort($sort['ID'], SORT_DESC, $ctrl_drd_user_course_array);	
		log_message('info','ctrl_drd_user_course_array= '.print_r($ctrl_drd_user_course_array[0],true));
		$ctrl_drd_user_course_array = $ctrl_drd_user_course_array[0];
		
		/* Get course details from dd_course  */
		$crtl_drd_course_data = $this->CourseMaster->findByPrimaryKey($ctrl_drd_user_course_array['COURSE_ID']);	
		log_message('info','crtl_drd_course_data= '.print_r($crtl_drd_course_data,true));

		/* Get quiz details from dd_user_course_quiz  */
		$crtl_drd_course_survey_data = $this->UserCourseSurvey->listWhere(array('USER_COURSE_ID'=>$ctrl_drd_user_course_array['ID']));	
		log_message('info','crtl_drd_course_survey_data= '.print_r($crtl_drd_course_survey_data,true));
		
		if (count($crtl_drd_course_survey_data) > 0) 
		{
			log_message('info',"Inside Survey If");	
			echo '<div class="row">
				<div class="col-md-1">
					<p style="font-size:15px;"><strong>'.$crtl_drd_course_data['COURSE_NUM'].'</strong></p>
				</div>
				<div class="col-md-11">
					<p style="font-size:18px;"><strong>'.$crtl_drd_course_data['COURSE_NAME'].'</strong></p>
				</div>
				<p>&nbsp;</p>
				</div>
					<div class="row">
						<div class="col-md-9 col-md-offset-1">';
						$i = 0;
						foreach ($crtl_drd_course_survey_data as $crtl_drd_course_survey_data) 
						{							
							echo '<div class="row">
								<div class="col-md-6">
									<p>'.$crtl_drd_course_survey_data['SURVEY_QUESTION'].'</p>
								</div>
								<div class="col-md-6">
									<p class="lh">Disagree <span class="pull-right" style="padding-right:50px;">Agree</span>
									<div class="form-group">
										<div class=" radio-inline col-md-2 col-xs-1">';
											if($crtl_drd_course_survey_data['OPTION_1']== 'Y') {
												echo '<input type="radio" id="inlineRadio11" value="option1" name="radioInline'.$i.'" checked >
												<label for="inlineRadio11"></label>';
											} else {
												echo '<input type="radio" id="inlineRadio11" value="option1" name="radioInline'.$i.'" disabled >
												<label for="inlineRadio11"></label>';
											}											
											echo '
										</div>
										<div class=" radio-inline col-md-2 col-xs-1">';
											if($crtl_drd_course_survey_data['OPTION_2']== 'Y') {
											echo '<input type="radio" id="inlineRadio12" value="option2" name="radioInline'.$i.'" checked>
											<label for="inlineRadio12"></label>';
											} else {
												echo '<input type="radio" id="inlineRadio12" value="option2" name="radioInline'.$i.'" disabled >
												<label for="inlineRadio12" ></label>';
											}
											echo '</div>
										<div class=" radio-inline col-md-2 col-xs-1">';
											if($crtl_drd_course_survey_data['OPTION_3']== 'Y') { 
											echo '<input type="radio" id="inlineRadio13" value="option3" name="radioInline'.$i.'" checked>
											<label for="inlineRadio13"></label>'; 
											} else {
												echo '<input type="radio" id="inlineRadio13" value="option3" name="radioInline'.$i.'" disabled >
												<label for="inlineRadio13"></label>'; 
											}
											echo '
										</div>
										<div class=" radio-inline col-md-2 col-xs-1">';
											if($crtl_drd_course_survey_data['OPTION_4']== 'Y') { 
											echo '<input type="radio" id="inlineRadio14" value="option4" name="radioInline'.$i.'" checked>
											<label for="inlineRadio14"></label>';
											} else {
												echo '<input type="radio" id="inlineRadio14" value="option4" name="radioInline'.$i.'" disabled>
												<label for="inlineRadio14"></label>';
											}
											echo '
										</div>
										<div class=" radio-inline col-md-2 col-xs-1">';
											if($crtl_drd_course_survey_data['OPTION_5']== 'Y') { 
											echo '<input type="radio" id="inlineRadio15" value="option5" name="radioInline'.$i.'" checked>
											<label for="inlineRadio15"></label>';
											} else {
												echo '<input type="radio" id="inlineRadio15" value="option5" name="radioInline'.$i.'" disabled >
												<label for="inlineRadio15"></label>';
											}
											echo '
										</div>
									</div></p>
								</div>
							</div><br>';
							$i++;
						}
					echo '</div>
				</div>';
		}		
		log_message('info',"view_survey_details function end here");		
	}//End of view_survey_details
} // End of Class

