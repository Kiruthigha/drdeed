<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseQuizQuestion extends DRD_DAO {

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
		$this->setTableName('course_quiz_question');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'ANSWER_OPTION_A',
			'ANSWER_OPTION_B',
			'ANSWER_OPTION_C',
			'ANSWER_OPTION_D',
			'COURSE_ID',
			'QUESTION_TYPE',
			'QUIZ_QUESTION',
			'QUIZ_QUESTION_STATUS_ID'
		);			
		$this->setFields($array_fields);
	}
	
}
