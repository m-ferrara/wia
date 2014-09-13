<?php
class Vote_model extends CI_Model {
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
$cit_id = $InputArray['cit_id'];

if ( 'integer' !== gettype( $cit_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$rt_val = $InputArray['rt_val'];

if ( 'integer' !== gettype( $rt_val )) {

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
$cit_id = $InputArray['cit_id'];

if ( 'integer' !== gettype( $cit_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
} else { 
	return false;}


 return $SubmissionValid; 

 }



function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'user_cit_ratings' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'user_cit_ratings', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'user_cit_ratings', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'user_cit_ratings' );

}
} 

 /* end of Vote_model.php */  