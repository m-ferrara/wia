<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Comment extends REST_Controller {
		
	function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model');
	}
	
	function comment_get() { 
			$getArray = array("cmt_id" => $this->get('cmt_id'));
		$validData = $this->comment_model->validate($getArray, 'get');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->comment_model->get($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'comment get request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function comment_put() { 
			$putArray = array("cmt_id" => $this->put('cmt_id'), "cit_id" => $this->put('cit_id'), "author" => $this->put('author'), "cmt_body" => $this->put('cmt_body'), "cmt_date" => $this->put('cmt_date'), "u_id" => $this->put('u_id'));
		$validData = $this->comment_model->validate($putArray, 'put');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->comment_model->put($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'comment put request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function comment_post() { 
			$whereArray = array("cmt_id" => $this->post('cmt_id'));
					$postArray = array("cmt_id" => $cmt_id, "cit_id" => $cit_id, "author" => $author, "cmt_body" => $cmt_body, "cmt_date" => $cmt_date, "u_id" => $u_id);
		$validData = $this->comment_model->validate($postArray, 'post');
		if (!$validData["isValid"]) { $this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->comment_model->post($sanatizedPayload);
			if (!$modelResult) {  $this->response(array('error' => 'comment post request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}
	function comment_delete() { 
			$whereArray = array("cmt_id" => $this->delete('cmt_id'));
		$validData = $this->comment_model->validate($whereArray, 'delete');
		if (!$validData["isValid"]) {$this->response(json_decode($validData["errorMsg"]));
		} else { $sanatizedPayload = $validData["payload"];
			$modelResult = $this->comment_model->delete($whereArray);
			if (!$modelResult) {  $this->response(array('error' => 'comment delete request failure.'), 404);
			} else {    $this->response($modelResult, 200);
			}
		}
	}

} /* end of Comment.php */
