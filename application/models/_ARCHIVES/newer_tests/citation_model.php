<?php
class Citation_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}

/* create_citation()
 * @PARAMS POST DATA: author, pub_year, article_name, publication, pages
 * @RETURN JSON for AJAX response MSG
 */
	function create() {
		// post-values, db call
		$author = $this->input->post("author");
		
	}
	
/* update()
 * @PARAMS POST DATA: author, pub_year, article_name, publication, pages
 * @RETURN JSON for AJAX response MSG
 */
	function update() {
		// post-values, db call
		$author = $this->input->post("author");
		
	}

/* get()  GETS values from citations table
 * @PARAMS POST DATA: author, pub_year, article_name, publication, pages
 * @RETURN JSON for AJAX response MSG
 */
	function get( $cit_id ) {
		// post-values, db call
		$dbQry = array("cit_id"=>$cit_id);
		$dbGet = $this->db->get_where("citations", $dbQry);
		$cit = $dbGet->result();
		return $cit;
	}	

/* read_cit_tags()  GETS all tag values for citation
 * @PARAMS cit_id
 * @RETURN multi-dimensional array tag_id and fam_id values of cit_id
 */
	function read_cit_tags($cit_id) {
		// post-values, db call
		$citEntry = array(
			'cit_id' => $cit_id
		);
		
		$getCitTags = $this->db->get_where('cit_tags', $citEntry);
		return $getCitTags->result_array();
	}		
	
/* flag()
 * @PARAMS u_id, cit_id
 * @RETURN JSON for AJAX response MSG
 */
	function flag() {
		// post-values, db call
		$u_id = $this->input->post("u_id");
		$cit_id = $this->input->post("cit_id");
		$flagEntry = array(
			'u_id' => $u_id,
			'cit_id' => $cit_id
		);
		
		$checkFlags = $this->db->get_where('cit_flags', $flagEntry);
		$checkExists = count($checkFlags->result_array());
		if ($checkExists == 0) {
			$this->db->insert("cit_flags", $flagEntry);
		}
		
	}	
	
/* delete()
 * @PARAMS cit_id
 * @RETURN 
 */
	function delete($cit_id) {
		// post-values, db call
		$citEntry = array(
			'cit_id' => $cit_id
		);
		
		$checkFlags = $this->db->get_where('cit_flags', $citEntry);

		$checkExists = count($checkFlags->result_array());
		if ($checkExists < 3) {
			return;
		}
		else if ($checkExists == 3) {
			// three flags triggers removal from ALL tables with cit_id
			$this->db->delete('citations', $citEntry);
			$this->db->delete('cit_tags', $citEntry);
			$this->db->delete('cit_cmts', $citEntry);
			$this->db->delete('cit_views', $citEntry);
			$this->db->delete('cit_ratings', $citEntry);
			$this->db->delete('user_ratings', $citEntry);
			$this->db->delete('user_cit_favorites', $citEntry);
		}
		
	}	
	
}
/* end of citation_model.php */
/* location: appname/application/models/ */