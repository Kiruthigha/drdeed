<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserDiplomateEssay extends DRD_DAO {

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
		$this->setTableName('user_diplomate_essay');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'COURSE_ID',
			'ESSAY_SCORE',
			'QUIZ_QUESTION_ID',
			'USER_ANSWER',
			'USER_COURSE_ID',				
			'USER_ESSAY_STATUS_ID',			
			'USER_ID'			
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* get total number of essays for grid in admin module
	 * @access public
	 * @since unknown
	 */
	
	public function getessaycount($userInput) {
		log_message('info' ,'getessaycount Function Start');
		
		$this->db->select($this->fields);
		$this->db->from($this->getTableName());
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		$resultcount = $this->db->count_all_results();
			
		log_message('info' ,'getessaycount Function End'.print_r($resultcount, true));

		return $resultcount;
	}
	
	/**
	* get essays for grid in admin module
	 * @access public
	 * @since unknown
	 */
	
	public function getessaygrid($userInput=null) {
		log_message('info' ,'getessaygrid Function Start');
		$mod_user_details = array();
		 $this->db->select('*');
		$this->db->from(user_diplomate_essay_view);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		$this->db->order_by('UPDATE_DATE DESC');
		if($userInput == null)
		{
		$this->db->group_by('USER_ID');
		}
		$result = $this->db->get();
		$mod_user_details  = $result->result_array();	
			
		log_message('info' ,'getessaygrid Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
	
	/**
	 * get essay details for grading
	 * @access public
	 * @since unknown
	 */	
	public function getessaydetails($userInput=null) {
		log_message('info' ,'getessaydetails Function Start');
		$mod_user_details = array();
		 $this->db->select('*');
		$this->db->from(user_diplomate_essay_view);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		$this->db->order_by('UPDATE_DATE DESC');
		if($userInput == null)
		{
		$this->db->group_by('USER_ID');
		}
		$result = $this->db->get();
		$mod_user_details  = $result->row_array();	
		
		log_message('info' ,'getessaydetails Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
	
	
}
