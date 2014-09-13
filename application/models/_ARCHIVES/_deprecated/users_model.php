<?php

class Users_model extends CI_Model {
	var $logged;
	var $users = array();
	
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function users_list() 
	{
	$this->db->get('users');	
	}
	
	function logged_in()
	{
			if ($this->session->userdata("validated")==false) {
				return false;
			} else {
				return true;
			}
	}
	
// ADD USER + INPUT VALIDATION (no empty entries, check email to fit email format)
// Salt and encrypt password for security/protection purposes.
function addUser()  
	{	
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$salta = 'xyje'; $saltb = '3ju3';
		$protected = md5($salta.$password.$saltb);
		//$openTicket = get_rand_id(16);
		$insert = array(
		'name' => $name,
		'email' => $email,
		'password' => $protected,
		//'ticket' => $openTicket,
		'join_date' => date("Y-m-d"));
		$this->db->insert('users', $insert);
		$output_string = "Thanks for joining.  Discuss and add entries to your hearts content.";
		echo json_encode($output_string);
	}
// Do Login - checks username and password, returns success by setting session variables
// fails by returning error msg
function doLogin()
{
	$username = $this->security->xss_clean($this->input->post('username'));
	$password = $this->security->xss_clean($this->input->post('password'));		
	$salta = 'xyje'; 
	$saltb = '3ju3';
	$protected = md5($salta.$password.$saltb);
	$where = array(
	'email' => $username,
	'password' => $protected);
	$this->db->where($where);	
	$query = $this->db->get('users');
	
if ($query->num_rows == 1)
	{
		// If there is a user, then create session data
			$row = $query->row();
			$data = array(
			'userid' => $row->u_id,
			'name' => $row->name,
			'email' => $row->email,
			'joined' => $row->join_date,
			'validated' => true
			);
			$this->session->set_userdata($data);
			$loginFLAG = true;
	
			
	} else {
		$loginFLAG = false;
	}
	if($loginFLAG) {
			echo json_encode("happy");
	} else {
	// If the previous process did not validate
// then return false.
	return false;
	}
}

function doLogout()	 {
	$this->session->sess_destroy();
}


// random string generator for ticket / user email validation

}
/*
 * end of users_model.php
 */