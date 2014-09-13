<?php
function getValidator($RequestPayload) {
	$validations = array("cit_id" => "number");
	$mandatories = array("cit_id");
	$sanatations = array("cit_id" => "number");
	$unique = array();
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function putValidator($RequestPayload) {
	$validations = array("cit_id" => "number", "amnt_votes" => "number", "avg_rating" => "number", "added_by" => "number", "cit_views_ct" => "number", "cit_cmts_ct" => "number");
	$mandatories = array("cit_id");
	$sanatations = array("cit_id" => "number", "amnt_votes" => "number", "avg_rating" => "number", "added_by" => "number", "cit_views_ct" => "number", "cit_cmts_ct" => "number");
	$unique = array();
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function postValidator($RequestPayload) {
	$validations = array("cit_id" => "number", "amnt_votes" => "number", "avg_rating" => "number", "added_by" => "number", "cit_views_ct" => "number", "cit_cmts_ct" => "number");
	$mandatories = array("cit_id");
	$sanatations = array("cit_id" => "number", "amnt_votes" => "number", "avg_rating" => "number", "added_by" => "number", "cit_views_ct" => "number", "cit_cmts_ct" => "number");
	$unique = array();
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function deleteValidator($RequestPayload) {
	$validations = array("cit_id" => "number");
	$mandatories = array("cit_id");
	$sanatations = array("cit_id" => "number");
	$unique = array();
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}
?>