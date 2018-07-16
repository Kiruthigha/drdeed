<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_master_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/contentmaster
	 *	- or -
	 * 		http://example.com/index.php/contentmaster/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/contentmaster
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/contentmaster/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_drd_user_id = null; // To Assign Public variable (Session)
	public $session_drd_email_id = null; // To Assign Public variable (Session)
	 
	public function __construct() 
	{
		parent::__construct();
		$this->session_drd_user_id = $this->session->userdata('drd_userId');
		$this->session_drd_email_id = $this->session->userdata('drd_userEmail');
		$this->ctrl_drd_current_date = date("Y-m-d H:i:s");
	}	
	
	/**
	 * This Function Used To Contentmaster Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function contentmaster() 
	{
		log_message('info' ,'contentmaster Function Start');
		//Get Content List From dd_content_master
		$ctrl_drd_get_contentMaster['contentMaster'] = $this->ContentMaster->listAll('UPDATE_DATE DESC');
		log_message('info',"ctrl_drd_get_contentMaster= ".print_r($ctrl_drd_get_contentMaster,true));	
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-contentmaster',$ctrl_drd_get_contentMaster);
		$this->load->view('admin/footer');	
		log_message('info' ,'contentmaster Function End');
	}//End of contentmaster function
	
	/**
	 * This Function Used To View Edit Content Master Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_contentmaster($ctrl_drd_id) 
	{
		log_message('info',"add_contentmaster function Start here");		
		log_message('info',"ctrl_drd_id = ".$ctrl_drd_id);	
		
		//Get ctrl_drd_get_function_name List From dd_content_master
		$ctrl_drd_get_content_master_data['function_name'] = $this->KeyValue->listWhere(array('GROUP_NAME'=>'PAGE','KEY_NAME'=>'CONTENT'));
		log_message('info',"ctrl_drd_get_function_name= ".print_r($ctrl_drd_get_function_name,true));	

		//Get ctrl_drd_get_content_master_data for Selected Id
		$ctrl_drd_get_content_master_data['content_master_data'] = $this->ContentMaster->findByPrimarykey($ctrl_drd_id);
		log_message('info',"ctrl_drd_get_content_master_data= ".print_r($ctrl_drd_get_content_master_data,true));	
		
		log_message('info',"edit_contentmaster function Start here");	
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editcontentmaster',$ctrl_drd_get_content_master_data);
		$this->load->view('admin/footer');	
		log_message('info',"edit_contentmaster function End here");	
	}//End of edit_contentmaster function
		
	/**
	 * This Function Used To Update Content Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function edit_content_details() 
	{	
		log_message('info',"edit_content_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_editcontentfunctionname = $this->input->post('ajx_edit_function_name');
		$ctrl_drd_editcontent = $this->input->post('ajx_edit_content');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('ajx_edit_function_name', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('ajx_edit_content', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));		

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{			
			log_message('info' ,'form validation fails');		  
			$ctrl_drd_editContentDataValidation = array(		      
			    'message'=>'',
                'AddFunctionName' => form_error('ajx_edit_function_name'),
                'AddContent' => form_error('ajx_edit_content'),    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_editContentDataValidation);
			return;
		} // End of If Condition
		else
		{
			log_message('info' ,'Edit content master form validation Pass');		  
		   // Get the Data From Ajax
			$ctrl_drd_edit_content_id = $this->input->post('ajx_edit_id');
			log_message('info' ,'ctrl_drd_edit_content_id = '.$ctrl_drd_edit_content_id);
			$ctrl_drd_edit_function_name = $this->input->post('ajx_edit_function_name');
			$ctrl_drd_edit_content = $this->input->post('ajx_edit_content');		

            // Assign the value to Column on Content Master
			$ctrl_drd_upt_content_data = array(	 
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'FUNCTION_NAME' => $ctrl_drd_edit_function_name,
				'CONTENT'=> $ctrl_drd_edit_content			 			 
			);
			  
		    //Pass the Value to ContentMaster Model for Update Content  			
	        $ctrl_drd_content_update = $this->ContentMaster->update($ctrl_drd_upt_content_data,array('ID'=>$ctrl_drd_edit_content_id));

		    if($ctrl_drd_content_update)
			{
				log_message('info' ,'Content Update Successfully'); 
			    $ctrl_drd_successful_upt = array(
                   'message' => $this->lang->line('m_90004'));					   
	            echo json_encode($ctrl_drd_successful_upt);	
				return;
			} 
			else
			{
				log_message('info' ,'Content Update failure'); 				
				$ctrl_drd_update_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_update_fail);
				return;
			}
		}//End of Else
		log_message('info',"edit_content_details function end here");
	} //End of Add Content Details function	
		
}// End of Class
?>