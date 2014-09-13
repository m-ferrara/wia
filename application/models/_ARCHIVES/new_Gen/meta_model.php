<?php
class Meta_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function meta_get($cit_id)
  {
    $getArray = array("cit_id" => $cit_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('cit_meta');
    return $dbResult->result();
  }

  function meta_put($cit_id, $amnt_votes, $avg_rating, $added_by, $cit_views_ct, $cit_cmts_ct)
  {
    $putArray = array(
        "cit_id" => $cit_id, "amnt_votes" => $amnt_votes, "avg_rating" => $avg_rating, "added_by" => $added_by, "cit_views_ct" => $cit_views_ct, "cit_cmts_ct" => $cit_cmts_ct);
    $dbInsert = $this->db->insert('cit_meta', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function meta_post($cit_id, $amnt_votes, $avg_rating, $added_by, $cit_views_ct, $cit_cmts_ct)
  {
    $whereArray = array(
        "cit_id" => $cit_id);
    $postArray = array(
        "cit_id" => $cit_id, "amnt_votes" => $amnt_votes, "avg_rating" => $avg_rating, "added_by" => $added_by, "cit_views_ct" => $cit_views_ct, "cit_cmts_ct" => $cit_cmts_ct);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('cit_meta', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function meta_delete($cit_id)
  {
    $whereArray = array(
        "cit_id" => $cit_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('cit_meta');
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

/* end of Meta_model.php */
