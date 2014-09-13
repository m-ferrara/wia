<?php
class Favorite_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function favorite_get($list_id)
  {
    $getArray = array("list_id" => $list_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('user_saved_lists');
    return $dbResult->result();
  }

  function favorite_put($list_id, $list_name, $u_id)
  {
    $putArray = array(
        "list_id" => $list_id, "list_name" => $list_name, "u_id" => $u_id);
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

  function favorite_post($list_id, $list_name, $u_id)
  {
    $whereArray = array(
        "list_id" => $list_id);
    $postArray = array(
        "list_id" => $list_id, "list_name" => $list_name, "u_id" => $u_id);
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

  function favorite_delete($list_id)
  {
    $whereArray = array(
        "list_id" => $list_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('user_saved_lists');
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

/* end of Favorite_model.php */
