<?php
class Meta_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get($getArray)
    {
        $dbWhere  = $this->db->where($getArray);
        $dbResult = $this->db->get('cit_meta');
        return $dbResult->result();
    }
    function put($putArray, $whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbUpdate = $this->db->update('cit_meta', $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        }
    }
    function post($postArray)
    {
        $dbInsert = $this->db->insert('cit_meta', $postArray);
        if ($dbInsert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function delete($whereArray)
    {
        $dbWhere  = $this->db->where($whereArray);
        $dbDelete = $this->db->delete('cit_meta');
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
            "cit_id" => "number",
            "amnt_votes" => "number",
            "avg_rating" => "number",
            "added_by" => "number",
            "cit_views_ct" => "number",
            "cit_cmts_ct" => "number"
        );
        $mandatories = array(
            "cit_id"
        );
        $sanatations = array(
            "cit_id" => "number",
            "amnt_votes" => "number",
            "avg_rating" => "number",
            "added_by" => "number",
            "cit_views_ct" => "number",
            "cit_cmts_ct" => "number"
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
            "amnt_votes" => "number",
            "avg_rating" => "number",
            "added_by" => "number",
            "cit_views_ct" => "number",
            "cit_cmts_ct" => "number"
        );
        $mandatories = array(
            "cit_id"
        );
        $sanatations = array(
            "cit_id" => "number",
            "amnt_votes" => "number",
            "avg_rating" => "number",
            "added_by" => "number",
            "cit_views_ct" => "number",
            "cit_cmts_ct" => "number"
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
}
/* end of Meta_model.php */