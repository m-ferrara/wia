<?php
require(APPPATH'.libraries/REST_Controller.php');

class Favorite extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('favorite_model');
	}
	
	function favorite_get()  
    {  
        // respond with information about a favorite  
    }  
  
    function favorite_put()  
    {  
        // create a new favorite list and respond with a status/errors  
			class UserSavedLists
		{
			$u_id = $this->put("u_id");
			$list_name = $this->put("list_name");
			$list_id = $this->put("list_id");
		}
    }  
  
    function favorite_post()  
    {  
        // update an existing favorite and respond with a status/errors
		class UserListData
		{	
			$list_id = $this->post("list_id");
			$cit_id = $this->post("cit_id");
		}
    }  
  
    function favorite_delete()  
    {  
        // delete a favorite and respond with a status/errors  
    }  
	
}
// End of Favorite.php