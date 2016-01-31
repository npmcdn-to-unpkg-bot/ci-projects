<?php 
/**
* banner_management
*/
class Banner_Management extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}
	
	public function index() {
		$this->load->model('backend/categories_model');
		$cat = $this->categories_model->get_categories();
		$data['category'] = $this->createTree($cat, 0);
		// echo "<pre>";var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/banner/banner_management', $data);
		$this->load->view('backend/layout/footer');
	}

	public function banner_edit() {
		$data = $this->input->get();
		$this->load->model('backend/banner_model');
		$data['banner'] = $this->banner_model->get_banner($this->input->get('target'), $this->input->get('banner_type'));
		// var_dump($data);
		$this->load->view('backend/layout/header');
		$this->load->view('backend/banner/banner_edit',$data);
		$this->load->view('backend/layout/footer');
	}

	public function banner_add() {
		if ($this->input->post()) {
			$this->load->model('backend/banner_model');
			foreach ($_FILES as $key => $value) {
				$_POST[$key] = $key;
				$images[$key] = $value;
			}
			$data = $this->input->post();
			// var_dump($this->input->post());exit;
			// form_validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('banner_type','','trim|required');
			$this->form_validation->set_rules('target','','trim|required');
			$this->form_validation->set_rules('image','','trim|callback_image_max_size|callback_image_ext');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('backend/layout/header');
				$this->load->view('backend/banner_management',$data);
				$this->load->view('backend/layout/footer');
			} else {
				$this->banner_model->banner_add($images);
				$this->session->set_flashdata('success','banner eklendi.');
				redirect('backend/banner_management/banner_edit?target='.$this->input->post('target').'&banner_type='.$this->input->post('banner_type'));
			}	
		} else {
			redirect('backend/banner_management');
		}
	}

	public function banner_delete() {
		$this->load->model('backend/banner_model');
		$this->banner_model->banner_delete();
		$this->session->set_flashdata('errors','banner silindi.');
		redirect('backend/banner_management/banner_edit?target='.$this->input->post('target').'&banner_type='.$this->input->post('banner_type'));
	}

	public function banner_move() {
		$this->load->model('backend/banner_model');
		$this->banner_model->banner_move();
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

	public function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

		$tree = "";
		foreach ($array as $category) {
			if ($currentParent == $category->parent_id) {
				if ($currLevel > $prevLevel) $tree .= "<ul>";
				if ($currLevel == $prevLevel) $tree .= "</li>";
				($category->status == 1)?$status = 'active':$status = 'passive';
				$tree .= '<li><label><input type="radio" name="target" value="'.$category->id.'">'.$category->name.'</label>';
				if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
				$currLevel++;
				$tree .= $this->createTree($array, $category->id, $currLevel, $prevLevel);
				$currLevel--;
			}
		}
		if ($currLevel == $prevLevel) $tree .= "</li></ul>";

		return $tree;
	}
}
?>