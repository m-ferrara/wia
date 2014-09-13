<?php
class Earn_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function earn_get($u_id)
  {
    $getArray = array("u_id" => $u_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('user_points');
    return $dbResult->result();
  }

  function earn_put($u_id, $pts_total)
  {
    $putArray = array(
        "u_id" => $u_id, "pts_total" => $pts_total);
    $dbInsert = $this->db->insert('user_points', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function earn_post($u_id, $pts_total)
  {
    $whereArray = array(
        "u_id" => $u_id);
    $postArray = array(
        "u_id" => $u_id, "pts_total" => $pts_total);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('user_points', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function earn_delete($u_id)
  {
    $whereArray = array(
        "u_id" => $u_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('user_points');
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

/* end of Earn_model.php */
