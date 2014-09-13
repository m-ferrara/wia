<?php
function getValidator($RequestPayload) {
	$validations = array("u_id" => "number", "cit_id" => "number");
	$mandatories = array("u_id", "cit_id");
	$sanatations = array("u_id" => "number", "cit_id" => "number");
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
	$validations = array("u_id" => "number", "cit_id" => "number", "rt_val" => "number");
	$mandatories = array("u_id", "cit_id", "rt_val");
	$sanatations = array("u_id" => "number", "cit_id" => "number", "rt_val" => "number");
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
	$validations = array("u_id" => "number", "cit_id" => "number", "rt_val" => "number");
	$mandatories = array("u_id", "cit_id", "rt_val");
	$sanatations = array("u_id" => "number", "cit_id" => "number", "rt_val" => "number");
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
	$validations = array("u_id" => "number", "cit_id" => "number");
	$mandatories = array("u_id", "cit_id");
	$sanatations = array("u_id" => "number", "cit_id" => "number");
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