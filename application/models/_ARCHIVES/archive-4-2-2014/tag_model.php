<?php
class Tag_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}

	function get($getArray)
	{
		$dbWhere = $this->db->where($getArray);
		$dbResult = $this->db->get('all_tags');
		return $dbResult->result();
	}

	function put($putArray)
	{
		$dbInsert = $this->db->insert('all_tags', $putArray);
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
		$dbUpdate = $this->db->update('all_tags', $postArray);
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
		$dbDelete = $this->db->delete('all_tags');
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
			"tag_id" => "number"
		);
		$mandatories = array(
			"tag_id"
		);
		$sanatations = array(
			"tag_id" => "number"
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
			"tag" => "alfanum",
			"cat_id" => "number"
		);
		$mandatories = array(
			"tag",
			"cat_id"
		);
		$sanatations = array(
			"tag" => "alfanum",
			"cat_id" => "number"
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
			"tag_id" => "number",
			"tag" => "alfanum"
		);
		$mandatories = array(
			"tag_id",
			"tag"
		);
		$sanatations = array(
			"tag_id" => "number",
			"tag" => "alfanum"
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
			"tag_id" => "number"
		);
		$mandatories = array(
			"tag_id"
		);
		$sanatations = array(
			"tag_id" => "number"
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
} /* end of Tag_model.php */