<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CountryMaster extends DRD_DAO {

	/**
	 * It references to self object: User subscription .
	 * It is used as a singleton
	 *
	 * @access private
	 * @since unknown
	 * @var user
	 */
	private static $instance;
	/**
	 * It creates a new User - subscription object class or if it has been created
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
	 * Set data related to dd_user_subscription table
	 * @access public
	 * @since unknown
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->setTableName('country_master');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'COUNTRY_NAME',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE'
		);			
		$this->setFields($array_fields);
	}
	
}
