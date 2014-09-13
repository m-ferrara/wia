<?php
class Share _model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function share_get($sender_id, $timestamp)
  {
    $getArray = array("sender_id" => $sender_id, "timestamp" => $timestamp);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('user_shares');
    return $dbResult->result();
  }

  function share_put($sender_id, $recipient_id, $cit_id, $timestamp)
  {
    $putArray = array(
        "sender_id" => $sender_id, "recipient_id" => $recipient_id, "cit_id" => $cit_id, "timestamp" => $timestamp);
    $dbInsert = $this->db->insert('user_shares', $putArray);
    if ($dbInsert)
    {
      return $this->db->insert_id();
    }
    else
    {
      return false;
    }
  }

  function share_post($sender_id, $recipient_id, $cit_id, $timestamp)
  {
    $whereArray = array(
        "sender_id" => $sender_id, "timestamp" => $timestamp);
    $postArray = array(
        "sender_id" => $sender_id, "recipient_id" => $recipient_id, "cit_id" => $cit_id, "timestamp" => $timestamp);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('user_shares', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function share_delete($sender_id, $recipient_id, $cit_id, $timestamp)
  {
    $whereArray = array(
        "sender_id" => $sender_id, "timestamp" => $timestamp);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('user_shares');
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

/* end of Share_model.php */
