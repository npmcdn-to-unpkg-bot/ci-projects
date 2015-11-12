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
			}
			$this->load->library('form_validation');
			// form validation
			$this->form_validation->set_rules('name','Kategori Adını Giriniz','trim|required');
			$this->form_validation->set_rules('image','','trim|callback_check_image_rules');
			$this->form_validation->set_rules('banner','','trim|callback_check_image_rules');

			if ($this->form_validation->run() === FALSE) {
				echo "hata var";
				exit;
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
				var_dump($_FILES);
				exit;
				$this->categories_model->add_categories();
				redirect('backend/categories');
			}
		} else {

			redirect('backend/categories');
		}
	}

	public function categoriesDelete() {
		
		var_dump($this->input->post());
		exit;
	}

	public function check_image_rules($image) {

		foreach ($_FILES[$image] as $key => $value) {
			$image_uploads[$key] = $value;
		}
		if (isset($image_uploads['name']) && !empty($image_uploads['name'])) {
			$uploadOk = 1;
			$config = array(
				'is_allowed' => 'jpg|jpeg|png|gif',
				'max_size' => '1048576',
				'upload_path' => FCPATH.'assets/uploads/system/images/'
			);
			$image_is_allowed = explode("|", $config['is_allowed']);
			if (!file_exists($config['upload_path'])) {
				echo "path";
				$image_errors['image_errors_upload_path'] = "hata, klasör yolu: '".$config['upload_path']."' yanlıştır.";
				$uploadOk = 0;
			}
			if ($image_uploads["size"] > $config['max_size']) {
				echo "size";
				$image_errors['image_errors_image_size'] = "hata, dosyanızın boyutu buyuktur."; // $value["size"]." > ".$config['max_size'];
				$uploadOk = 0;
			}
			$image_ext = strtolower(pathinfo($image_uploads['name'], PATHINFO_EXTENSION));
			if (!in_array($image_ext, $image_is_allowed)) {
				$image_errors['image_errors_image_extension'] = "hata, sadece JPG, JPEG, PNG & GIF uzantilara izin verilir."; // $value['name'];
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				return false;
			}
		} else {
			return true;
		}
		return true;
	}
}
?>