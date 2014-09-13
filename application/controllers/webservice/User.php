<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class User extends REST_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	function authenticate_get() { 
		//$reqArray = array("email" => $this->post('email'), "password" => $this->post('password'));
		$isAuthenticated = $this->user_model->authenticate();
		if ($isAuthenticated) {
			// TODO: Set Session Start
			 $this->response(json_encode($isAuthenticated), 200);
		} else {
			// TODO: Set Denial Behavior
			 $this->response(json_encode($isAuthenticated), 401);
			}
	}
	
    function index_get()
    {
        $getArray  = array(
            "u_id" => $this->get('u_id')
        );
        $validData = $this->user_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->user_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'user get request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_put()
    {
        $whereArray = array(
            "u_id" => $this->put('u_id')
        );
        $putArray   = array(
            "u_id" => $u_id,
            "email" => $email,
            "password" => $password,
            "name_first" => $name_first,
            "name_last" => $name_last,
            "join_date" => $join_date
        );
        $validData  = $this->user_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->user_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'user put request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_post()
    {
        $postArray = array(
            "u_id" => $this->post('u_id'),
            "email" => $this->post('email'),
            "password" => $this->post('password'),
            "name_first" => $this->post('name_first'),
            "name_last" => $this->post('name_last'),
            "join_date" => $this->post('join_date')
        );
        $validData = $this->user_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->user_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'user post request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_delete()
    {
        $whereArray = array(
            "u_id" => $this->delete('u_id')
        );
        $validData  = $this->user_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->user_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'user delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
}
/* end of User.php */