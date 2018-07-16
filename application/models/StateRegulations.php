<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class StateRegulations extends DRD_DAO {

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
		$this->setTableName('state_regulations');
		$this->setUniqueKey('STATE_ID');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('STATE_ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'STATE_GUIDELINES',
			'STATE_ID',
			'STATE_REF_URL'
		);			
		$this->setFields($array_fields);
	}
	
	/**
 * get state regulation  details
   @access public
   @since unknown
  */
 
 public function getstateregulations($userInput=null) {
  log_message('info' ,'getstateregulations Function Start');
  $mod_user_details  = array();
  $this->db->select('*');
  $this->db->from(state_regulations_view);
  if($userInput)
  {
   $this->db->where($userInput);
  }
  $result = $this->db->get();  
  
  $mod_user_details  = $result->result_array();  
   
  //log_message('info' ,'getstateregulations Function End'.print_r($mod_user_details, true));

  return $mod_user_details;
 }
	
}
