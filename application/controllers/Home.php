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
		$this->load->model('frontend/sidebar_model');
		// $data['example'] = $this->themes_model->example();
		// exit;
		$data['header'] = $this->themes_model->get_header();
		$data['footer'] = $this->themes_model->get_footer();
		$sidebar_ = $this->site_settings_model->get_settings_name('home_page_sidebar');
		// echo "<pre>";var_dump($sidebar_);var_dump($data);exit;

		$this->load->view('frontend/layout/header',$data);
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'leftbar') {
			$leftbar = $this->sidebar_model->get_leftbar();
			foreach ($leftbar as $key => $value) {
				$get_themes = $this->themes_model->get_themes($value->themes_id);
				$value->file_path = $get_themes[0]->file_path;
				$leftbar['sidebar'][$key] = $value;
			}
			$this->load->view('frontend/layout/leftbar',$leftbar);
		}
		$this->load->view('frontend/home');
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'rightbar') {
			$rightbar = $this->sidebar_model->get_rightbar();
			foreach ($rightbar as $key => $value) {
				$get_themes = $this->themes_model->get_themes($value->themes_id);
				$value->file_path = $get_themes[0]->file_path;
				$rightbar['sidebar'][$key] = $value;
			}
			$this->load->view('frontend/layout/rightbar',$rightbar);
		}
		$this->load->view('frontend/layout/footer',$data);

	}
}

?>