<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Advertisement_controller
	 *	- or -
	 * 		http://example.com/index.php/Advertisement_controller
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Advertisement_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Advertisement_controller/<method_name>
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
	 * this Function is used to display advertisements advertisement table
	 *
	 * @access public
	 * @since unknown
	 */
	public function advertisements() 
	{
		log_message('info' ,'advertisements Function Start');
		//Get Advertisement List From dd_ads
		$ctrl_drd_get_advertisement['advertisements'] = $this->Advertisements->listAll('UPDATE_DATE DESC');
		log_message('info',"ctrl_drd_get_advertisement= ".print_r($ctrl_drd_get_advertisement,true));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-advertisements',$ctrl_drd_get_advertisement);
		$this->load->view('admin/footer');		
		log_message('info' ,'advertisements Function End');
	}
	
	/**
	 * this Function is used to display add advertisement on dd_ads table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_advertisement() 
	{
		log_message('info' ,'add_advertisement function start');
		
		//Get Advertisement Status 'Active' From dd_key_value	
		$ctrl_drd_status['active'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		//Get Advertisement Status 'Inactive' From dd_key_value	
		$ctrl_drd_status['inactive'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','INACTIVE');	
			
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-addadvertisement',$ctrl_drd_status);
		$this->load->view('admin/footer');	
		log_message('info' ,'add_advertisement function End');
	}
	
	/**
	 * this Function is used to display edit advertisement advertisement table
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_advertisement($ctrl_drd_ad_id) 
	{
		log_message('info' ,'edit_advertisement function start');
		log_message('info' ,'ctrl_drd_ad_id'.$ctrl_drd_ad_id);
		
		//Get Advertisement Status 'Active' From dd_key_value	
		$ctrl_drd_get_advertisement_data['active'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');
		
		//Get Advertisement Status 'Inactive' From dd_key_value	
		$ctrl_drd_get_advertisement_data['inactive'] = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','INACTIVE');
		
		//Get Advertisement details for selected id
		$ctrl_drd_get_advertisement_data['advertisements_data'] = $this->Advertisements->findByPrimaryKey($ctrl_drd_ad_id);
		log_message('info',"ctrl_drd_get_advertisement_data= ".print_r($ctrl_drd_get_advertisement_data,true));
		
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/admin-editadvertisement',$ctrl_drd_get_advertisement_data);
		$this->load->view('admin/footer');	
		log_message('info' ,'edit_advertisement function End');
	}
	
	/**
	 * this Function is used to insert data on advertisement table
	 *
	 * @access public
	 * @since unknown
	 */
	public function add_advertisement_data() 
	{
		log_message('info' ,'add_advertisement_data function start');
		set_time_limit(3600);

		/* Form Validation Start */
		$this->form_validation->set_rules('ajx_drd_advertiser', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('ajx_drd_url', '', 'trim|required|valid_url',
		array(
		'required' => $this->lang->line('m_90509'),		
		'valid_url' => $this->lang->line('m_90508')
		));

		$this->form_validation->set_rules('ajx_drd_srt_date', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));		

		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'form Add advertisement validation fails');
		    $ctrl_drd_AddAdvertisementData = array(
                'message' => "",
                'AddAdvertiser' => form_error('ajx_drd_advertiser'),
                'AddUrl' => form_error('ajx_drd_url'),
                'AddStartDate' => form_error('ajx_drd_srt_date'),
                'AddEndDate' => form_error('txtAddEndDateNam')
            );

			echo json_encode($ctrl_drd_AddAdvertisementData); /* Form Validation End */
			return;
		} 
		else if( $this->checkUrlRegex($this->input->post('ajx_drd_url')) === FALSE)
		{

			log_message('info' ,"Url ");
			$ctrl_drd_UrlData = array(
				'message'=>'',
                'AddUrl' => $this->lang->line('m_90508'),
            );
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_UrlData);  //return message form UI
			return;
		} 
		else 
		{
			log_message('info' ,'form Add Advertisement Validation pass');
			
			// Get the Data From Ajax
			$ctrl_drd_advertiser = $this->input->post('ajx_drd_advertiser');
			$ctrl_drd_image = $_FILES['txtAddFileNam']['name'];
			$ctrl_drd_url = $this->input->post('ajx_drd_url');		
			$ctrl_drd_date = $this->input->post('ajx_drd_srt_date');			
			//Convert Date to Db Format
			$ctrl_drd_srt_date = $this->common_functions->date_db_format($ctrl_drd_date);	
			$ctrl_drd_status = $this->input->post('ajx_drd_status');
			$ctrl_drd_duration = $this->input->post('ajx_drd_duration');
			
			log_message('info',"File Name = ".$ctrl_drd_image);
			
			$ctrl_drd_new_file = substr($ctrl_drd_image, 0, strrpos($ctrl_drd_image, '.'));
			
			$ctrl_drd_new_file_name = $ctrl_drd_new_file.$this->ctrl_drd_current_date;
			log_message('info','ctrl_drd_new_file_name= '.$ctrl_drd_new_file_name);
			//File Name
			$ctrl_drd_ext = substr($ctrl_drd_image, strrpos($ctrl_drd_image, '.') + 1); //File Ext
			$ctrl_drd_file = preg_replace('/[^A-Za-z0-9-\-]/', '',$ctrl_drd_new_file_name);
			$ctrl_drd_file_name = $ctrl_drd_file. '.' . $ctrl_drd_ext;
			
			log_message('info','ctrl_drd_file_name= '.$ctrl_drd_file_name);
			
			$ctrl_drd_file_type = 'png|jpg|jpeg';// Assign file type
			$ctrl_drd_folder_path = FCPATH.'uploads/ad';

			//Check Folder path
			if(is_dir($ctrl_drd_folder_path))
			{
				$ctrl_drd_file_path = './uploads/ads/';
				$ctrl_drd_full_file_path = 'uploads/ads/'.$ctrl_drd_file_name;
				log_message('info',"File Path = ".$ctrl_drd_full_file_path);
				
				//Check File Alreay exit on file path
				if (file_exists($ctrl_drd_full_file_path)) 
				{
					log_message('info',"File already exits");
					log_message('info',"inside upload else file doesnot moved to the folder"); //for log msg
					$ctrl_drd_file_exists = array( 'message' => $this->lang->line('m_90530'));
					echo json_encode($ctrl_drd_file_exists);
					return;
				} 
				else 
				{
					$ctrl_drd_upload_file = $this->fileupload->uploadfile($ctrl_drd_file_path,$ctrl_drd_file_name,$ctrl_drd_file_type);  // pass fileupload				

					log_message('info' ,'file Name Before Upload = '.$ctrl_drd_file_name);
					log_message('info',"folder path = ".$ctrl_drd_folder_path);
					log_message('info',"file path = ".$ctrl_drd_full_file_path);
					if($ctrl_drd_upload_file->upload->do_upload('txtAddFileNam')) 
					{
						log_message('info' ,'After Upload ='.$ctrl_drd_full_file_path);
						log_message('info',"inside upload if file moved to the folder"); //for log msg

						$ctrl_drd_ins_ads_data = array(
							'CREATE_BY' =>$this->session_drd_email_id,
							'CREATE_DATE' =>$this->ctrl_drd_current_date,
							'UPDATE_BY' =>$this->session_drd_email_id,
							'UPDATE_DATE' =>$this->ctrl_drd_current_date,
							'ADVERTISER' => $ctrl_drd_advertiser,
							'ADD_PICTURE_PATH'=> $ctrl_drd_full_file_path,	
							'BANNER_URL'=> $ctrl_drd_url,
							'AD_START_DATE'=> $ctrl_drd_srt_date,				 			 
							'AD_IMP_COUNT'=> 0,				 			 
							'AD_CLICK_COUNT'=> 0,				 			 
							'AD_DURATION'=> $ctrl_drd_duration,				 			 
							'ACTIVE_STATUS'=> $ctrl_drd_status,
						) ;
						// Insert Advertisement Data
						log_message('info',"Before Advertisement insert");
						$ctrl_drd_ad_insert = $this->Advertisements->insert($ctrl_drd_ins_ads_data);

						if($ctrl_drd_ad_insert)
						{
							log_message('info',"Ad Insert Success");
							$ctrl_drd_msg_insert = array( 'message' => $this->lang->line('m_90003'));
							echo json_encode($ctrl_drd_msg_insert);
							return;
						}
						else
						{
							//unlink file from folder 
							$ctrl_drd_file_nam = 'uploads/ads/'.$ctrl_drd_file_name;
							unlink(FCPATH."/".$ctrl_drd_file_nam);
							log_message('info',"Insert Failed");
							$ctrl_drd_msg_Insert_failed = array( 'message' => $this->lang->line('m_90008'));
							echo json_encode($ctrl_drd_msg_Insert_failed);
							return;
						}//End of Insert Else
					}
					
					else 
					{
						log_message('info',"inside upload else file doesnot moved to the folder"); //for log msg
						$ctrl_drd_msg_file_moved_err = array( 'message' => $this->lang->line('m_90522'));
						echo json_encode($ctrl_drd_msg_file_moved_err);
						return;
					}//End of File Upload Else
				}//end of File Path else
			}
			else 
			{
				log_message('info',"Folder Not Available");
				$ctrl_drd_msg_folder_error = array( 'message' => $this->lang->line('m_90531'));
				echo json_encode($ctrl_drd_msg_folder_error);
				return;
			}//End of Folder Path Else			
		} //End of Else
		log_message('info' ,'add_advertisement_data function end');
	} // End of add_advertisement_data function	
	
	/**
	 * this Function is used to update data on advertisement table
	 *
	 * @access public
	 * @since unknown
	 */
	public function edit_advertisement_data() 
	{
		log_message('info' ,'edit_advertisement_data function start');
		set_time_limit(3600);

		/* Form Validation Start */
		$this->form_validation->set_rules('ajx_drd_edit_advertiser', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));

		$this->form_validation->set_rules('ajx_drd_edit_url', '', 'trim|required|valid_url',
		array(
		'required' => $this->lang->line('m_90509'),		
		'valid_url' => $this->lang->line('m_90508')
		));

		$this->form_validation->set_rules('ajx_drd_edit_srt_date', '', 'trim|required',
		array(
		'required' => $this->lang->line('m_90509'),
		));
				
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() === FALSE) 
		{
			log_message('info' ,'form Add advertisement validation fails');
		    $ctrl_drd_EditAdvertisementData = array(
                'message' => "",
                'EditAdvertiser' => form_error('ajx_drd_edit_advertiser'),
                'EditUrl' => form_error('ajx_drd_edit_url'),
                'EditStartDate' => form_error('ajx_drd_edit_srt_date')
			);
			echo json_encode($ctrl_drd_EditAdvertisementData); /* Form Validation End */
			return;
		} 
		else if( $this->checkUrlRegex($this->input->post('ajx_drd_edit_url')) === FALSE) 
		{

			log_message('info' ,"Url ");
			$ctrl_drd_UrlData = array(
				'message'=>'',
                'EditUrl' => $this->lang->line('m_90508'),
            );
			// Return the JSON value to ajax
	        echo json_encode($ctrl_drd_UrlData);  //return message form UI
			return;
		}
		else 
		{
			log_message('info' ,'edit_advertisement_data validation Pass');
			
			// Get the Data From Ajax
			$ctrl_drd_ad_id = $this->input->post('ajx_drd_edit_id');
			$ctrl_drd_advertiser = $this->input->post('ajx_drd_edit_advertiser');
			$ctrl_drd_image = $_FILES['txtEditFileNam']['name'];
			$ctrl_drd_img_span = $this->input->post('ajx_image_span');	
			$ctrl_drd_url = $this->input->post('ajx_drd_edit_url');		
			$ctrl_drd_date = $this->input->post('ajx_drd_edit_srt_date');			
			//Convert Date to Db Format
			$ctrl_drd_srt_date = $this->common_functions->date_db_format($ctrl_drd_date);	
			$ctrl_drd_status = $this->input->post('ajx_drd_edit_status');
			$ctrl_drd_duration = $this->input->post('ajx_drd_edit_duration');
			$ctrl_drd_doc_delete  = $this->input->post('doc_deletearray');
			
			log_message('info',"ctrl_drd_ad_id = ".$ctrl_drd_ad_id);
			log_message('info',"File Name = ".$ctrl_drd_image);
			
			$ctrl_drd_new_file = substr($ctrl_drd_image, 0, strrpos($ctrl_drd_image, '.'));		
			$ctrl_drd_new_file_name = $ctrl_drd_new_file.$this->ctrl_drd_current_date;
			
			$ctrl_drd_ext = substr($ctrl_drd_image, strrpos($ctrl_drd_image, '.') + 1);
			$ctrl_drd_file = preg_replace('/[^A-Za-z0-9-\-]/', '',$ctrl_drd_new_file_name);
			$ctrl_drd_file_name = $ctrl_drd_file. '.' . $ctrl_drd_ext;
			
			$ctrl_drd_file_type = 'png|jpg|jpeg';
			$ctrl_drd_folder_path = FCPATH.'uploads/ads';
			
		
				if(is_dir($ctrl_drd_folder_path))
				{
					$ctrl_drd_file_path = './uploads/ads/';
										
					if(isset($_FILES['txtEditFileNam']['name']) && $_FILES['txtEditFileNam']['name']!="")
					{		
						log_message('info',"Inside if Image = ".$ctrl_drd_full_file_path);
						$ctrl_drd_full_file_path = 'uploads/ads/'.$ctrl_drd_file_name;
					} else {
						log_message('info',"Inside if Span = ".$ctrl_drd_full_file_path);
						$ctrl_drd_full_file_path = $ctrl_drd_img_span;
					} 
					log_message('info',"Full File Path = ".$ctrl_drd_full_file_path);
					//Get Advertisement details for selected id
					$ctrl_drd_get_file = $this->Advertisements->findByPrimaryKey($ctrl_drd_ad_id);
					log_message('info',"picture_path = ".$ctrl_drd_get_file['ADD_PICTURE_PATH']);
					
					if($ctrl_drd_get_file) 
					{
						log_message('info',"Inside If");
						if($ctrl_drd_get_file['ADD_PICTURE_PATH'] == $ctrl_drd_full_file_path) 
						{
							$ctrl_drd_ins_upt_data = array(
								'UPDATE_BY' =>$this->session_drd_email_id,
								'UPDATE_DATE' =>$this->ctrl_drd_current_date,
								'ADVERTISER' => $ctrl_drd_advertiser,
								'ADD_PICTURE_PATH'=> $ctrl_drd_full_file_path,	
								'BANNER_URL'=> $ctrl_drd_url,
								'AD_START_DATE'=> $ctrl_drd_srt_date,				 			 
								'AD_IMP_COUNT'=> 0,				 			 
								'AD_CLICK_COUNT'=> 0,				 			 
								'AD_DURATION'=> $ctrl_drd_duration,				 			 
								'ACTIVE_STATUS'=> $ctrl_drd_status,
							) ;
							// Update Advertisement Data
							log_message('info',"Before Advertisement Update");

							$ctrl_drd_ad_update = $this->Advertisements->update($ctrl_drd_ins_upt_data,array('ID'=>$ctrl_drd_ad_id));
							
							if($ctrl_drd_ad_update)
							{
								log_message('info',"Ad Update Success");
								$ctrl_drd_msg_insert = array( 'message' => $this->lang->line('m_90004'));
								echo json_encode($ctrl_drd_msg_insert);
								return;
							}
							else
							{
								//unlink file from folder 
								$ctrl_drd_file_nam = 'uploads/ads/'.$ctrl_drd_file_name;
								unlink(FCPATH."/".$ctrl_drd_file_nam);
								log_message('info',"Update Failed");
								$ctrl_drd_msg_Insert_failed = array( 'message' => $this->lang->line('m_90008'));
								echo json_encode($ctrl_drd_msg_Insert_failed);
								return;
							}
						} 
						else 
						{
							if (file_exists($ctrl_drd_full_file_path)) 
							{
								log_message('info',"File already exits");
								log_message('info',"inside upload else file does not moved to the folder"); //for log msg
								$ctrl_drd_file_exists = array( 'message' => $this->lang->line('m_90530'));
								echo json_encode($ctrl_drd_file_exists);
								return;
							} 
							else 
							{
								$ctrl_drd_upload_file = $this->fileupload->uploadfile($ctrl_drd_file_path,$ctrl_drd_file_name,$ctrl_drd_file_type);  // pass fileupload			
								if(count($ctrl_drd_doc_delete)>=1)
								{
									$ctrl_drd_doc_delete_array = array();
									foreach(json_decode($ctrl_drd_doc_delete) as $doc_delete)
									{
										$file_path = FCPATH."/".$doc_delete->FilePath;
										log_message('info','File'.$file_path);
										if(is_file($file_path)) 
										{
											$file_delete= unlink($file_path);// delete file
											log_message('info','file_delete '.print_r($file_delete,TRUE));
											if($file_delete)
											{
												log_message('info','File removed Successfully');
											}
											else
											{
												log_message('info','File removed Fail');
											}
										}
									}				
								}

								log_message('info' ,'Before Upload ='.$ctrl_drd_file_name);
								log_message('info',"GET folder path".$ctrl_drd_folder_path);
								log_message('info',"GET file path".$ctrl_drd_full_file_path);
								if($ctrl_drd_upload_file->upload->do_upload('txtEditFileNam')) 
								{
									log_message('info' ,'After Upload ='.$ctrl_drd_full_file_path);
									log_message('info',"inside upload if file moved to the folder"); //for log msg

									$ctrl_drd_ins_upt_data = array(
										'UPDATE_BY' =>$this->session_drd_email_id,
										'UPDATE_DATE' =>$this->ctrl_drd_current_date,
										'ADVERTISER' => $ctrl_drd_advertiser,
										'ADD_PICTURE_PATH'=> $ctrl_drd_full_file_path,	
										'BANNER_URL'=> $ctrl_drd_url,
										'AD_START_DATE'=> $ctrl_drd_srt_date,				 			 
										'AD_IMP_COUNT'=> 0,				 			 
										'AD_CLICK_COUNT'=> 0,				 			 
										'AD_DURATION'=> $ctrl_drd_duration,				 			 
										'ACTIVE_STATUS'=> $ctrl_drd_status,
									) ;
									// Update Advertisement Data
									log_message('info',"Before Advertisement Update");

									$ctrl_drd_ad_update = $this->Advertisements->update($ctrl_drd_ins_upt_data,array('ID'=>$ctrl_drd_ad_id));
									if($ctrl_drd_ad_update)
									{
										log_message('info',"Ad Update Success");
										$ctrl_drd_msg_insert = array( 'message' => $this->lang->line('m_90004'));
										echo json_encode($ctrl_drd_msg_insert);
										return;
									}
									else
									{
										//unlink file from folder 
										$ctrl_drd_file_nam = 'uploads/ads/'.$ctrl_drd_file_name;
										unlink(FCPATH."/".$ctrl_drd_file_nam);
										log_message('info',"Update Failed");
										$ctrl_drd_msg_Insert_failed = array( 'message' => $this->lang->line('m_90008'));
										echo json_encode($ctrl_drd_msg_Insert_failed);
										return;
									}
								}					
								else 
								{
									log_message('info',"inside upload else file doesnot moved to the folder"); //for log msg
									$ctrl_drd_msg_file_moved_err = array( 'message' => $this->lang->line('m_90522'));
									echo json_encode($ctrl_drd_msg_file_moved_err);
									return;
								}
							}
						}					
					}
					else 
					{
						if (file_exists($ctrl_drd_full_file_path)) 
						{
							log_message('info',"File already exits");
							log_message('info',"inside upload else file does not moved to the folder"); //for log msg
							$ctrl_drd_file_exists = array( 'message' => $this->lang->line('m_90530'));
							echo json_encode($ctrl_drd_file_exists);
							return;
						} 
						else 
						{
							$ctrl_drd_upload_file = $this->fileupload->uploadfile($ctrl_drd_file_path,$ctrl_drd_file_name,$ctrl_drd_file_type);  // pass fileupload			
					

							log_message('info' ,'Before Upload ='.$ctrl_drd_file_name);
							log_message('info',"GET folder path".$ctrl_drd_folder_path);
							log_message('info',"GET file path".$ctrl_drd_full_file_path);
							if($ctrl_drd_upload_file->upload->do_upload('txtEditFileNam')) 
							{
								log_message('info' ,'After Upload ='.$ctrl_drd_full_file_path);
								log_message('info',"inside upload if file moved to the folder"); //for log msg

								$ctrl_drd_ins_upt_data = array(
									'UPDATE_BY' =>$this->session_drd_email_id,
									'UPDATE_DATE' =>$this->ctrl_drd_current_date,
									'ADVERTISER' => $ctrl_drd_advertiser,
									'ADD_PICTURE_PATH'=> $ctrl_drd_full_file_path,	
									'BANNER_URL'=> $ctrl_drd_url,
									'AD_START_DATE'=> $ctrl_drd_srt_date,				 			 
									'AD_IMP_COUNT'=> 0,				 			 
									'AD_CLICK_COUNT'=> 0,				 			 
									'AD_DURATION'=> $ctrl_drd_duration,				 			 
									'ACTIVE_STATUS'=> $ctrl_drd_status,
								) ;
								// Update Advertisement Data
								log_message('info',"Before Advertisement Update");

								$ctrl_drd_ad_update = $this->Advertisements->update($ctrl_drd_ins_upt_data,array('ID'=>$ctrl_drd_ad_id));

								if($ctrl_drd_ad_update)
								{
									log_message('info',"Ad Update Success");
									$ctrl_drd_msg_insert = array( 'message' => $this->lang->line('m_90004'));
									echo json_encode($ctrl_drd_msg_insert);
									return;
								}
								else
								{
									//unlink file from folder 
									$ctrl_drd_file_nam = 'uploads/ads/'.$ctrl_drd_file_name;
									unlink(FCPATH."/".$ctrl_drd_file_nam);
									log_message('info',"Update Failed");
									$ctrl_drd_msg_Insert_failed = array( 'message' => $this->lang->line('m_90008'));
									echo json_encode($ctrl_drd_msg_Insert_failed);
									return;
								}
							}					
							else 
							{
								log_message('info',"inside upload else file doesnot moved to the folder"); //for log msg
								$ctrl_drd_msg_file_moved_err = array( 'message' => $this->lang->line('m_90522'));
								echo json_encode($ctrl_drd_msg_file_moved_err);
								return;
							}
						}
					}
				}
				else 
				{
					log_message('info',"Folder Not Available");
					$ctrl_drd_msg_folder_error = array( 'message' => $this->lang->line('m_90531'));
					echo json_encode($ctrl_drd_msg_folder_error);
					return;
				}
			//}
		} //End of Else
		log_message('info' ,'edit_advertisement_data function end');
	} // End of edit_advertisement_data function
	
	/**
	 * This Function Used to Update Advertisement Status
	 * From dd_ads 
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_ad_status() 
	{ 
		log_message('info' ,'update_ad_status Function Start');
		
		// Get the id From Ajax
		$ctrl_drd_ad_id = $this->input->post('ajx_drd_ad_id');
		$ctrl_drd_status = $this->input->post('ajx_drd_ad_status');
		log_message('info' ,'Advertisement_id = '.$ctrl_drd_ad_id);
		log_message('info' ,'ctrl_drd_status = '.$ctrl_drd_status);
		
		//Get Advertisement Status From dd_key_value	
		$ctrl_drd_get_status_id = $this->KeyValue->getKeyvalueId('GENERAL','STATUS',$ctrl_drd_status);
		log_message('info' ,'ctrl_drd_get_status_id = '.$ctrl_drd_get_status_id);
	
		//Assign Values for Update Status
		$ctrl_drd_ins_ads_data = array(
			'UPDATE_BY' =>$this->session_drd_email_id,
			'UPDATE_DATE' =>$this->ctrl_drd_current_date,	 			 
			'ACTIVE_STATUS'=> $ctrl_drd_get_status_id
		);
			
		//Update Status on dd_ads Table
		$ctrl_drd_upt_ad_status = $this->Advertisements->update($ctrl_drd_ins_ads_data,array('ID'=>$ctrl_drd_ad_id));
		
		if($ctrl_drd_upt_ad_status) 
		{
			log_message('info' ,'Advertisement Updated Successfully'); 				
			$ctrl_drd_successful_delete= array(
				'message' => $this->lang->line('m_90004'));					   
			echo json_encode($ctrl_drd_successful_delete);
			return;
		} 
		else 
		{
			log_message('info' ,'Advertisement Delete Failure'); 				
			$ctrl_drd_delete_fail= array(
				'message' => $this->lang->line('m_90008'));					   
			echo json_encode($ctrl_drd_delete_fail);
			return;
		}//End of else	
		log_message('info' ,'update_ad_status Function End');
	}//End of update_ad_status function
	
	/**
	 * This Function Used to Delete Selected Advertisement Record
	 * From dd_ads 
	 *
	 * @access public
	 * @since unknown
	 */
	public function delete_advertisement_data() 
	{ 
		log_message('info' ,'delete_advertisement_data Function Start');
		
		// Get the id From Ajax
		$ctrl_drd_advertisement_id = $this->input->post('ajx_drd_ad_id');
		$ctrl_drd_ad_path= $this->Advertisements->findByPrimaryKey($ctrl_drd_advertisement_id); /* Functionality Added by Rajee june 26 2018 */
		
		log_message('info' ,'Ad file Path = '.$ctrl_drd_ad_path['ADD_PICTURE_PATH']);
		log_message('info' ,'Advertisement_id = '.$ctrl_drd_advertisement_id);
			
			//Delete Record from dd_ads Table
			$ctrl_drd_dlt_ad = $this->Advertisements->deleteByPrimaryKey(array('ID'=>$ctrl_drd_advertisement_id));
			
			if($ctrl_drd_dlt_ad) 
			{
				//unlink file from folder 
				$ctrl_drd_file_path = $ctrl_drd_ad_path['ADD_PICTURE_PATH'];
				unlink(FCPATH."/".$ctrl_drd_file_path);
				log_message('info' ,'Advertisement Deleted Successfully'); 				
				$ctrl_drd_successful_delete= array(
                    'message' => $this->lang->line('m_90007'));					   
	            echo json_encode($ctrl_drd_successful_delete);
				return;
			} 
			else 
			{
				log_message('info' ,'Advertisement Delete Failure'); 				
				$ctrl_drd_delete_fail= array(
                    'message' => $this->lang->line('m_90008'));					   
	            echo json_encode($ctrl_drd_delete_fail);
				return;
			}//End of else					
				
		log_message('info' ,'delete_advertisement_data Function End');
	}//End of delete_advertisement_data function
	

	/**
	 * Function For Url Regex Validation
	 *
	 * @access public
	 * @since unknown
	 */
	public function checkUrlRegex($fieldValue) 
	{
		log_message('info' ,'url patern validation Function Start');
		if (preg_match('/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&=]*)/', $fieldValue ) ) 
		{
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}// End of else
		log_message('info' ,'url patern validation Function End');
	}// End of checkUrlRegex function
	
}// End of Class