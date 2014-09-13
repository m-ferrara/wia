<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Share extends REST_Controller
{
    function index_get()
    {
        $getArray  = array(
            "sender_id" => $this->get('sender_id'),
            "timestamp" => $this->get('timestamp')
        );
        $validData = $this->share_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->share_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'share get request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_put()
    {
        $whereArray = array(
            "sender_id" => $this->put('sender_id'),
            "timestamp" => $this->put('timestamp')
        );
        $putArray   = array(
            "sender_id" => $sender_id,
            "recipient_id" => $recipient_id,
            "cit_id" => $cit_id,
            "timestamp" => $timestamp
        );
        $validData  = $this->share_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->share_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'share put request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_post()
    {
        $postArray = array(
            "sender_id" => $this->post('sender_id'),
            "recipient_id" => $this->post('recipient_id'),
            "cit_id" => $this->post('cit_id'),
            "timestamp" => $this->post('timestamp')
        );
        $validData = $this->share_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->share_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'share post request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_delete()
    {
        $whereArray = array(
            "sender_id" => $this->delete('sender_id'),
            "timestamp" => $this->delete('timestamp')
        );
        $validData  = $this->share_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->share_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'share delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
}
/* end of Share.php */