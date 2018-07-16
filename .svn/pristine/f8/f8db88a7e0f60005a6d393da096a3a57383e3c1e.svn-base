<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stateregulation_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Stateregulation_controller
	 *	- or -
	 * 		http://example.com/index.php/Stateregulation_controller
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Stateregulation_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Stateregulation_controllerr/<method_name>
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
	 * this Function is used to display state guidelines 
	 *
	 * @access public
	 * @since unknown 
	 */
	public function state_regulations() 
	{
		log_message('info' ,'state_regulations Function Start');
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		
		//Get State List from dd_state_master
		$ctrl_drd_get_states = $this->StateMaster->listAll('ID ASC');
		//log_message('info',"ctrl_drd_get_states= ".print_r($ctrl_drd_get_states,true));
		$keys= array('CREATE_BY','CREATE_DATE','UPDATE_BY','UPDATE_DATE');
		foreach($ctrl_drd_get_states as $ctrl_drd_get_states)
		{
			$state_array[]=$ctrl_drd_get_states['ID'];
			$diff_result_array=array_diff_key($ctrl_drd_get_states, array_flip($keys));
			$diff_result_array['STATE_ID']=$ctrl_drd_get_states['ID'];
			$diff_result_array['ID']='';
			$ctrl_drd_get_states_array[]=$diff_result_array;
		}
		//Get State_Regulation List from dd_state_regulations
		$ctrl_drd_get_state_regulations = $this->StateRegulations->getstateregulations();
		if(count($ctrl_drd_get_state_regulations) >=1 )
		{
			log_message('info','State Array  '.print_r($state_array,TRUE));
			foreach($ctrl_drd_get_state_regulations as $ctrl_drd_get_state_regulations)
			{
				$state_regulationid_array[]=$ctrl_drd_get_state_regulations['STATE_ID'];
				if(in_array($ctrl_drd_get_state_regulations['STATE_ID'],$state_array))
				{
					log_message('info','Match State_id '.$ctrl_drd_get_state_regulations['STATE_ID']);
					$match_state_array[]=$ctrl_drd_get_state_regulations;
				}
			}
			
			foreach($ctrl_drd_get_states_array as $ctrl_drd_get_states_array)
			{
				
				if(!in_array($ctrl_drd_get_states_array['STATE_ID'],$state_regulationid_array))
				{
					$diff_state_regulation_array[]=$ctrl_drd_get_states_array;
				}
			}
					
			log_message('info',"Diff state = ".print_r($diff_state_regulation_array,TRUE)); 
			log_message('info',"Match state= ".print_r($match_state_array,TRUE)); 
			
			if($diff_state_regulation_array)
			{
				$return_diff_result_mergearray=$this->array_push_assoc($diff_state_regulation_array);
				log_message('info',"state= ".print_r($return_diff_result_mergearray,TRUE));	
			}
			else
			{
				$return_diff_result_mergearray=[];
			}
			
			$match_array= $match_state_array;
			
			//log_message('info',"Match state= ".print_r($match_array,TRUE)); 
			$match_keys= array('COUNTRY_ID','STATE_CODE','CREATE_BY','CREATE_DATE','UPDATE_BY','UPDATE_DATE');
			
			foreach($match_array as $match_array)
			{
				$match_result_array=array_diff_key($match_array, array_flip($match_keys));
				$return_match_result_array[] = $match_result_array;
			}
			log_message('info',"Match state= ".print_r($return_match_result_array,TRUE)); 
			
			$array_combine = array_merge($return_diff_result_mergearray,$return_match_result_array);
		}
		else
		{
			$array_combine=$this->array_push_assoc($ctrl_drd_get_states_array);
		}
		log_message('info',"array_combine= ".print_r($array_combine,TRUE)); 
		
		$state_array  = $array_combine;
		    $sort = array();
		    foreach($state_array as $k=>$v) 
			{
			  $sort['STATE_NAME'][$k] = $v['STATE_NAME'];
		    }

		   array_multisort($sort['STATE_NAME'], SORT_ASC, $state_array);	
		
		
		$ctrl_drd_data['state_list']= $state_array;	
		log_message('info',"Return Result= ".print_r($ctrl_drd_data,TRUE)); 
		
		$this->load->view('admin/admin-stateregulations',$ctrl_drd_data);
		$this->load->view('admin/footer');	
		log_message('info' ,'state_regulations Function End');
	}//End of state_regulations function
	
	
	public function array_push_assoc($array)
	{
		log_message('info' ,'array_push_assoc Function Start');
		
		$value=[];
		foreach ($array as $array) 
		{
			$array['ID'] = '';
			$array['STATE_GUIDELINES'] = 'Please Contact System Administrator for Instructions';
			$array['STATE_REF_URL'] = 'Please Contact System Administrator for Instruction Link';
			array_push($value,$array);	
		}
		log_message('info' ,'array_push_assoc Function End');
		return $value;
	} //  End of array_push_assoc
	
	/**
	 * this Function is used to add guidelines and url in state regulations table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_stateRegulation() 
	{
		log_message('info' ,'add_stateRegulation Function Start');
		log_message('info' ,'ajx_drd_sates_guidelines = '.print_r($this->input->post('ajx_drd_sates_guidelines'),true));
		
		$ctrl_drd_guidelines_count = count($this->input->post('ajx_drd_sates_guidelines'));
		log_message('info' ,'Count of Guide Lines'.$ctrl_drd_guidelines_count);
				
		if($ctrl_drd_guidelines_count > 1) 
		{			
			// Get Data From Ajax Using For loop
			for($i=0; $i<count($this->input->post('ajx_drd_sates_guidelines')); $i++)
			{	
				$ctrl_drd_state_Id = $this->input->post('ajx_drd_sates_guidelines')[$i]['stateId']; 
				$ctrl_drd_state_reg_id = $this->input->post('ajx_drd_sates_guidelines')[$i]['stateRegId'];
				$ctrl_drd_guidelines = $this->input->post('ajx_drd_sates_guidelines')[$i]['guidelines'];
				$ctrl_drd_url = $this->input->post('ajx_drd_sates_guidelines')[$i]['url'];
				
				log_message('info' ,' ctrl_drd_state_Id ='.$ctrl_drd_state_Id);	
				log_message('info' ,' ctrl_drd_state_reg_id ='.$ctrl_drd_state_reg_id);	

				// Get The State Regulation List 
				$ctrl_drd_state_reg_details = $this->StateRegulations->getstateregulations(array('STATE_ID'=>$ctrl_drd_state_reg_id));
				log_message('info',"ctrl_drd_state_reg_details = ".print_r($ctrl_drd_state_reg_details,TRUE)); 	
								
				if($ctrl_drd_state_reg_details) 
				{				
					//Pass the Values for State Regulation Update
					$Ctrl_drd_state_reg_upt_array = array(	
						'UPDATE_BY'=> $this->session_drd_email_id,
						'UPDATE_DATE'=>$this->ctrl_drd_current_date,				
						'STATE_ID'=>$ctrl_drd_state_Id, 
						'STATE_GUIDELINES'=>$ctrl_drd_guidelines, 
						'STATE_REF_URL'=>$ctrl_drd_url
						);		
					$where = array('ID'=>$ctrl_drd_state_reg_id);
					//Update State Regulation Details on State Regulation Table
					$ctrl_drd_state_reg_upt = $this->StateRegulations->update($Ctrl_drd_state_reg_upt_array,$where);
					log_message('info' ,'Data Updated ='.$ctrl_drd_state_reg_upt);
					
					if($ctrl_drd_state_reg_upt) 
					{	
						$result = 1;
					}					
				} 
				else 
				{
										
					//Pass the Values for State Regulation Insert Function
					$Ctrl_drd_state_reg_ins_array = array(	      	                       
						'CREATE_BY'=> $this->session_drd_email_id,
						'CREATE_DATE'=>$this->ctrl_drd_current_date,	
						'UPDATE_BY'=> $this->session_drd_email_id,
						'UPDATE_DATE'=>$this->ctrl_drd_current_date,				
						'STATE_ID'=>$ctrl_drd_state_Id, 
						'STATE_GUIDELINES'=>$ctrl_drd_guidelines, 
						'STATE_REF_URL'=>$ctrl_drd_url
						);		
					//Insert State Regulation List on State Regulation Table
					$ctrl_drd_state_reg_insert = $this->StateRegulations->insert($Ctrl_drd_state_reg_ins_array);
					log_message('info' ,'Data Inserted ='.$ctrl_drd_state_reg_insert);
					
					if($ctrl_drd_state_reg_insert) 
					{
						$result = 1;						
					}				
				} // End of Else			
			}// End of For Loop
		} 
		else 
		{			
			$ctrl_drd_guideline = $this->input->post('ajx_drd_sates_guidelines')[0]['guidelines'];
			$ctrl_drd_url = $this->input->post('ajx_drd_sates_guidelines')[0]['url'];
			log_message('info' ,'ctrl_drd_url ='.$ctrl_drd_url);
			// Get The State List 
			$ctrl_drd_state_list = $this->StateMaster->listAll();
		
			// Get The State Regulation List 
			$ctrl_drd_state_reg_list = $this->StateRegulations->getstateregulations();
			
			if($ctrl_drd_state_reg_list)
			{
				foreach($ctrl_drd_state_reg_list as $ctrl_drd_state_reg_list) 
				{
					//Pass the Values for State Regulation Update
					$Ctrl_drd_state_reg_upt_array = array(	
						'UPDATE_BY'=> $this->session_drd_email_id,
						'UPDATE_DATE'=>$this->ctrl_drd_current_date,
						'STATE_GUIDELINES'=>$ctrl_drd_guideline, 
						'STATE_REF_URL'=>$ctrl_drd_url
						);		
					$where = array('ID'=>$ctrl_drd_state_reg_list['ID']);
					//Update State Regulation Details on State Regulation Table
					$ctrl_drd_state_reg_upt = $this->StateRegulations->update($Ctrl_drd_state_reg_upt_array,$where);
					log_message('info' ,'Data Updated ='.$ctrl_drd_state_reg_upt);
					
					if($ctrl_drd_state_reg_upt) 
					{	
						$result = 1;
					}
				}
			}
			else 
			{
				foreach($ctrl_drd_state_list as $ctrl_drd_state_list) 
				{
					//Pass the Values for State Regulation Insert Function
					$Ctrl_drd_state_reg_ins_array = array(	      	                       
						'CREATE_BY'=> $this->session_drd_email_id,
						'CREATE_DATE'=>$this->ctrl_drd_current_date,	
						'UPDATE_BY'=> $this->session_drd_email_id,
						'UPDATE_DATE'=>$this->ctrl_drd_current_date,				
						'STATE_ID'=>$ctrl_drd_state_list['ID'], 
						'STATE_GUIDELINES'=>$ctrl_drd_guideline, 
						'STATE_REF_URL'=>$ctrl_drd_url
						);		
					//Insert State Regulation List on State Regulation Table
					$ctrl_drd_state_reg_insert = $this->StateRegulations->insert($Ctrl_drd_state_reg_ins_array);
					log_message('info' ,'Data Inserted ='.$ctrl_drd_state_reg_insert);
					
					if($ctrl_drd_state_reg_insert) 
					{
						$result = 1;						
					}
				}
			}
			log_message('info' ,'add_stateRegulation Function End');		
		}//End of Else
		if($result == 1) 
		{
			log_message('info' ,'Inserted Successfully');
			$msg_drd_upt_success = array( 'message' => $this->lang->line('m_90004') ); 
			echo json_encode($msg_drd_upt_success);	
		} 
		else 
		{
			$msg_drd_upt_failed = array( 'message' => $this->lang->line('m_90008') ); 
			echo json_encode($msg_drd_upt_failed);	
		}
		return;
	}//End of add_stateRegulation Function 
	
}// End of Class
?>