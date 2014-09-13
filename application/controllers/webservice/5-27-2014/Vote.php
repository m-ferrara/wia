<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Vote extends REST_Controller {
	/* Handles CRUD of VOTE Entity */
	
		function __construct()
	{
		parent::__construct();
		$this->load->model('vote_model');
	}
	
	function vote_get() { 
		$getArray = array("u_id" => $this->get('u_id'), "cit_id" => $this->get('cit_id'));
		$validData = $this->vote_model->validate($getArray, 'get');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->vote_model->get($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'vote get request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	
	function vote_put() { 
		$putArray = array("u_id" => $this->put('u_id'), "cit_id" => $this->put('cit_id'), "rt_val" => $this->put('rt_val'));
		$validData = $this->vote_model->validate($putArray, 'put');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->vote_model->put($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'vote put request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	
	function vote_post() { 
		$whereArray = array("u_id" => $this->post('u_id'), "cit_id" => $this->post('cit_id'));
				$postArray = array("u_id" => $u_id, "cit_id" => $cit_id, "rt_val" => $rt_val);
		$validData = $this->vote_model->validate($postArray, 'post');
		if (!$validData["isValid"]) { $this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->vote_model->post($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'vote post request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}

	function vote_delete() { 
		$whereArray = array("u_id" => $this->delete('u_id'), "cit_id" => $this->delete('cit_id'));
		$validData = $this->vote_model->validate($whereArray, 'delete');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->vote_model->delete($whereArray);
			if (!$modelResult) {  $this->response(array('error' => 'vote delete request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}

} /* end of Vote.php */
