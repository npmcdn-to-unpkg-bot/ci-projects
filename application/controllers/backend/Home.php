<?php 
/**
* Home-backend
*/
class Home extends Backend_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->loginControl();
		var_dump($this->session->all_userdata());
	}

	public function index() {

		$data['title'] = 'backend home';

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/index');
		$this->load->view('backend/layout/footer');

	}
}
?>