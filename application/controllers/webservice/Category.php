<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Category extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}
	
    function index_get()
    {
        $getArray  = array(
            "cat_id" => $this->get('cat_id')
        );
        $validData = $this->category_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->category_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'category get request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_put()
    {
        $whereArray = array(
            "cat_id" => $this->put('cat_id')
        );
        $putArray   = array(
            "cat" => $cat,
            "cat_id" => $cat_id
        );
        $validData  = $this->category_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->category_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'category put request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_post()
    {
        $postArray = array(
            "cat" => $this->post('cat'),
            "cat_id" => $this->post('cat_id')
        );
        $validData = $this->category_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->category_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'category post request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_delete()
    {
        $whereArray = array(
            "cat_id" => $this->delete('cat_id')
        );
        $validData  = $this->category_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->category_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'category delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    
	function categories_get()
	{
		$tags = $this->category_model->get_all();

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
/* end of Category.php */