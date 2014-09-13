<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Vote extends REST_Controller {


function vote_get() { 
$getArray = array("u_id"=> $this->get('u_id'),"cit_id"=> $this->get('cit_id'));
$validData = $this->vote_model->validate( $getArray, 'get' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->vote_model->get( $getArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'vote get request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}

}}


function vote_put() { 
$putArray = array(
"u_id"=> $this->put('u_id'),"cit_id"=> $this->put('cit_id'),"rt_val"=> $this->put('rt_val')
);
$validData = $this->vote_model->validate( $putArray, 'put' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->vote_model->put( $putArray );
if(!$modelResult) 
{
  $this->response(array('error'=>'vote put request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function vote_post() { 
$whereArray = array(
"u_id"=> $this->post('u_id'),"cit_id"=> $this->post('cit_id'));
$postArray = array(
"u_id"=> $u_id,"cit_id"=> $cit_id,"rt_val"=> $rt_val);
$validData = $this->vote_model->validate( $postArray, 'post' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->vote_model->post( $postArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'vote post request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function vote_delete() { 
$whereArray = array(
"u_id"=> $this->delete('u_id'),"cit_id"=> $this->delete('cit_id'));
$validData = $this->vote_model->validate( $whereArray, 'delete' );
if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->vote_model->delete( $whereArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'vote delete request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}
} 

 /* end of Vote.php */ 