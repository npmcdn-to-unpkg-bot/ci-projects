<?php 
/**
* Routes - frontend
*/
class Routes extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		// var_dump($this->session->all_userdata());
	}

	public function index($routes) {
		$this->load->model('frontend/site_settings_model');
		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/sidebar_model');
		$this->load->model('frontend/showcase_model');
		$this->load->model('frontend/blog_model');
		$this->load->model('frontend/categories_model');
		// header - headercategory - footer - categories -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['header_category'] = $this->themes_model->get_themes_class_name('header_category');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		// categories
		$categories = $this->categories_model->get_categories_menu();
		$childs = array();
		foreach($categories as $item) {
		    $childs[$item->parent_id][] = $item;
		}
		foreach($categories as $item) if (isset($childs[$item->id])) {
		    $item->childs = $childs[$item->id];
		}
		$data['categories'] = $childs[0];
		// yonlendirme
		$routes_ = htmlspecialchars(urldecode($routes));
		$categories_route = $this->categories_model->get_perma_link($routes_);
		$blog_route = $this->blog_model->get_perma_link($routes_);

		if ($categories_route) {
			// kategori sayfasi
			$restrict = $this->site_settings_model->get_settings_name('restrict_roaming');
			$restrict_ = $this->site_settings_model->get_settings_name('listing_restrict_roaming');
			if ($restrict_[0]->settings_value == 'enable' && $restrict[0]->settings_value == 'enable') {
				$this->loginControl();
			}
			// kategori sayfasi
			$data['category'] = $this->themes_model->get_themes_class_name('category');
			// banner - slider
			$this->load->model('frontend/banner_model');
			$data['slider_themes'] = $this->themes_model->get_themes_class_name('slider');
			$data['banner_themes'] = $this->themes_model->get_themes_class_name('banner');
			$data['slider'] = $this->banner_model->get_banner('slide','cat_'.$categories_route[0]->id);
			$data['banner'] = $this->banner_model->get_banner('banner','cat_'.$categories_route[0]->id);
			// category_page_passive_footer
			$passive_footer = $this->site_settings_model->get_settings_name('category_page_passive_footer');
			// bloklar
			$sidebar_ = $this->site_settings_model->get_settings_name('category_page_sidebar');
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
			$showcase_ = $this->showcase_model->get_showcase_categories($categories_route[0]->id);
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

			$this->load->view('frontend/layout/head',$data);
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('frontend/categories',$data);
			if ($passive_footer[0]->settings_value !== 'passive_footer') {
				$this->load->view('frontend/layout/footer',$data);
			}
			$this->load->view('frontend/layout/foot',$data);

		} elseif ($blog_route) {
			// blog sayfasi
			$restrict = $this->site_settings_model->get_settings_name('restrict_roaming');
			$restrict_ = $this->site_settings_model->get_settings_name('blog_restrict_roaming');
			if ($restrict_[0]->settings_value == 'enable' && $restrict[0]->settings_value == 'enable') {
				$this->loginControl();
			}
			// blog sayfasi
			$data['blog'] = $this->themes_model->get_themes_class_name('blog_views');
			$data['blog_comments'] = $this->themes_model->get_themes_class_name('blog_comments');
			// blog yorumları
			$this->load->model('frontend/comments_model');
			$data['blog_comments_value'] = $this->comments_model->get_blog_comments($blog_route[0]->id);
			// blog
			$data['blog_value'] = $blog_route[0];
			// blog_quick_link
			$blog_qlink = $this->blog_model->get_quick_link($blog_route[0]->pages_type);
			$data['blog_qlink'] = $blog_qlink;
			// blog_page_passive_footer
			$passive_footer = $this->site_settings_model->get_settings_name('blog_page_passive_footer');
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
			$showcase_ = $this->showcase_model->get_showcase_blog($blog_route[0]->id);
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
			$this->load->view('frontend/layout/head',$data);
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('frontend/blog',$data);
			if ($passive_footer[0]->settings_value !== 'passive_footer') {
				$this->load->view('frontend/layout/footer',$data);
			}
			$this->load->view('frontend/layout/foot',$data);

		} else {
			// hata sayfası
			$this->load->view('frontend/layout/head',$data);
			$this->load->view('frontend/layout/header',$data);
			$this->load->view('errors/index.html');
			$this->load->view('frontend/layout/footer',$data);
			$this->load->view('frontend/layout/foot',$data);

		}
	}
}

?>