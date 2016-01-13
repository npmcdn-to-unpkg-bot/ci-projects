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
		$get_dir = FCPATH.'assets/uploads';
		if ($this->input->get('dir')) {
			$get_dir = $this->input->get('dir');
		}
		$this->load->model('backend/files_management_model');
		$dir = $this->files_management_model->get_dir_model($get_dir);
		$data['folders'] = array();
		$data['files'] = array();
		if (!empty($dir)) {
			foreach ($dir as $key => $value) {
				if ($key != 'system') {
					$dir_ = $get_dir.'/'.$key;
					if (is_file($dir_)) {
						$data['files'][$key] = (object)$value;
					} 
					if (is_dir($dir_)) {
						$data['folders'][$key] = (object)$value;
					}
				}
				// $relative_path = $value['relative_path'];
				// $data['relative_path'] = $value['relative_path'];
				$relative_path = str_replace("\\", "/", $value['relative_path']);
				$data['relative_path'] = str_replace("\\", "/", $value['relative_path']);
			}
		} else {
			// $relative_path = $get_dir;
			// $data['relative_path'] = $get_dir;
			$relative_path = str_replace("\\", "/", $get_dir);
			$data['relative_path'] = str_replace("\\", "/", $get_dir);
		}
		$fcpath = str_replace("\\", "/", FCPATH);
		// $relative_path = explode(FCPATH, $relative_path);
		$relative_path = explode($fcpath, $relative_path);
		$relative_path = explode('/', $relative_path[1]);
		$breadcrumb = '';
		foreach($relative_path as $l){
			$breadcrumb .= $l;
			if ($l != 'assets') {
				$data['breadcrumb'][$l] = (object)array(
					// 'crumb' => FCPATH.$breadcrumb,
					'crumb' => $fcpath.$breadcrumb,
					'bread' => $l
				);
			}
			$breadcrumb .= '/';
		}
		// echo"<pre>";var_dump($data);exit;
		$this->load->view('backend/layout/header');
		$this->load->view('backend/files_management',$data);
		$this->load->view('backend/layout/footer');
	}

	public function folders_add() {
		// var_dump($this->input->post());exit;
		$make_dir = $this->input->post('relative_path').'/'.$this->input->post('folder');
		if(file_exists($make_dir)) {
			$this->session->set_flashdata('errors',$this->input->post('folder').' adlı klasör vardır.');
			redirect('backend/files_management?dir='.$this->input->post('relative_path'));
		} else {
			if ($make_dir) {
				$old_umask = umask(0);
				$make_dir = mkdir($this->input->post('relative_path').'/'.$this->input->post('folder'),0777);
				umask($old_umask);
				$this->session->set_flashdata('success','klasör eklendi.');
				redirect('backend/files_management?dir='.$this->input->post('relative_path'));
			} else {
				$this->session->set_flashdata('errors','klasör eklenemedi.');
				redirect('backend/files_management?dir='.$this->input->post('relative_path'));
			}
		}
	}

	public function folders_delete() {
		$delete_dir = $this->input->get('dir');
		if(!file_exists($delete_dir)) {
			$this->session->set_flashdata('errors',$this->input->post('folder').' adlı klasör yoktur.');
			redirect('backend/files_management?dir='.$this->input->post('relative_path'));
		} else {
			if ($delete_dir) {
				rmdir($this->input->get('dir'));
				$this->session->set_flashdata('success','klasör silindi.');
				redirect('backend/files_management?dir='.$this->input->post('relative_path'));
			} else {
				$this->session->set_flashdata('errors','klasör silinemedi.');
				redirect('backend/files_management?dir='.$this->input->post('relative_path'));
			}
		}
	}

	public function files_add() {
		foreach ($_FILES as $key => $value) {
			$_POST[$key] = $key;
			$images[$key] = $value;
		}
		var_dump($this->input->post());exit;
	}

}
?>