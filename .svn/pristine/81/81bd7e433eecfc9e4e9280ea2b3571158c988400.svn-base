<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseSurvey extends DRD_DAO {

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
		$this->setTableName('course_survey');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'DD_COURSE_STATE_ID',
			//'STATE_ID',
			'SURVEY_QUESTION',
			'SURVEY_QUESTION_STATUS_ID',
			'COURSE_ID'
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* get survey details for grid in admin module
	 * @access public
	 * @since unknown
	 */
	
	public function getsurveygrid($userInput=null,$orderBy=null) {
		log_message('info' ,'getsurveygrid Function Start');
		$mod_survey_details  = array();
		$this->db->select('*');
		$this->db->from(course_survey_view);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		if($orderBy)
		{
			$this->db->order_by($orderBy);
		}
		$result = $this->db->get();		
		$mod_survey_details  = $result->result_array();	
			
		log_message('info' ,'getsurveygrid Function End'.print_r($mod_survey_details, true));

		return $mod_survey_details;
	}
	
}
