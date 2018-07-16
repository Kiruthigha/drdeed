<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserCourseCertificate extends DRD_DAO {

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
		$this->setTableName('user_course_certificate');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'ARCHIVE_DATE',
			'CERTFICATE_ARCHIVE',
			'COURSE_CERTIFICATE_PATH',
			'COURSE_ID',
			'DOWNLOAD_COUNT',
			'USER_COURSE_ID',
			'USER_ID'
		);			
		$this->setFields($array_fields);
	}
	
	
	/**
	* get All certificate  list from user_course_ceritificate_view
	 * @access public
	 * @since unknown
	 */
	
	public function getallcertificates($userInput=null)
	{
		log_message('info' ,'getallcertificates Function Start');
		$mod_certificate_details  = array();
	
		$this->db->select('*');
		$this->db->from(user_course_certificate_view);
		if($userInput)
		{
			$this->db->where($userInput);
		}
		$this->db->order_by('CERTIFICATE_ID DESC');
		
		$result = $this->db->get();
		
		$mod_certificate_details  = $result->result_array();  
		
		log_message('info' ,'getallcertificates Function End'.print_r($mod_certificate_details, true));
	
		return $mod_certificate_details;
	}
	
}
