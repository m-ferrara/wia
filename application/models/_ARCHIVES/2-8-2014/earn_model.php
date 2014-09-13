<?php
class Earn_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $InputArray, $RequestMethod ) { 
$SubmissionValid = false;if ( $RequestMethod === 'put' || $RequestMethod === 'post' ) {
$u_id = $InputArray['u_id'];

if ( 'integer' !== gettype( $u_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$pst_total = $InputArray['pst_total'];

}
 else if ( $RequestMethod === 'get' || $RequestMethod === 'delete' ) {
$u_id = $InputArray['u_id'];

if ( 'integer' !== gettype( $u_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
} else { 
	return false;}


 return $SubmissionValid; 

 }



function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'user_points' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'user_points', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'user_points', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'user_points' );

}
} 

 /* end of Earn_model.php */ 