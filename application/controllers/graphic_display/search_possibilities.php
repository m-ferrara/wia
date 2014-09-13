<?php

class Search_possibilities extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('display_model');
		$this->load->model('tag_model');
	}
	
	public function Possibilities_Mapping () {
	$data["SearchPossibilities"] = $this->display_model->tagRelationsObject();
	$this->output->cache((1 * 60 *24 ));
	$this->load->view("WIA-VIEWS/BACK-END/META/Search_Possibilities", $data);	
	
	}
	//Tag_Possibilities_Model.php
	public function Combination_Possibilities () {
	//$data["Tag_Possibilities_Model"] = $this->display_model->Tag_Possibilities_Model();
	$output = $this->display_model->Tag_Possibilities_Model();
	$this->data['output'] = json_encode($output);
	//$this->output->cache((1 * 60 *24 ));
	
	$this->load->view("WIA-VIEWS/BACK-END/json_view", $this->data);		
	
	}
	
	public function create_arrays () {
	$output = $this->display_model->createArray(15, $this->tag_model->get_all());
	$this->data['output'] = json_encode($output);
	//$this->output->cache((1 * 60 *24 ));
	
	$this->load->view("WIA-VIEWS/BACK-END/json_view", $this->data);	
	
	}
}

/*
 * 
 * end of search_possibilities.php
 */