<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Citation extends REST_Controller
{
    function index_get()
    {
        $getArray  = array(
            "cit_id" => $this->get('cit_id')
        );
        $validData = $this->citation_model->validate($getArray, 'get');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->citation_model->get($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'citation get request failure.'
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
            "author" => $author,
            "source" => $source,
            "source_secondary" => $source_secondary,
            "pub_yr" => $pub_yr,
            "pub_date" => $pub_date,
            "title" => $title,
            "isbn_id" => $isbn_id,
            "cit_desc" => $cit_desc,
            "internet_address" => $internet_address,
            "pages" => $pages
        );
        $validData  = $this->citation_model->validate($putArray, 'put');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->citation_model->put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'citation put request failure.'
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
            "author" => $this->post('author'),
            "source" => $this->post('source'),
            "source_secondary" => $this->post('source_secondary'),
            "pub_yr" => $this->post('pub_yr'),
            "pub_date" => $this->post('pub_date'),
            "title" => $this->post('title'),
            "isbn_id" => $this->post('isbn_id'),
            "cit_desc" => $this->post('cit_desc'),
            "internet_address" => $this->post('internet_address'),
            "pages" => $this->post('pages')
        );
        $validData = $this->citation_model->validate($postArray, 'post');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->citation_model->post($sanatizedPayload);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'citation post request failure.'
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
        $validData  = $this->citation_model->validate($whereArray, 'delete');
        if (!$validData["isValid"]) {
            $this->response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult      = $this->citation_model->delete($whereArray);
            if (!$modelResult) {
                $this->response(array(
                    'error' => 'citation delete request failure.'
                ), 404);
            } else {
                $this->response($modelResult, 200);
            }
        }
    }
}
/* end of Citation.php */