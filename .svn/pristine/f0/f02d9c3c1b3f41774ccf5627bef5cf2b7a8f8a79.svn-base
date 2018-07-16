<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/User_dashboard_controller
	 *	- or -
	 * 		http://example.com/index.php/User_dashboard_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/User_dashboard_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/User_dashboard_controller/<method_name>
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
	 * This function used to show the user dashboard page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_dashboard() 
	{	
		log_message('info',"view_dashboard function Start here");
		
		$this->load->view('header');
		$this->load->view('topmenu');
		
		/* Get User dashboard diplomate banner  content from ContentMaster table  */
		$ctrl_drd_dn_banner_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DASHBOARD_DIPLOMATE_BANNER');

		$crtl_drd_dn_banner_data = $this->ContentMaster->findByUniqueKey($ctrl_drd_dn_banner_id);
		$ctrl_drd_data['banner_content'] = $crtl_drd_dn_banner_data['CONTENT'];	
		
		$ctrl_course_status_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');
		
		$ctrl_user_enroll_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','IN PROGRESS');
		
		$ctrl_course_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','CONTINUING EDUCATION');
		
		
		$completecourse = 0;
		$startedcourse = 0;
		$failcourse = 0;
		$diplomatecourse =0;
		
		
		$wherearray = array(
		'USER_ID'=>$this->session_Userid
		);

		
		$coursewherearray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'USER_COURSE_STATUS_ID'=>$ctrl_user_enroll_id,		
		);
		
		log_message('info','User Id '.$this->session_Userid);
		
		/* Get User Recommented course from StudentProfile table  */
		
		log_message('info','RECOMMENDED COURSE ARRAY '.print_r($coursewherearray,TRUE));
		
		$ctrl_drd_data['recommented_crs'] = $this->StudentProfile->getrecommendedcourses($coursewherearray);
		foreach($ctrl_drd_data['recommented_crs'] as $recommended_course)
		{
			if($recommended_course->USER_COURSE_STATUS_VALUE_NAME == 'IN PROGRESS')
			{
				$startedcourse++;
			}
		}
		
		$ctrl_user_course_status_id = $this->KeyValue->getKeyvalueId('USER COURSE','STATUS','COMPLETED');

		$courseallarray = array(		
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,			
		'COURSE_INPROGRESS_ID'=>$ctrl_user_enroll_id,	
		'USER_COURSE_STATUS_ID'=>$ctrl_user_course_status_id,		
		'COURSE_COMPLETE_ID'=>$ctrl_user_course_status_id,		
		);
	
		log_message('info','ALL COURSE ARRAY '.print_r($courseallarray,TRUE));
		
		/* Get User All course from StudentProfile table  */
		$ctrl_drd_data['all_crs'] = $this->StudentProfile->getallcourses($courseallarray);
		

		$coursecompletedarray = array(
		'USER_ID'=>$this->session_Userid,
		'COURSE_TYPE'=>$ctrl_course_type_id,
		'COURSE_STATUS_ID'=>$ctrl_course_status_id,
		'USER_COURSE_STATUS_ID'=>$ctrl_user_course_status_id,	
		'COURSE_INPROGRESS_ID'=>$ctrl_user_enroll_id,		
		);
		
		log_message('info','COMPLETE COURSE ARRAY '.print_r($coursecompletedarray,TRUE));
		/* Get User Completed course from StudentProfile table  */
		$ctrl_drd_data['completed_crs'] = $this->StudentProfile->getcompletedcourses($coursecompletedarray);
		foreach($ctrl_drd_data['completed_crs'] as $complete_course)
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
		$ctrl_drd_data['ads'] = $return_ads_array;
		
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
		$ctrl_drd_data['news'] = $news_data;
		log_message('info',"news array".print_r($ctrl_drd_data['news'],TRUE));	
		
		/* Get user news/notifications data in usernotifications model  */
		$crtl_drd_userprofile_data = $this->StudentProfile->getstudentprofile($wherearray);
		log_message('info',"crtl_drd_userprofile_data array".print_r($crtl_drd_userprofile_data,TRUE));	
		if(count($crtl_drd_userprofile_data) == 1)
		{
			$crtl_drd_userprofile_data = $crtl_drd_userprofile_data[0];
		}
		$ctrl_drd_data['name'] = $crtl_drd_userprofile_data['FIRST_NAME']." ".$crtl_drd_userprofile_data['LAST_NAME'];
		$ctrl_drd_data['email_id'] = $crtl_drd_userprofile_data['EMAIL_ID'];
		$ctrl_drd_data['picture_path'] = $crtl_drd_userprofile_data['PROFILE_PICTURE_PATH'];
		$ctrl_drd_user_joindate = $this->common_functions->date_display_format($crtl_drd_userprofile_data['CREATE_DATE']);
		$ctrl_drd_data['join_date'] = $ctrl_drd_user_joindate;
			
		/* Get course active id from keyvalue model  */
		$ctrl_drd_couse_active_id = $this->KeyValue->getKeyvalueId('COURSE','STATUS','ACTIVE');

		/* Get course Type id from keyvalue model  */
		$ctrl_drd_couse_type_id = $this->KeyValue->getKeyvalueId('COURSE','TYPE','DIPLOMATE PROGRAM');

		$ctrl_drd_course_array  = array(
		'COURSE_TYPE' =>$ctrl_drd_couse_type_id,
		'COURSE_STATUS_ID' =>$ctrl_drd_couse_active_id,
		);
		/* Get Diplomate course list from course model  */
		$ctrl_drd_couse_data= $this->CourseMaster->listWhere($ctrl_drd_course_array);
		$ctrl_drd_data['dip_course_count'] = count($ctrl_drd_couse_data);
		
		foreach($ctrl_drd_couse_data as $ctrl_drd_couse_data)
		{
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
		
				if(($ctrl_drd_usercourse['VALUE_NAME'] == 'IN PROGRESS') OR($ctrl_drd_usercourse['VALUE_NAME'] == 'COMPLETED'))
				{
					$diplomatecourse++;
				}
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
		foreach($diplomatecourse as $diplomatecourse)
		{
			if($diplomatecourse['USER_COURSE_STATUS_VALUE_NAME']=="IN PROGRESS" ||
			$diplomatecourse['USER_COURSE_STATUS_VALUE_NAME']=="COMPLETED")
			{
			$diplomatecoursecount = $diplomatecourse['NUMBER']+$diplomatecoursecount;
			}
		}
		
		$ctrl_drd_data['completed_course'] = $completecourse;
		$ctrl_drd_data['started_course'] = $startedcourse;
		$ctrl_drd_data['failed_course'] = $failcourse;
		$ctrl_drd_data['dip_enroll_course'] = $diplomatecoursecount;
		
		
		/* Get Diplomate course payment list from userdiplomatedetails model  */
		$ctrl_drd_data['diplomatedata']= $this->UserDiplomateDetail->listWhere(array('USER_ID'=>$this->session_Userid));
		 
		log_message('info',"Dashboard data".print_r($ctrl_drd_data,TRUE));
		
		$this->load->view('dashboard',$ctrl_drd_data);
		$this->load->view('footer');
		
		log_message('info',"view_dashboard function end here");
	} // Enf of viewDashboard Function
	
	
	/**
	 * This function used to notification id insert  to user  notification seen  model
	 *
	 * @access public
	 * @since unknown
	 */
	public function delete_notification() 
	{	
		log_message('info',"delete_notification function Start here");
		
		/* Store Post Values In variables */
		   
		$ctrl_drd_notification_id  = $this->input->post('ajx_user_notificationid');
		
		$ctrl_drd_usernews_insertdata  = array(
				"CREATE_BY" => $this->session_Useremail,
				"CREATE_DATE" => $this->current_date,
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"NOTIFICATION_ID"   =>$ctrl_drd_notification_id,
				"USER_ID" => $this->session_Userid,
		);
		$ctrl_drd_insert_usernews  =  $this->UserNotificationSeen->insert($ctrl_drd_usernews_insertdata);
			
			if($ctrl_drd_insert_usernews == 'Success')
			{
				log_message('info','UserNotificationSeen Table Insert Successfully');
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90830'),
				'message_type'=>$this->lang->line('success'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_return_message);
				return;
			}
			else
			{		
			log_message('info','UserNotificationSeen Table Insert Fail');			
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				log_message('info' ,'add_signup_data function end');
				echo json_encode($ctrl_drd_return_message);
				return;
			}	
			
		log_message('info',"delete_notification function End here");
	}
	
	/**
	 * This function used increase Ads impression count and increase count to adsmodel
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_ad_count() 
	{	
		log_message('info',"update_ad_count function Start here");
		
		/* Store Post Values In variables */
		   
		$ctrl_drd_ads_id  = $this->input->post('ajx_ad_id');
		$ctrl_drd_ad_click_count  = $this->input->post('ajx_clickcount');
		$ctrl_drd_ad_imp_count  = $this->input->post('ajx_impcount');
		
		if($ctrl_drd_ad_click_count !="")
		{
			log_message('info',"Inside If Ads Click Count ".$ctrl_drd_ad_click_count);
			$ctrl_drd_ads_updatedata  = array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"AD_CLICK_COUNT"   =>$ctrl_drd_ad_click_count+1
			);
		}
		else
		{
			log_message('info',"Inside Else Ads Impression Count ".$ctrl_drd_ad_imp_count);
			$ctrl_drd_ads_updatedata  = array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" => $this->current_date,
				"AD_IMP_COUNT"   =>$ctrl_drd_ad_imp_count+1
			);
		}		
		
		$ctrl_drd_update_ad  =  $this->Advertisements->update($ctrl_drd_ads_updatedata,array('ID'=>$ctrl_drd_ads_id));
			
			if($ctrl_drd_update_ad)
			{
				log_message('info','Advertisments Table Update Successfully');
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				'click_count'=>$ctrl_drd_ad_click_count+1,
				'imp_count'=>$ctrl_drd_ad_imp_count+1,
				);		
				echo json_encode($ctrl_drd_return_message);
				return;
			}
			else
			{		
			log_message('info','Advertisments Table Update Fail');			
				$ctrl_drd_return_message = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_message);
				return;
			}	
			
		log_message('info',"update_ad_count function End here");
	}
} // End of Class

//select course.* from dd_course course where course.ID in (select course_id from  dd_course_states states where states.state_id in (select state_id from dd_users_licenses licenses where user_id = 4))
//select c_states.course_id, state.STATE_CODE from dd_course_states c_states  
				//JOIN dd_course course on c_states.COURSE_ID =course.ID
			//JOIN dd_state_master state on c_states.STATE_ID = state.ID
?>
