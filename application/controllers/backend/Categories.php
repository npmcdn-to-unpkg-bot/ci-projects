<?php 
/**
* backend - Categories
*/
class Categories extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}

	public function index() {

		$this->load->view('backend/layout/header');
		$this->load->view('backend/categories');
		$this->load->view('backend/layout/footer');
	}
}
?>