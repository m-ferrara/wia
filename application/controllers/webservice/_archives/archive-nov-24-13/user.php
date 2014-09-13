<?php  
require(APPPATH.'/libraries/REST_Controller.php');  
  
class User extends REST_Controller  
{  

	function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
    function user_get()  
    {  
        if(!$this->get('id'))  
        {  
            $this->response(NULL, 400);  
        }  
  
        $user = $this->user_model->user_get( $this->get('id') );  
          
        if($user)  
        {  
            $this->response($user, 200); // 200 being the HTTP response code  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
    }  
      
    function user_post()  
    {  
        $result = $this->user_model->update( array(  
            'name' => $this->post('name'),  
            'email' => $this->post('email')  
        ));  
          
        if($result === FALSE)  
        {  
            $this->response(array('status' => 'failed'));  
        }  
          
        else  
        {  
            $this->response(array('status' => 'success'));  
        }  
          
    }  
      
    function users_get()  
    {  
        $users = $this->user_model->get_all();  
          
        if($users)  
        {  
            $this->response($users, 200);  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
    } 
}
?>