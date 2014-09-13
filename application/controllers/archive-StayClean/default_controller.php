<?php

class Default_controller extends CI_Controller {
	
	public $data;
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
	$data['logged'] = isLoggedBoolean();	
	$this->load->view('home/index', $data);	
	}

/* Development for SeeClickSearchTool SCST v1.0
 * --> load view for basic html
 * --> data functions for basic functions
 * 
 * 	foreach ($json as $cit_id) {
		$query = array("cit_id"=>$cit_id);
		$citation = $this->db->get_where("citations", $query);
		array_push($rArray, $citation->result_array());
	}
	
	echo json_encode(print_r($rArray));
 }
	
	public function seeRandId() {
		$randId = $this->users_model->get_rand_id(16);
		echo $randId;
 */
 // BUILD RETRIEVAL FOR CIT_IDS based on AT_ID array
 
 public function filterResults() {
 	$rArray = array();
 	$cits = $_POST['citations'];
 	$cit = explode(',', $cits);
 	
 	foreach ($cit as $key => $cit_id) {
 		$query = array("cit_id"=>$cit_id);
		$citation = $this->db->get_where("citations", $query);
		array_push($rArray, $citation->result_array());
 	}
	echo json_encode($rArray);

	}
	
	
/////////////////////
////  COMMENTS	/////
/////////////////////
	public function add_comment() {
		$this->is_logged();
	if ($this->session->userdata("validated")==true) 
		{
	$this->comments_model->addComment();
		$cid = $this->input->post('cit_id');
		$where = array('cit_id' => $cid);
		$allvals = $this->db->get_where('citations', $where);
		$stmt = $this->db->get_where('cit_comments', $where);
		$result = $this->db->get_where('ratings_table', $where);
		
		$data['ratings'] = $result->result_array();
		$data['citations'] =  $allvals->result_array();
		$data['comments'] = $stmt->result_array();
		$data['tags'] = $this->citations_model->relatedTags();
		
		$this->load->view('modal_views/citations/view_citation', $data); 
		}
	}
public function remove_comment() {
	$this->is_logged();
	if ($this->session->userdata("validated")==true) 
		{
		$this->comments_model->deleteComment();
		$cid = $this->input->post('cit_id');
		$where = array('cit_id' => $cid);
		$allvals = $this->db->get_where('citations', $where);
		$stmt = $this->db->get_where('cit_comments', $where);
		$result = $this->db->get_where('ratings_table', $where);
		
		$data['ratings'] = $result->result_array();
		$data['citations'] =  $allvals->result_array();
		$data['comments'] = $stmt->result_array();
		$data['tags'] = $this->citations_model->relatedTags();
		
		$this->load->view('modal_views/citations/view_citation', $data); 
			}
	}

		
//////////////	
//   USERS	//
//////////////	
	public function addUser() {
		$this->users_model->addUser();
	}
		
	public function do_login() {
		// $reffererURI = $this->uri->segment(2,0);
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
	echo json_encode("validated");
						
	} else {
	echo json_encode("invalid");
				}
	
	}
	
	
// is LoggedIn? for other JS-popup Redirects
	public function is_logged() {
		if ($this->session->userdata("validated")==false) 
		{ 
			$data['messages'] = "Must Login To Access This Page."; 
			$this->load->view('modal_views/users/pop_login', $data); 
		}
	}
// logout function	
	public function do_logout(){
		$this->users_model->doLogout();
		redirect('#', 'refresh');
	}
	
/////////////////////////////////////////////////////////////////////////////////////
// JavaScript controller methods for pop-up window content - Loads page/VIEWS	/////
/////////////////////////////////////////////////////////////////////////////////////
	public function jscit_dash() {
		 //comment out credential check for dev only 
		$this->is_logged('jscit_dash'); 
	if ($this->session->userdata("validated")==true) {
		$this->load->view('modal_views/citations/pop_citation'); 
		}
	}

	public function js_signup() {
		$this->load->view('modal_views/users/pop_signup');
	}

	public function js_login() {
		$data['messages'] = '';
		$this->load->view('modal_views/users/pop_login', $data);
	}

	
