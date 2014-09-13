<?php
class Meta_model extends CI_Model {
	function __construct() 
	{ 
	parent::__construct(); 
	} 
 

function validate ( $InputArray, $RequestMethod ) { 
$SubmissionValid = false;if ( $RequestMethod === 'put' || $RequestMethod === 'post' ) {
$cit_id = $InputArray['cit_id'];

if ( 'integer' !== gettype( $cit_id )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$amnt_votes = $InputArray['amnt_votes'];

if ( 'integer' !== gettype( $amnt_votes )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$avg_rating = $InputArray['avg_rating'];

if ( 'double' !== gettype( $avg_rating )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$added_by = $InputArray['added_by'];

if ( 'integer' !== gettype( $added_by )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cit_views_ct = $InputArray['cit_views_ct'];

if ( 'integer' !== gettype( $cit_views_ct )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
$cit_cmts_ct = $InputArray['cit_cmts_ct'];

if ( 'integer' !== gettype( $cit_cmts_ct )) {

	$SubmissionValid = false;}
 else { 
	$SubmissionValid = true;}
}
 else if ( $RequestMethod === 'get' || $RequestMethod === 'delete' ) {
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
$dbResult = $this->db->get( 'cit_meta' );
return $dbResult->result();
}


function put ( $putArray ) { 
$dbInsert = $this->db->insert( 'cit_meta', $putArray );
if ($dbInsert) {
return $this->db->insert_id();
}
else {
return false;
}
}

function post ( $postArray, $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbUpdate = $this->db->update( 'cit_meta', $postArray );
if ($dbUpdate) {
return true;
}
else {
return false;
}
}

function delete ( $whereArray ) { 
$dbWhere = $this->db->where( $whereArray );
$dbDelete = $this->db->delete( 'cit_meta' );

}
} 

 /* end of Meta_model.php */ 

