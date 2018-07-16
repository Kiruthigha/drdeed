<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class KeyValue extends DRD_DAO {

	/**
	 * It references to self object: Keyvalue .
	 * It is used as a singleton
	 *
	 * @access private
	 * @since unknown
	 * @var user
	 */
	private static $instance;
	/**
	 * It creates a new User object class or if it has been created
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
	 * Set data related to ad_user table
	 * @access public
	 * @since unknown
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->setTableName('key_value');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('EMAIL_ID');
		$array_fields = array(
			'ID',
			'GROUP_NAME',
			'KEY_NAME',
			'VALUE_ID',
			'VALUE_NAME',
			'STATUS',
			'EDITABLE',			
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE'
		);			
		$this->setFields($array_fields);
	}
	
	/**
	 * Return ID from passing parameters select condition
	 * @access public 
	 */
	
	public function getKeyvalueId($groupName,$keyName,$valueName){
		
		log_message('info','getKeyvalueId Functions Start');
		$this->db->select($this->fields);
		$this->db->from($this->getTableName());
		if($groupName)
		{
			$this->db->where('GROUP_NAME',$groupName);
		}
		if($keyName)
		{
		$this->db->where('KEY_NAME',$keyName);
		}
		if($valueName)
		{
		$this->db->where('VALUE_NAME',$valueName);
		}
		$this->db->where('STATUS','ACTIVE');
		$result = $this->db->get();
		if($result){			
		
			$mod_dl_return_Value = $result->row_array();
			log_message('info','getKeyvalueId Inside If Statement'.print_r($mod_dl_return_Value,true));
			return $mod_dl_return_Value['ID'];			
		} else {
			log_message('info','getKeyvalueId Inside else Statement, Return empty array');
			return array();
		}
	 }


}
