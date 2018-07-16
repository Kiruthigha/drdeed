<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	public function __construct() 
	{
		parent::__construct();
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 
	}

	/**
	 * This function used to show the diplomate Program page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_diplomate() 
	{
		log_message('info',"view_diplomate start here");
		//get the list of states
		$crtl_drd_data['state'] = $this->StateMaster->listAll('STATE_NAME');
		
		$crtl_drd_user_data = $this->StudentProfile->findByUniqueKey($this->session_Userid );

		$content= $this->StateRegulations->findByUniqueKey($crtl_drd_user_data['STATE']);
		
		$def_content="";
		if($content)
		{		
			$crtl_drd_data['content'] = $content;
		}
		
		else
		{
			log_message("info","in else part ");
			$california_state= $this->StateMaster->listWhere(array("STATE_CODE"=>"CA"));
			$california_state_id = $california_state[0]['ID'];			
			$def_content= $this->StateRegulations->findByUniqueKey($california_state_id);
			$crtl_drd_data['content'] = $def_content;
		}
				log_message('info',"default content end here".print_r($crtl_drd_data, true));

		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('diplomate',$crtl_drd_data);
		$this->load->view('footer');
		
		log_message('info',"view_diplomate end here".print_r($ctrl_drd_data, true));
	}//End of view_diplomate function
	
	public function get_dn_state_guidelines() 
	{		
		log_message('info',"get_dn_state_guidelines function Start here");
		/* Store Post Values In variables */
		   
		$ctrl_drd_state_id  = $this->input->post('ajx_drd_state_id');
		$crtl_drd_state_regulations = $this->StateRegulations->findByUniqueKey($ctrl_drd_state_id);
		log_message('info',"Get State list".print_r($crtl_drd_state_regulations,TRUE));
		if($crtl_drd_state_regulations)
		{					
			$ctrl_drd_return_array = array(
			'message' =>'',
			'STATE_GUIDELINES'=>$crtl_drd_state_regulations['STATE_GUIDELINES'],
			'STATE_URL'=>$crtl_drd_state_regulations['STATE_REF_URL']
			);		
			echo json_encode($ctrl_drd_return_array);
			return;						
		}
		else
		{
			log_message("info","in else part state guidelines");
			$california_state= $this->StateMaster->listWhere(array("STATE_CODE"=>"CA"));
			$california_state_id = $california_state[0]['ID'];			
			$def_content= $this->StateRegulations->findByUniqueKey($california_state_id);
			$ctrl_drd_return_array = array(
			'message' =>'',
			'STATE_GUIDELINES'=>$def_content['STATE_GUIDELINES'],
			'STATE_URL'=>$def_content['STATE_REF_URL']
			);		
			echo json_encode($ctrl_drd_return_array);
			return;						
		}		
		log_message('info',"get_dn_state_guidelines function Start here");
		
	} // End of user_course Function

}// end of class
?>
