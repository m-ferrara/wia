<?php
class Comment_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $InputArray, $RequestMethod ) { 
$SubmissionValid = false;if ( $RequestMethod === 'put' || $RequestMethod === 'post' ) {
$cmt_id = $InputArray['cmt_id'];

if ( 'integer' !== gettype( $cmt_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cit_id = $InputArray['cit_id'];

if ( 'integer' !== gettype( $cit_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$author = $InputArray['author'];

if ( 'string' !== gettype( $author )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cmt_body = $InputArray['cmt_body'];

if ( 'string' !== gettype( $cmt_body )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cmt_date = $InputArray['cmt_date'];

if ( 'integer' !== gettype( $cmt_date )) {

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
$cmt_id = $InputArray['cmt_id'];

if ( 'integer' !== gettype( $cmt_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
} else { 
	return false;}


 return $SubmissionValid; 

 }



function get ( $getArray ) { 
$dbWhere = $this->db->where( $getArray ); 
$dbResult = $this->db->get( 'cit_cmts' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'cit_cmts', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'cit_cmts', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'cit_cmts' );

}
} 

 /* end of Comment_model.php */ 
