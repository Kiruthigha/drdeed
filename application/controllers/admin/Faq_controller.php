<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/faq
	 *	- or -
	 * 		http://example.com/index.php/faq/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/faq
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/faq/<method_name>
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
	}		
	public function faq() {
		$faqlist =$this->DiplomateFAQ->listAll('PRIORITY_NUMBER ASC');
		$ctrl_drd_data = array();
		$faqarray= array();
		$activecount = 0;
		$inactivecount= 0;
		foreach($faqlist as $faqlist)
		{
			$temp = $faqlist;
			$temp['FAQ_STATUS_NAME']=$this->KeyValue->findByPrimaryKey($temp['FAQ_STATUS'])['VALUE_NAME'];
			if($temp['FAQ_STATUS_NAME'] =="ACTIVE")
			{
				$activecount = $activecount+1;
				$faqarray[]=$temp;	
			}
			else if ($temp['FAQ_STATUS_NAME'] =="INACTIVE"){
				$inactivecount = $inactivecount+1;
				$faqarray[]=$temp;
			}
						
		}
		$ctrl_drd_data['active_number']=$activecount;
		$ctrl_drd_data['inactive_number']=$inactivecount;
		$ctrl_drd_data['faq']=$faqarray;
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-faq',$ctrl_drd_data);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * This Function Used To View Add Faq Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_faq() {
		$ctrl_drd_faq=array();
		$ctrl_drd_faq['active'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		$ctrl_drd_faq['inactive'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','INACTIVE');	
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-addfaq',$ctrl_drd_faq);
		$this->load->view('admin/footer');		
	}
	
	/**
	 * This Function Used To View Edit Faq Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_faq($faqid) {
		$ctrl_drd_faq['faq'] =$this->DiplomateFAQ->findByPrimaryKey($faqid);
		$ctrl_drd_faq['active'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		$ctrl_drd_faq['inactive'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','INACTIVE');	
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editfaq',$ctrl_drd_faq);
		$this->load->view('admin/footer');		
	}
	
		
	/**
	 * This Function Used To Insert Faq Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function add_faq_details() {	
		log_message('info',"add_faq_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_addfaqqstn = $this->input->post('txtAddQstnNam');
		$ctrl_drd_addfaqans = $this->input->post('txtAddAnsNam');
		$ctrl_drd_addfaqprty = $this->input->post('txtAddPrtyNam');
		$ctrl_drd_addfaqstatus = $this->input->post('selAddStatusNam');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtAddQstnNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('txtAddAnsNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));		
		
        $this->form_validation->set_rules('txtAddPrtyNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('selAddStatusNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));		

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_addFaqDataValidation = array(		      
			    'message'=>'',
                'AddQstn' => form_error('txtAddQstnNam'),
                'AddAns' => form_error('txtAddAnsNam'),  
                'AddPrty' => form_error('txtAddPrtyNam'),
                'AddStatus' => form_error('selAddStatusNam'),    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_addFaqDataValidation);
			return;
		} // End of If Condition
		else
		{
			// Get the Data From Ajax
			$ctrl_drd_question_name = $this->input->post('txtAddQstnNam');
			$ctrl_drd_answer = $this->input->post('txtAddAnsNam');		
			$ctrl_drd_priority = $this->input->post('txtAddPrtyNam');		
			$ctrl_drd_status = $this->input->post('selAddStatusNam');		

            // Assign the value to Column on ContentMaster
			$ctrl_drd_content_data = array(	            
				'CREATE_BY' =>$this->session_drd_email_id,
				'CREATE_DATE' =>$this->ctrl_drd_current_date,
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'QUESTION' => $ctrl_drd_question_name,
				'ANSWER'=> $ctrl_drd_answer,			 			 
				'PRIORITY_NUMBER'=> $ctrl_drd_priority,			 			 
				'FAQ_STATUS'=> $ctrl_drd_status	,		 			 
			);
			  
		    //Pass the Value to ContentMaster Model for Insert Content  			
	        $ctrl_drd_content_insert = $this->DiplomateFAQ->insert($ctrl_drd_content_data);

		    if($ctrl_drd_content_insert)
			{
				log_message('info' ,'Content Insert Successfully'); 
			    $ctrl_drd_successful_ins = array(
                   'message' => $this->lang->line('m_90003'));					   
	            echo json_encode($ctrl_drd_successful_ins);	
				return;
			} 
			else 
			{
				log_message('info' ,'Content Insert failure'); 				
				$ctrl_drd_insert_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_insert_fail);
				return;
			}
		}//End of Else
		
		
		
		log_message('info',"add_faq_details function end here");
		return;
		
	} //End of Add Faq Details function	
	
		
	/**
	 * This Function Used To Update Faq Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function edit_faq_details() {	
		log_message('info',"edit_faq_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_editfaqqstn = $this->input->post('txtEditQstnNam');
		$ctrl_drd_editfaqans = $this->input->post('txtEditAnsNam');
		$ctrl_drd_editfaqprty = $this->input->post('txtEditPrtyNam');
		$ctrl_drd_editfaqstatus = $this->input->post('selEditStatusNam');
		$ctrl_drd_faqid = $this->input->post('txtfaqname');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtEditQstnNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('txtEditAnsNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));		
		
        $this->form_validation->set_rules('txtEditPrtyNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('selEditStatusNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));		

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() == FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_editFaqDataValidation = array(		      
			    'message'=>'',
                'EditQstn' => form_error('txtEditQstnNam'),
                'EditAns' => form_error('txtEditAnsNam'),  
                'EditPrty' => form_error('txtEditPrtyNam'),
                'EditStatus' => form_error('selEditStatusNam'),    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_editFaqDataValidation);

		} // End of If Condition
		else
		{
			log_message('info' ,'form validation fails');	
			$updateArray = array(
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				"QUESTION"=>$ctrl_drd_editfaqqstn,
				"ANSWER"=>$ctrl_drd_editfaqans,
				"PRIORITY_NUMBER"=>$ctrl_drd_editfaqprty,
				"FAQ_STATUS"=>$ctrl_drd_editfaqstatus);
		   $ctrl_update  = $this->DiplomateFAQ->update($updateArray, array("ID"=>$ctrl_drd_faqid));
			// Return the JSON value to ajax
	       if($ctrl_update) {
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
		}//End of else	
		}
		
		//echo json_encode("RUN");
		log_message('info',"edit_faq_details function end here");
		return;
		
	} //End of Edit Faq Details function	
	


/**
	 * This Function Used To delete Faq Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function delete_faq_details() {	
		log_message('info',"delete_faq_details function Start here");
		
	
		$ctrl_drd_editfaqstatus = $this->input->post('ajx_drd_status');
		$ctrl_drd_statusid = $this->KeyValue->getKeyvalueId("FAQ","STATUS",$ctrl_drd_statusid);
		$ctrl_drd_faqid = $this->input->post('ajx_drd_faq_id'); 
		  
		
			$updateArray = array("FAQ_STATUS"=>$ctrl_drd_statusid);
		   $ctrl_update  = $this->DiplomateFAQ->deleteByPrimaryKey(array("ID"=>$ctrl_drd_faqid));
			// Return the JSON value to ajax
	       if($ctrl_update) {
			log_message('info' ,'essay grade Updated Successfully'); 				
			$ctrl_drd_successful_update= array(
				'message' => $this->lang->line('m_90007'));					   
			echo json_encode($ctrl_drd_successful_update);
			return;
		} else {
			log_message('info' ,'Aupdate failede'); 				
			$ctrl_drd_update_fail= array(
				'message' => $this->lang->line('m_90008'));					   
			echo json_encode($ctrl_drd_update_fail);
			return;
		}//End of else		
		
		log_message('info',"delete_faq_details function end here");
		return;
		
	} //End of Edit Faq Details function	
	
}
?>