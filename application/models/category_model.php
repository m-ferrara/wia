<?php
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get($getArray)
    {
        $dbWhere  = $this->db->where($getArray);
        $dbResult = $this->db->get('tag_categories');
        return $dbResult->result();
    }
    function put($putArray, $whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbUpdate = $this->db->update('tag_categories', $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        }
    }
    function post($postArray)
    {
        $dbInsert = $this->db->insert('tag_categories', $postArray);
        if ($dbInsert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function delete($whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbDelete = $this->db->delete('tag_categories');
    }
    function validate($requestPayload, $requestMethod)
    {
        switch ($requestMethod) {
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
            "cat_id" => "number"
        );
        $mandatories = array(
            "cat_id"
        );
        $sanatations = array(
            "cat_id" => "number"
        );
        $unique      = array();
        $validator   = new Custom_Validator($validations, $mandatories, $sanatations, $unique);
        if ($validator->validate($RequestPayload)) {
            $sanatizedPayload = $validator->sanatize($RequestPayload);
            return array(
                "isValid" => true,
                "payload" => $sanatizedPayload
            );
        } else {
            return array(
                "isValid" => false,
                "errorMsg" => $validator->getJSON()
            );
        }
    }
    function putValidator($RequestPayload)
    {
        $validations = array(
            "cat" => "alfanum",
            "cat_id" => "number"
        );
        $mandatories = array(
            "cat",
            "cat_id"
        );
        $sanatations = array(
            "cat" => "alfanum",
            "cat_id" => "number"
        );
        $unique      = array();
        $validator   = new Custom_Validator($validations, $mandatories, $sanatations, $unique);
        if ($validator->validate($RequestPayload)) {
            $sanatizedPayload = $validator->sanatize($RequestPayload);
            return array(
                "isValid" => true,
                "payload" => $sanatizedPayload
            );
        } else {
            return array(
                "isValid" => false,
                "errorMsg" => $validator->getJSON()
            );
        }
    }
    function postValidator($RequestPayload)
    {
        $validations = array(
            "cat" => "alfanum",
            "cat_id" => "number"
        );
        $mandatories = array(
            "cat",
            "cat_id"
        );
        $sanatations = array(
            "cat" => "alfanum",
            "cat_id" => "number"
        );
        $unique      = array();
        $validator   = new Custom_Validator($validations, $mandatories, $sanatations, $unique);
        if ($validator->validate($RequestPayload)) {
            $sanatizedPayload = $validator->sanatize($RequestPayload);
            return array(
                "isValid" => true,
                "payload" => $sanatizedPayload
            );
        } else {
            return array(
                "isValid" => false,
                "errorMsg" => $validator->getJSON()
            );
        }
    }
    function deleteValidator($RequestPayload)
    {
        $validations = array(
            "cat_id" => "number"
        );
        $mandatories = array(
            "cat_id"
        );
        $sanatations = array(
            "cat_id" => "number"
        );
        $unique      = array();
        $validator   = new Custom_Validator($validations, $mandatories, $sanatations, $unique);
        if ($validator->validate($RequestPayload)) {
            $sanatizedPayload = $validator->sanatize($RequestPayload);
            return array(
                "isValid" => true,
                "payload" => $sanatizedPayload
            );
        } else {
            return array(
                "isValid" => false,
                "errorMsg" => $validator->getJSON()
            );
        }
    }
    
    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 * 
	 * CUSTOM  METHODS SECTION BEGIN 
	 * 
	 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 */
    
	function get_all( ) {
		// post-values, db call
		$dbGet = $this->db->get("tag_categories");
		$tag = $dbGet->result();
		return $tag;
	}	
}
/* end of Category_model.php */