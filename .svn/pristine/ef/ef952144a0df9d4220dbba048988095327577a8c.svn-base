<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserCourseSurvey extends DRD_DAO {

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
		$this->setTableName('user_course_survey');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'SURVEY_ID',
			'SURVEY_QUESTION',
			'OPTION_1',
			'OPTION_2',
			'OPTION_3',
			'OPTION_4',
			'OPTION_5',
			'USER_COURSE_ID'			
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* insert  User Survey details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	
	public function update_user_survey($userInput) 
	{
		log_message('info' ,'update_user_survey Function Start');
		
		$returnMessage =0;
		$this->db->trans_begin();
		$this->db->insert_batch('user_course_survey',$userInput['SURVEY']);	
		$this->db->update('user_course',$userInput['UPDATE_USER_COURSE'],$userInput['UPDATE_USER_COURSE_ID']);
		$this->db->insert('user_course_certificate',$userInput['COURSE_CERTIFICATE']);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$returnMessage = 0;
		}
		else
		{
			$this->db->trans_commit();
			$returnMessage =1;
		}
		log_message('info' ,'update_user_survey Function End');
		return $returnMessage;

	}
	
}
