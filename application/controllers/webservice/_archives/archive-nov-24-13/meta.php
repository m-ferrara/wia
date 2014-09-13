<?php
require(APPPATH'.libraries/REST_Controller.php');

class Meta extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('meta_model');
	}
	
	function meta_get()  
    {  
        // respond with information about a meta  
    }  
  
    function meta_put()  
    {  
        // create a new meta and respond with a status/errors  
    }  
  
    function meta_post()  
    {  
        // update an existing meta and respond with a status/errors  
    }  
  
    function meta_delete()  
    {  
        // delete a meta and respond with a status/errors  
    }  
	
}
// End of Meta.php