<?php
/**
* files_management-backend
*/
class Files_Management extends Backend_Controller
{
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index() {
		$get_dir = 'assets/uploads';
		$this->load->model('backend/files_management_model');
		$dir = $this->files_management_model->get_dir_model($get_dir);
		$data['folders'] = array();
		$data['files'] = array();
		foreach ($dir as $key => $value) {
			if ($key != 'system') {
				$isfile = explode(".", $key);
				if (count($isfile)>1) {
					$data['files'][$key] = (object)$value;
				} else {
					$data['folders'][$key] = (object)$value;
				}	
			}
		}
		// echo"<pre>";var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/files_management',$data);
		$this->load->view('backend/layout/footer');
	}
}
?>