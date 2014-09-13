<?php
class Tagging_model extends CI_Model {
	function __construct() 
	{
		parent::__construct();
	}
	
/*
 * gets family name and family IDs
 */
	function getTagFamilies() {
		$tagCats = $this->db->get('tag_categories');
		echo json_encode($tagCats->result_array());
	}
/*
 * allTags() retrieves AT_ID(s) and respective Fam IDs to populate front end interface
 */	
	function allTags() {
		$query = $this->db->get('all_tags');
		echo json_encode($query->result_array());
	}
	
	function tagsMeta() {
		$query = $this->db->get('all_tags');
		$result = $query->result_array();
	}
	
// IMPORTANT - illustrates how to SQL query for results and form Array to return	
	public function getCitByTag() {
	$famID = $this->input->get('famID');
	$tagID = $this->input->get('tagID');
	$queryArray = array(
	'fam_id'=>$famID,
	'tag_id'=>$tagID);
	$query = $this->db->get_where('cit_tags', $queryArray);
	$results = $query->result_array();
	//echo json_encode($results); 
	$citations= array();
	foreach ($results as $key=>$result):
	$cit_id = $result['cit_id'];
	$citArray = array(
		'cit_id'=>$cit_id
		);
	$query = $this->db->get_where('citations', $citArray);
	array_push($citations, $query->result_array());
	endforeach;
	$new = array();
	foreach ( $citations as $key => $val ): { sort($val ); $new = array_merge($val,$new) ; } 
	endforeach;
	echo json_encode($new); 
	}
	
	
	/*
	 *  PHP for Update View
	 */
// *REMOVED* PHP return Arrays, will need to be replaced with NEW AT_ID schematics
	
	/*
	 * Get citations by tag category and value of tag *ie Tag identifier (numeric value)
	 */
	function Tagged_citations($tag_cat, $tag_val) {
		$this->db->like($tag_val, $tag_cat); 
		$arrayforquery = $this->db->get("citations");
		echo json_encode($arrayforquery->result_array());
	}
	
	 /*
	   function Tagged_citations_search($searchinput) 
	{
		$this->db->like($searchinput);
		$arrayforquery = $this->db->get("citations");
		echo json_encode($arrayforquery->result_array());
	} 
	*/
	
}

/*
 * End of tagging_model.php
 */