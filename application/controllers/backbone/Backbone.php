<?php
class Backbone extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();
	//	$this->load->model('display_model');
	}


	function index(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/load"); //, $data);
	}
	
	function login(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/login"); //, $data);
	}
	
	
	function register(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/register"); //, $data);
	}
	
	
	function forgot_password(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/forgot_password"); //, $data);
	}
	
	function change_password(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/change_password"); //, $data);
	}
	
	
	function tags_and_categories(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/tags_and_categories"); //, $data);
	}
	
	function user_profile(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/user_profile"); //, $data);
	}
	
	function article_create(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/article_create"); //, $data);
	}
	
	function article_read(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/article_read"); //, $data);
	}
	
	function user_list_create(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/user_list_create"); //, $data);
	}
	
	function user_list_article_add(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("backbone/user_list_article_add"); //, $data);
	}
	
	function demo(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("demo/demo"); //, $data);
	}
	
}
/*
 *  End of Backbone.php
 */