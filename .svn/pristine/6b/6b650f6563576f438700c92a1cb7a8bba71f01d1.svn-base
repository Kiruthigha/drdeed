<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diplomate_faq_controller extends CI_Controller {
		/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Diplomate_faq_controller
	 *	- or -
	 * 		http://example.com/index.php/Diplomate_faq_controller/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/Diplomate_faq_controller
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Diplomate_faq_controller/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();
	}

	/**
	 * This function used to show the diplomate Program page
	 *
	 * @access public
	 * @since unknown
	 */
	public function view_diplomate_faq() 
	{
		log_message('info',"view_diplomate_faq function Start here");
		// get dd FAQ content from content master
		

	
		$faq_status = $this->KeyValue->getKeyvalueId('GENERAL','STATUS','ACTIVE');

		$faq_list = $this->DiplomateFAQ->listWhere(array("FAQ_STATUS"=>$faq_status),"PRIORITY_NUMBER");	
	
		$ctrl_drd_return_data['faq_list'] = $faq_list;
		
		
		//get About content and benefits content
		$about_content_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DIPLOMATE_ABOUT');
		$benefits_content_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DIPLOMATE_BENEFITS');
		$diplomate_banner_id = $this->KeyValue->getKeyvalueId('PAGE','CONTENT','DASHBOARD_DIPLOMATE_BANNER');
		$crtl_about_data = $this->ContentMaster->findByUniqueKey($about_content_id);
		$crtl_benefits_data = $this->ContentMaster->findByUniqueKey($benefits_content_id);
		$crtl_banner_data = $this->ContentMaster->findByUniqueKey($diplomate_banner_id);

		$ctrl_drd_return_data['about'] = $crtl_about_data['CONTENT'];
		$ctrl_drd_return_data['benefits'] = $crtl_benefits_data['CONTENT'];
		$ctrl_drd_return_data['banner'] = $crtl_banner_data['CONTENT'];

		
		log_message('info',"ctrl_drd_transaction_data= ".print_r($faq_list,true) );
		$this->load->view('header');
		$this->load->view('topmenu');
		$this->load->view('diplomatefaq',$ctrl_drd_return_data);
		$this->load->view('footer');
		log_message('info',"view_diplomate_faq function Start here");
	}//End of view_diplomate_faq function

}// end of class
?>
