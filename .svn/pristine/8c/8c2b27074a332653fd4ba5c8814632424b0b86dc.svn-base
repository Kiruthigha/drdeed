<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserCourseQuiz extends DRD_DAO {

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
		$this->setTableName('user_course_quiz');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'QUIZ_QUESTION',
			'QUIZ_QUESTION_ID',
			'QUIZ_QUESTION_STATUS_ID',
			'USER_ANSWER',
			//'DOWNLOAD_COUNT',
			'USER_COURSE_ID',
			'VALID_ANSWER'
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* insert  User Quiz Answer details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	
	public function update_user_quiz($userInput) 
	{
		log_message('info' ,'update_user_quiz Function Start');
		
		$returnMessage =0;
		$this->db->trans_begin();
		if($userInput['QUIZ_QUERY'] == 'UPDATE')
		{
			$this->db->update_batch('user_course_quiz',$userInput['QUIZ'],'ID');
		}
		else
		{
			$this->db->insert_batch('user_course_quiz',$userInput['QUIZ']);			
		}
		$this->db->update('user_course',$userInput['UPDATE_USER_COURSE'],$userInput['UPDATE_USER_COURSE_ID']);
		
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
		log_message('info' ,'update_user_quiz Function End');
		return $returnMessage;

	}
	
	
}
