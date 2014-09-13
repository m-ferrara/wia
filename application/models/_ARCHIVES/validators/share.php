<?php
function getValidator($RequestPayload) {
	$validations = array("sender_id" => "number");
	$mandatories = array("sender_id");
	$sanatations = array("sender_id" => "number");
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
	$validations = array("sender_id" => "number", "recipient_id" => "number", "cit_id" => "number", "timestamp" => "number", "message" => "alfanum");
	$mandatories = array("sender_id", "recipient_id", "cit_id", "timestamp");
	$sanatations = array("sender_id" => "number", "recipient_id" => "number", "cit_id" => "number", "timestamp" => "number", "message" => "alfanum");
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
	$validations = array();
	$mandatories = array();
	$sanatations = array();
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
	$validations = array("sender_id" => "number", "recipient_id" => "number", "timestamp" => "number");
	$mandatories = array("sender_id", "recipient_id", "timestamp");
	$sanatations = array("sender_id" => "number", "recipient_id" => "number", "timestamp" => "number");
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