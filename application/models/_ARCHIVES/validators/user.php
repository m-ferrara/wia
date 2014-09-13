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
	$validations = array("email" => "alfanum", "password" => "alfanum", "display_name" => "alfanum");
	$mandatories = array("email", "password");
	$sanatations = array("email" => "alfanum", "password" => "alfanum", "display_name" => "alfanum");
	$unique = array("email" => "user_profile");
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function postValidator($RequestPayload) {
	$validations = array("u_id" => "number", "email" => "alfanum", "password" => "alfanum", "display_name" => "alfanum");
	$mandatories = array("u_id");
	$sanatations = array("u_id" => "number", "email" => "alfanum", "password" => "alfanum", "display_name" => "alfanum");
	$unique = array("email" => "user_profile");
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function deleteValidator($RequestPayload) {
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
?>