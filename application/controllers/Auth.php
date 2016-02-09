<?php 
/**
 * auth-frontend
 */
 class auth extends Frontend_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index() {
 		
 	}

 	public function login() {

 		$this->load->helper('form');
 		$this->load->library('form_validation');
 		$this->load->model('frontend/themes_model');
 		// header - footer - home - slider - banner -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['login'] = $this->themes_model->get_themes_class_name('login');

		$this->load->view('frontend/layout/header',$data);
		$this->load->view('frontend/auth/login',$data);
		$this->load->view('frontend/layout/footer',$data);

 	}
 } 

 ?>