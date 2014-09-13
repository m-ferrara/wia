
<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class User extends REST_Controller {


function user_get() { 
$getArray = array("u_id"=> $this->get('u_id'));
$validData = $this->user_model->validate( $getArray, 'get' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->user_model->get( $getArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'user get request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}

}}


function user_put() { 
$putArray = array(
"u_id"=> $this->put('u_id'),"email"=> $this->put('email'),"password"=> $this->put('password'),"display_name"=> $this->put('display_name'),"join_date"=> $this->put('join_date')
);
$validData = $this->user_model->validate( $putArray, 'put' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->user_model->put( $putArray );
if(!$modelResult) 
{
  $this->response(array('error'=>'user put request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function user_post() { 
$whereArray = array(
"u_id"=> $this->post('u_id'));
$postArray = array(
"u_id"=> $u_id,"email"=> $email,"password"=> $password,"display_name"=> $display_name,"join_date"=> $join_date);
$validData = $this->user_model->validate( $postArray, 'post' );

if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->user_model->post( $postArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'user post request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}

function user_delete() { 
$whereArray = array(
"u_id"=> $this->delete('u_id'));
$validData = $this->user_model->validate( $whereArray, 'delete' );
if(!$validData) 
{
  $this->response(NULL, 400);
} 
else { 

$modelResult = $this->user_model->delete( $whereArray );

if(!$modelResult) 
{
  $this->response(array('error'=>'user delete request failure.'), 404);
} 
else { 

   $this->response($modelResult, 200); // 200 being the HTTP response code
}
}
}
} 

 /* end of User.php */ 