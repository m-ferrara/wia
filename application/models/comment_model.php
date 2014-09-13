<?php
class Comment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get($getArray)
    {
        $dbWhere  = $this->db->where($getArray);
        $dbResult = $this->db->get('cit_cmts');
        return $dbResult->result();
    }
    function put($putArray, $whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbUpdate = $this->db->update('cit_cmts', $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        }
    }
    function post($postArray)
    {
        $dbInsert = $this->db->insert('cit_cmts', $postArray);
        if ($dbInsert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function delete($whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbDelete = $this->db->delete('cit_cmts');
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
            "cit_id" => "number"
        );
        $mandatories = array(
            "cit_id"
        );
        $sanatations = array(
            "cit_id" => "number"
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
            "cmt_id" => "number",
            "u_id" => "number",
            "cit_id" => "number",
            "author" => "alfanum",
            "cmt_body" => "alfanum",
            "cmt_date" => "number"
        );
        $mandatories = array(
            "cmt_id",
            "u_id"
        );
        $sanatations = array(
            "cmt_id" => "number",
            "u_id" => "number",
            "cit_id" => "number",
            "author" => "alfanum",
            "cmt_body" => "alfanum",
            "cmt_date" => "number"
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
            "cit_id" => "number",
            "author" => "alfanum",
            "cmt_body" => "alfanum",
            "cmt_date" => "number",
            "u_id" => "number"
        );
        $mandatories = array(
            "cit_id",
            "author",
            "cmt_body",
            "cmt_date",
            "u_id"
        );
        $sanatations = array(
            "cit_id" => "number",
            "author" => "alfanum",
            "cmt_body" => "alfanum",
            "cmt_date" => "number",
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
    function deleteValidator($RequestPayload)
    {
        $validations = array(
            "cmt_id" => "number",
            "u_id" => "number"
        );
        $mandatories = array(
            "cmt_id",
            "u_id"
        );
        $sanatations = array(
            "cmt_id" => "number",
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
/* end of Comment_model.php */