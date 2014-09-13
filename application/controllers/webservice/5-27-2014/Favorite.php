<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Favorite extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('favorite_model');
	}
	
	
	function favorite_get() { 
		$getArray = array("list_id" => $this->get('list_id'));
		$validData = $this->favorite_model->validate($getArray, 'get');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->favorite_model->get($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'favorite get request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function favorite_put() { 
		$putArray = array("list_id" => $this->put('list_id'), "list_name" => $this->put('list_name'), "u_id" => $this->put('u_id'));
		$validData = $this->favorite_model->validate($putArray, 'put');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->favorite_model->put($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'favorite put request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function favorite_post() { 
		$whereArray = array("list_id" => $this->post('list_id'));
				$postArray = array("list_id" => $list_id, "list_name" => $list_name, "u_id" => $u_id);
		$validData = $this->favorite_model->validate($postArray, 'post');
		if (!$validData["isValid"]) { $this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->favorite_model->post($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'favorite post request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function favorite_delete() { 
		$whereArray = array("list_id" => $this->delete('list_id'));
		$validData = $this->favorite_model->validate($whereArray, 'delete');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->favorite_model->delete($whereArray);
			if (!$modelResult) {  $this->response(array('error' => 'favorite delete request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}

} /* end of Favorite.php */
