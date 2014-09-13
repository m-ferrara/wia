<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Earn extends REST_Controller
{
    function index_get()
    {
        $getArray  = array(
            "u_id" => $this->get('u_id')
        );
        $validData = $this->earn_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->earn_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'earn get request failure.'
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
            "pts_total" => $pts_total
        );
        $validData  = $this->earn_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->earn_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'earn put request failure.'
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
            "pts_total" => $this->post('pts_total')
        );
        $validData = $this->earn_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->earn_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'earn post request failure.'
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
        $validData  = $this->earn_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->earn_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'earn delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
}
/* end of Earn.php */