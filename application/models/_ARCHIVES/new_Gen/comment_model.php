<?php
class Comment_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function comment_get($cmt_id)
  {
    $getArray = array("cmt_id" => $cmt_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('cit_cmts');
    return $dbResult->result();
  }

  function comment_put($cmt_id, $cit_id, $author, $cmt_body, $cmt_date, $u_id)
  {
    $putArray = array(
        "cmt_id" => $cmt_id, "cit_id" => $cit_id, "author" => $author, "cmt_body" => $cmt_body, "cmt_date" => $cmt_date, "u_id" => $u_id);
    $dbInsert = $this->db->insert('cit_cmts', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function comment_post($cmt_id, $cit_id, $author, $cmt_body, $cmt_date, $u_id)
  {
    $whereArray = array(
        "cmt_id" => $cmt_id);
    $postArray = array(
        "cmt_id" => $cmt_id, "cit_id" => $cit_id, "author" => $author, "cmt_body" => $cmt_body, "cmt_date" => $cmt_date, "u_id" => $u_id);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('cit_cmts', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function comment_delete($cmt_id)
  {
    $whereArray = array(
        "cmt_id" => $cmt_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('cit_cmts');
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

/* end of Comment_model.php */
