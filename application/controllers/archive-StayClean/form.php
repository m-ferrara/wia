<?php

class Form extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('knockout\myform');
		}
		else
		{
			$this->load->view('knockout\formsuccess');
		}
	}
}
?>