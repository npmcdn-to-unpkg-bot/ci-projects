<?php 
/**
 * Users - frontend
 */
 class Users extends Frontend_Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->loginControl();
		var_dump($this->session->all_userdata());
 	}

 	public function index() {
 		
 	}

 	public function myinfo() {
 		$this->load->model('frontend/themes_model');
		$this->load->model('frontend/site_settings_model');
		$this->load->model('frontend/users_model');
		// header - footer - myinfo -> file_path
		$data['header'] = $this->themes_model->get_themes_class_name('header');
		$data['footer'] = $this->themes_model->get_themes_class_name('footer');
		$data['myinfo'] = $this->themes_model->get_themes_class_name('myinfo');

		$get_users_ = $this->users_model->get_users();
		$data['get_users'] = $get_users_[0];
		$data['city'] = $this->city();

		$this->load->view('frontend/layout/header',$data);
		$this->load->view('frontend/myinfo',$data);
		$this->load->view('frontend/layout/footer',$data);
 	}

 	public function changemypassword() {

 	}

 } 

 ?>