/*
 * CRUD for Citations (Adding, Updating & Removing)
 */	
	public function addCitTags() {
		$this->citations_model->addCitTags();
	}
	
	public function add_cit() {
			if ($this->session->userdata("validated")==true) {
		$insertFunction = $this->citations_model->ajax_cit_entry();	
/*
		$addTags = $this->citations_model->addCitTags();
*/		
		$responseText = $this->citations_model->responseText();
			}
			else {
				$output_string = "Login Required.";
				echo json_encode($output_string);
			}
	}
	public function update_cit() {
			if ($this->session->userdata("validated")==true) {
				$this->citations_model->ajax_cit_update(); 
			}
			else {
				$output_string = "Login Required.";
				echo json_encode($output_string);
			}
	}
	
	// untag() for jQuery call on update citations page, removes specific tag association
	public function untag() {
		$cit_id = $this->input->post("cit_id");
		$at_id = $this->input->post("at_id");
		$qArray = array(
			'cit_id'=>$cit_id,
			'at_id'=>$at_id
		);
		$this->db->where($qArray);
		$this->db->delete("cit_tags");
	}

/////////////////////////////////////////////////////////////////////////////////
//// JSON OUTPUT REFS ~ accessing these gets JSON encoded data results     //////
/////////////////////////////////////////////////////////////////////////////////
// tag_families and all_tags used to populate front end interface and demarcate citations
	public function tag_families() {
		$this->tagging_model->getTagFamilies();
	}
	
	public function all_tags() {
		$this->tagging_model->allTags();
	}
	
// IMPORTANT - Illustrates how to retrieve citations by tag identifier and form (push) into results array
	public function getCitByTag() {
		$this->tagging_model->getCitByTag();
	}
	
	public function relatedTags() {
		$this->citations_model->relatedTagsJSON();
			
	}
	
	public function get_citation() {
		$this->citations_model->get_citation();
	}
	public function get_rating() {
		$this->citations_model->articleRating();
	}
	
	// citations_filter recieves primary selection and returns JSON profile of associated
	// citations and their additional tags.
	public function citations_filter(){
		$at_id = $this->input->get('at_id');
		$this->citations_model->atidCitations($at_id);
	}
	

	public function citations_search() { 
		$this->citations_model->citations_from_search();
	}
	
	////////////////////////////////////////////////////////////////
	///  View Citation - Pop Up display for individual entry.	////
	////////////////////////////////////////////////////////////////
	public function addcitation_reference() {
			$cid = $this->input->post('cit_id');
			
			$this->is_logged('view_citation?cit='.$cid);
		if ($this->session->userdata("validated")==true) 
			{
				$this->citations_model->add_cit_weblink(); 
			}
		
			
			$where = array('cit_id' => $cid);
			$allvals = $this->db->get_where('citations', $where);
			$stmt = $this->db->get_where('cit_comments', $where);
			$result = $this->db->get_where('ratings_table', $where);
			$data['ratings'] = $result->result_array();
			$data['citations'] =  $allvals->result_array();
			$data['comments'] = $stmt->result_array();
			$data['tags'] = $this->citations_model->relatedTags();
					
			$this->load->view('modal_views/citations/view_citation', $data);
	}
	
	public function view_citation() {
			$data['tags'] = $this->citations_model->relatedTags();
			$data['ratings'] = $this->citations_model->get_cit_rating();
			$data['citations'] =  $this->citations_model->get_citation();
			$data['comments'] = $this->comments_model->getComments();	
			
			$this->load->view('modal_views/citations/view_citation', $data);
	}
	
	public function view_cit_updater() {
			$data['tags'] = $this->citations_model->relatedTags();
			$data['citations'] =  $this->citations_model->get_citation();
			$this->load->view('modal_views/citations/update_citation_view', $data);
	}
	
	public function rate_article() {
		if ($this->session->userdata("validated")==true) 
		{
		$this->citations_model->rateArticle(); 
		$this->citations_model->articleRating(); 
		}
		else 
		{ 
			$output_string = "<td>Must login to rate articles.</td>"; 
		echo json_encode($output_string); 
		}
		
	}


//
//
//
	public function about_us() {
		$this->load->view("modal_views/aboutus/about");
	}
	
	
}