<?php
class Favorite_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}

	function get($getArray)
	{
		$dbWhere = $this->db->where($getArray);
		$dbResult = $this->db->get('user_saved_lists');
		return $dbResult->result();
	}

	function put($putArray)
	{
		$dbInsert = $this->db->insert('user_saved_lists', $putArray);
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
		$dbUpdate = $this->db->update('user_saved_lists', $postArray);
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
		$dbDelete = $this->db->delete('user_saved_lists');
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
			"u_id" => "number"
		);
		$mandatories = array(
			"u_id"
		);
		$sanatations = array(
			"u_id" => "number"
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
			"list_name" => "alfanum",
			"u_id" => "number"
		);
		$mandatories = array(
			"list_name",
			"u_id"
		);
		$sanatations = array(
			"list_name" => "alfanum",
			"u_id" => "number"
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
		$validations = array(
			"list_id" => "number",
			"u_id" => "number",
			"list_name" => "alfanum"
		);
		$mandatories = array(
			"list_id",
			"u_id"
		);
		$sanatations = array(
			"list_id" => "number",
			"u_id" => "number",
			"list_name" => "alfanum"
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

	function deleteValidator($RequestPayload)
	{
		$validations = array(
			"list_id" => "number",
			"u_id" => "number"
		);
		$mandatories = array(
			"list_id",
			"u_id"
		);
		$sanatations = array(
			"list_id" => "number",
			"u_id" => "number"
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
} /* end of Favorite_model.php */