<?php
require(APPPATH'.libraries/REST_Controller.php');

class Earn extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('earn_model');
	}
	
	function earn_get()  
    {  
        // respond with information about a earn  
    }  
  
    function earn_put()  
    {  
		class EarnPoints
		{
			$u_id = $this->put("u_id");
			$pts_earned = $this->put("pts_earned");	
		}
        // create a new earn and respond with a status/errors  
    }  
  
    function earn_post()  
    {  
	class EarnPoints
		{
			$u_id = $this->put("u_id");
			$pts_earned = $this->put("pts_earned");	
		}
        // update an existing earn and respond with a status/errors  
    }  
  
    function earn_delete()  
    {  
        // delete a earn and respond with a status/errors  
    }  
	
}
// End of Earn.php
?>