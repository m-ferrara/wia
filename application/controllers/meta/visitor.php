<?php
require(APPPATH'.libraries/REST_Controller.php');

class Visitor extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function visitor_get()  
    {  
        // respond with information about a visitor  

	}  
  
    function visitor_put()  
    {  
	// create a new visitor and respond with a status/errors  
		class VisitorMeta
		{
			$sess_id = $this->put->("sess_id");
			$ipv4 = $this->put->("ipv4");
			$browser_type = $this->put->("browser_type");
			$brwsr_vendor = $this->put->("brwsr_vendor");
			$time_stmp = $this->put->("time_stmp");
		}
    
    }  
  
    function visitor_post()  
    {  
        // update an existing visitor and respond with a status/errors  
		class VisitorMeta
		{
			$sess_id = $this->post->("sess_id");
			$ipv4 = $this->post->("ipv4");
			$browser_type = $this->post->("browser_type");
			$brwsr_vendor = $this->post->("brwsr_vendor");
			$time_stmp = $this->post->("time_stmp");
		}
    }  
  
    function visitor_delete()  
    {  
        // delete a visitor and respond with a status/errors  
    }  
	
}
// End of visitor.php