<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseMaster extends DRD_DAO {

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
		$this->setTableName('course');
		$this->setPrimaryKey('ID');
		$array_fields = array(
			'ID',
			'CREATE_BY',
			'CREATE_DATE',
			'UPDATE_BY',
			'UPDATE_DATE',
			'COURSE_CREDIT',
			'COURSE_DESCRIPTION',
			'COURSE_LENGTH',
			'COURSE_NAME',
			'COURSE_NUM',
			'COURSE_STATUS_ID',
			'COURSE_TYPE',
			'COURSE_VIDEO_URL',
			'INSTRUCTOR_NAME',
			'PASS_PERCENT',
			'PUBLISH_DATE'
		);			
		$this->setFields($array_fields);
	}
	/**
	* get Course details for grid in admin module
	 * @access public
	 * @since unknown
	 */
	
	public function getcoursegrid($userInput=null,$orderBy=null) {
		log_message('info' ,'getcoursegrid Function Start');
		$mod_course_details  = array();
		$this->db->select('*');
		$this->db->from(course_master_view);
		if($userInput)
		{
			$this->db->where($userInput);			
		}
		if($orderBy)
		{
			$this->db->order_by($orderBy);
		}
		$result = $this->db->get();		
		$mod_course_details  = $result->result_array();	
			
		log_message('info' ,'getcoursegrid Function End'.print_r($mod_course_details, true));

		return $mod_course_details;
	}
	
	/**
	* insert  Course details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	
	public function insertcourse($courseInput, $couresDocuments,$courseStates,$coursequiz) 
	{
		log_message('info' ,'insertcourse Function Start');
		
		$returnMessage ="";
		$this->db->trans_begin();

		$this->db->insert('course',$courseInput);
		$courseId = $this->db->insert_id();
		log_message('info',"Get courseId  -  ".$courseId);	
		$mod_drd_coures_states = $this->array_push_assoc($courseStates,$courseId);
		$mod_drd_coures_quiz = $this->array_push_assoc($coursequiz,$courseId);
		if($couresDocuments)
		{			
			$mod_drd_coures_documents = $this->array_push_assoc($couresDocuments,$courseId);
			$this->db->insert_batch('course_documents',$mod_drd_coures_documents);
		}
		
		log_message('info',"Coures Documents".print_r($mod_drd_coures_documents,TRUE));
		
		$this->db->insert_batch('course_states',$mod_drd_coures_states);
		$this->db->insert_batch('course_quiz_question',$mod_drd_coures_quiz);

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
		log_message('info' ,'insertcourse Function End');

	}
		
	/**
	* insert  array  associate add other key
	 * @access public
	 * @since unknown
	 */
	
	public function array_push_assoc($array,$courseId)
	{
		log_message('info' ,'array_push_assoc Function Start');
		
		$value=[];
		foreach ($array as $array) 
		{
			$array['COURSE_ID'] = $courseId;
			array_push($value,$array);	
		}
		log_message('info' ,'array_push_assoc Function Start');
		
		return $value;
	} //  End of array_push_assoc
	
	
	/**
	* update  Course details in the corresponding tables
	 * @access public
	 * @since unknown
	 */
	
	public function updatecourse($courseInput,$couresDocuments,$courseStates,$coursequiz,$deleteDoc) 
	{
		log_message('info' ,'updatecourse Function Start');
		
		$returnMessage ="";
		$this->db->trans_begin();
		
		log_message('info',"Coures Input".print_r($courseInput,TRUE));
		$this->db->update('course',$courseInput,array('ID'=>$courseInput['ID']));
		log_message('info',"course_documents Input".print_r($couresDocuments,TRUE));
		if(count($couresDocuments)>=1)
		{		
		$this->db->insert_batch('course_documents',$couresDocuments);	
		} 
		if(count($deleteDoc)>=1)
		{	
			$this->db->where_in('ID', $deleteDoc);
			$this->db->delete('course_documents');		
		} 
		
		log_message('info',"course_quiz_question Input".print_r($coursequiz,TRUE));
		$this->db->update_batch('course_quiz_question',$coursequiz,'ID');
		
		log_message('info',"course_states Input".print_r($courseStates,TRUE));
		$this->db->where('COURSE_ID',$courseStates[0]['COURSE_ID']);
		$this->db->update_batch('course_states',$courseStates,'STATE_ID');
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
		log_message('info' ,'updatecourse Function End');

	}
		
}
