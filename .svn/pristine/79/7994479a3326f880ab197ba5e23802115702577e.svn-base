<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseCost extends DRD_DAO {

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
		$this->setTableName('course_cost');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('COURSE_TYPE');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'COST',
			'COURSE_TYPE'
		);			
		$this->setFields($array_fields);
	}
	
}
