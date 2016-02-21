<?php  
/**
* Themes_Variables_Model
*/
class Themes_Variables_Model extends CI_Model
{
	
	function header() {

		$this->db->where('settings_name','site_logo');
		$db_site_logo = $this->db->get('site_settings');
		$db_site_logo = $db_site_logo->result();
		return $themes_variables = array(
			'logo' => '<img src="'.$db_site_logo[0]->settings_value.'" />',
			'kategoriler' => '<li class="kat_01"><a href="">beyaz eşya</a></li>
				<li class="kat_02"><a href="">elektronik</a></li>
				<li class="kat_03">
					<a href="">bilgisayar</a>
					<ul class="submenu">
						<li class="kat_04"><a href="">masa üstü</a></li>
						<li class="kat_05"><a href="">laptop</a></li>
					</ul>
				</li>',
			'kullanıcı adı' => '<?php echo $this->session->userdata("frontend_username") ?>'
		);
	}

	function footer() {
		return $themes_variables = array(
			'footer logo' => '<img src="assets/uploads/images/logo.png" />'
		);
	}

	function showcase_frame() {
		return $themes_variables = array(
			'vitrin başlık' => '<?php echo $showcase_value->title ?>',
			'vitrin içerik' => '<?php echo $showcase_value->content ?>',
			'blog listele' => '<?php foreach ($showcase_value->blog as $blog_key => $blog_value): ?><?php include(APPPATH.$blog_value->file_path); ?><?php endforeach ?>'
		);
	}

	function blog_views() {
		return $themes_variables = array(
			'sayfa link(perma)' => '<?php echo $blog_value->perma_link ?>',
			'sayfa link' => '<?php echo $blog_value->pages_link ?>',
			'sayfa başlık' => '<?php echo $blog_value->list_title ?>',
			'sayfa resim' => '<img src="<?php echo $blog_value->list_image ?>" />',
			'sayfa içerik' => '<?php echo $blog_value->list_content ?>'
		);
	}

	function sidebar_frame() {
		return $themes_variables = array(
			'bileşen başlık' => '<?php echo $sidebar_value->title ?>',
			'bileşen içerik' => '<?php echo $sidebar_value->content ?>'
		);
	}

	function home() {
		return $themes_variables = array(
			'slider' => '<?php if (isset($slider)) { require(APPPATH.$slider_themes[0]->file_path); } ?>',
			'banner' => '<?php if (isset($banner)) { require(APPPATH.$banner_themes[0]->file_path); } ?>',
			'vitrin' => '<?php foreach ($showcase as $showcase_key => $showcase_value) { include(APPPATH.$showcase_value->file_path); } ?>',
		);
	}

	function slider() {
		return $themes_variables = array(
			'slider' => '<?php foreach ($slider as $slider_key => $slider_value): ?>',
			'slider link' => '<?php echo $slider_value->link ?>',
			'slider alt_text' => '<?php echo $slider_value->alt_text ?>',
			'slider resim' => '<?php echo $slider_value->image ?>',
			'/slider' => '<?php endforeach ?>'
		);
	}

	function banner() {
		return $themes_variables = array(
			'banner' => '<?php foreach ($banner as $banner_key => $banner_value): ?>',
			'banner link' => '<?php echo $banner_value->link ?>',
			'banner alt_text' => '<?php echo $banner_value->alt_text ?>',
			'banner resim' => '<?php echo $banner_value->image ?>',
			'/banner' => '<?php endforeach ?>'
		);
	}

	function login() {
		return $themes_variables = array(
		);
	}

	function register() {
		return $themes_variables = array(
		);
	}
}
?>