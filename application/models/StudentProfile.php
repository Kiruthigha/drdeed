<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class StudentProfile extends DRD_DAO {

	/**
	 * It references to self object: Student Profile .
	 * It is used as a singleton
	 *
	 * @access private
	 * @since unknown
	 * @var user
	 */
	private static $instance;
	/**
	 * It creates a new Student Profile object class or if it has been created
	 * before, it return the previous object
	 *
	 * @access public
	 * @since unknown
	 * @return user
	 */
	public static function newInstance()
	{
		if( !self::$instance instanceof self ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Set data related to dd_student_profile table
	 * @access public
	 * @since unknown
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->setTableName('student_profile');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('USER_ID');
		$array_fields = array(
			'ID',
			'USER_ID',
			'DOB',
			'PROFILE_PICTURE_PATH',
			'MOBILE_NUM',
			'PRACTICE_NAME',
			'POSTAL_ADDRESS',
			'POSTAL_CODE',
			'CITY',
			'STATE',
			'COUNTRY',
			'CERTIFIED_INFORMATION',
			'REGISTERD_IP',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE'
		);			
		$this->setFields($array_fields);
	}
	
	
	/**
	* get student profile details
	 * @access public
	 * @since unknown
	 */
	
	public function getstudentprofile($userInput,$orderBy=null) {
		log_message('info' ,'getstudentprofile Function Start');
		$mod_user_details  = array();
		$this->db->select('*');
		$this->db->from(student_profile_view);
		if($userInput)
		{
			$this->db->where($userInput);
		}
		if($orderBy)
		{
			$this->db->order_by($orderBy);
		}
		$result = $this->db->get();		
		
		$mod_user_details  = $result->result_array();		
			
		log_message('info' ,'getstudentprofile Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
	
	/**
	* get student license details
	 * @access public
	 * @since unknown
	 */
	
	public function getuserlicenses($userInput,$orderBy=null) {
		log_message('info' ,'getuserlicenses Function Start');
		$mod_user_details  = array();

		$this->db->select('*');
		$this->db->from(student_license_view);
		if($userInput)
		{
			$this->db->where($userInput);
		}
		if($orderBy)
		{
				$this->db->order_by($orderBy);
		}
		$result = $this->db->get();
		
		$mod_user_details  = $result->result_array();
		
			
		log_message('info' ,'getuserlicenses Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
	
	/**
	* get user transaction details user id as array input
	 * @access public
	 * @since unknown
	 */
	
	public function getusertransactions($userInput) {
		log_message('info' ,'getusertransactions Function Start');
		$mod_user_details  = array();
	
		$this->db->select('*');
		$this->db->from(user_transactions_view);
		if($userInput)
		{
			$this->db->where($userInput);
		}
		$this->db->order_by('UPDATE_DATE DESC');
		
		$result = $this->db->get();
		
		$mod_user_details  = $result->result_array();  
		
		log_message('info' ,'getusertransactions Function End'.print_r($mod_user_details, true));
	
		return $mod_user_details;
	}
	
	/**
	* get user recommended details user id as array input
	 * @access public
	 * @since unknown
	 */
	
	public function getrecommendedcourses($userInput) {
		log_message('info' ,'getrecommendedcourses Function Start');
		$mod_user_details  = array();
		$return_value = array();
		log_message('info' ,'getrecommendedcourses '.print_r($userInput,TRUE));
		
		$query = $this->db->query('SELECT course.ID as COURSE_ID FROM dd_course course 
									WHERE course.ID IN 
									(SELECT course_id FROM  dd_course_states states 
									WHERE states.state_id IN 
									(SELECT state_id FROM dd_users_licenses licenses 
									WHERE user_id =' .$userInput['USER_ID'].') AND 
									states.STATE_COURSE_CODE IS NOT NULL) 
									AND course.course_type = '.$userInput['COURSE_TYPE'].
									' AND course.course_status_id = ' .$userInput['COURSE_STATUS_ID']. ' UNION SELECT COURSE_ID as COURSE_ID FROM dd_user_course
									WHERE USER_COURSE_STATUS_ID ='.$userInput['USER_COURSE_STATUS_ID'].' AND USER_ID='.$userInput['USER_ID']);
								 
		/*$query = $this->db->query('SELECT c_list.* FROM 
								dd_users_licenses licenses, 
								dd_course_list c_list
								WHERE licenses.USER_ID = '.$userInput['USER_ID']. 
								' AND c_list.COMPLETE_DATE IS NULL 
								 AND licenses.state_id in  
								(SELECT state_id FROM dd_course_states states where c_list.course_id =  states.course_id ) 
								group by c_list.course_id , c_list.ENROLL_DATE 
								UNION
								SELECT c_list.* FROM dd_course_list c_list 
								WHERE user_id=' .$userInput['USER_ID'].
								' AND c_list.complete_date is NULL 
								group by c_list.course_id, c_list.ENROLL_DATE
								');		*/
		
		
		$mod_user_details  = $query->custom_result_object('COURSE');
		
		log_message('info' ,'list of recommended courses'.print_r($mod_user_details,true));
		$recommended_course_list = array();
		
		foreach ($mod_user_details as $mod_user_details)
		{
			$temp= $mod_user_details;
			$course_details_list = $this->db->query('SELECT USER_COURSE_ID as USER_COURSE_ID, 
									COURSE_NAME, COURSE_STATUS_ID, 
									COURSE_LENGTH, COURSE_STATUS_VALUE_ID, COURSE_STATUS_VALUE_NAME,
									PERCENT_COMPLETE,PERCENT_SCORED ,
									COURSE_ID, PUBLISH_DATE,
									USER_ID,ENROLL_DATE,
									USER_COURSE_STATUS_ID,USER_COURSE_STATUS_VALUE_ID,
									USER_COURSE_STATUS_VALUE_NAME,	COURSE_STATUS_VALUE_ID,
									COURSE_STATUS_VALUE_NAME,	COMPLETE_DATE,
									PERCENT_SCORED, CERTIFICATE_PATH 
									FROM `dd_course_list` course  
												 WHERE COURSE_ID ='.$temp ->COURSE_ID. ' 
												 AND ((USER_COURSE_STATUS_VALUE_NAME != "COMPLETED" AND USER_ID ='. $userInput['USER_ID'].')
												  OR USER_COURSE_STATUS_VALUE_NAME IS NULL) 
												 AND COURSE_TYPE ='.$userInput['COURSE_TYPE'].'  AND TAKE_COUNT =( SELECT MAX(TAKE_COUNT) FROM dd_course_list where USER_ID ='.$userInput['USER_ID']. ' AND COURSE_ID = course.COURSE_ID '.
			 ' GROUP BY COURSE_ID )'
												);
				//order by take count
			$recommended_course_list = array_merge($recommended_course_list,$course_details_list->custom_result_object('COURSE'));		
			
		}
		
		log_message('info' ,'list of recommended courses in object form'.print_r($recommended_course_list,true));
		
		foreach ($recommended_course_list as $recommended_course_list)
		{
			$temp= $recommended_course_list;
			$nostate_query = $this->db->query('SELECT STATE_CODE AS NO_STATE 
											FROM dd_course_states_view 
											WHERE COURSE_ID = '.$temp ->COURSE_ID.
											' AND STATE_COURSE_CODE IS NULL');		
			
			$result_nostate = "";
			$nostate_list = $nostate_query->result_array();
			foreach ($nostate_list as $nostate_list)
			{
				$result_nostate=$nostate_list['NO_STATE'].", ".$result_nostate;
			}
			$temp -> NO_STATE = $result_nostate;
			log_message('info' ,'nostate Function End'.print_r($temp, true));
			$return_value []= $temp;
		
		}
		
		 usort($return_value, array($this, "compare_status"));
		log_message('info' ,'getrecommendedcourses Function End');

		return $return_value;
	}
	
	/**
	* get user completed details user id as array input
	 * @access public
	 * @since unknown
	 */
	
	public function getcompletedcourses($userInput) {
		log_message('info' ,'getcompletedcourses Function Start');
		$mod_user_details  = array();
		$return_value = array();
		log_message('info','Completed Course Model array '.print_r($userInput,TRUE));
		/*$query = $this->db->query('SELECT c_list.*
								FROM dd_users_licenses licenses, 
								dd_course_list c_list  
								WHERE licenses.state_id IN 
								(SELECT state_id FROM dd_course_states 
								WHERE course_id IN 
								(SELECT course_id FROM dd_course_list WHERE 
								user_id  ='.$userInput['USER_ID'].')) 
								AND c_list.USER_ID='.$userInput['USER_ID']. ' AND c_list.COMPLETE_DATE is not null group by c_list.course_id');*/
		$query = $this->db->query ('SELECT USER_COURSE_ID as  USER_COURSE_ID, 
			 COURSE_NAME, COURSE_STATUS_ID, 
			 COURSE_LENGTH, COURSE_STATUS_VALUE_ID, COURSE_STATUS_VALUE_NAME,
			 PERCENT_COMPLETE,PERCENT_SCORED ,
			 COURSE_ID, PUBLISH_DATE,
			 USER_ID,ENROLL_DATE, QUIZ_STATUS_VALUE_NAME,
			 USER_COURSE_STATUS_ID,USER_COURSE_STATUS_VALUE_ID,
			 USER_COURSE_STATUS_VALUE_NAME, COURSE_STATUS_VALUE_ID,
			 COURSE_STATUS_VALUE_NAME, COMPLETE_DATE,
			 PERCENT_SCORED, CERTIFICATE_PATH 
			 FROM `dd_course_list`  course
			 WHERE USER_ID = '.$userInput['USER_ID'].
			 ' AND USER_COURSE_STATUS_ID = '.$userInput['USER_COURSE_STATUS_ID'].
			 ' AND COURSE_TYPE = '.$userInput['COURSE_TYPE'].
			 ' AND TAKE_COUNT=( SELECT MAX(TAKE_COUNT) FROM dd_course_list where USER_ID ='.$userInput['USER_ID']. ' AND COURSE_ID = course.COURSE_ID '.
			 ' GROUP BY COURSE_ID )');
		//order by take count
		$mod_user_details  = $query->custom_result_object('Course');
		log_message('info' ,'getcompletedcourses list'.print_r($mod_user_details, true));
		//$userInput['COURSE_INPROGRESS_ID'] = 25;
		//$userInput['COURSE_STATUS_ID']=19;
		$coursewherearray = array(
  'USER_ID'=>$userInput['USER_ID'],
  'COURSE_TYPE'=>$userInput['COURSE_TYPE'],
  'COURSE_STATUS_ID'=>$userInput['COURSE_STATUS_ID'] ,
  'USER_COURSE_STATUS_ID'=>$userInput['COURSE_INPROGRESS_ID'] ,
  
  );
    log_message('info','in get completed courses for recommended'.print_r($coursewherearray,TRUE));

  
		$recommened_cl = $this->getrecommendedcourses($coursewherearray);
		
		$r_courselist = array();
		foreach ($recommened_cl as $recommened_cl)
		{
			$r_courselist[]= $recommened_cl->COURSE_ID;
		
		}

		foreach ($mod_user_details as $mod_user_details)
		{
			$temp= $mod_user_details;
			
			if(!(in_array($temp->COURSE_ID, $r_courselist)))
			{
			$nostate_query = $this->db->query('SELECT STATE_CODE AS NO_STATE 
											FROM dd_course_states_view 
											WHERE COURSE_ID = '.$temp ->COURSE_ID.
											' AND STATE_COURSE_CODE IS NULL');		
			
			$result_nostate = "";
			$nostate_list = $nostate_query->result_array();
			foreach ($nostate_list as $nostate_list)
			{
				$result_nostate=$nostate_list['NO_STATE'].", ".$result_nostate;
			}
			$temp -> NO_STATE = $result_nostate;
			log_message('info' ,'nostate Function End'.print_r($temp, true));
			$return_value []= $temp;
			}
			//log_message('info' ,'nostate Function End'.print_r(implode (", ", $nostate), true));
			
		}	
		
		
		
			
		log_message('info' ,'getcompletedcourses Function End');

		return $return_value;
	}
	
	/**
	* get all courses details 
	 * @access public
	 * @since unknown
	 */
	
	public function getallcourses($userInput) {
  log_message('info' ,'getallcourses Function Start');
  $mod_user_details  = array();
  $return_value = array();
  log_message('info','All Course Model array '.print_r($userInput,TRUE));
  /*$query = $this->db->query('SELECT distinct c_list.COURSE_ID as COURSE_ID
        FROM dd_course_list c_list  
        WHERE c_list.USER_ID is null
        AND COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
        ' AND COURSE_TYPE =' .$userInput['COURSE_TYPE']
        );*/
  $mod_allcourse_details= $this->db->query('SELECT ID as COURSE_ID,
           COURSE_NAME, COURSE_LENGTH,
           PUBLISH_DATE, COURSE_NUM           
           from dd_course WHERE COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID']. ' AND COURSE_TYPE =' .$userInput['COURSE_TYPE'].'  order by COURSE_NUM ');
  $mod_user_details = $mod_allcourse_details->custom_result_object('Course');
  

   $courserecomendedarray = array(
  'USER_ID'=>$this->session_Userid,
  'COURSE_TYPE'=>$userInput['COURSE_TYPE'],
  'COURSE_STATUS_ID'=>$userInput['COURSE_STATUS_ID'] ,
  'USER_COURSE_STATUS_ID'=>$userInput['COURSE_INPROGRESS_ID'] ,  
  );
  log_message('info','in get all courses for recommended'.print_r($courserecomendedarray,TRUE));
  $recommened_cl = $this->getrecommendedcourses($courserecomendedarray);
  $r_courselist = array();
  foreach ($recommened_cl as $recommened_cl)
  {
   $r_courselist[]= $recommened_cl->COURSE_ID;  
  }
  
$coursecompletedarray = array(
  'USER_ID'=>$this->session_Userid,
  'COURSE_TYPE'=>$userInput['COURSE_TYPE'],
  'COURSE_STATUS_ID'=>$userInput['COURSE_STATUS_ID'] ,
  'USER_COURSE_STATUS_ID'=>$userInput['USER_COURSE_STATUS_ID'] ,
  'COURSE_INPROGRESS_ID'=>$userInput['COURSE_INPROGRESS_ID'] ,
  'COURSE_COMPLETE_ID'=>$userInput['USER_COURSE_STATUS_ID'] ,
  );
  

  $completed_cl = $this->getcompletedcourses($coursecompletedarray);
  $c_courselist = array();
  foreach ($completed_cl as $completed_cl)
  {
   $c_courselist[]= $completed_cl->COURSE_ID;  
  }
  
  foreach ($mod_user_details as $mod_user_details)
  { 
   $temp= $mod_user_details;
   /* $courseObject = $this->CourseMaster->findByPrimaryKey($temp->ID);
   $temp -> COURSE_NAME =$courseObject['COURSE_NAME'];
   $temp -> COURSE_LENGTH =$courseObject['COURSE_LENGTH'];
   $temp -> PUBLISH_DATE =$courseObject['PUBLISH_DATE'];
   $temp -> COURSE_NUM =$courseObject['COURSE_NUM'];  */
   if(!(in_array($temp->COURSE_ID, $r_courselist)) && !(in_array($temp->COURSE_ID, $c_courselist) ))
   {
   $nostate_query = $this->db->query('SELECT STATE_CODE AS NO_STATE 
           FROM dd_course_states_view 
           WHERE COURSE_ID = '.$temp->COURSE_ID.
           ' AND STATE_COURSE_CODE IS NULL');  
   
   $result_nostate = "";
   $nostate_list = $nostate_query->result_array();
   foreach ($nostate_list as $nostate_list)
   {
    $result_nostate=$nostate_list['NO_STATE'].", ".$result_nostate;
   }
   $temp -> NO_STATE = $result_nostate;
   log_message('info' ,'nostate Function End'.print_r($temp, true));
   $return_value []= $temp;
   }
   //log_message('info' ,'nostate Function End'.print_r(implode (", ", $nostate), true));
   
  } 
  
   
  log_message('info' ,'getallcourses Function End'.print_r($return_value,true));

  return $return_value;
 }
 
	/**
	* get diplomate courses details 
	 * @access public
	 * @since unknown
	 */
	
	public function getdiplomatecourses($userInput) {
		log_message('info' ,'getdiplomatecourses Function Start');
		$mod_user_details  = array();
		$return_value = array();
		
		$firstquery = $this->db->query('SELECT c_list.*
								FROM dd_course c_list  
								where c_list.COURSE_TYPE ='.$userInput['COURSE_TYPE'].  
								//' AND c_list.COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
								' ORDER BY c_list.COURSE_NUM ASC');
								
		$fulllist =  $firstquery->result_array();
		
		
		foreach ($fulllist as $fulllist)
		{
		
		$query = $this->db->query('SELECT c_list.*
								FROM dd_course_list c_list  
								where c_list.COURSE_TYPE ='.$userInput['COURSE_TYPE'].  
								//' AND c_list.COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
								' AND c_list.USER_ID ='.$userInput['USER_ID'].
								' AND c_list.TAKE_COUNT=( SELECT MAX(TAKE_COUNT) FROM dd_user_course where USER_ID ='.$userInput['USER_ID']. ' AND COURSE_ID  =' .$fulllist['ID'].') AND COURSE_ID  =' .$fulllist['ID'].' ORDER BY c_list.TAKE_COUNT,c_list.COURSE_NUM ASC');
									
		
		
		$mod_user_details = array_merge($mod_user_details,$query->custom_result_object('Course'));
		}

		foreach ($mod_user_details as $mod_user_details)
		{
			$temp= $mod_user_details;
			$nostate_query = $this->db->query('SELECT STATE_CODE AS NO_STATE 
											FROM dd_course_states_view 
											WHERE COURSE_ID = '.$temp ->COURSE_ID.
											' AND STATE_COURSE_CODE IS NULL');		
			
			$result_nostate = "";
			$nostate_list = $nostate_query->result_array();
			foreach ($nostate_list as $nostate_list)
			{
				$result_nostate=$nostate_list['NO_STATE'].", ".$result_nostate;
			}
			$temp -> NO_STATE = $result_nostate;
			log_message('info' ,'nostate Function End'.print_r($temp, true));
			$return_value []= $temp;
			//log_message('info' ,'nostate Function End'.print_r(implode (", ", $nostate), true));
			
		}	
		
			
		log_message('info' ,'getdiplomatecourses Function End');
		return $return_value;
	}
	
	/**
	* get diplomate courses details 
	 * @access public
	 * @since unknown
	 */
	
	public function getdiplomatecoursenumber($userInput) {
		log_message('info' ,'getdiplomatecourses Function Start');
		$mod_user_details  = array();
		$return_value = array();
		$query = $this->db->query('SELECT count(*) as NUMBER, USER_COURSE_STATUS_VALUE_NAME
								FROM dd_course_list c_list  
								where c_list.COURSE_TYPE ='.$userInput['COURSE_TYPE'].  
								//' AND c_list.COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
								' AND c_list.USER_ID ='.$userInput['USER_ID'].
								' AND c_list.TAKE_COUNT =(SELECT max(TAKE_COUNT) from dd_course_list where USER_ID ='.$userInput['USER_ID'].
								' AND COURSE_ID =c_list.COURSE_ID )	 GROUP BY USER_COURSE_STATUS_VALUE_NAME	'							
								);
		
		$mod_user_details  = $query->result_array();
		
		return $mod_user_details;
	}
	
	
	/**
	* get getdiplomateavailablecourse details 
	 * @access public
	 * @since unknown
	 */
	
	public function getdiplomateavailablecourse($userInput) {
		log_message('info' ,'getdiplomateavailablecourse Function Start');
		$mod_user_details  = array();
		$return_value = array();
		$query = $this->db->query('SELECT max(COURSE_NUM) as NUMBER, USER_COURSE_STATUS_VALUE_NAME
								FROM dd_course_list c_list  
								where c_list.COURSE_TYPE ='.$userInput['COURSE_TYPE'].  
								//' AND c_list.COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
								' AND c_list.USER_ID ='.$userInput['USER_ID'].
								' AND c_list.USER_COURSE_STATUS_ID ='.$userInput['COMPLETED_STATUS_ID'].
								' AND c_list.TAKE_COUNT =(SELECT max(TAKE_COUNT) from dd_course_list where USER_ID ='.$userInput['USER_ID'].
								' AND COURSE_ID =c_list.COURSE_ID )
								 GROUP BY USER_COURSE_STATUS_VALUE_NAME'								
								);
		
		$mod_user_details  = $query->result_array();
		$course_number =0;
		foreach($mod_user_details as $mod_user_details)
		{
			$course_number = $mod_user_details['NUMBER'];
		}
		
		
		$query_coursenumber = $this->db->query('SELECT COURSE_ID, COURSE_NUM as NUMBER, 					 USER_COURSE_STATUS_VALUE_NAME ,USER_COURSE_STATUS_ID 
								FROM dd_course_list c_list  
								where c_list.COURSE_TYPE ='.$userInput['COURSE_TYPE'].  
								//' AND c_list.COURSE_STATUS_ID ='.$userInput['COURSE_STATUS_ID'].
								' AND c_list.USER_ID ='.$userInput['USER_ID'].	
								' AND c_list.COURSE_NUM >'.$course_number.
								' ORDER BY COURSE_NUM LIMIT 1'								
								);
								
		$currentreadycourse  = $query_coursenumber->result_array();
		log_message("info","next course to be update".print_r($currentreadycourse,true));
		log_message("info","user course status to be compared".print_r($userInput['ENROLL_STATUS_ID'],true));
		$readycourseid =0;
		if($currentreadycourse)
		{
		foreach($currentreadycourse as $currentreadycourse)
		{
			if(($currentreadycourse['USER_COURSE_STATUS_ID'] == $userInput['ENROLL_STATUS_ID']) || ($currentreadycourse['USER_COURSE_STATUS_ID'] == $userInput['INPROGRESS_STATUS_ID']))
			{								
				$readycourseid = $currentreadycourse['COURSE_ID'];
			}
		}
		}else
		{
		$readycourseid = NULL;	
		}
		
		
		
		log_message('info' ,'getdiplomateavailablecourse Function end'.print_r($readycourseid, true));

		return $readycourseid;
	}
	
	function compare_status($a, $b)
	{
		return strcmp($b->USER_COURSE_STATUS_VALUE_NAME,$a->USER_COURSE_STATUS_VALUE_NAME);
	}
	
	/**
	* Update  Student Profile,License details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	 
	public function update_student_profile($updatedata) 
	{
		log_message('info' ,'update_student_profile Function Start');
		
		$returnMessage ="";
		$this->db->trans_begin();
		
		if($updatedata["USER_UPDATE"])
		{
			$this->db->update('users',$updatedata["USER_UPDATE"],						$updatedata["USER_UPDATE_ID"]);
		}
		if($updatedata["STDNT_PROFILE_UPDATE"])
		{
			$this->db->update('student_profile',$updatedata["STDNT_PROFILE_UPDATE"],						$updatedata["STDNT_PROFILE_UPDATE_ID"]);
		}
		if($updatedata["ADD_LICENSE"])
		{
			$this->db->insert_batch('users_licenses',$updatedata["ADD_LICENSE"]);
		}
		if($updatedata["EDIT_LICENSE"])
		{
			$this->db->update_batch('users_licenses',$updatedata['EDIT_LICENSE'],'ID');
		}
		if($updatedata["DELETE_LICENSE"])
		{
			log_message('info','Delete Id '.$updatedata['DELETE_LICENSE']['ID']);
			log_message('info','Delete Array '.print_r($updatedata['DELETE_LICENSE'],TRUE));
			$this->db->where_in('ID', $updatedata['DELETE_LICENSE']['ID']);
			$this->db->delete('users_licenses');
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$returnMessage = "Error";
		}
		else
		{
			$this->db->trans_commit();
			$returnMessage ="Success";
		}
		
		log_message('info' ,'update_student_profile Function End');
		return $returnMessage;
	}
	
}
?>
