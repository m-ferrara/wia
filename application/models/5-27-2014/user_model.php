<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get($getArray)
    {
        $dbWhere  = $this->db->where($getArray);
        $dbResult = $this->db->get('user_profile');
        return $dbResult->result();
    }
    function put($putArray)
    {
    	// HASH USER PASSWORD
    	$inputPassword = $putArray["password"];
		$hashedPassword = hash("sha256", "bla".$inputPassword."34zY7");
		$putArray["password"] = $hashedPassword;
		
        $dbInsert = $this->db->insert('user_profile', $putArray);
        if ($dbInsert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function post($postArray, $whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbUpdate = $this->db->update('user_profile', $postArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        }
    }
	
	function login($request){
		$inputPassword = $request["password"];
		$hashedPassword = hash("sha256", "bla".$inputPassword."34zY7");
		$request["password"] = $hashedPassword;
		
		$dbWhere  = $this->db->where($request);
        $dbGet = $this->db->get('user_profile');
		//$dbResult = $dbResult->result();
		if (0 >= $dbGet->num_rows()) {
			return FALSE;
		} else {
			$dbResult = $dbGet->result_array();
			$newdata = array(
                   'username'  => $dbResult["display_name"],
                   'email'     => $dbResult["email"],
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($newdata);
			return TRUE;
		}
	}
	
	
	function authenticate(){
		$session_data = $this->session->all_userdata();
		
		if (array_key_exists('logged_in', $session_data) && $session_data['logged_in']) {
			return true;
		} else {
			return false;
		}
	}
	
    function delete($whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbDelete = $this->db->delete('user_profile');
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
            "u_id" => "number"
        );
        $mandatories = array(
            "u_id"
        );
        $sanatations = array(
            "u_id" => "number"
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
            "email" => "alfanum",
            "password" => "alfanum",
        	"name_first" => "alfanum",
        	"name_last" => "alfanum"
            // ,
            // "display_name" => "alfanum"
        );
        $mandatories = array(
            "email",
            "password"
        );
        $sanatations = array(
            "email" => "alfanum",
            "password" => "alfanum"
            //,
        //    "display_name" => "alfanum"
        );
        $unique      = array(
            "email" => "user_profile"
        );
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
            "u_id" => "number",
            "email" => "alfanum",
            "password" => "alfanum",
            "display_name" => "alfanum"
        );
        $mandatories = array(
            "u_id"
        );
        $sanatations = array(
            "u_id" => "number",
            "email" => "alfanum",
            "password" => "alfanum",
            "display_name" => "alfanum"
        );
        $unique      = array(
            "email" => "user_profile"
        );
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
            "u_id" => "number"
        );
        $mandatories = array(
            "u_id"
        );
        $sanatations = array(
            "u_id" => "number"
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
}
/* end of User_model.php */