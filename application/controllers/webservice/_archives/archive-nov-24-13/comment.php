<?php
require(APPPATH'.libraries/REST_Controller.php');

class Comment extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('comment_model');
	}
	
	function comment_get()  
    {  
        // respond with information about a comment  
    }  
  
    function comment_put()  
    {  
			class CitCmts
			{
				$cmt_id = $this->put("cmt_id");
				$cit_id = $this->put("cit_id");
				$author = $this->put("author");
				$cmt_body = $this->put("cmt_body");
				$cmt_date = $this->put("cmt_date");
			}
        // create a new comment and respond with a status/errors  
    }  
  
    function comment_post()  
    {  
		class CitCmts
			{
				$cmt_id = $this->post("cmt_id");
				$cit_id = $this->post("cit_id");
				$author = $this->post("author");
				$cmt_body = $this->post("cmt_body");
				$cmt_date = $this->post("cmt_date");
			}
        // update an existing comment and respond with a status/errors  
    }  
  
    function comment_delete()  
    {  
        // delete a comment and respond with a status/errors  
    }  
	
}
// End of Comment.php
?>