<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/core/DRD_DAO.php';

class CourseCurriculumModel extends DRD_DAO  {

	/**
         * It references to self object: user_course_curriculum.
         * It is used as a singleton
         *
         * @access private
         * @since unknown
         * @var User Profile
         */
        private static $instance;
        /**
         * It creates a new User Profile object class or if it has been created
         * before, it return the previous object
         *
         * @access public
         * @since unknown
         * @return User Profile
         */
        public static function newInstance()
        {
            if( !self::$instance instanceof self ) {
                self::$instance = new self;
            }
            return self::$instance;
        }
        /**
         * Set data related to dd_users_profile table
         */
	public function __construct()	
	{		
		parent::__construct();
		$this->load->database();
		$this->setTableName('course_curriculum');
		$this->setPrimaryKey('ID');
		$this->setUniqueKey('SECTION_ID');
		$array_fields = array(
			'ID',
			'COURSE_ID',
			'SECTION_ID',
			'CURRICULUM_TITLE',
			'CURRICULUM_TYPE',
			'CURRICULUM_LINK',
			'PRIORITY_NUMBER',
			'CURRICULUM_DESC',
			'TOTAL_TEST_QUESTIONS',
			'CURRICULUM_PASS_PERCENT',
			'CURRICULUM_STATUS_ID',
			'CREATE_DATE',
			'CREATE_BY',
			'UPDATE_DATE',
			'UPDATE_BY',
		);
		$this->setFields($array_fields);
	}
	/**
         * get User Profile  
         * @access public
         * @since unknown
         * @return array of Course Curriculum
         */
		 
	public function getUserCourseCurrDetails($mod_id) {
		log_message('info','get course curriculum details Start');
		$this->db->select('*');
		$this->db->from($this->getTableName());
		$this->db->where($mod_id);
		$mod_get_course_result = $this->db->get();
		if($mod_get_course_result) {
			log_message('info','get return no of rows = '.$mod_get_course_result->num_rows());
			if($mod_get_course_result->num_rows() > 1) {
				log_message('info','course curriculum details return single value');
				return $mod_get_course_result->result_array();	
				
			} else {
				log_message('info','course curriculum details return Array values');
				return $mod_get_course_result->row_array();	
			}
		} else {
			log_message('info','course curriculum details return empty');
			return array();
		}			
		log_message('info','get course curriculum End');
	}	
	 
	public function getAllCurriculumDetails($currStatusId,$curr_id,$courseId) {
		
		log_message('info','get course curriculum details Start');
		$this->db->select('*');
		$this->db->from($this->getTableName());
		$this->db->where("CURRICULUM_STATUS_ID",$currStatusId);
		$this->db->where("COURSE_ID",$courseId);
		$this->db->order_by('PRIORITY_NUMBER','ASC');
		
		if($mod_get_course_result) {
			log_message('info','Inside If Loop');
			$mod_get_course = $mod_get_course_result->result_array();
			return $mod_get_course;			
			/* 
			
			// first check, if the result array is 1, previous and next should be disabled.
			// second , if the curriculum data to the displayed is the end of the array, that is last, next should be disabled.
			// 3rd , if curriculum data is first, then previous shoud be disabled.. 
			
			// has these 3 conditions handled?
			//Yes mam
			//ok
			
			// and 4th. if curriculm data is last, then Next btn should be disabled..
			//run this now
			//it should be prev -? current? next? give me the id
			// prev - 3 , next - 4, current - 2 
			// one sec
			
			log_message("info","Get Curriculum Details in model ".print_r($mod_get_course,TRUE));
			foreach($mod_get_course as $curr_Value){
				log_message('info','course curriculum details = '.$curr_Value['ID']);
				if($curr_Value['ID'] == $curr_id){
					//$mod_get_course_results['prev'] = $mod_get_course_result->previous_row();		
					$mod_get_course_results['curriculumData'] = $curr_Value;
					//$mod_get_course_results['prev'] = $mod_get_course_result->previous_row();
					$mod_get_course_results['next'] = $mod_get_course_result->next_row();
					
				}				
			} */
			log_message("info","curriculum current, prev and next ".print_r($mod_get_course_results,TRUE));
		} else {
			log_message('info','course curriculum details return empty');
			return array();
		}	 	
		log_message('info','get course curriculum End');
	} 
	
	public function getAllSectionCurriculumDetails($currStatusId,$sessionId) {
		$mod_get_course_returnResult =array();
		log_message('info','get course curriculum details Start');
		$this->db->select('*');
		$this->db->from($this->getTableName());
		$this->db->where("CURRICULUM_STATUS_ID",$currStatusId);
		$this->db->where("SECTION_ID",$sessionId);
		$this->db->order_by('PRIORITY_NUMBER','ASC');
		$mod_get_course_result = $this->db->get();
		if($mod_get_course_result) {
			log_message('info','get return no of rows = '.$mod_get_course_result->num_rows());
			if($mod_get_course_result->num_rows() >= 1) {
				log_message('info','course curriculum details return single value');
				return $mod_get_course_result->result_array();
			} 
		} else {
			log_message('info','course curriculum details return empty');
			return array();
		}			
		log_message('info','get course curriculum End');
	}
	
		 
/* 	public function getAllCurriculumDetails($currStatusId,$curr_id,$courseId) {
		log_message('info','get course curriculum details Start');
		$this->db->select('*');
		$this->db->from($this->getTableName());
		$this->db->where("CURRICULUM_STATUS_ID",$currStatusId);
		$this->db->where("COURSE_ID",$courseId);
		//$this->db->where("SECTION_ID",$sessionId);
		//$this->db->where("ID",$curr_id);
		$this->db->order_by('PRIORITY_NUMBER','ASC');
		$mod_get_course_result = $this->db->get();
		
		
		if($mod_get_course_result) {
			log_message('info','Inside If Loop');			
			foreach($mod_get_course_result->result_array() as $curr_Value){
				if($curr_Value['ID'] == $curr_id){
					$mod_get_course_results['prev'] = $mod_get_course_result->previous_row();		
					$mod_get_course_results['next'] = $mod_get_course_result->next_row();
					$mod_get_course_results['curriculumData'] = $mod_get_course_result->row_array();		
					return $mod_get_course_results;
				}
			//$mod_get_course_returnResult = $mod_get_course_results;
			}
			/*  			
			/* log_message('info','get return no of rows = '.$mod_get_course_result->num_rows());
			if($mod_get_course_result->num_rows() >= 1) {
				log_message('info','course curriculum details return single value');
				foreach($mod_get_course_result->result_array() as $curr_Value){
					if($curr_Value['ID'] == $curr_id){
						$mod_get_course_results['next'] = $mod_get_course_result->next_row(); 
						$mod_get_course_results['prev'] = $mod_get_course_result->previous_row(); 
						$mod_get_course_results['curriculumData'] = $curr_Value; 
						return $mod_get_course_results;
					}
				}
			}   
		} else {
			log_message('info','course curriculum details return empty');
			return array();
		}	 	
		log_message('info','get course curriculum End');
	}  */

}