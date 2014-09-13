<?php
class Favorite_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $InputArray, $RequestMethod ) { 
$SubmissionValid = false;if ( $RequestMethod === 'put' || $RequestMethod === 'post' ) {
$list_id = $InputArray['list_id'];

if ( 'integer' !== gettype( $list_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$list_name = $InputArray['list_name'];

if ( 'string' !== gettype( $list_name )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$u_id = $InputArray['u_id'];

if ( 'integer' !== gettype( $u_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
}
 else if ( $RequestMethod === 'get' || $RequestMethod === 'delete' ) {
$list_id = $InputArray['list_id'];

if ( 'integer' !== gettype( $list_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
} else { 
	return false;}


 return $SubmissionValid; 

 }



function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'user_saved_lists' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'user_saved_lists', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'user_saved_lists', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'user_saved_lists' );

}
} 

 /* end of Favorite_model.php */ 

