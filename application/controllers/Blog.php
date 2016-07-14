<?php 
/**
* Blog - frontend
*/
class Blog extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/site_settings_model');
		$restrict_ = $this->site_settings_model->get_settings_name('blog_restrict_roaming');
		if ($restrict_[0]->settings_value == 'enable') {
			$this->loginControl();
		}
		// var_dump($this->session->all_userdata());
	}

	public function index($blog_id) {
		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/sidebar_model');
		$this->load->model('frontend/showcase_model');
		$this->load->model('frontend/blog_model');
		// header - footer - blog -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['blog'] = $this->themes_model->get_themes_class_name('blog_views');
		// blog_value
		$blog_value = $this->blog_model->get_blog($blog_id);
		$data['blog_value'] = $blog_value[0];
		// blog_quick_link
		$blog_qlink = $this->blog_model->get_quick_link();
		$data['blog_qlink'] = $blog_qlink;
		// blog_page_passive_footer
		$passive_footer_ = $this->site_settings_model->get_settings_name('blog_page_passive_footer');
		$passive_footer = $passive_footer_[0];
		// bloklar
		$sidebar_ = $this->site_settings_model->get_settings_name('blog_page_sidebar');
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'leftbar') {
			$data['sidebar_leftbar'] = $this->themes_model->get_themes_class_name('sidebar_leftbar');
			$leftbar = $this->sidebar_model->get_leftbar();
			foreach ($leftbar as $key => $value) {
				$get_themes = $this->themes_model->get_themes($value->themes_id);
				$value->file_path = $get_themes[0]->file_path;
				$data['leftbar'][$key] = $value;
			}
		}
		if ($sidebar_[0]->settings_value == 'sidebar' || $sidebar_[0]->settings_value == 'rightbar') {
			$data['sidebar_rightbar'] = $this->themes_model->get_themes_class_name('sidebar_rightbar');
			$rightbar = $this->sidebar_model->get_rightbar();
			foreach ($rightbar as $key => $value) {
				$get_themes = $this->themes_model->get_themes($value->themes_id);
				$value->file_path = $get_themes[0]->file_path;
				$data['rightbar'][$key] = $value;
			}
		}
		// vitrinler
		$showcase_ = $this->showcase_model->get_showcase_blog($blog_id);
		if ($showcase_) {
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
		}
		// echo "<pre>";var_dump($data);exit;
		$this->load->view('frontend/layout/header',$data);
		$this->load->view('frontend/blog',$data);
		if ($passive_footer->settings_value !== 'passive_footer') {
			$this->load->view('frontend/layout/footer',$data);
		}
	}

}

?>