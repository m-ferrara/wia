<?php
class Citation_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
     function citations_get()
  {
    $getDbResult = $this->db->get('citations');
    return $getDbResult->result();
  }

  function citation_get($cit_id)
  {
    $getArray = array("cit_id" => $cit_id);
    $dbWhere = $this->db->where($getArray);
    $dbResult = $this->db->get('citations');
    return $dbResult->result();
  }

  function citation_put( $putArray )
  {
		
  //  $putArray = array( "author" => $author, "source" => $source, "source_secondary" => $source_secondary, "pub_yr" => $pub_yr, "pub_date" => $pub_date, "title" => $title, "isbn_id" => $isbn_id, "cit_desc" => $cit_desc, "internet_address" => $internet_address, "pages" => $pages);
  
	$dbInsert = $this->db->insert('citations', $putArray);
    if ($dbInsert)
    {
      return $putArray["author"];
    }
    else
    {
      return false;
    }
  }

  function citation_post($cit_id, $author, $source, $source_secondary, $pub_yr, $pub_date, $title, $isbn_id, $cit_desc, $internet_address, $pages)
  {
    $whereArray = array(
        "cit_id" => $cit_id);
    $postArray = array(
        "cit_id" => $cit_id, "author" => $author, "source" => $source, "source_secondary" => $source_secondary, "pub_yr" => $pub_yr, "pub_date" => $pub_date, "title" => $title, "isbn_id" => $isbn_id, "cit_desc" => $cit_desc, "internet_address" => $internet_address, "pages" => $pages);
    $dbWhere = $this->db->where($whereArray);
    $dbUpdate = $this->db->update('citations', $postArray);
    if ($dbUpdate)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function citation_delete($cit_id)
  {
    $whereArray = array(
        "cit_id" => $cit_id);
    $dbWhere = $this->db->where($whereArray);
    $dbDelete = $this->db->delete('citations');
	
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

/* end of Citation_model.php */
