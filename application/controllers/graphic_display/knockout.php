<?php
class Knockout extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();
		//$this->load->model('display_model');
	}


	function index(){
		$data["data"] = $this->display_model->makeObject();
		$this->load->view("knockout/example", $data);
	}
	
	function uniqueTest(){
		$dummyArray = array('email'=>'ferr988@gmail.com');
		$data["data"] = $this->display_model->testValidate( $dummyArray );
		$this->load->view("knockout/validator", $data);
	}
		
	function uniqueTestB(){
		$dummyArray = array('email'=>'ferr98sdsdf8@gmail.com');
		$data["data"] = $this->display_model->testValidate( $dummyArray );
		$this->load->view("knockout/validator", $data);
	}
	
	function routes_generator(){
		$this->load->view("knockout/routes_generator");
	}
	
	function models_generator(){
		$this->load->view("knockout/models_generator");
	}
	
	function controllers_generator(){
		$this->load->view("knockout/controllers_generator");
	}

	function backbone(){
		$this->load->view("backbone/backbone-example");
	}
	
	function backbone_generator(){
		$this->load->view("backbone/backbone_generator");
	}
	
	
	function view_header(){
		$this->load->view("WIA-VIEWS/UI/_header");
	}
}
/*
 *  End of Knockout.php
 */