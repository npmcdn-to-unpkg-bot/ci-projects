<?php 
/**
* news - backend
*/
class News extends Backend_Controller
{
	public function __construct() {
		parent::__construct();
		$this->loginControl();
	}

	public function index(){
		echo "backend news";
	}

}
?>