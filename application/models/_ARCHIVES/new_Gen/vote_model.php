<?php
class Vote_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function vote_get($u_id, $cit_id)
  {
    $getArray = array("u_id" => $u_id, "cit_id" => $cit_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('user_cit_ratings');
    return $dbResult->result();
  }

  function vote_put($u_id, $cit_id, $rt_val)
  {
    $putArray = array(
        "u_id" => $u_id, "cit_id" => $cit_id, "rt_val" => $rt_val);
    $dbInsert = $this->db->insert('user_cit_ratings', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function vote_post($u_id, $cit_id, $rt_val)
  {
    $whereArray = array(
        "u_id" => $u_id, "cit_id" => $cit_id);
    $postArray = array(
        "u_id" => $u_id, "cit_id" => $cit_id, "rt_val" => $rt_val);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('user_cit_ratings', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function vote_delete($u_id, $cit_id, $rt_val)
  {
    $whereArray = array(
        "u_id" => $u_id, "cit_id" => $cit_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('user_cit_ratings');
		   if ($dbDelete)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
}

/* end of Vote_model.php */
