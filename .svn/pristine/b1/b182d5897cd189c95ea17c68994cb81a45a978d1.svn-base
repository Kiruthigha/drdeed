<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_dashboard_controller extends CI_Controller {
		/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_dashboard_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_dashboard_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_dashboard_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_dashboard_controller/<method_name>
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
	}

	/**
	 * This function used to display dashboard page for diplomate Program
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_diplomate_dashboard() 
	{
		log_message('info',"view_diplomate_dashboard function Start here");
		
		
		/* Get CE banner  content from ContentMaster table  */
		$ctrl_drd_dn_banner_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DASHBOARD_CE_BANNER');

		$crtl_drd_dn_banner_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_dn_banner_id);
		$crtl_drd_data['banner_content'] = $crtl_drd_dn_banner_data['CONTENT'];	
		$ctrl_course_status_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		$ctrl_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
		$ctrl_u_c_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		$ctrl_u_ip_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');

		$wherearray = array(
		'USER_ID'=>$this->session_Userid,
	);
	
		$wherecoursearray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		);
		//completed course
		$wherecoursecomarray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COMPLETED_STATUS_ID'=>$ctrl_u_c_course_status_id,
		'ENROLL_STATUS_ID'=>$ctrl_u_ip_course_status_id,		
		);
		
		
		/* Get User enrolled Diplomate courses */
		
		$statusCompleted =$this->StudentProfile->getdiplomateavailablecourse($wherecoursecomarray);
		$diplomatelist = $this->StudentProfile->getdiplomatecourses($wherecoursearray);
		foreach ($diplomatelist as $diplomatelist)
		{
			$temp = $diplomatelist;
			if ($temp->COURSE_ID == $statusCompleted)
			{
			log_message('info',"temp array".print_r($temp->COURSE_ID ,TRUE));	

			
				$temp->AVAILABLE ="Y";
			}
			$updatedlist[]  = $temp;
			
		}
		$crtl_drd_data['diplomat_crs'] = $updatedlist;
		
		
		
		
		/* Get Active id in keyvalue model  */
		$ctrl_drd_active_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		/* Get Ads Active data in ads model  */
		$crtl_drd_dn_ads_data = $this->Advertisements->listWhere(array('ACTIVE_STATUS'=>$ctrl_drd_active_id));
		foreach($crtl_drd_dn_ads_data as $crtl_drd_dn_ads_data)
		{
			$start_date = $crtl_drd_dn_ads_data['AD_START_DATE']; 
			$duration = $crtl_drd_dn_ads_data['AD_DURATION']; 
			$current_date = date('Y-m-d'); 
			log_message('info',"Start Date  ".strtotime($start_date));
			if((strtotime($current_date)) <= strtotime($start_date))
			{
					$return_ads_array[]=$crtl_drd_dn_ads_data;				
					log_message('info',print_r($return_ads_array,TRUE));
			}
		}
		$crtl_drd_data['ads'] = $return_ads_array;

		/* Get user news/notifications data in usernotifications model  */
		$crtl_drd_user_news_data = $this->UserNotificationSeen->listWhere($wherearray);
		foreach($crtl_drd_user_news_data as $crtl_drd_user_news_data)
		{
			$user_news_array[]=$crtl_drd_user_news_data['NOTIFICATION_ID'];
		}
		log_message('info',"crtl_drd_dn_user_news_data array".print_r($user_news_array,TRUE));	
	
		/* Get news/notifications Active data in notifications model  */
		$crtl_drd_news_data = $this->Notifications->listWhere(array('ARTICLE_STATUS'=>$ctrl_drd_active_id));
		log_message('info',"crtl_drd_dn_news_data array".print_r($crtl_drd_news_data,TRUE));
		foreach($crtl_drd_news_data as $crtl_drd_news_data)
		{
			
			if(!in_array($crtl_drd_news_data['ID'],$user_news_array))
			{
				$news_data[]=$crtl_drd_news_data;
			}
		}
		$crtl_drd_data['news'] = $news_data;
		log_message('info',"news array".print_r($crtl_drd_data['news'],TRUE));	

		/* Get user news/notifications data in usernotifications model  */
		$crtl_drd_userprofile_data = $this->StudentProfile->getstudentprofile($wherearray);
		log_message('info',"crtl_drd_userprofile_data array".print_r($crtl_drd_userprofile_data,TRUE));	
		if(count($crtl_drd_userprofile_data) == 1)
		{
			$crtl_drd_userprofile_data = $crtl_drd_userprofile_data[0];
		}
		$crtl_drd_data['name'] = $crtl_drd_userprofile_data['FIRST_NAME']." ".$crtl_drd_userprofile_data['LAST_NAME'];
		$crtl_drd_data['email_id'] = $crtl_drd_userprofile_data['EMAIL_ID'];
		$crtl_drd_data['picture_path'] = $crtl_drd_userprofile_data['PROFILE_PICTURE_PATH'];
		$ctrl_drd_user_joindate = $this->common_functions->date_display_format($crtl_drd_userprofile_data['CREATE_DATE']);
		$crtl_drd_data['join_date'] = $ctrl_drd_user_joindate;
		
		$completecourse = 0;
		$startedcourse = 0;
		$failcourse = 0;
		$diplomatecourse =0;
		$total_dip_course_count =0;
		
		/* Get course active id from keyvalue model  */
		$ctrl_drd_couse_active_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');

		$ctrl_drd_course_array  = array(
		'COURSE_STATUS_ID' =>$ctrl_drd_couse_active_id,
		);
		/* Get Diplomate course list from course model  */
		$ctrl_drd_couse_data= $this->CourseMaster->listWhere($ctrl_drd_course_array);
		
		foreach($ctrl_drd_couse_data as $ctrl_drd_couse_data)
		{
			
			/* Get course type valuename from keyvalue model  */
			$ctrl_drd_course_type = $this->KeyValue->findByPrimaryKey($ctrl_drd_couse_data['COURSE_TYPE']);
			
			if($ctrl_drd_course_type['VALUE_ID'] == 'DN')
			{
				$total_dip_course_count++;
			}
				
			/* Get user Course Details in userCourse model  */	
		
			$usercourse_wherearray = array(
			'USER_ID'=>$this->session_Userid,
			'COURSE_ID'=>$ctrl_drd_couse_data['ID']
			);
			$crtl_drd_usercourse_data = $this->UserCourse->listWhere($usercourse_wherearray,'TAKE_COUNT  DESC');
			
			log_message('info',"crtl_drd_usercourse_data array".print_r($crtl_drd_usercourse_data,TRUE));
			
			foreach($crtl_drd_usercourse_data as $crtl_drd_usercourse_data)
			{
				/* Get user course status from keyvalue model  */
				$ctrl_drd_usercourse = $this->KeyValue->findByPrimaryKey($crtl_drd_usercourse_data['USER_COURSE_STATUS_ID']);
				
				/* Get user course Quiz status from keyvalue model  */
				$ctrl_drd_userquiz_status = $this->KeyValue->findByPrimaryKey($crtl_drd_usercourse_data['QUIZ_STATUS_ID']);
				
				if($ctrl_drd_course_type['VALUE_ID'] == 'CE')
				{						
					if($ctrl_drd_usercourse['VALUE_NAME'] == 'IN PROGRESS')
					{
						$startedcourse++;
					}
				}
			}
		}
		
		$ctrl_course_status_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		
		$ctrl_user_enroll_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');
		
		$ctrl_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		$ctrl_user_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');
		$coursecompletedarray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'USER_COURSE_STATUS_ID'=>$ctrl_user_course_status_id,	
		'COURSE_INPROGRESS_ID'=>$ctrl_user_enroll_id,		
		);
		
		$complete_course = $this->StudentProfile->getcompletedcourses($coursecompletedarray);
		foreach($complete_course as $complete_course)
		{
			
			if($complete_course->USER_COURSE_STATUS_VALUE_NAME == 'COMPLETED')
			{
				$completecourse++;
			}
			if($complete_course->QUIZ_STATUS_VALUE_NAME == 'FAIL')
			{
				$failcourse++;
			}
		}
		
		$ctrl_course_dip_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');
		$wherecoursearray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'COURSE_TYPE'=>$ctrl_course_dip_id,
		);
		
		$diplomatecourse = $this->StudentProfile->getdiplomatecoursenumber($wherecoursearray);
		$diplomatecoursecount=0;
		log_message("info","diplomate course count array".print_r($diplomatecourse,true));
		foreach($diplomatecourse as $diplomatecourse)
		{
			if(($diplomatecourse['USER_COURSE_STATUS_VALUE_NAME']=="IN PROGRESS") ||
			($diplomatecourse['USER_COURSE_STATUS_VALUE_NAME']=="COMPLETED"))
			{
				$diplomatecoursecount = $diplomatecourse['NUMBER']+$diplomatecoursecount;
			}
		}
		log_message("info","diplomate course count".$diplomatecoursecount);		
		$crtl_drd_data['completed_course'] = $completecourse;
		$crtl_drd_data['started_course'] = $startedcourse;
		$crtl_drd_data['failed_course'] = $failcourse;
		$crtl_drd_data['dip_enroll_course'] = $diplomatecoursecount;
		$crtl_drd_data['total_dip_enroll_course'] = $total_dip_course_count;
		
		/* Get course active id from keyvalue model  */
		$ctrl_drd_couse_active_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');

		/* Get course Type id from keyvalue model  */
		$ctrl_drd_couse_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');

		$ctrl_drd_course_array  = array(
		'COURSE_TYPE' =>$ctrl_drd_couse_type_id,
		'COURSE_STATUS_ID' =>$ctrl_drd_couse_active_id,
		);
		/* Get Diplomate course list from course model  */
		$ctrl_drd_couse_data= $this->CourseMaster->listWhere($ctrl_drd_course_array);
		$crtl_drd_data['dip_course_count'] =  $this->StudentProfile->getdiplomatecoursenumber($wherecoursearray);
		
		/* Check User Diplomate overall completion check in UserDiplomateDetail model.*/
		$ctrl_drd_user_dp_details = $this->UserDiplomateDetail->listwhere(array('USER_ID'=>$this->session_Userid));
		if(count($ctrl_drd_user_dp_details)>=1)
		{
			$ctrl_drd_course_status_id=$ctrl_drd_user_dp_details[0]['USER_COURSE_STATUS_ID'];
			/*Get Course Completion id in keyvalue model */			
			$ctrl_drd_course_status_value = $this->KeyValue->findByPrimaryKey($ctrl_drd_course_status_id);
			$crtl_drd_data['dip_course_status'] = $ctrl_drd_course_status_value['VALUE_NAME'];
		}
		else
		{
			$crtl_drd_data['dip_course_status'] = '';
		}
		
		log_message('info',"diplomate Dashboard data".print_r($crtl_drd_data,TRUE));		
			$this->load->view('header');
			$this->load->view('topmenu');
			$this->load->view('diplomatedashboard',$crtl_drd_data);	
			$this->load->view('footer');
			log_message('info',"view_diplomate_dashboard function Start here");		
	}//End of view_diplomate_dashboard function

}// end of class
?>
