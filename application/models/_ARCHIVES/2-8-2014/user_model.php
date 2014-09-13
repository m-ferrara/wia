<?php
class User_model extends CI_Model {
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
$email = $InputArray['email'];

if ( 'string' !== gettype( $email )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$password = $InputArray['password'];

if ( 'string' !== gettype( $password )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$display_name = $InputArray['display_name'];

if ( 'string' !== gettype( $display_name )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$join_date = $InputArray['join_date'];

if ( 'integer' !== gettype( $join_date )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
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
$dbResult = $this->db->get( 'user_profile' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'user_profile', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'user_profile', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'user_profile' );

}
} 

 /* end of User_model.php */ 



