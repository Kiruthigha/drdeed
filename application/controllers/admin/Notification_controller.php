<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/view_notification
	 *	- or -
	 * 		http://example.com/index.php/view_notification
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/view_notification
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/view_notification/<method_name>
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
	 * Function For View Notification Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function notifications() 
	{
		log_message('info' ,'notifications Function Start');
		//Get Notification List From dd_notifications
		$ctrl_drd_get_notifications['notification'] = $this->Notifications->listAll('UPDATE_DATE DESC');
		log_message('info',"ctrl_drd_get_notifications= ".print_r($ctrl_drd_get_notifications,true));	
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-notifications',$ctrl_drd_get_notifications);
		$this->load->view('admin/footer');	
		log_message('info' ,'notifications Function End');
	}//End of Notifications Function
	
	/**
	 * This Function Used to Display add_notification Page 
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_notification() 
	{
		log_message('info' ,'add_notification Function Start');
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-addnotification');
		$this->load->view('admin/footer');
		log_message('info' ,'add_notification Function End');
	}//End of add_notification Function
	
	/**
	 * This Function Used to Show edit_notification Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_notification($ctrl_drd_id) 
	{
		log_message('info' ,'edit_notification Function Start');
		log_message('info' ,'Notification ID = '.$ctrl_drd_id);
		//Get Notification Details For Selected Id
		$ctrl_drd_get_notification_data['notification_data'] = $this->Notifications->findByPrimaryKey($ctrl_drd_id);
		log_message('info',"ctrl_drd_get_notification_data= ".print_r($ctrl_drd_get_notification_data,true));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editnotification',$ctrl_drd_get_notification_data);
		$this->load->view('admin/footer');	
		log_message('info' ,'edit_notification Function End');
	}
	
	/**
	 * This Function used to insert data on notification table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_notification_data() 
	{
		log_message('info' ,'add_notification_data Function Start');
		set_time_limit(3600);

		/* Form Validation Start */
		$this->form_validation->set_rules('ajx_title', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('ajx_article', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),		
		));

		$this->form_validation->set_rules('ajx_date', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'Notification form validation fails');
		    $ctrl_drd_AddNotifyData = array(
                'message' => "",
                'AddTitle' => form_error('ajx_title'),
                'AddArticle' => form_error('ajx_article'),
                'AddDate' => form_error('ajx_date')
            );

			echo json_encode($ctrl_drd_AddNotifyData); /* Form Validation End */
			return;
		} 
		else 
		{
			log_message('info' ,'Notification form validation pass');
			
			// Get the Data From Ajax
			$ctrl_drd_title = $this->input->post('ajx_title');
			$ctrl_drd_article = $this->input->post('ajx_article');		
			$ctrl_drd_date = $this->input->post('ajx_date');			
			//Convert Date to Db Format
			$ctrl_drd_creation_date = $this->common_functions->date_db_format($ctrl_drd_date);	
				
			//Get Notification Status 'Active' From dd_key_value	
			$ctrl_drd_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');	

            // Assign the value to Column on Notification
			$ctrl_drd_notification_data = array(	            
				'CREATE_BY' =>$this->session_drd_email_id,
				'CREATE_DATE' =>$this->ctrl_drd_current_date,
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'TITLE' => $ctrl_drd_title,
				'ARTICLE_DESCRIPTION'=> $ctrl_drd_article,	
				'ARTICLE_CREATE_DATE'=> $ctrl_drd_creation_date,
				'ARTICLE_STATUS'=> $ctrl_drd_status_id,				 			 
			);
			  
		    //Pass the Value to Notification Model for Insert Notification  			
	        $ctrl_drd_notification_insert = $this->Notifications->insert($ctrl_drd_notification_data);

		    if($ctrl_drd_notification_insert)
			{
				log_message('info' ,'Notification Insert Successfully'); 
			    $ctrl_drd_successful_ins = array(
                   'message' => $this->lang->line('m_90003'));					   
	            echo json_encode($ctrl_drd_successful_ins);	
				return;
			} else {
				log_message('info' ,'Notification Insert failure'); 				
				$ctrl_drd_insert_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_insert_fail);
				return;
			}			
		} //End of Else
		log_message('info' ,'add_notification_data Function End');
	} // End of add_notification_data function	
	
	/**
	 * Function For Update Notification Data  
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_notification_data() 
	{
		log_message('info' ,'edit_notification_data Function Start');
		set_time_limit(3600);

		/* Form Validation Start */
		$this->form_validation->set_rules('ajx_edit_title', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('ajx_edit_article', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),		
		));

		$this->form_validation->set_rules('ajx_edit_date', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'edit Notification form validation fails');
		    $ctrl_drd_EditNotifyData = array(
                'message' => "",
                'EditTitle' => form_error('ajx_edit_title'),
                'EditArticle' => form_error('ajx_edit_article'),
                'EditDate' => form_error('ajx_edit_date')
            );

			echo json_encode($ctrl_drd_EditNotifyData); /* Form Validation End */
			return;
		}
		else 
		{
			log_message('info' ,'edit Notification form validation pass');
			
			// Get the Data From Ajax
			$ctrl_drd_edit_title = $this->input->post('ajx_edit_title');
			$ctrl_drd_edit_article = $this->input->post('ajx_edit_article');		
			$ctrl_drd_edit_date = $this->input->post('ajx_edit_date');			
			//Convert Date to Db Format
			$ctrl_drd_edit_creation_date = $this->common_functions->date_db_format($ctrl_drd_edit_date);	
				
			//Get Notification Status 'Active' From dd_key_value	
			$ctrl_drd_edit_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');	

            // Assign the value to Column for update 
			$ctrl_drd_edit_notification_data = array(	
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'TITLE' => $ctrl_drd_edit_title,
				'ARTICLE_DESCRIPTION'=> $ctrl_drd_edit_article,	
				'ARTICLE_CREATE_DATE'=> $ctrl_drd_edit_creation_date,
				'ARTICLE_STATUS'=> $ctrl_drd_edit_status_id,				 			 
			);
			  
		    //Pass the Value to Notification Model for Update Notification  			
	        $ctrl_drd_notification_update = $this->Notifications->update($ctrl_drd_edit_notification_data,array('ID'=>$this->input->post('ajx_edit_id')));

		    if($ctrl_drd_notification_update)
			{
				log_message('info' ,'Notification Update Successfully'); 
			    $ctrl_drd_successful_upt = array(
                   'message' => $this->lang->line('m_90004'));					   
	            echo json_encode($ctrl_drd_successful_upt);	
				return;
			}
			else 
			{
				log_message('info' ,'Notification Update Failure'); 				
				$ctrl_drd_update_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_update_fail);
				return;
			}	
		} //End of Else
		log_message('info' ,'edit_notification_data Function End');
	} // End of edit_notification_data function

	/**
	 * This Function Used to Delete Selected Notification Record
	 * From dd_user_notifications_seen and dd_notifications 
	 *
	 * @access public
	 * @since unknown
	 */
	public function delete_notification_data() 
	{ 
		log_message('info' ,'delete_notification_data Function Start');
		
		// Get the id From Ajax
		$ctrl_drd_notification_id = $this->input->post('ajx_drd_notification_id');
		log_message('info' ,'Notification_id = '.$ctrl_drd_notification_id);
		
		//Delete Record from dd_user_notifications_seen Table
		$ctrl_drd_dlt_notification_seen = $this->UserNotificationSeen->deleteByPrimaryKey(array('NOTIFICATION_ID'=>$ctrl_drd_notification_id));
		
		if($ctrl_drd_dlt_notification_seen) 
		{
			log_message('info' ,'Child Table Record Deleted Successfully.');
			//Delete Record from dd_notifications Table
			$ctrl_drd_dlt_notification = $this->Notifications->deleteByPrimaryKey(array('ID'=>$ctrl_drd_notification_id));
			
			if($ctrl_drd_dlt_notification) 
			{
				log_message('info' ,'Notification Deleted Successfully'); 				
				$ctrl_drd_successful_delete= array(
                    'message' => $this->lang->line('m_90007'));					   
	            echo json_encode($ctrl_drd_successful_delete);
				return;
			} 
			else 
			{
				log_message('info' ,'Notification Delete Failure'); 				
				$ctrl_drd_delete_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_delete_fail);
				return;
			}//End of ctrl_drd_dlt_notification else	
				
		} 
		else 
		{			
			log_message('info' ,'Child Table Record Delete Failure.');
			$ctrl_drd_child_delete_fail= array(
                'message' => $this->lang->line('m_90008'));					   
	        echo json_encode($ctrl_drd_child_delete_fail);
			return;
		}//End of ctrl_drd_dlt_notification_seen else		
		log_message('info' ,'delete_notification_data Function End');
	}//End of delete_notification_data function
	
}// End of Class
?>