<?php
class Share_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}

	function get($getArray)
	{
		$dbWhere = $this->db->where($getArray);
		$dbResult = $this->db->get('user_shares');
		return $dbResult->result();
	}

	function put($putArray)
	{
		$dbInsert = $this->db->insert('user_shares', $putArray);
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
		$dbUpdate = $this->db->update('user_shares', $postArray);
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
		$dbDelete = $this->db->delete('user_shares');
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
			"sender_id" => "number"
		);
		$mandatories = array(
			"sender_id"
		);
		$sanatations = array(
			"sender_id" => "number"
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
			"sender_id" => "number",
			"recipient_id" => "number",
			"cit_id" => "number",
			"timestamp" => "number",
			"message" => "alfanum"
		);
		$mandatories = array(
			"sender_id",
			"recipient_id",
			"cit_id",
			"timestamp"
		);
		$sanatations = array(
			"sender_id" => "number",
			"recipient_id" => "number",
			"cit_id" => "number",
			"timestamp" => "number",
			"message" => "alfanum"
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

	function postValidator($RequestPayload)
	{
		$validations = array();
		$mandatories = array();
		$sanatations = array();
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

	function deleteValidator($RequestPayload)
	{
		$validations = array(
			"sender_id" => "number",
			"recipient_id" => "number",
			"timestamp" => "number"
		);
		$mandatories = array(
			"sender_id",
			"recipient_id",
			"timestamp"
		);
		$sanatations = array(
			"sender_id" => "number",
			"recipient_id" => "number",
			"timestamp" => "number"
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
} /* end of Share_model.php */