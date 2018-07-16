<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class UserDiplomateDetail extends DRD_DAO {

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
		$this->setTableName('user_diplomate_detail');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'USER_ID',
			'PURCHASE_DATE',
			'STD_PRICE',
			'PROMO_CODE_ID',
			'PROMO_AMOUNT',				
			'SMS_CONFIRM_CODE',			
			'CREDIT_OPTION_CONFIRMATION',			
			'USER_COURSE_STATUS_ID'	,		
			'COMPLETE_DATE',		
			'COURSE_CERTIFICATE_PATH',			
			'DOWNLOAD_COUNT'	,		
			'CERTIFICATE_ARCHIVE',			
			'ARCHIVE_DATE'	,		
		);			
		$this->setFields($array_fields);
	}
	
}
