<?php
class User _model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function user_get($u_id)
  {
    $getArray = array("u_id" => $u_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('user_profile');
    return $dbResult->result();
  }

  function user_put($u_id, $email, $password, $display_name, $join_date)
  {
    $putArray = array(
        "u_id" => $u_id, "email" => $email, "password" => $password, "display_name" => $display_name, "join_date" => $join_date);
    $dbInsert = $this->db->insert('user_profile', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function user_post($u_id, $email, $password, $display_name, $join_date)
  {
    $whereArray = array(
        "u_id" => $u_id);
    $postArray = array(
        "u_id" => $u_id, "email" => $email, "password" => $password, "display_name" => $display_name, "join_date" => $join_date);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('user_profile', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function user_delete($u_id)
  {
    $whereArray = array(
        "u_id" => $u_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('user_profile');
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

/* end of User_model.php */
