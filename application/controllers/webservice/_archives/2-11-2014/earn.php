<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Earn extends REST_Controller {


function earn_get() { 
$getArray = array("u_id"=> $this->get('u_id'));
$validData = $this->earn_model->validate( $getArray, 'get' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->earn_model->get( $getArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'earn get request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}

}}


function earn_put() { 
$putArray = array(
"u_id"=> $this->put('u_id'),"pst_total"=> $this->put('pst_total')
);
$validData = $this->earn_model->validate( $putArray, 'put' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->earn_model->put( $putArray );
if(!$modelResult) 
{
  $this->response(array('error'=>'earn put request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function earn_post() { 
$whereArray = array(
"u_id"=> $this->post('u_id'));
$postArray = array(
"u_id"=> $u_id,"pst_total"=> $pst_total);
$validData = $this->earn_model->validate( $postArray, 'post' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->earn_model->post( $postArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'earn post request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function earn_delete() { 
$whereArray = array(
"u_id"=> $this->delete('u_id'));
$validData = $this->earn_model->validate( $whereArray, 'delete' );
if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->earn_model->delete( $whereArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'earn delete request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}
} 

 /* end of Earn.php */ 