<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Tag extends REST_Controller {

	function tag_get() {
		$getArray = array("tag_id"=> $this->get('tag_id'));
		// valid data should return array as array($isValid=>true/false, $errorMsg=>"string")
		$validData = $this->tag_model->validate( $getArray, 'get' );

		if	(!$validData["isValid"])
		{
	  //$this->response(NULL, 400);
	  $this->response( json_decode($validData["errorMsg"]) );
		}
		else {
			$sanatizedPayload = $validData["payload"];
			$modelResult = $this->tag_model->get( $getArray );

			if(!$modelResult)
			{
		  $this->response(array('errors'=>array("tag_id"=>"Tag not found.")), 404);
			}
			else {

				$this->response($modelResult, 200); // 200 being the HTTP response code
			}

		}
	}


	function tag_put() {
		$putArray = array(
	"tag_id"=> $this->put('tag_id'),"tag"=> $this->put('tag'),"cat_id"=> $this->put('cat_id')
		);
		$validData = $this->tag_model->validate( $putArray, 'put' );

		if(!$validData)
		{
	  $this->response(NULL, 400);
		}
		else {

			$modelResult = $this->tag_model->put( $putArray );
			if(!$modelResult)
			{
		  $this->response(array('error'=>'tag put request failure.'), 404);
			}
			else {

				$this->response($modelResult, 200); // 200 being the HTTP response code
			}
		}
	}

	function tag_post() {
		$whereArray = array("tag_id"=> $this->post('tag_id'));
		$postArray = array("tag_id"=> $tag_id,"tag"=> $tag,"cat_id"=> $cat_id);
		$validData = $this->tag_model->validate( $postArray, 'post' );

		if(!$validData)
		{
			$this->response(NULL, 400);
		}
		else {

			$modelResult = $this->tag_model->post( $postArray );

			if(!$modelResult)
			{
				$this->response(array('error'=>'tag post request failure.'), 404);
			}
			else {

				$this->response($modelResult, 200); // 200 being the HTTP response code
			}
		}
	}

	function tag_delete() {
		$whereArray = array(
"tag_id"=> $this->delete('tag_id'));
		$validData = $this->tag_model->validate( $whereArray, 'delete' );
		if(!$validData)
		{
			$this->response(NULL, 400);
		}
		else {

			$modelResult = $this->tag_model->delete( $whereArray );

			if(!$modelResult)
			{
				$this->response(array('error'=>'tag delete request failure.'), 404);
			}
			else {

				$this->response($modelResult, 200); // 200 being the HTTP response code
			}
		}
	}

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

/* end of Tag.php */