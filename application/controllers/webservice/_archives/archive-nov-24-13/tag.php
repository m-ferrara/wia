<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Tag extends REST_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('tag_model');
	}
	
	function tag_get()  
    {  
	  if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $tagID = $this->get('id');
		$tag = $this->tag_model->get( $tagID );
		
        if($tag)
        {
            $this->response($tag, 200); // 200 being the HTTP response code
		 
		}

        else
        {
            $this->response(array('error' => 'tag could not be found'), 404);
        }
        // respond with information about a tag  
    }  
  
    function tag_put()  
    {  
        // create a new tag and respond with a status/errors  
		// class AllTags
		// {
			$tag = $this->put("tag");
			$cat_id = $this->put("cat_id");
		// }
		
		$postResult = $this->tag_model->put($tag_id, $tag, $cat_id);
		
		if($postResult)
        {
            $this->response("Tag successfully entered", 200); // 200 being the HTTP response code
		 
		}

        else
        {
            $this->response(array('error' => 'Tag put Unsuccessful.'), 404);
        }
	}  
  
    function tag_post()  
    {  
        // update an existing tag and respond with a status/errors  
		// class AllTags
		// {
			$tag_id = $this->post("tag_id");
			$tag = $this->post("tag");
			$cat_id = $this->post("cat_id");
		// }
		$postResult = $this->tag_model->post($tag_id, $tag, $cat_id);
		
		if($postResult)
        {
            $this->response($postResult, 200); // 200 being the HTTP response code
		 
		}

        else
        {
            $this->response(array('error' => 'Tag Post Unsuccessful.'), 404);
        }
    }  
  
    function tag_delete()  
    {  
        // delete a tag and respond with a status/errors  
    }  
	
	//  TAGS
	function tags_get()  
    {  
		$tags = $this->tag_model->get_all();
		
        if($tags)
        {
            $this->response($tags, 200); // 200 being the HTTP response code
		 
		}

        else
        {
            $this->response(array('error' => 'tags could not be found'), 404);
        }
        // respond with information about a tag  
    }  
	function categories_get()  
    {  
		$tags = $this->tag_model->categories_get();
		
        if($tags)
        {
            $this->response($tags, 200); // 200 being the HTTP response code
		 
		}

        else
        {
            $this->response(array('error' => 'tags could not be found'), 404);
        }
        // respond with information about a tag  
    }  
}
// End of Tag.php