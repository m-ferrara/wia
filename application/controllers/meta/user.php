<?php
require(APPPATH'.libraries/REST_Controller.php');

class User extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function user_get()  
    {  
        // respond with information about a user  
    }  
  
    function user_put()  
    {  
	// create a new user and respond with a status/errors  
		class UserMeta
		{
			$join_date = $this->put->("join_date");
			$cmts_ct = $this->put->("cmts_ct");
			$ratings_ct = $this->put->("ratings_ct");
			$cits_added = $this->put->("cits_added");
			$u_id = $this->put->("u_id");
		}
    
    }  
  
    function user_post()  
    {  
        // update an existing user and respond with a status/errors  
		class UserMeta
		{
			$join_date = $this->post->("join_date");
			$cmts_ct = $this->post->("cmts_ct");
			$ratings_ct = $this->post->("ratings_ct");
			$cits_added = $this->post->("cits_added");
			$u_id = $this->post->("u_id");
		}
    }  
  
    function user_delete()  
    {  
        // delete a user and respond with a status/errors  
    }  
	
}
// End of User.php