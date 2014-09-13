<?php
class Tag _model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function tag_get($tag_id)
  {
    $getArray = array("tag_id" => $tag_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('all_tags');
    return $dbResult->result();
  }

  function tag_put($tag_id, $tag, $cat_id)
  {
    $putArray = array(
        "tag_id" => $tag_id, "tag" => $tag, "cat_id" => $cat_id);
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

  function tag_post($tag_id, $tag, $cat_id)
  {
    $whereArray = array(
        "tag_id" => $tag_id);
    $postArray = array(
        "tag_id" => $tag_id, "tag" => $tag, "cat_id" => $cat_id);
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

  function tag_delete($tag_id)
  {
    $whereArray = array(
        "tag_id" => $tag_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('all_tags');
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

/* end of Tag_model.php */
