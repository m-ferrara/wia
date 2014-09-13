<?php

class Api extends CI_Controller
{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('valuation_model');
		$this->load->model('citations_model');
		$this->load->model('users_model');
		$this->load->model('comments_model');
		$this->load->model('tagging_model');
	}
	
public function index()
	{
	//$data['logged'] = isLoggedBoolean();	
	$this->load->view('home/index', $data);	
	}
	
    public function user_status()
    {
        $logged_in = $this->users_model->logged_in();
        $data = array(
            'isLoggedIn' => $logged_in,
            'userId' => $logged_in ? $this->session->userdata('userid') : ''
           /* 'userName' => $logged_in ? $this->user_model->get_user()->username : '',
            'userGroup' => $logged_in ? $this->user_model->get_user()->group : '' */
        );
        $this->output->set_header('Content-type: application/json');
        $this->output->set_output(json_encode($data));
    }
}