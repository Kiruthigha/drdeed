<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class Advertisements extends DRD_DAO {

	/**
	 * It references to self object: advertisements.
	 * It is used as a singleton
	 *
	 * @access private
	 * @since unknown
	 * @var user
	 */
	private static $instance;
	/**
	 * It creates a new advertisements object class or if it has been created
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
	 * Set data related to advertisements table
	 * @access public
	 * @since unknown
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->setTableName('ads');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'ACTIVE_STATUS',
			'ADD_PICTURE_PATH',
			'ADVERTISER',
			'AD_IMP_COUNT',
			'AD_CLICK_COUNT',
			'AD_DURATION',
			'AD_START_DATE',
			'BANNER_URL'			
		);			
		$this->setFields($array_fields);
	}
	
}
