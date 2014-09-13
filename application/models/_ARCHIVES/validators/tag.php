<?php
function getValidator($RequestPayload) {
	$validations = array("tag_id" => "number");
	$mandatories = array("tag_id");
	$sanatations = array("tag_id" => "number");
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
	$validations = array("tag" => "alfanum", "cat_id" => "number");
	$mandatories = array("tag", "cat_id");
	$sanatations = array("tag" => "alfanum", "cat_id" => "number");
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
	$validations = array("tag_id" => "number", "tag" => "alfanum");
	$mandatories = array("tag_id", "tag");
	$sanatations = array("tag_id" => "number", "tag" => "alfanum");
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
	$validations = array("tag_id" => "number");
	$mandatories = array("tag_id");
	$sanatations = array("tag_id" => "number");
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