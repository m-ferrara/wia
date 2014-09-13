<?php
function getValidator($RequestPayload) {
	$validations = array("u_id" => "number");
	$mandatories = array("u_id");
	$sanatations = array("u_id" => "number");
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
	$validations = array("list_name" => "alfanum", "u_id" => "number");
	$mandatories = array("list_name", "u_id");
	$sanatations = array("list_name" => "alfanum", "u_id" => "number");
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
	$validations = array("list_id" => "number", "u_id" => "number", "list_name" => "alfanum");
	$mandatories = array("list_id", "u_id");
	$sanatations = array("list_id" => "number", "u_id" => "number", "list_name" => "alfanum");
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
	$validations = array("list_id" => "number", "u_id" => "number");
	$mandatories = array("list_id", "u_id");
	$sanatations = array("list_id" => "number", "u_id" => "number");
	$unique = array();
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}
