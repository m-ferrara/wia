<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Meta extends REST_Controller
{
    function index_get()
    {
        $getArray  = array(
            "cit_id" => $this->get('cit_id')
        );
        $validData = $this->meta_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->meta_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'meta get request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_put()
    {
        $whereArray = array(
            "cit_id" => $this->put('cit_id')
        );
        $putArray   = array(
            "cit_id" => $cit_id,
            "amnt_votes" => $amnt_votes,
            "avg_rating" => $avg_rating,
            "added_by" => $added_by,
            "cit_views_ct" => $cit_views_ct,
            "cit_cmts_ct" => $cit_cmts_ct
        );
        $validData  = $this->meta_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->meta_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'meta put request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_post()
    {
        $postArray = array(
            "cit_id" => $this->post('cit_id'),
            "amnt_votes" => $this->post('amnt_votes'),
            "avg_rating" => $this->post('avg_rating'),
            "added_by" => $this->post('added_by'),
            "cit_views_ct" => $this->post('cit_views_ct'),
            "cit_cmts_ct" => $this->post('cit_cmts_ct')
        );
        $validData = $this->meta_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->meta_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'meta post request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
    function index_delete()
    {
        $whereArray = array(
            "cit_id" => $this->delete('cit_id')
        );
        $validData  = $this->meta_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->meta_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'meta delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
}
/* end of Meta.php */