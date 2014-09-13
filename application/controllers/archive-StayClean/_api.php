<?php  
require(APPPATH.'/libraries/REST_Controller.php');  
  
class Api extends REST_Controller  
{  

		public $data;
	function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function index_get()
  {
     $query = $this->user_model->read();

    if(!$query)  
        {  
            $this->response(NULL, 400);  
        }  
  
       
          
        if($query)  
        {  
            $this->response($query, 200); // 200 being the HTTP response code  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
  }
	
    function user_get()  
    {  
        // if(!$this->get('id'))  
        // {  
            // $this->response(NULL, 400);  
        // }  
  
        // $user = $this->user_model->get( $this->get('id') );  
          
        // if($user)  
        // {  
            // $this->response($user, 200); // 200 being the HTTP response code  
        // }  
  
        // else  
        // {  
            // $this->response(NULL, 404);  
        // }  
		  $data = array('returned: '. $this->get('id'));  
        $this->response($data);  
    }  
      
    function user_post()  
    {  
        $result = $this->user_model->update( $this->post('id'), array(  
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