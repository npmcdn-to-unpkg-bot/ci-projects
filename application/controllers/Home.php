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
		$this->load->model('frontend/site_settings_model');
		// $data['example'] = $this->themes_model->example();
		// exit;
		$data['header'] = $this->themes_model->get_header();
		$data['footer'] = $this->themes_model->get_footer();
		$sidebar_ = $this->site_settings_model->get_settings_name('home_page_sidebar');
		// echo "<pre>";var_dump($sidebar_);exit;
		$this->load->view('frontend/layout/header',$data);
		
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'leftbar') {
			$this->load->view('frontend/layout/leftbar');
		}
		$this->load->view('frontend/home');
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'rightbar') {
			$this->load->view('frontend/layout/rightbar');
		}

		$this->load->view('frontend/layout/footer',$data);

	}
}

?>