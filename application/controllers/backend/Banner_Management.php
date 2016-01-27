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
		echo "var_dump : ";var_dump($this->input->post());
		$data = $this->input->post();
		$this->load->model('backend/banner_model');
		$data['banner'] = $this->banner_model->get_banner($this->input->post('target'), $this->input->post('banner_type'));
		echo "banner : ";var_dump($data);
		$this->load->view('backend/layout/header');
		$this->load->view('backend/banner/banner_edit',$data);
		$this->load->view('backend/layout/footer');
	}

	public function banner_add() {
		foreach ($_FILES as $key => $value) {
			$_POST[$key] = $key;
			$images[$key] = $value;
		}
		var_dump($this->input->post());exit;
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