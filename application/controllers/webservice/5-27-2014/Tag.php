<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Tag extends REST_Controller {
		
	//private $CI;
	

	function __construct()
	{
		parent::__construct();
		$this->load->model('tag_model');
	}
	
/*
	function index(){
		//$data["data"] = $this->display_model->makeObject();
		$this->load->view("knockout/example");//, $data);
	}
	*/

	
	function tag_get() {
		$getArray = array("tag_id" => $this->get('tag_id'));
		$validData = $this->tag_model->validate($getArray, 'get');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else {
			 $sanatizedPayload = $validData["payload"];

			$modelResult = $this->tag_model->get($sanatizedPayload); //$sanatizedPayload);
			if (!$modelResult) {
				  $this->response(array('error' => 'tag get request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
		$this->response( $getArray );
	}
		
	function tag_put() { 
		$putArray = array("tag" => $this->put('tag'), "cat_id" => $this->put('cat_id'));
		$validData = $this->tag_model->validate($putArray, 'put');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->tag_model->put($sanatizedPayload);
			if (!$modelResult) {
				  $this->response(array('error' => 'tag put request failure.'), 404);
			} else {
				    $this->response($modelResult, 200);
			}
		}
	}
	function tag_post() { 
		$whereArray = array("tag_id" => $this->post('tag_id'));
		$postArray = array("tag_id" => $this->post('tag_id'), "tag" => $this->post('tag'), "cat_id" => $this->post('cat_id'));
		$validData = $this->tag_model->validate($postArray, 'post');
		if (!$validData["isValid"]) { $this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->tag_model->post($sanatizedPayload, $whereArray);
			if (!$modelResult) {  $this->response(array('error' => 'tag post request failure.'), 404);
			} else {
				    $this->response($modelResult, 200);
			}
		}
	}
	function tag_delete() { 
		$whereArray = array("tag_id" => $this->delete('tag_id'));
		$validData = $this->tag_model->validate($whereArray, 'delete');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->tag_model->delete($whereArray);
			if (!$modelResult) {  $this->response(array('error' => 'tag delete request failure.'), 404);
			} else {
				    $this->response($modelResult, 200);
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
	
	function category_get() {
		$getArray = array("cat_id" => $this->get('cat_id'));
		$validData = $this->tag_model->validate($getArray, 'get');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else {
			$sanatizedPayload = $validData["payload"];

			$modelResult = $this->tag_model->get($sanatizedPayload); //$sanatizedPayload);
			if (!$modelResult) {
				  $this->response(array('error' => 'tag get request failure.'), 404);
			} else {    
				  $this->response($modelResult, 200);
			}
		}
		$this->response( $getArray );
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

} /* end of Tag.php */
