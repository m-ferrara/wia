<?php
class Citations extends CI_Controller 
{
	public $data;
	function __construct() 
	{
		parent::__construct();
		$this->load->model('valuation_model');
		$this->load->model('linkages_model');
		$this->load->model('');
	}
	
	public function index() {
		$data['title'] = 'Citation Dashboard Home';
		$data['valuations'] = $this->valuation_model->valuations_list();
		
		$this->load->view('templates/template_top', $data);
		$this->load->view('valuation_dashboard', $data);
		$this->load->view('templates/template_bottom');
	}
	

	
}

/* end of Citations Controller Class */