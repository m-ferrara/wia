<?php
require(APPPATH'.libraries/REST_Controller.php');

class Share extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('share_model');
	}
	
	function share_get()  
    {  
        // respond with information about a share  
    }  
  
    function share_put()  
    {  
        // create a new share and respond with a status/errors  
    }  
  
    function share_post()  
    {  
        // update an existing share and respond with a status/errors  
    }  
  
    function share_delete()  
    {  
        // delete a share and respond with a status/errors  
    }  
	
}
// End of Share.php