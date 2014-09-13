<?php
require(APPPATH'.libraries/REST_Controller.php');

class Citation extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function citation_get()  
    {  
        // respond with information about a citation  
    }  
  
    function citation_put()  
    {  
		class CitMeta
		{
			$cit_id = $this->put->("cit_id");
			$amnt_votes = $this->put->("amnt_votes");
			$avg_rating = $this->put->("avg_rating");
			$added_by = $this->put->("added_by");
			$cit_views_ct = $this->put->("cit_views_ct");
			$cit_cmts_ct = $this->put->("cit_cmts_ct");
		}
        // create a new citation and respond with a status/errors  
    }  
  
    function citation_post()  
    {  
		class CitMeta
		{
			$cit_id = $this->post->("cit_id");
			$amnt_votes = $this->post->("amnt_votes");
			$avg_rating = $this->post->("avg_rating");
			$added_by = $this->post->("added_by");
			$cit_views_ct = $this->post->("cit_views_ct");
			$cit_cmts_ct = $this->post->("cit_cmts_ct");
		}
        // update an existing citation and respond with a status/errors  
    }  
  
    function citation_delete()  
    {  
        // delete a citation and respond with a status/errors  
    }  
	
}
// End of citation.php