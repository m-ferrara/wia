<?php
class Citation_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate( $requestPayload , $requestMethod ) {
	
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
	// new CustomValidator
	$validations = array();
	$mandatories = array();
	$sanatations = array();
	$equal = array();
	
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $equal);
}


function citations_get()
  {
    $getDbResult = $this->db->get('citations');
    return $getDbResult->result();
  }

function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'citations' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'citations', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
	$dbWhere = $this->db->where( $whereArray );
	$dbUpdate = $this->db->update( 'citations', $postArray );
	if ($dbUpdate) {
		return true;
	}
	else {
		return false;
	}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'citations' );

}
} 

 /* end of Citation_model.php */ 
