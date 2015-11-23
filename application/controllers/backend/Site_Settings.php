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

		if ($this->input->post()) {
			var_dump($this->input->post());
			exit;
		} else {

			$this->load->view('backend/layout/header');
			$this->load->view('backend/site_settings');
			$this->load->view('backend/layout/footer');	
		}
		
	}
}
?>