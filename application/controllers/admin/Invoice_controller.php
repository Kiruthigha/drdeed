<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_controller extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/view_invoices
	 *	- or -
	 * 		http://example.com/index.php/view_invoices/
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/Drdeed/index.php/view_invoices
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/view_invoices/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
	}		
	public function invoices() {
		$this->load->view('admin/header');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/invoices');
		$this->load->view('admin/footer');		
	}
	public function user_invoice() {
		$this->load->view('header');		
		$this->load->view('topmenu');
		$this->load->view('userinvoice');
		$this->load->view('footer');	
	}
}
?>