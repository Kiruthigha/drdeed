<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/promocodes
	 *	- or -
	 * 		http://example.com/index.php/promocodes/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/promocodes
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/promocodes/<method_name>
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
	}//End of construct function		
	
	public function promocodes() 
	{		
		log_message('info' ,'Promo Code Function Start');
		//Get Promocode Delete Status id From dd_key_value
		$ctrl_drd_get_status_delete = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','DELETE');
		
		//Get Promocode List From dd_promo_code
		$ctrl_drd_get_promocodes['promocode'] = $this->PromoCode->getpromocodegrid(array('PROMO_CODE_STATUS'=>$ctrl_drd_get_status_delete,'ORDER_BY'=>'UPDATE_DATE DESC'));
		log_message('info',"ctrl_drd_get_promocodes= ".print_r($ctrl_drd_get_promocodes,true));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-promocode',$ctrl_drd_get_promocodes);
		$this->load->view('admin/footer');		
		log_message('info' ,'Promo Code Function End');
	}//End of promocodes function
	
	/**
	 * This Function Used To View Add Promo Code Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_promocode() 
	{
		log_message('info' ,'add_promocode function start');		
		//Get Promo Code Type From dd_key_value
		$ctrl_drd_promo_type_arry = array(
				"GROUP_NAME"=>"PROMO CODE",
				"KEY_NAME" =>"TYPE",
			);
		$ctrl_drd_promo_type['promo_type'] = $this->KeyValue->listWhere($ctrl_drd_promo_type_arry);
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-addpromocode',$ctrl_drd_promo_type);
		$this->load->view('admin/footer');	
		log_message('info' ,'add_promocode function End');
	}//End of add_promocode function
	
	/**
	 * This Function Used To View Edit Promo Code Page
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_promocode($ctrl_drd_id)
	{
		log_message('info',"edit_promocode function Start here");
		log_message('info' ,'ctrl_drd_id = '.$ctrl_drd_id);
		
		//Get Promo Code Type From dd_key_value
		$ctrl_drd_promo_type_array = array(
			"GROUP_NAME"=>"PROMO CODE",
			"KEY_NAME" =>"TYPE",
		);
		$ctrl_drd_get_promo_data['promo_type'] = $this->KeyValue->listWhere($ctrl_drd_promo_type_array);
		
		//Get Promocode data From dd_promo_code for selected id
		$ctrl_drd_get_promo_data['promocode_data'] = $this->PromoCode->findByPrimaryKey($ctrl_drd_id);
		log_message('info',"ctrl_drd_get_promo_data= ".print_r($ctrl_drd_get_promo_data,true));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editpromocode',$ctrl_drd_get_promo_data);
		$this->load->view('admin/footer');	
		log_message('info',"edit_promocode function End here");		
	}//End of edit_promocode function
	
		
	/**
	 * This Function Used To Insert Promo Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function add_promo_details() 
	{	
		log_message('info',"add_promo_details function Start here");
		
		// Assign post values in variables
		$ctrl_drd_addpromocodename = $this->input->post('txtAddPromoCodeNameNam');
		$ctrl_drd_addpromocode = $this->input->post('txtAddPromoCodeNam');
		$ctrl_drd_addpercentdiscount = $this->input->post('txtAddPercentDiscountNam');
		$ctrl_drd_addstartdate = $this->input->post('txtAddStartDateNam');
		$ctrl_drd_addenddate = $this->input->post('txtAddEndDateNam');
		$ctrl_drd_addappliesto = $this->input->post('selAddAppliestoNam');
		
		// Set validation Rules for form
        $this->form_validation->set_rules('txtAddPromoCodeNameNam', '', 'trim|required|max_length[60]|is_unique[promo_code.PROMO_CODE_NAME]',
		array(
			'required' => $this->lang->line('m_90509'),
			'is_unique' => $this->lang->line('m_90835'),
			));
		
        $this->form_validation->set_rules('txtAddPromoCodeNam', '', 'trim|required|max_length[10]|is_unique[promo_code.PROMO_CODE]',
		array(
			'required' => $this->lang->line('m_90509'),
			'is_unique' => $this->lang->line('m_90836'),
			));		
		
        $this->form_validation->set_rules('txtAddPercentDiscountNam', '', 'trim|required|max_length[3]',
		array('required' => $this->lang->line('m_90509')));			
		
        $this->form_validation->set_rules('txtAddStartDateNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));			
		
        $this->form_validation->set_rules('txtAddEndDateNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('selAddAppliestoNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{
			
	    log_message('info' ,'form validation fails');		  
		   $ctrl_drd_addPromoDataValidation = array(		      
			    'message'=>'',
                'AddPromoCodeName' => form_error('txtAddPromoCodeNameNam'),
                'AddPromoCode' => form_error('txtAddPromoCodeNam'),
				'AddPercentDiscount' => form_error('txtAddPercentDiscountNam'),     				
				'AddStartDate' => form_error('txtAddStartDateNam'),     				
				'AddEndDate' => form_error('txtAddEndDateNam'),     				
				'AddAppliesTo' => form_error('selAddAppliestoNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_addPromoDataValidation);

		} // End of If Condition
		else
		{
			log_message('info' ,'Add Promo Code form validation pass');
			
			// Get the Data From Ajax
			$ctrl_drd_promo_name = $this->input->post('txtAddPromoCodeNameNam');
			$ctrl_drd_promo_code = $this->input->post('txtAddPromoCodeNam');		
			$ctrl_drd_discount = $this->input->post('txtAddPercentDiscountNam');
			$ctrl_drd_applies_to = $this->input->post('selAddAppliestoNam');
			$ctrl_drd_start_date = $this->input->post('txtAddStartDateNam');			
			$ctrl_drd_end_dat = $this->input->post('txtAddEndDateNam');			
			//Convert Date to Db Format
			$ctrl_drd_srt_date = $this->common_functions->date_db_format($ctrl_drd_start_date);	
			$ctrl_drd_end_date = $this->common_functions->date_db_format($ctrl_drd_end_dat);
				
			//Get Promo Code Status 'Active' From dd_key_value	
			$ctrl_drd_status_id = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','ACTIVE');	

            // Assign the value to Column on Promo Code
			$ctrl_drd_promo_code_data = array(	            
				'CREATE_BY' =>$this->session_drd_email_id,
				'CREATE_DATE' =>$this->ctrl_drd_current_date,
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'PROMO_CODE_NAME' => $ctrl_drd_promo_name,
				'PROMO_CODE' => $ctrl_drd_promo_code,
				'PERCENT_DISCOUNT' => $ctrl_drd_discount,
				'START_DATE'=> $ctrl_drd_srt_date,	
				'END_DATE'=> $ctrl_drd_end_date,
				'CODE_APPLIES'=> $ctrl_drd_applies_to,				 			 
				'PROMO_CODE_STATUS'=> $ctrl_drd_status_id			 			 
			);
			  
		    //Pass the Value to PromoCode Model for Insert  			
	        $ctrl_drd_promo_code_ins = $this->PromoCode->insert($ctrl_drd_promo_code_data);

		    if($ctrl_drd_promo_code_ins)
			{
				log_message('info' ,'PromoCode Insert Successfully'); 
			    $ctrl_drd_successful_ins = array(
                   'message' => $this->lang->line('m_90003'));					   
	            echo json_encode($ctrl_drd_successful_ins);	
				return;
			} 
			else 
			{
				log_message('info' ,'PromoCode Insert failure'); 				
				$ctrl_drd_insert_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_insert_fail);
				return;
			}
		}//end of Else
		log_message('info',"add_promo_details function end here");		
	} //End of Add Promo Details function	

			
	/**
	 * This Function Used To Update Promo Details
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function edit_promo_details() 
	{	
		log_message('info',"edit_promo_details function Start here");
		
		// Set validation Rules for form
        /* $this->form_validation->set_rules('txtEditPromoCodeNameNam', '', 'trim|required|max_length[60]',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('txtEditPromoCodeNam', '', 'trim|required|max_length[60]',
		array('required' => $this->lang->line('m_90509')));	 */	
		
        $this->form_validation->set_rules('txtEditPercentDiscountNam', '', 'trim|required|max_length[3]',
		array('required' => $this->lang->line('m_90509')));			
		
        $this->form_validation->set_rules('txtEditStartDateNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));			
		
        $this->form_validation->set_rules('txtEditEndDateNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));
		
        $this->form_validation->set_rules('selEditAppliestoNam', '', 'trim|required',
		array('required' => $this->lang->line('m_90509')));

		$this->form_validation->set_error_delimiters('', '');
		
		if ($this->form_validation->run() === FALSE)
		{			
			log_message('info' ,'edit form validation fails');		  
		   $ctrl_drd_editPromoDataValidation = array(		      
			    'message'=>'',
                /* 'EditPromoCodeName' => form_error('txtEditPromoCodeNameNam'),
                'EditPromoCode' => form_error('txtEditPromoCodeNam'), */
				'EditPercentDiscount' => form_error('txtEditPercentDiscountNam'),     				
				'EditStartDate' => form_error('txtEditStartDateNam'),     				
				'EditEndDate' => form_error('txtEditEndDateNam'),     				
				'EditAppliesTo' => form_error('selEditAppliestoNam'),     				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_editPromoDataValidation);
			return;
		} // End of If Condition
		else
		{
			log_message('info' ,'Edit Promo Code form validation pass');
			// Get the Data From Ajax
			$ctrl_drd_edit_promo_id = $this->input->post('txtEditPromoIdNam');
		/* 	$ctrl_drd_edit_promo_name = $this->input->post('txtEditPromoCodeNameNam');
			$ctrl_drd_edit_promo_code = $this->input->post('txtEditPromoCodeNam');	 */	
			$ctrl_drd_edit_discount = $this->input->post('txtEditPercentDiscountNam');
			$ctrl_drd_edit_applies_to = $this->input->post('selEditAppliestoNam');
			$ctrl_drd_edit_start_date = $this->input->post('txtEditStartDateNam');			
			$ctrl_drd_edit_end_dat = $this->input->post('txtEditEndDateNam');			
			//Convert Date to Db Format
			$ctrl_drd_edit_srt_date = $this->common_functions->date_db_format($ctrl_drd_edit_start_date);	
			$ctrl_drd_edit_end_date = $this->common_functions->date_db_format($ctrl_drd_edit_end_dat);

            // Assign the value to Column on Promo Code
			$ctrl_drd_promo_code_upt = array(	
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				//'PROMO_CODE_NAME' => $ctrl_drd_edit_promo_name,
				//'PROMO_CODE' => $ctrl_drd_edit_promo_code,
				'PERCENT_DISCOUNT' => $ctrl_drd_edit_discount,
				'START_DATE'=> $ctrl_drd_edit_srt_date,	
				'END_DATE'=> $ctrl_drd_edit_end_date,
				'CODE_APPLIES'=> $ctrl_drd_edit_applies_to			 			 
			);
			  
		    //Pass the Value to PromoCode Model for Insert  			
	        $ctrl_drd_promo_code_update = $this->PromoCode->update($ctrl_drd_promo_code_upt,array('ID'=> $ctrl_drd_edit_promo_id));

		    if($ctrl_drd_promo_code_update)
			{
				log_message('info' ,'PromoCode Update Successfully'); 
			    $ctrl_drd_successful_ins = array(
                   'message' => $this->lang->line('m_90004'));					   
	            echo json_encode($ctrl_drd_successful_ins);	
				return;
			} 
			else 
			{
				log_message('info' ,'PromoCode Update failure'); 				
				$ctrl_drd_insert_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_insert_fail);
				return;
			}	
		}//End of Else		
		log_message('info',"edit_promo_details function end here");
	} //End of Edit Promo Details function	
	
	/**
	 * This Function Used to Update Promo Code Status
	 * From dd_ads 
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_promo_code_status() 
	{ 
		log_message('info' ,'update_promo_code_status Function Start');
		
		// Get the id From Ajax
		$ctrl_drd_promo_id = $this->input->post('ajx_drd_promo_id');
		$ctrl_drd_status = $this->input->post('ajx_drd_status');
		log_message('info' ,'ctrl_drd_promo_id = '.$ctrl_drd_promo_id);
		log_message('info' ,'ctrl_drd_status = '.$ctrl_drd_status);
			
			if($ctrl_drd_status === 'DELETE' )
			{
				//Get Status 'Delete' From dd_key_value	
				$ctrl_drd_get_status = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','DELETE');
			}
			else if($ctrl_drd_status === 'ACTIVE') 
			{
				//Get Status 'Deactive' From dd_key_value	
				$ctrl_drd_get_status = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','ACTIVE');
			} 
			else 
			{
				$ctrl_drd_get_status = $this->KeyValue->getKeyvalueId('PROMO CODE','STATUS','DEACTIVE');
			}
						
			
			// Assign the value to update Promo Code status
			$ctrl_drd_promo_status_upt = array(	
				'UPDATE_BY' =>$this->session_drd_email_id,
				'UPDATE_DATE' =>$this->ctrl_drd_current_date,
				'PROMO_CODE_STATUS' => $ctrl_drd_get_status
			);
			
			//Delete Record from dd_promo_code Table
			$ctrl_drd_dlt_promocode = $this->PromoCode->update($ctrl_drd_promo_status_upt,array('ID'=>$ctrl_drd_promo_id));
			
			if($ctrl_drd_dlt_promocode && $ctrl_drd_status == 'DELETE' ) 
			{
				log_message('info' ,'Promo Code Deleted Successfully'); 				
				$ctrl_drd_successful_delete= array(
                    'message' => $this->lang->line('m_90007'));					   
	            echo json_encode($ctrl_drd_successful_delete);
				return;
			} 
			else if($ctrl_drd_dlt_promocode ) 
			{
				log_message('info' ,'Promo Code Updated Successfully'); 				
				$ctrl_drd_successful_update= array(
                    'message' => $this->lang->line('m_90004'));					   
	            echo json_encode($ctrl_drd_successful_update);
				return;
			} 
			else 
			{
				log_message('info' ,'Promo Code Update Failure'); 				
				$ctrl_drd_failed_status= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_failed_status);
				return;
			}//End of else	
		log_message('info' ,'update_promo_code_status Function End');
	}//End of update_promo_code_status function
	
	/**
	 * This Function Used To Check Promocode Name & Number Already exists in Promocode Model
	 *
	 * @access public
	 * @since unknown
	 */ 
	public function promocode_exists()
	{	
		log_message('info',"promocode_exists function Start here");

		// Set validation Rules for form
		$ctrl_drd_promocode  = $this->input->post('ajx_txtUniqueColumn');
		log_message('info' ,'ctrl_drd_promocode is = '.$ctrl_drd_promocode);
		if($ctrl_drd_promocode == 'PROMO_CODE')
		{
		$this->form_validation->set_rules('ajx_txtPromocodeValue', '', 'trim|max_length[10]|is_unique[promo_code.PROMO_CODE]',
		array(
			'is_unique' => $this->lang->line('m_90836'),
		));
		} 
		else 
		{
		$this->form_validation->set_rules('ajx_txtPromocodeValue', '', 'trim|max_length[60]|is_unique[promo_code.PROMO_CODE_NAME]',
		array(
			'is_unique' => $this->lang->line('m_90835'),
		));
		}

		$this->form_validation->set_error_delimiters('', '');	
		
		if ($this->form_validation->run() == FALSE)
		{
	    log_message('info' ,'form validation Promocode Name & Number Exists');		  
		   $data = array(		      
			    'message'=>form_error('ajx_txtPromocodeValue')    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);

		} // End of If Condition
		else 
		{
			log_message('info' ,'form validation Course Number Not Found');
			$data = array(		      
			    'message'=>''    				
		     );			
			// Return the JSON value to ajax
	        echo json_encode($data);
		} // End of Else Block
		log_message('info',"promocode_exists function end here");
		return;
		
	} //End of studentRegister function		
	
}