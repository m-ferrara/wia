<?php
class Tag_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}
	
/* all_tags_read SELECTS  * from 'all_tags'.
 * @param 
 * @return  
 * @throw 
 */
/* get SELECTS  * FROM 'all_tags' WHERE .
 * @param 
 * @return  
 * @throw 
 */
	function get_all( ) {
		// post-values, db call
		$dbGet = $this->db->get("all_tags");
		$tag = $dbGet->result();
		return $tag;
	}	
	
/* tag_categories_read SELECTS  * from 'all_tags'.
 * @param 
 * @return  
 * @throw 
 */
	function categories_get() {
		$dbGet = $this->db->get("tag_categories");
		$cat = $dbGet->result();
		return $cat;
	}	

////////////////  CRUD FUNCTIONS FOR TAG CATEGORIES  -- BEGIN
///////////////////////////////////////////////////
	
/* tag_category_create INSERTS tag category name into 'tag_categories' (table).
 * @param 
 * @return  
 * @throw 
 */
	function tag_category_create() {
		// use post data to insert to tag_categories table
		
	}		

/* tag_category_update UPDATES numeric (1-5) value, user_id value and cit_id value in 'user_ratings'.
 * @param 
 * @return  
 * @throw 
 */
	function tag_category_update() {
		// get user info
	}			
	
/* tag_category_remove INSERT numeric cit_id value and user_id value in 'user_cit_favorites'.
 * @param 
 * @return  
 * @throw 
 */
	function tag_category_remove() {
		// get user info
	}	
////////////////  CRUD FUNCTIONS FOR TAG CATEGORIES  -- END
///////////////////////////////////////////////////		

////////////////  CRUD FUNCTIONS FOR INDIVIDUAL TAGS  -- BEGIN
///////////////////////////////////////////////////	

/* get SELECTS  * FROM 'all_tags' WHERE .
 * @param 
 * @return  
 * @throw 
 */
	function get( $tag_id ) {
		// post-values, db call
		$dbQry = array("tag_id"=>$tag_id);
		$dbGet = $this->db->get_where("all_tags", $dbQry);
		$tag = $dbGet->result();
		return $tag;
	}	

/* tag_create INSERTS  tag_name into 'all_tags'.
 * @param 
 * @return  
 * @throw 
 */
	function put( $tag, $cat_id ) {
		// post-values, db call
		$dbQry = array("tag"=>$tag, "cat_id"=>$cat_id );
		$dbGet = $this->db->insert("all_tags", $dbQry);
		if ($dbGet) {
			return true; } 
		else { 
			return false; }
	}	
	
/* tag_delete REMOVES  tag_name into 'all_tags'.
 * @param 
 * @return  
 * @throw 
 */
	function tag_delete() {
		
	}
	
////////////////  CRUD FUNCTIONS FOR INDIVIDUAL TAGS  -- END
///////////////////////////////////////////////////	
	
}
/* end of tag_model.php */
/* location: appname/application/models/ */