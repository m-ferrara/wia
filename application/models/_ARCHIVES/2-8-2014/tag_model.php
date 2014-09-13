<?php
class Tag_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $requestPayload , $requestMethod ) {
	
switch($requestMethod)
  {
	case 'get':
		$validStatus = $this->getValidation( $requestPayload );
		return $validStatus;
		break;
	case 'put':
		$validStatus = $this->putValidation( $requestPayload );
		return $validStatus;
		break;
	case 'post':
		$validStatus = $this->postValidation( $requestPayload );
		return $validStatus;
		break;
	case 'delete':
		$validStatus = $this->deleteValidation( $requestPayload );
		return $validStatus;
		break;	
  }
}

function getValidation( $requestPayload ) {
	$validations = array(
	    'tag_id' => 'number');
	$required = array('tag_id');
	//$sanatize = array();
	
	$validator = new Custom_Validator($validations, $required); //, $sanatize);
	
	if($validator->validate($requestPayload))
	{
	    $requestPayload = $validator->sanatize($requestPayload);
	    // now do your saving, $_POST has been sanatized.
	    return array("isValid"=>true, "payload"=>$requestPayload);
	}
	else
	{
	    return array("isValid"=>false, "errorMsg"=>$validator->getJSON());
	}
}

function get_all( ) {
		// post-values, db call
		$dbGet = $this->db->get("all_tags");
		$tag = $dbGet->result();
		return $tag;
	}	

function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'all_tags' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'all_tags', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'all_tags', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'all_tags' );

}

function categories_get() {
		$dbGet = $this->db->get("tag_categories");
		$cat = $dbGet->result();
		return $cat;
	}	

} 

 /* end of Tag_model.php */ 
