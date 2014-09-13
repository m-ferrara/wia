<?php
class Share_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $InputArray, $RequestMethod ) { 
$SubmissionValid = false;if ( $RequestMethod === 'put' || $RequestMethod === 'post' ) {
$sender_id = $InputArray['sender_id'];

if ( 'integer' !== gettype( $sender_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$recipient_id = $InputArray['recipient_id'];

if ( 'integer' !== gettype( $recipient_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cit_id = $InputArray['cit_id'];

if ( 'integer' !== gettype( $cit_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$timestamp = $InputArray['timestamp'];

if ( 'integer' !== gettype( $timestamp )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
}
 else if ( $RequestMethod === 'get' || $RequestMethod === 'delete' ) {
$sender_id = $InputArray['sender_id'];

if ( 'integer' !== gettype( $sender_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$timestamp = $InputArray['timestamp'];

if ( 'integer' !== gettype( $timestamp )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
} else { 
	return false;}


 return $SubmissionValid; 

 }



function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'user_shares' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'user_shares', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'user_shares', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'user_shares' );

}
} 

 /* end of Share_model.php */ 



