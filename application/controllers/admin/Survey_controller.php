<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/survey
	 *	- or -
	 * 		http://example.com/index.php/survey/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/survey
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/survey/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() {
		parent::__construct();
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 
	}		
	public function survey() 
	{
		log_message('info',"survey function Start here");
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');		
		$crtl_drd_data['survey']=$this->CourseSurvey->getsurveygrid(null,'UPDATE_DATE DESC');
		$this->load->view('admin/admin-survey',$crtl_drd_data);
		$this->load->view('admin/footer');		
		log_message('info',"survey function End here");
	}
	
	/**
	 * This Function Used To View Edit survey Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_survey($survey_id) 
	{			
		log_message('info',"edit_survey function Start here");
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		$crtl_drd_course_survey=$this->CourseSurvey->getsurveygrid(array('SURVEY_ID'=>$survey_id));
		if(count($crtl_drd_course_survey) >=1 )
		{
			$crtl_drd_data['survey'] = $crtl_drd_course_survey[0];
		}

		$this->load->view('admin/admin-editsurvey',$crtl_drd_data);
		$this->load->view('admin/footer');			
		log_message('info',"edit_survey function End here");	
	}
	
	
		
	/**
	 * This Function Used To Update Survey Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function edit_survey_details() {	
		log_message('info',"edit_survey_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_editcqstn = $this->input->post('txtEditQstnNam');
		$ctrl_drd_survey_id = $this->input->post('selEditSurveyIdNam');
		
		// Set validation Rules for form
		
        $this->form_validation->set_rules('txtEditQstnNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));	

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_editSurveyDataValidation = array(		      
			    'message'=>'',
                'EditQstn' => form_error('txtEditQstnNam'),    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_editSurveyDataValidation);

		} // End of If Condition
		else
		{
			log_message('info' ,'form validation fails');		  
		   $ctrl_drd_survey_updatedata  = array(
				"UPDATE_BY"  => $this->session_Useremail,
				"UPDATE_DATE" =>$this->current_date,
				"SURVEY_QUESTION" => $ctrl_drd_editcqstn,
			);
			$ctrl_drd_update_survey  =  $this->CourseSurvey->update($ctrl_drd_survey_updatedata,array('ID'=>$ctrl_drd_survey_id));
			if($ctrl_drd_update_survey)
			{
				log_message('info','Survey Table Update Success');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
			else
			{
				log_message('info','Survey Table Update Fail');			
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
				);		
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		
		//echo json_encode("RUN");
		log_message('info',"edit_survey_details function end here");
		return;
		
	} //End of Edit Survey Details function	

}
?>