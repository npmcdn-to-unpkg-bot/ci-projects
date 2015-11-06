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
			
			$this->load->library('form_validation');

			$data['add_stream_name'] = $this->input->input_stream('name');
			$data['add_stream_description'] = $this->input->input_stream('description');
			$data['add_stream_queue'] = $this->input->input_stream('queue');
			$data['add_stream_list_layout'] = $this->input->input_stream('list_layout');
			$data['add_stream_status'] = $this->input->input_stream('status');
			$data['add_stream_meta_title'] = $this->input->input_stream('meta_title');
			$data['add_stream_meta_description'] = $this->input->input_stream('meta_description');
			$data['add_stream_meta_keyword'] = $this->input->input_stream('meta_keyword');

			// form validation
			$this->form_validation->set_rules('name','Kategori Adını Giriniz','trim|required');

			if ($this->form_validation->run() === FALSE) {
				
				$this->session->set_flashdata('add_stream_errors','add_stream_errors');
				
				$cat = $this->categories_model->get_categories_list();
				$data['category'] = $this->createTree($cat, 0);

				$this->load->view('backend/layout/header');
				$this->load->view('backend/categories',$data);
				$this->load->view('backend/layout/footer');
			} else {

				$config['upload_path']          = './assets/uploads/system/images/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1024;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload('image') ) {

					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('add_stream_errors','add_stream_errors');
					$cat = $this->categories_model->get_categories_list();
					$data['category'] = $this->createTree($cat, 0);
					$this->load->view('backend/layout/header');
					$this->load->view('backend/categories',$data);
					$this->load->view('backend/layout/footer');
				} else {

					$success['image'] = array('upload_data' => $this->upload->data());

					if ( !$this->upload->do_upload('banner') ) {

						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('add_stream_errors','add_stream_errors');
						$cat = $this->categories_model->get_categories_list();
						$data['category'] = $this->createTree($cat, 0);
						$this->load->view('backend/layout/header');
						$this->load->view('backend/categories',$data);
						$this->load->view('backend/layout/footer');
					} else {

						$success['banner'] = array('upload_data' => $this->upload->data());
					}
				}

				$this->categories_model->add_categories($success);
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
}
?>