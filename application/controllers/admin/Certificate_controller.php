<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/view_certificates
	 *	- or -
	 * 		http://example.com/index.php/view_certificates/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/view_certificates
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/view_certificates/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $session_Userid = null; // To Assign Public variable
	public $session_Useremail = null; // To Assign Public variable
	public $current_date = null; // To Assign Public variable
	
	public function __construct() 
	{
		parent::__construct();
		
		/* To get session UserId,EmailId and declare public variables */
		$this->session_Userid  = $this->session->userdata('drd_userId');  
		$this->session_Useremail = $this->session->userdata('drd_userEmail');
		$this->current_date = date("Y-m-d H:i:s"); // Set Date Format 	
	}
	public function admin_certificates() 
	{
		log_message("info","admin_certificates Function Start");
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$certificates_merge = [];
		
		/*Get  All Certificates from usercoursecertificates model */
		$ctrl_drd_get_certificates  = $this->UserCourseCertificate->getallcertificates();
		log_message("info","Certificate list ".print_r($ctrl_drd_get_certificates,TRUE));
		
		foreach($ctrl_drd_get_certificates as $ctrl_drd_get_certificates)		
		{
			if($ctrl_drd_get_certificates['COMPLETE_DATE'])
			{			
				if($ctrl_drd_get_certificates['CERTIFICATE_ARCHIVE']  == 'Y')
				{
					$archive_array[]= $ctrl_drd_get_certificates;
				}
				else
				{
					$download_array[]= $ctrl_drd_get_certificates;
				}
			}
		}
		$ctrl_drd_data['archive_certificates']=$archive_array;
		$ctrl_drd_data['download_certificates']=$download_array;
		$ctrl_drd_data['total_certificate']=count($archive_array)+count($download_array);
		$ctrl_drd_data['archive_certificate']=count($archive_array);
		$ctrl_drd_data['new_certificate']=count($download_array);
		
		log_message("info","Certificate list ".print_r($ctrl_drd_data,TRUE));
		$this->load->view('admin/admin-certificates',$ctrl_drd_data);
		$this->load->view('admin/footer');		
		log_message("info","admin_certificates Function End");
	}
	
	/**
	 * this Function used to update certificate count from usercourse certificate model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_certificate() {
		log_message('info' ,'update_certificate function start');
		
		/* Store Post Values In variables */		   
		
		$ctrl_drd_fun_name  = $this->input->post('ajx_dl_function');
		
		if(count($this->input->post('ajx_dl_certificateId')) !=0 )
		{
			$where_array = [];
			
			for($i=0;$i<count($this->input->post('ajx_dl_certificateId'));$i++)
			{
				$certificate_id= $this->input->post('ajx_dl_certificateId')[$i];
				if($ctrl_drd_fun_name == 'ARCHIVE')
				{
					log_message('info','update certificate to archive');
					$array_list  = array(
						'UPDATE_BY'=>$this->session_Useremail,
						'UPDATE_DATE'=>$this->current_date,
						'ID'=>$certificate_id,
						'ARCHIVE_DATE'=>$this->current_date,
						'CERTFICATE_ARCHIVE'=>'Y',
					);
					array_push($where_array,$array_list);
					
				}
				else
				{		
					log_message('info','update download count');
					/* Get download count from usercoursecertificate model */
					$ctrl_drd_certificatecount = $this->UserCourseCertificate->findByPrimaryKey($certificate_id);
					$ctrl_drd_count=$ctrl_drd_certificatecount['DOWNLOAD_COUNT'];
					$array_list  = array(
						'UPDATE_BY'=>$this->session_Useremail,
						'UPDATE_DATE'=>$this->current_date,
						'ID'=>$certificate_id,
						'DOWNLOAD_COUNT'=>$ctrl_drd_count+1,
					);
					array_push($where_array,$array_list);
					
				}
			}
			
			$ctrl_drd_update_certificate = $this->db->update_batch('dd_user_course_certificate',$where_array,'ID');
			
			if($ctrl_drd_update_certificate !=0)
			{
				//$this->_download_certificate($this->input->post('ajx_dl_certificateName'));
				log_message('info','UserCourseCertificate update Pass');
				$ctrl_drd_edit_student_data = array(
					'message' => $this->lang->line('m_90004'),
					'message_type'=>$this->lang->line('success'),
				);
				echo json_encode($ctrl_drd_edit_student_data);
				return; 
			}
			else
			{
				log_message('info','UserCourseCertificate update Fail');
				$ctrl_drd_edit_student_data = array(
					'message' => $this->lang->line('m_90008'),
					'message_type'=>$this->lang->line('error'),
				);
				echo json_encode($ctrl_drd_edit_student_data);
				return;
			}
		}		
		log_message('info' ,'update_certificate function End');
	} //End FUnction	
	
	
	/**
	 * this Function used to update certificate count from usercourse certificate model
	 *
	 * @access public
	 * @since unknown
	 */
	public function update_downloadcertificate($id) 
	{
		log_message('info' ,'update_downloadcertificate function start');
		
		/* Store Post Values In variables */		   
		
		$certificate_id=$id;
				
		log_message('info','update download count');
		/* Get download count from usercoursecertificate model */
		$ctrl_drd_certificatecount = $this->UserCourseCertificate->findByPrimaryKey($certificate_id);
		$ctrl_drd_count=$ctrl_drd_certificatecount['DOWNLOAD_COUNT'];
		$where_array  = array(
			'UPDATE_BY'=>$this->session_Useremail,
			'UPDATE_DATE'=>$this->current_date,
			'DOWNLOAD_COUNT'=>$ctrl_drd_count+1,
			'CERTFICATE_ARCHIVE'=>'Y',
		);
		$ctrl_drd_update_certificate = $this->UserCourseCertificate->update($where_array,array('ID'=>$certificate_id));
		
		log_message('info' ,'update_downloadcertificate function End');
		if($ctrl_drd_update_certificate)
		{
			log_message('info','UserCourseCertificate update Pass');
			$ctrl_drd_edit_student_data = array(
				'message' => $this->lang->line('m_90004'),
				'message_type'=>$this->lang->line('success'),
			);
			echo json_encode($ctrl_drd_edit_student_data);
			return;
		}
		else
		{
			log_message('info','UserCourseCertificate update Fail');
			$ctrl_drd_edit_student_data = array(
				'message' => $this->lang->line('m_90008'),
				'message_type'=>$this->lang->line('error'),
			);
			echo json_encode($ctrl_drd_edit_student_data);
			return;
		}
	}
	
	/**
	 * this Function used File Download to zip format
	 *
	 * @access private
	 * @since unknown
	 */
	function _download_certificate($certificate_array) 
	{
		if($certificate_array)
		{
			log_message('info' ,'_download_certificate function start');
			/* log_message('info' ,'_download_certificate function start'.print_r($certificate_array,TRUE));
			
			$zipname = 'file.zip';
			$zip = new ZipArchive;
			$zip->open($zipname, ZipArchive::CREATE);
			foreach ($certificate_array as $file) {
			  $zip->addFile(basename($file));
			}
			$zip->close();
			header('Content-Type: application/zip');
			header('Content-disposition: attachment; filename='.$zipname);
			header('Content-Length: ' . filesize($zipname));
			readfile($zipname);  */		
			$this->load->helper('download');
			for($i=0;$i<$certificate_array;$i++)
			{
				force_download($certificate_array[$i], $data);
			}	
						
		}
		/* log_message('info' ,'_download_certificate function End');
		$ctrl_drd_edit_student_data = array(
			'message' => $this->lang->line('m_90004'),
			'message_type'=>$this->lang->line('success'),
		);
		echo json_encode($ctrl_drd_edit_student_data);
		return; */ 
	} //End FUnction
	
	
}
?>