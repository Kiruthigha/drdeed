<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class User extends DRD_DAO {

	/**
	 * It references to self object: User .
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
		$this->setTableName('users');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('EMAIL_ID');
		$array_fields = array(
			'ID',
			'EMAIL_ID',
			'FIRST_NAME',
			'LAST_NAME',
			'PASSWORD',
			'ORGANIZATION',
			'USER_EXPIRES',
			'USER_TYPE',
			'USER_STATUS_ID',
			'TOTAL_LOGIN_COUNT',
			'LAST_LOGIN_IP',
			'LAST_FAILED_LOGIN_DATE',
			'LAST_SUCCESS_LOGIN_DATE',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE'
		);			
		$this->setFields($array_fields);
	}
	
	/**
	* get user details for the email
	 * @access public
	 * @since unknown
	 */
	
	public function getuserdetails($userInput=null,$orderBy=null) {
		log_message('info' ,'getUserDetails Function Start');
		
		$this->db->select('*');
		$this->db->from(view_user_details);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		if($orderBy)
		{
			$this->db->order_by($orderBy);
		}
		$result = $this->db->get();
		log_message('info' ,'count User'.$result->num_rows());
		if($result->num_rows()== 1)
		{
			log_message('info' ,'inside if');
			$mod_user_details  = $result->row_array();
			$mod_user_details = array($mod_user_details);
			}
			else if ($result->num_rows() > 1)
			{
				log_message('info' ,'inside elseif');
				$mod_user_details  = $result->result_array();
			}
			else{
				log_message('info' ,'inside else');
				$mod_user_details  = array();

			}
			
		log_message('info' ,'getUserDetails Function End'.print_r($mod_user_details, true));

		return $mod_user_details;
			

	}
	
	/**
	* insert  user details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	
	public function insertuser($userInput, $studentProfile,$studentLicense,$studentSubscription) 
	{
		log_message('info' ,'insertuser Function Start');
		
		$returnMessage ="";
		$this->db->trans_begin();

		$this->db->insert('users',$userInput);
		$userId = $this->db->insert_id();
		log_message('info',"Get  User  Id  -  ".$userId);
		
		$studentProfile = array_merge($studentProfile, array("USER_ID" => $userId));
		$studentLicense = $this->array_push_assoc($studentLicense,$userId);
		$studentSubscription = $this->array_push_assoc($studentSubscription,$userId);
		log_message('info',"License data in model ".print_r($studentLicense,TRUE));
		$this->db->insert('student_profile',$studentProfile);
		$this->db->insert_batch('users_licenses',$studentLicense);
		$this->db->insert_batch('user_subscription',$studentSubscription);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$returnMessage = "Error";
		}
		else
		{
			$this->db->trans_commit();
			$returnMessage ="Success";
		}
		return $returnMessage;
		log_message('info' ,'insertuser Function End');

	}
		
	/**
	* insert  array  associate add other key
	 * @access public
	 * @since unknown
	 */
	
	public function array_push_assoc($array,$userId)
	{
		log_message('info' ,'array_push_assoc Function Start');
		
		$value=[];
		foreach ($array as $array) 
		{
			$array['USER_ID'] = $userId;
			array_push($value,$array);	
		}
		log_message('info' ,'array_push_assoc Function Start');
		
		return $value;
	} //  End of array_push_assoc
}
