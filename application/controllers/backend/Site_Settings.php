<?php 
/**
* backend - Site_Settings
*/
class Site_Settings extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$this->load->model('site_settings_model');
		if ($this->input->post()) {
			foreach ($_FILES as $key => $value) {
				$_POST[$key] = $key;
				$images[$key] = $value;

			}
			$this->load->library('form_validation');
			// form validation
			$this->form_validation->set_rules('home_page_sidebar','','required');
			$this->form_validation->set_rules('category_page_sidebar','','required');
			$this->form_validation->set_rules('search_page_sidebar','','required');
			$this->form_validation->set_rules('brand_page_sidebar','','required');
			$this->form_validation->set_rules('product_page_sidebar','','required');
			$this->form_validation->set_rules('blog_page_sidebar','','required');
			$this->form_validation->set_rules('blog_page_sidebar','','required');
			$this->form_validation->set_rules('blog_page_sidebar','','required');
			$this->form_validation->set_rules('site_logo','','trim|callback_image_max_size|callback_image_ext|callback_image_upload_path');
			$this->form_validation->set_rules('watermark','','trim|callback_image_max_size|callback_image_ext|callback_image_upload_path');
			if ($this->form_validation->run() === FALSE) {
				
				$data = $this->input->post();
				var_dump($data);
				$this->load->view('backend/layout/header');
				$this->load->view('backend/site_settings',$data);
				$this->load->view('backend/layout/footer');
			} else {
				
				$this->site_settings_model->update_site_settings($images);
				exit;
			}
		} else {

			$site_settings = $this->site_settings_model->get_site_settings();
			$data = array();
			foreach ($site_settings as $key => $value) {
				$data[$value->settings_name] = $value->settings_value;
			}
			var_dump($data);
			$this->load->view('backend/layout/header');
			$this->load->view('backend/site_settings',$data);
			$this->load->view('backend/layout/footer');
		}
		
	}

	public function image_max_size($image) {
		
		if ($_FILES[$image]['size'] > 1048576) {
			$this->form_validation->set_message('image_max_size', 'Kategori {field} hata, dosyanızın boyutu buyuktur.');
			return false;
		}
		return true;
	}

	public function image_ext($image) {

		$config = array(
			'is_allowed' => 'jpg|jpeg|png|gif'
		);
		$image_is_allowed = explode("|", $config['is_allowed']);
		$image_ext = strtolower(pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION));
		if (!empty($_FILES[$image]['name'])) {
			if (!in_array($image_ext, $image_is_allowed)) {
				$this->form_validation->set_message('image_ext', 'Kategori {field} hata, sadece JPG, JPEG, PNG & GIF uzantilara izin verilir.');
				return false;
			}	
		}
		return true;
	}

	public function image_upload_path($image) {

		if (!file_exists(FCPATH.'assets/uploads/system/images/')) {
			$this->form_validation->set_message('image_upload_path', '{field} hata, klasör yolu: "'.FCPATH.'assets/uploads/system/images/" yanlıştır.');
			return false;
		}
		return true;
	}
}
?>