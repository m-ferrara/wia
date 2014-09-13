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
	$validations = array("author" => "alfanum", "source" => "alfanum", "pub_yr" => "number", "title" => "alfanum", "source_secondary" => "alfanum", "pub_date" => "alfanum", "isbn_id" => "number", "cit_desc" => "alfanum", "internet_address" => "alfanum", "pages" => "number");
	$mandatories = array("author", "source", "pub_yr", "title");
	$sanatations = array("author" => "alfanum", "source" => "alfanum", "pub_yr" => "number", "title" => "alfanum", "source_secondary" => "alfanum", "pub_date" => "alfanum", "isbn_id" => "number", "cit_desc" => "alfanum", "internet_address" => "alfanum", "pages" => "number");
	$unique = array("title" => "citations");
	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

	if ($validator->validate($requestPayload)) {
		$requestPayload = $validator->sanatize($requestPayload);
		return array("isValid" => true, "payload" => $requestPayload);
	} else {
		return array("isValid" => false, "errorMsg" => $validator->getJSON());
	}

}

function postValidator($RequestPayload) {
	$validations = array("cit_id" => "number", "author" => "alfanum", "source" => "alfanum", "pub_yr" => "number", "title" => "alfanum", "source_secondary" => "alfanum", "pub_date" => "alfanum", "isbn_id" => "number", "cit_desc" => "alfanum", "internet_address" => "alfanum", "pages" => "number");
	$mandatories = array("cit_id");
	$sanatations = array("cit_id" => "number", "author" => "alfanum", "source" => "alfanum", "pub_yr" => "number", "title" => "alfanum", "source_secondary" => "alfanum", "pub_date" => "alfanum", "isbn_id" => "number", "cit_desc" => "alfanum", "internet_address" => "alfanum", "pages" => "number");
	$unique = array("title" => "citations");
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