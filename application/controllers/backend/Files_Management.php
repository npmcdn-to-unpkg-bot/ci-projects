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
		$this->load->helper('file');
		$dir = get_dir_file_info(FCPATH.'assets/uploads/js');
		$data['folders'] = array();
		$data['files'] = array();
		foreach ($dir as $key => $value) {
			$isfile = explode(".", $key);
			if (count($isfile)>1) {
				$data['files'][$key] = $value;
			} else {
				$data['folders'][$key] = $value;
			}
		}
		// echo"<pre>";var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/files_management',$data);
		$this->load->view('backend/layout/footer');
	}
}
?>