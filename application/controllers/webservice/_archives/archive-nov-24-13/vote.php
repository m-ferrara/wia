<?php
require(APPPATH'.libraries/REST_Controller.php');

class Vote extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('vote_model');
	}
	
	function vote_get()  
    {  
        // respond with information about a vote  
		
    }  
  
    function vote_put()  
    {  
        // create a new vote and respond with a status/errors  
		class UserCitRatings
		{
			$u_id = $this->put("u_id");
			$cit_id = $this->put("cit_id");
			$rt_val = $this->put("rt_val");
		}
	}  
  
    function vote_post()  
    {  
        // update an existing vote and respond with a status/errors  
		class UserCitRatings
		{
			$u_id = $this->post("u_id");
			$cit_id = $this->post("cit_id");
			$rt_val = $this->post("rt_val");
		}
    }  
  
    function vote_delete()  
    {  
        // delete a vote and respond with a status/errors  
    }  
	
}
// End of Vote.php