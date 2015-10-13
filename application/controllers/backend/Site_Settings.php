<?php 
/**
* backend - Site_Settings
*/
class Site_Settings extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}

	public function index() {

		$this->load->view('backend/layout/header');
		$this->load->view('backend/site_Settings');
		$this->load->view('backend/layout/footer');
	}
}
?>