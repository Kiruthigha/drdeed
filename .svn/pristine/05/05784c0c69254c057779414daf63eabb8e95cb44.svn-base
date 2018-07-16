<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserCourse extends DRD_DAO {

	/**
	 * It references to self object: content master.
	 * It is used as a singleton
	 *
	 * @access private
	 * @since unknown
	 * @var user
	 */
	private static $instance;
	/**
	 * It creates a new content master object class or if it has been created
	 * before, it return the previous object
	 *
	 * @access public
	 * @since unknown
	 * @return content master
	 */
	public static function newInstance()
	{
		if( !self::$instance instanceof self ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Set data related to advertisements table
	 * @access public
	 * @since unknown
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->setTableName('user_course');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'COMPLETE_DATE',
			'COURSE_ID',
			'CREDIT_OPTION_CONFIRMATION',
			'CREDIT_STATE',
			'CREDIT_STATUS',
			'ENROLL_DATE',
			'IP_ADDRESS',
			'PERCENT_COMPLETE',
			'PERCENT_SCORED',
			'PROMO_AMOUNT',
			'PROMO_CODE_ID',
			'QUIZ_ATTEMPT_COUNT',
			'QUIZ_STATUS_ID',
			'RESUME_POSITION',
			'SMS_CONFIRM_CODE',
			'STD_PRICE',
			'TAKE_COUNT',
			'TIME_ON_PAGE',
			'USER_COURSE_STATUS_ID',
			'USER_ID'
		);			
		$this->setFields($array_fields);
	}
	
	
	
	/**
	* get CE details for a user
	 * @access public
	 * @since unknown
	 */
	
	public function getusercedetails($userInput) {
		log_message('info' ,'getusercedetails Function Start');
		$mod_user_details=array();
		$this->db->select('*');
		$this->db->from(user_ce_view);
		if($userInput)
		{
			$this->db->where($userInput);
		}
		$this->db->order_by("UPDATE_DATE DESC");
		$result = $this->db->get();
		$mod_user_details  = $result->result_array();	
			
		log_message('info' ,'getusercedetails Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
	

	/**
	* Update  diplomate details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	 
	public function updatediplomatecourse($updatedata) 
	{
		log_message('info' ,'updatediplomatecourse Function Start');
		
		$returnMessage ="";
		$this->db->trans_begin();
		if($updatedata["SURVEY_DETAILS"])
		{
		$this->db->insert_batch('user_course_survey',$updatedata["SURVEY_DETAILS"]);
		log_message("info","Survey inserted");
		}
		
		if($updatedata["COMPLETED_COURSE_UPDATE"])
		{
		$this->db->update('user_course',$updatedata["COMPLETED_COURSE_UPDATE"],
									$updatedata["COMPLETED_COURSE_ID"]);
		}
		
		
		if($updatedata["CERTIFICATE_ARRAY"])
		{
		$this->db->insert('user_course_certificate',$updatedata["CERTIFICATE_ARRAY"]);
		}
		
		if ($updatedata["INPROGRESS_ID"] && $updatedata["INPROGRESS_WHERE"])
		{
		$this->db->update('user_course',$updatedata["INPROGRESS_ID"],$updatedata["INPROGRESS_WHERE"]);		
		}
		
		if($updatedata["DIP_DETAIL_CERTIFICATE"])
		{
		$this->db->update('user_diplomate_detail',$updatedata["DIP_DETAIL_CERTIFICATE"],		array("USER_ID"=>$updatedata["USER_ID"]));
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
		
		log_message('info' ,'updatediplomatecourse Function End');
		return $returnMessage;
	}
	
	/* public function updatenextcourse($updatedata)
	{
		log_message('info' ,'updatenextcourse Function start');
		$this->db->trans_begin();
		
		if ($updatedata["INPROGRESS_ID"] && $updatedata["INPROGRESS_WHERE"])
		{
		$this->db->update('user_course',$updatedata["INPROGRESS_ID"],$updatedata["INPROGRESS_WHERE"]);		
		}
		
		if($updatedata["DIP_DETAIL_CERTIFICATE"])
		{
		$this->db->update('user_diplomate_detail',$updatedata["DIP_DETAIL_CERTIFICATE"],		array("USER_ID"=>$updatedata["USER_ID"]));
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
		
		return $returnMessage;
		log_message('info' ,'updatenextcourse Function End');

	} */
		
}