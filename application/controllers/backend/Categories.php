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
		$cat = $this->categories_model->get_categories_list($cat_id);
		$this->createTreeView($cat, 0);
		// var_dump($cat);
		$this->load->view('backend/layout/header');
		$this->load->view('backend/categories');
		$this->load->view('backend/layout/footer');
	}


	public function categoriesAdd() {

		var_dump($this->input->post());
		exit;
	}

	function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

		foreach ($array as $categoryId => $category) {

			if ($currentParent == $category->parent_id) {
				echo "önce id:".$category->id;
				echo ", cur:".$currLevel;
				echo ", prev:".$prevLevel;
				echo "<br/>";
				// if ($currLevel > $prevLevel) echo "<ul class='tree'>";

				// if ($currLevel == $prevLevel) echo "</li>";

				// echo '<li> <label for="subfolder2">'.$category->name.', katid :'.$category->id.'</label>';

				if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

				$currLevel++;

				$this->createTreeView($array, $category->id, $currLevel, $prevLevel);

				$currLevel--;
			}
		}
		// if ($currLevel == $prevLevel) echo "</li></ul> ";
	}
}
?>