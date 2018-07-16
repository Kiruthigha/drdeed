<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_essay_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_essay_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_essay_controller/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_essay_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_essay_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_drd_user_id = null; // To Assign Public variable (Session)
	public $session_drd_email_id = null; // To Assign Public variable (Session)
	public $ctrl_drd_current_date = null; // To Assign Public variable (Session)
	
	public function __construct() {
		parent::__construct();
		$this->session_drd_user_id = $this->session->userdata('drd_userId');
		$this->session_drd_email_id = $this->session->userdata('drd_userEmail');
		$this->ctrl_drd_current_date = date("Y-m-d H:i:s");
	}//End of Construct Function	

	/**
	 * this Function is used to display students essay answers page
	 *
	 * @access public
	 * @since unknown
	 */
	public function diplomate_essays() {
		log_message('info' ,"diplomate_essays Function Start ");
		
		$ctrl_drd_data = array();
		$ctrl_drd_data['total_to_grade']= $this->UserDiplomateEssay->getessaycount(array("USER_ESSAY_STATUS_ID" =>$this->KeyValue->getKeyvalueId("ESSAY","STATUS","VIEW")));
											
		$useressays = $this->UserDiplomateEssay->getessaygrid();	
		$essayarrays=array();
		foreach($useressays as $useressays)
		{
			$temp = $useressays;
			$temp['NO_OF_ESSAYS']= $this->UserDiplomateEssay->getessaycount(array("USER_ID" => $temp['USER_ID']));	
			$essayarrays[]=$temp;
		}
		$ctrl_drd_data['user_essays'] = $essayarrays;
		log_message('info' ,"ctrl_drd_data= ".print_r($ctrl_drd_data, TRUE));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-diplomatessays',$ctrl_drd_data);
		$this->load->view('admin/footer');		
		log_message('info' ,"diplomate_essays Function End ");
	}//End of diplomate_essays Function	
	
	/**
	 * this Function is used to display students essay grade page
	 *
	 * @access public
	 * @since unknown
	 */
	public function student_grades($userid) {
		log_message('info' ,"student_grades Function Start ");
		
		$ctrl_drd_data = array();
		$ctrl_drd_data['total_to_grade']= $this->UserDiplomateEssay->getessaycount(array("USER_ESSAY_STATUS_ID" => $this->KeyValue->getKeyvalueId("ESSAY","STATUS","VIEW"),"USER_ID"=>$userid));
											
		$ctrl_drd_data['user_essays']=$this->UserDiplomateEssay->getessaygrid(array("USER_ID"=>$userid));	
		log_message('info' ,"user_essays= ".print_r($ctrl_drd_data['user_essays'], TRUE));
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-studentsgrades',$ctrl_drd_data);
		$this->load->view('admin/footer');
		log_message('info' ,"student_grades Function Start ");
	}//End of student_grades Function	
	
	/**
	 * this Function is used to display students essay answers page
	 *
	 * @access public
	 * @since unknown
	 */
	public function student_essay_grade($essayid) {
		log_message('info' ,"student_essay_grade Function Start ");
		$ctrl_drd_data = array();
		$ctrl_drd_data['essay_details']= $this->UserDiplomateEssay->getessaydetails(array("ESSAY_ID" => $essayid));
											
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-essaygrade',$ctrl_drd_data);
		$this->load->view('admin/footer');		
		log_message('info' ,"student_essay_grade Function Start ");
	}//End of student_essay_grade Function	
	
	/**
	 * this Function is used to display students essay answers page
	 *
	 * @access public
	 * @since unknown
	 */
	public function updategrade() {
		log_message('info' ,"updategrade Function Start ");
		$this->form_validation->set_rules('txtEditgradeNam', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));		

		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'form Grade validation fails');
		    $ctrl_drd_GradeData = array(
                'message' => "",
                'Grade' => form_error('txtEditgradeNam')
            );

			echo json_encode($ctrl_drd_GradeData); /* Form Validation End */
			return;
		} //End of if	
		else if($this->input->post('txtEditgradeNam') > 100)
		{

			log_message('info' ,"Url ");
			$ctrl_drd_UrlData = array(
				'message'=>'',
                'Grade' => $this->lang->line('m_90829'),
            );
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_UrlData);  //return message form UI
			return;
		} //End of else	if
		else 
		{		
			$ctrl_drd_data = array();
			
			$grade =$this->input->post('txtEditgradeNam');
			$essayid =$this->input->post('txtessayname');
			log_message("info",print_r($_POST,true));
			$ctrl_drd_upt_essay_status = $this->UserDiplomateEssay->update(array('UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				"ESSAY_SCORE" =>$grade,
				"USER_ESSAY_STATUS_ID" => $this->KeyValue->getKeyvalueId("ESSAY","STATUS","GRADED")),array("ID"=>$essayid));
			if($ctrl_drd_upt_essay_status) {
				log_message('info' ,'essay grade Updated Successfully'); 				
				$ctrl_drd_successful_update= array(
					'message' => $this->lang->line('m_90004'));					   
				echo json_encode($ctrl_drd_successful_update);
				return;
			} else {
				log_message('info' ,'Aupdate failede'); 				
				$ctrl_drd_update_fail= array(
					'message' => $this->lang->line('m_90008'));					   
				echo json_encode($ctrl_drd_update_fail);
				return;
			}	
		}//End of else	
		log_message('info' ,'updategrade Function End');
	}//End of updategrade Function	
		
	/**
	 * Download the Essay to Read 
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function genPdf()
	{

		log_message('info', 'genPdf function starts');	
		
		$ctrl_drd_essay_data = array(
			"first_name" => $this->input->post('txtUserFNam'),
			"last_name" => $this->input->post('txtUserLNam'),
			"course_name" => $this->input->post('txtCourseNam'),
			"essay_answer" => $this->input->post('txtEssayNam'),		
		);
		log_message('info', 'ctrl_drd_essay_data= '.print_r($ctrl_drd_essay_data,TRUE));		
		
		ini_set('memory_limit', '256M');
		// load library
		$this->load->library('Drdeed_pdf');
		$pdf = $this->drdeed_pdf->load();   
		
		// boost the memory limit if it's low ;)
		$html = $this->load->view('essay', $ctrl_drd_essay_data, true);
		
		// write the HTML into the PDF
		$pdf->WriteHTML($html);          
	   
		$output = 'Drd_Essay' . date('Y_m_d_H_i_s') . '_.pdf';
		$pdf->Output("$output", 'D');
	
		log_message('info', 'genPdf function ends');		
	}// End of genPdf Function
	
}//End of Class
?>