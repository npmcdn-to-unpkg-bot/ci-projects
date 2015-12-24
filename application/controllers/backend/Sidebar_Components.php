<?php 
/**
* sidebar_components - backend
*/
class Sidebar_Components extends Backend_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->view('backend/layout/header');
		$this->load->view('backend/components/sidebar_components');
		$this->load->view('backend/layout/footer');
	}
}
?>