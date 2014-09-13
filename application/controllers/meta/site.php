<?php
require(APPPATH'.libraries/REST_Controller.php');

class Site extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function site_get()  
    {  
        // respond with information about a site  
    }  
  
    function site_put()  
    {  
			class SiteMeta
		{
			$search_ct = $this->put->("search_ct");
			$visit_ct = $this->put->("visit_ct");
			$registration_ct = $this->put->("registration_ct");
			$traffic_status = $this->put->("traffic_status");
			$cit_ct = $this->put->("cit_ct");
			$tag_ct = $this->put->("tag_ct");
			$cat_ct = $this->put->("cat_ct");
			$cmt_ct = $this->put->("cmt_ct");
			$vote_ct = $this->put->("vote_ct");
			$meta_window = $this->put->("meta_window");
			$meta_id = $this->put->("meta_id");
		}
        // create a new site and respond with a status/errors  
    }  
  
    function site_post()  
    {  
		class SiteMeta
		{
			$search_ct = $this->post->("search_ct");
			$visit_ct = $this->post->("visit_ct");
			$registration_ct = $this->post->("registration_ct");
			$traffic_status = $this->post->("traffic_status");
			$cit_ct = $this->post->("cit_ct");
			$tag_ct = $this->post->("tag_ct");
			$cat_ct = $this->post->("cat_ct");
			$cmt_ct = $this->post->("cmt_ct");
			$vote_ct = $this->post->("vote_ct");
			$meta_window = $this->post->("meta_window");
			$meta_id = $this->post->("meta_id");
		}
        // update an existing site and respond with a status/errors  
    }  
  
    function site_delete()  
    {  
        // delete a site and respond with a status/errors  
    }  
	
}
// End of Meta.php