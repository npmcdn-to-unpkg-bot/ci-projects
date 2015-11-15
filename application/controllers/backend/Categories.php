<?php 
/**
* backend - Categories
*/
class Categories extends Backend_Controller
{
	
	public function __construct() {

		parent::__construct();
		$this->loginControl();
	}

	public function index() {

		$this->load->model('categories_model');
		$cat = $this->categories_model->get_categories_list();
		$data['category'] = $this->createTree($cat, 0);

		$this->load->view('backend/layout/header');
		$this->load->view('backend/categories',$data);
		$this->load->view('backend/layout/footer');
	}

	public function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

		$tree = "";
		foreach ($array as $category) {
			if ($currentParent == $category->parent_id) {
				if ($currLevel > $prevLevel) $tree .= "<ul>";
				if ($currLevel == $prevLevel) $tree .= "</li>";
				$tree .= "<li><span>".$category->name."</span>";
				$tree .= '<a href="javascript:;" data-toggle="modal" data-target="#categoriesAdd" class="fa fa-plus fa-fw modalCategoriesAdd" rel="'.$category->id.'"><span rel="'.$category->name.'"></span></a> 
                        <a href="javascript:;" data-toggle="modal" data-target="#categoriesDelete" class="fa fa-trash fa-fw modalCategoriesDelete" rel="'.$category->id.'"><span rel="'.$category->name.'"></span></a>
                        <a href="javascript:;" class="fa fa-external-link fa-fw categoriesLinker" rel="'.$category->id.'"></a><code class="cat_link" style="display:none;">'.$category->cat_link.'</code>';
				if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
				$currLevel++;
				$tree .= $this->createTree($array, $category->id, $currLevel, $prevLevel);
				$currLevel--;
			}
		}
		if ($currLevel == $prevLevel) $tree .= "</li></ul>";

		return $tree;
	}

	public function categoriesAdd() {

		$this->load->model('categories_model');

		if ($this->input->post()) {
			foreach ($_FILES as $key => $value) {
				$_POST[$key] = $key;
				$images[$key] = $value;
			}
			$this->load->library('form_validation');
			// form validation
			$this->form_validation->set_rules('name','Kategori Adını Giriniz','trim|required');
			$this->form_validation->set_rules('image','','trim|callback_image_max_size|callback_image_ext|callback_image_upload_path');
			$this->form_validation->set_rules('banner','','trim|callback_image_max_size|callback_image_ext|callback_image_upload_path');
			if ($this->form_validation->run() === FALSE) {

				$data['add_stream_name'] = $this->input->post('name');
				$data['add_stream_description'] = $this->input->post('description');
				$data['add_stream_queue'] = $this->input->post('queue');
				$data['add_stream_list_layout'] = $this->input->post('list_layout');
				$data['add_stream_status'] = $this->input->post('status');
				$data['add_stream_meta_title'] = $this->input->post('meta_title');
				$data['add_stream_meta_description'] = $this->input->post('meta_description');
				$data['add_stream_meta_keyword'] = $this->input->post('meta_keyword');

				$this->session->set_flashdata('add_stream_errors','add_stream_errors');
				$cat = $this->categories_model->get_categories_list();
				$data['category'] = $this->createTree($cat, 0);
				$this->load->view('backend/layout/header');
				$this->load->view('backend/categories',$data);
				$this->load->view('backend/layout/footer');
			} else {

				$this->categories_model->add_categories($images);
				redirect('backend/categories');
			}
		} else {

			redirect('backend/categories');
		}
	}

	public function categoriesDelete() {
		
		$this->load->model('categories_model');
		$this->categories_model->delete_categories($this->input->post('id'));
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