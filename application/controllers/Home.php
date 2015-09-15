<?php 
/**
* Home-frontend
*/
class Home extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		
		$data['title'] = 'frontend - home';
		$this->load->view('frontend/layout/header',$data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/layout/footer');

	}
}

?>