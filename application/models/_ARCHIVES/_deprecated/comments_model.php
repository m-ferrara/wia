<?php
class Comments_model extends CI_Model {
	
	
	function __construct() 
	{
		parent::__construct();
	}
	
// addComment - enabled on Individual Citation View
	function addComment() 
	{
	$comment = $this->input->post('comment');
	$cit = $this->input->post('cit_id');
	$author = $this->session->userdata('name');
	$insert = array(
	'cit_id' => $cit,
	'author' => $author,
	'comment' => $comment
	);
	$this->db->insert('cit_comments', $insert);
	}
	
// deletecomment - enabled on Individual Citation View
	function deleteComment() 
	{
	$com_id = $this->input->post('comment_id');
	$idqry = array(
	"comment_id" => $com_id
	);
	$this->db->delete('cit_comments', $idqry); 
	}

	function getComments()
	{
		$cit = $this->input->get('cit_id');
		$this->db->where('cit_id', $cit);
		$query = $this->db->get('cit_comments');
		return ($query->result_array());
	}
}

/*
 * end of Comments_model.php
 */