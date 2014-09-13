<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Citation extends REST_Controller {

	 function citations_get()  
    {  
	//	$this->load->model('citation_model');
		$cits = $this->citation_model->citations_get();
		
		if($cits)
		{
			$this->response($cits, 200); // 200 being the HTTP response code
		 
		//echo json_encode( $cit );
		}
        else
        {
            $this->response(array('error' => 'An error was experienced.  '), 404);
        }
	}

	function citation_get() { 
	$getArray = array("cit_id"=> $this->get('cit_id'));
	$validData = $this->citation_model->validate( $getArray );

	if(!$validData) 
	{
	  $this->response(NULL, 400);
	} 
	else { 

	$modelResult = $this->citation_model->get( $getArray );

	if(!$modelResult) 
	{
	  $this->response(array('error'=>'citation get request failure.'), 404);
	} 
	else { 

	   $this->response($modelResult, 200); // 200 being the HTTP response code
	}

	}
	}


	function citation_put() { 
	$putArray = array(
	"cit_id"=> $this->put('cit_id'),"author"=> $this->put('author'),"source"=> $this->put('source'),"source_secondary"=> $this->put('source_secondary'),"pub_yr"=> $this->put('pub_yr'),"pub_date"=> $this->put('pub_date'),"title"=> $this->put('title'),"isbn_id"=> $this->put('isbn_id'),"cit_desc"=> $this->put('cit_desc'),"internet_address"=> $this->put('internet_address'),"pages"=> $this->put('pages')
	);
	$validData = $this->citation_model->validate( $putArray );

	if(!$validData) 
	{
	  $this->response(NULL, 400);
	} 
	else { 

	$modelResult = $this->citation_model->put( $putArray );
	if(!$modelResult) 
	{
	  $this->response(array('error'=>'citation put request failure.'), 404);
	} 
	else { 

	   $this->response($modelResult, 200); // 200 being the HTTP response code
	}
	}
	}

	function citation_post() { 
	$whereArray = array(
	"cit_id"=> $this->post('cit_id'));
	$postArray = array(
	"cit_id"=> $cit_id,"author"=> $author,"source"=> $source,"source_secondary"=> $source_secondary,"pub_yr"=> $pub_yr,"pub_date"=> $pub_date,"title"=> $title,"isbn_id"=> $isbn_id,"cit_desc"=> $cit_desc,"internet_address"=> $internet_address,"pages"=> $pages);
	$validData = $this->citation_model->validate( $whereArray );

	if(!$validData) 
	{
	  $this->response(NULL, 400);
	} 
	else { 

	$modelResult = $this->citation_model->post( $postArray );

	if(!$modelResult) 
	{
	  $this->response(array('error'=>'citation post request failure.'), 404);
	} 
	else { 

	   $this->response($modelResult, 200); // 200 being the HTTP response code
	}
	}
	}

	function citation_delete() { 
	$whereArray = array(
	"cit_id"=> $this->delete('cit_id'));
	$validData = $this->citation_model->validate( $whereArray );if(!$validData) 
	{
	  $this->response(NULL, 400);
	} 
	else { 

	$modelResult = $this->citation_model->delete( $whereArray );

	if(!$modelResult) 
	{
	  $this->response(array('error'=>'citation delete request failure.'), 404);
	} 
	else { 

	   $this->response($modelResult, 200); // 200 being the HTTP response code
	}
	}
	}
} 

 /* end of Citation.php */ 