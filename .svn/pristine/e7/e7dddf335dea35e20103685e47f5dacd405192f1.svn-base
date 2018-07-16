<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseStates extends DRD_DAO {

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
		$this->setTableName('course_states');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'STATE_COURSE_CODE',
			'STATE_ID',
			'COURSE_ID'
		);			
		$this->setFields($array_fields);
	}
	/**
	* get Course states for Edit Course in admin module
	 * @access public
	 * @since unknown
	 */
	
	public function getcoursestates($userInput) {
		log_message('info' ,'getcoursestates Function Start');
		$mod_course_states  = array();
		$this->db->select('*');
		$this->db->from(course_states_view);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		if($orderBy)
		{
			$this->db->order_by($orderBy);
		}
		$result = $this->db->get();		
		$mod_course_states  = $result->result_array();	
			
		log_message('info' ,'getcoursestates Function End'.print_r($mod_course_states, true));

		return $mod_course_states;
	}
}
