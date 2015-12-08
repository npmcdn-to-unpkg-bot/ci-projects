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

		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/custom_code_model');
		// $data['example'] = $this->themes_model->example();
		// exit;
		$data['header'] = $this->themes_model->get_header();
		$data['footer'] = $this->themes_model->get_footer();
		// echo "<pre>";
		// var_dump($data);
		// exit;
		$this->load->view('frontend/layout/header',$data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/layout/footer',$data);

	}
}

?>