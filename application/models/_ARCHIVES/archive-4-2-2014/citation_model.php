<?php
class Citation_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}

	function get($getArray)
	{
		$dbWhere = $this->db->where($getArray);
		$dbResult = $this->db->get('citations');
		return $dbResult->result();
	}

	function put($putArray)
	{
		$dbInsert = $this->db->insert('citations', $putArray);
		if ($dbInsert)
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}

	function post($postArray, $whereArray)
	{
		$dbWhere = $this->db->where($whereArray);
		$dbUpdate = $this->db->update('citations', $postArray);
		if ($dbUpdate)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function delete($whereArray)
	{
		$dbWhere = $this->db->where($whereArray);
		$dbDelete = $this->db->delete('citations');
	}

	function validate($requestPayload, $requestMethod)
	{
		switch ($requestMethod)
		{
		case 'get':
			$validStatus = $this->getValidator($requestPayload);
			return $validStatus;
			break;

		case 'put':
			$validStatus = $this->putValidator($requestPayload);
			return $validStatus;
			break;

		case 'post':
			$validStatus = $this->postValidator($requestPayload);
			return $validStatus;
			break;

		case 'delete':
			$validStatus = $this->deleteValidator($requestPayload);
			return $validStatus;
			break;
		}
	}

	function getValidator($RequestPayload)
	{
		$validations = array(
			"cit_id" => "number"
		);
		$mandatories = array(
			"cit_id"
		);
		$sanatations = array(
			"cit_id" => "number"
		);
		$unique = array(); 
		$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

		if ($validator->validate($RequestPayload))
		{
			$sanatizedPayload = $validator->sanatize($RequestPayload);
			return array(
				"isValid" => true,
				"payload" => $sanatizedPayload
			);
		}
		else
		{
			return array(
				"isValid" => false,
				"errorMsg" => $validator->getJSON()
			);
		}
	}

	function putValidator($RequestPayload)
	{
		$validations = array(
			"author" => "alfanum",
			"source" => "alfanum",
			"pub_yr" => "number",
			"title" => "alfanum",
			"source_secondary" => "alfanum",
			"pub_date" => "alfanum",
			"isbn_id" => "number",
			"cit_desc" => "alfanum",
			"internet_address" => "alfanum",
			"pages" => "number"
		);
		$mandatories = array(
			"author",
			"source",
			"pub_yr",
			"title"
		);
		$sanatations = array(
			"author" => "alfanum",
			"source" => "alfanum",
			"pub_yr" => "number",
			"title" => "alfanum",
			"source_secondary" => "alfanum",
			"pub_date" => "alfanum",
			"isbn_id" => "number",
			"cit_desc" => "alfanum",
			"internet_address" => "alfanum",
			"pages" => "number"
		);
		$unique = array(
			"title" => "citations"
		);
		if ($validator->validate($RequestPayload))
		{
			$sanatizedPayload = $validator->sanatize($RequestPayload);
			return array(
				"isValid" => true,
				"payload" => $sanatizedPayload
			);
		}
		else
		{
			return array(
				"isValid" => false,
				"errorMsg" => $validator->getJSON()
			);
		}
	}

	function postValidator($RequestPayload)
	{
		$validations = array(
			"cit_id" => "number",
			"author" => "alfanum",
			"source" => "alfanum",
			"pub_yr" => "number",
			"title" => "alfanum",
			"source_secondary" => "alfanum",
			"pub_date" => "alfanum",
			"isbn_id" => "number",
			"cit_desc" => "alfanum",
			"internet_address" => "alfanum",
			"pages" => "number"
		);
		$mandatories = array(
			"cit_id"
		);
		$sanatations = array(
			"cit_id" => "number",
			"author" => "alfanum",
			"source" => "alfanum",
			"pub_yr" => "number",
			"title" => "alfanum",
			"source_secondary" => "alfanum",
			"pub_date" => "alfanum",
			"isbn_id" => "number",
			"cit_desc" => "alfanum",
			"internet_address" => "alfanum",
			"pages" => "number"
		);
		$unique = array(
			"title" => "citations"
		);
		if ($validator->validate($RequestPayload))
		{
			$sanatizedPayload = $validator->sanatize($RequestPayload);
			return array(
				"isValid" => true,
				"payload" => $sanatizedPayload
			);
		}
		else
		{
			return array(
				"isValid" => false,
				"errorMsg" => $validator->getJSON()
			);
		}
	}

	function deleteValidator($RequestPayload)
	{
		$validations = array(
			"cit_id" => "number"
		);
		$mandatories = array(
			"cit_id"
		);
		$sanatations = array(
			"cit_id" => "number"
		);
		$unique = array(); 
		$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

		if ($validator->validate($RequestPayload))
		{
			$sanatizedPayload = $validator->sanatize($RequestPayload);
			return array(
				"isValid" => true,
				"payload" => $sanatizedPayload
			);
		}
		else
		{
			return array(
				"isValid" => false,
				"errorMsg" => $validator->getJSON()
			);
		}
	}
} /* end of Citation_model.php */