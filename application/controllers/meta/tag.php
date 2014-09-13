<?php
require(APPPATH'.libraries/REST_Controller.php');

class Tag extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function tag_get()  
    {  
        // respond with information about a tag  
    }  
  
    function tag_put()  
    {  
		class TagMeta
		{
			$tag_id = $this->put->("tag_id");
			$cit_ct = $this->put->("cit_ct");
			$viewed_ct = $this->put->("viewed_ct");
			$cmt_ct = $this->put->("cmt_ct");
			$last_accessed = $this->put->("last_accessed");
		}
        // create a new tag and respond with a status/errors  
    }  
  
    function tag_post()  
    {  
		class TagMeta
		{
			$tag_id = $this->post->("tag_id");
			$cit_ct = $this->post->("cit_ct");
			$viewed_ct = $this->post->("viewed_ct");
			$cmt_ct = $this->post->("cmt_ct");
			$last_accessed = $this->post->("last_accessed");
		}
        // update an existing tag and respond with a status/errors  
    }  
  
    function tag_delete()  
    {  
        // delete a tag and respond with a status/errors  
    }  
	
}
// End of Tag.php