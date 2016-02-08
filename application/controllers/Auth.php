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

 		$data['title'] = 'login page';
 		$data['sessions'] = $this->session->userdata('login');

 		$this->form_validation->set_rules('username','Username','required|trim');
 		$this->form_validation->set_rules('password','Password','required|trim');

 		if ($this->form_validation->run() == false) {
 			
 			
 			$this->load->view('frontend/auth/login',$data);
 			

 		} else {

 			$username = $this->input->post('username');
 			$password = $this->input->post('password');

 			if ($username == 'huseyindol' && $password == '1234') {
 				$this->session->set_userdata('login',true);
 				
 				$data['sessions'] = $this->session->userdata('login');
 				
	 			$this->load->view('frontend/auth/login',$data);
	 			
 			} else {
 				
 			$this->load->view('frontend/auth/login',$data);
 			
 			}
 			// redirect(base_url());
 			
 		}

 	}
 } 

 ?>