<?php
require(APPPATH'.libraries/REST_Controller.php');

class Category extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function category_get()  
    {  
        // respond with information about a category  
    }  
  
    function category_put()  
    {  
		class CatMeta
	{
		$cat_id = $this->put->("cat_id");
		$cits_ct = $this->put->("cits_ct");
		$viewed_ct = $this->put->("viewed_ct");
		$cmts_ct = $this->put->("cmts_ct");
		$last_accessed = $this->put->("last_accessed");
	}
        // create a new category and respond with a status/errors  
    }  
  
    function category_post()  
    {  
        // update an existing category and respond with a status/errors
		class CatMeta
		{
			$cat_id = $this->post->("cat_id");
			$cits_ct = $this->post->("cits_ct");
			$viewed_ct = $this->post->("viewed_ct");
			$cmts_ct = $this->post->("cmts_ct");
			$last_accessed = $this->post->("last_accessed");
		}		
		
    }  
  
    function category_delete()  
    {  
        // delete a category and respond with a status/errors  
    }  
	
}
// End of category.php