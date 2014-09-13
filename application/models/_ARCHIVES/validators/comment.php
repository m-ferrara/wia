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
	$validations = array("cit_id" => "number", "author" => "alfanum", "cmt_body" => "alfanum", "cmt_date" => "number", "u_id" => "number");
	$mandatories = array("cit_id", "author", "cmt_body", "cmt_date", "u_id");
	$sanatations = array("cit_id" => "number", "author" => "alfanum", "cmt_body" => "alfanum", "cmt_date" => "number", "u_id" => "number");
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
	$validations = array("cmt_id" => "number", "u_id" => "number", "cit_id" => "number", "author" => "alfanum", "cmt_body" => "alfanum", "cmt_date" => "number");
	$mandatories = array("cmt_id", "u_id");
	$sanatations = array("cmt_id" => "number", "u_id" => "number", "cit_id" => "number", "author" => "alfanum", "cmt_body" => "alfanum", "cmt_date" => "number");
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
	$validations = array("cmt_id" => "number", "u_id" => "number");
	$mandatories = array("cmt_id", "u_id");
	$sanatations = array("cmt_id" => "number", "u_id" => "number");
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