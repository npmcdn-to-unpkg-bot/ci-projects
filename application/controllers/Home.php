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
		$this->load->model('frontend/site_settings_model');
		$this->load->model('frontend/sidebar_model');
		$this->load->model('frontend/showcase_model');
		$this->load->model('frontend/blog_model');
		$this->load->model('frontend/banner_model');
		// header - footer
		$data['header'] = $this->themes_model->get_header();
		$data['footer'] = $this->themes_model->get_footer();
		// bloklar
		$sidebar_ = $this->site_settings_model->get_settings_name('home_page_sidebar');
		// vitrinler
		$showcase_ = $this->showcase_model->get_showcase_homepage();
		foreach ($showcase_ as $key => $value) {
			if ($value->themes_id == 0) {
				$get_themes = $this->themes_model->get_themes_area($value->themes_area_id);	
			} else {
				$get_themes = $this->themes_model->get_themes($value->themes_id);
			}
			$value->file_path = $get_themes[0]->file_path;
			$bts = $this->showcase_model->get_blog_to_showcase($value->id);
			if (isset($bts)) {
				foreach ($bts as $bts_key => $bts_value) {
					if ($bts_value->themes_id == 0) {
						$bts_views = $this->themes_model->get_themes_area($bts_value->themes_area_id);	
					} else {
						$bts_views = $this->themes_model->get_themes($bts_value->themes_id);
					}
					$bts_value->file_path = $bts_views[0]->file_path;
					$get_blog_ = $this->blog_model->get_blog_to_showcase($bts_value->blog_id);
					foreach ($get_blog_[0] as $get_blog_key => $get_blog_value) {
						$bts_value->$get_blog_key = $get_blog_value;
					}
					$value->blog[$bts_key] = $bts_value;
				}
			} else {
				$blog_errors = array('file_path' => 'themes/blog/views/blog_errors.php' );
				$value->blog = array((object)$blog_errors);
			}
			$data['showcase'][$key] = $value;
		}
		// bannerlar
		$data['slider'] = $this->banner_model->get_banner('slide','home');
		$data['banner'] = $this->banner_model->get_banner('banner','home');

		echo "<pre>";var_dump($sidebar_);var_dump($data);exit;

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

		$this->load->view('frontend/home',$data);

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