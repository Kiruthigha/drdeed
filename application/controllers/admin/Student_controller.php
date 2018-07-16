<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Student_controller
	 *	- or -
	 * 		http://example.com/index.php/Student_controller/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Student_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Student_controller/<method_name>
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

	/**
	 * this Function is used to display students page
	 *
	 * @access public
	 * @since unknown
	 */
	public function students() 
	{
            
        log_message('info',"Grid View ALL Students function Start here");
            
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');          
                
        /* Get profile-> StudentProfile-> getstudentprofile  */
		$student_data = $this->StudentProfile->getstudentprofile(array('USER_TYPE_VALUE_NAME'=>'STUDENT'),'UPDATE_DATE DESC');
        
        $activeusercount = 0;
        $suspendedusercount = 0;
        foreach($student_data as $studentArray)
		{            
			if($studentArray['USER_STATUS_VALUE'] != 'DELETE')
			{
				if($studentArray['USER_STATUS_VALUE'] == "ACTIVE")
				{
					$activeusercount++;
				}
				
				if($studentArray['USER_STATUS_VALUE'] == "SUSPEND")
				{
				   $suspendedusercount++;
				}
				$student_array[]=$studentArray;
			}
			
        }  
		$crtl_drd_data['student'] = $student_array;
        log_message('info' ,'All Student Details '.print_r($crtl_drd_data,TRUE));
           
        $crtl_drd_data['active_count'] = $activeusercount;
        $crtl_drd_data['suspend_count'] = $suspendedusercount;
        
		$this->load->view('admin/admin-students',$crtl_drd_data);
		$this->load->view('admin/footer');
		log_message('info',"Grid View ALL Students function End");
	}
	
	/**
	 * this Function is used to view add student page
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_student()
	{
            
        $this->load->view('admin/header');
	    $this->load->view('admin/leftmenu');
            
        $crtl_drd_add_data['ip_address'] =$_SERVER['REMOTE_ADDR'];
        log_message('info',$_SERVER['REMOTE_ADDR']);

        /* Get State list from state master table  */
        $crtl_drd_add_data['state'] = $this->StateMaster->listAll('STATE_NAME');

        /* Get State list from state master table  */
        $crtl_drd_add_data['stateName'] = $this->StateMaster->listAll('STATE_NAME');

        /* Get country list from country master table  */
        $crtl_drd_add_data['country'] = $this->CountryMaster->listAll('COUNTRY_NAME');
        $crtl_drd_add_data['create_date']=$this->common_functions->date_display_format(date('Y-m-d')); 
        		
        $this->load->view('admin/admin-addstudent',$crtl_drd_add_data);
        $this->load->view('admin/footer');		
	}
	
	 /* Update Student Active status in student profile model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_student_status() 
	{
		log_message('info',"update_student_status function Start");
		
		$ctrl_drd_user_id  = $this->input->post('ajax_student_id');
		$ctrl_drd_user_status  = $this->input->post('ajax_student_status');
		if($ctrl_drd_user_status == "DELETE")
		{
			log_message('info' ,'Get  User Delete Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','DELETE');			
		}
		else if($ctrl_drd_user_status == "ACTIVE")
		{
			log_message('info' ,'Get  User Delete Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','ACTIVE');			
		}
		else
		{
			log_message('info' ,'Get  User Delete Status Id from Keyvalue table');
			$ctrl_drd_userstatus_id= $this->KeyValue->getKeyvalueId('USER','STATUS','SUSPEND');	
		}
		$where_array  = array(
			"UPDATE_BY"  => $this->session_Useremail,
			"UPDATE_DATE" => $this->current_date,
			"USER_STATUS_ID" =>$ctrl_drd_userstatus_id,
		);
		
		$ctrl_drd_status_update = $this->User->update($where_array,array('ID'=>$ctrl_drd_user_id));
		
		if($ctrl_drd_status_update)
		{
			log_message('info',"User Model Student Status update Success");
			if($ctrl_drd_user_status == "DELETE")
			{
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90007'),
				'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;
			}
			else
			{
				$ctrl_drd_return_data = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_return_data);
				return;
			}
		}
		else
		{
			log_message('info',"User Model Student Status update Fail");$ctrl_drd_return_data = array(
			'message' => $this->lang->line('m_90008'),
			'message_type'=>$this->lang->line('error'),
			);
			echo json_encode($ctrl_drd_return_data);
			return;
		}
		
		log_message('info',"update_student_status function End");
		
	} // End Function
 
}
?>