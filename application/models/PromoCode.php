<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class PromoCode extends DRD_DAO {

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
		$this->setTableName('promo_code');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'CODE_APPLIES',
			'END_DATE',
			'PERCENT_DISCOUNT',
			'PROMO_CODE',
			'PROMO_CODE_NAME',
			'PROMO_CODE_STATUS',
			'START_DATE'
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* get promo details for grid in admin module
	 * @access public
	 * @since unknown
	 */	
	public function getpromocodegrid($userInput) 
	{
		log_message('info' ,'getpromocodegrid Function Start');
		$mod_user_details=array();
		$this->db->select($this->fields);
		$this->db->from($this->getTableName());
		if($userInput)
		{
			$this->db->where('PROMO_CODE_STATUS !=', $userInput['PROMO_CODE_STATUS']);
			$this->db->order_by($userInput['ORDER_BY']);
		}
		$result = $this->db->get();
		$mod_user_details  = $result->result_array();	
			
		log_message('info' ,'getpromocodegrid Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
	}
}//End of Class
