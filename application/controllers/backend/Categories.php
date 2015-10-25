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
		$cat_id = $this->input->get('category');
		var_dump($cat_id);
		echo "<br>";
		$get_categories_list = $this->categories_model->get_categories_list($cat_id);
		var_dump($get_categories_list);

		$this->load->view('backend/layout/header');
		$this->load->view('backend/categories');
		$this->load->view('backend/layout/footer');
	}


	public function categoriesAdd() {

		var_dump($this->input->post());
		exit;
	}
}
?>