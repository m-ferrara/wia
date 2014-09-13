<?php  
require(APPPATH'.libraries/REST_Controller.php');  
  
class Users extends REST_Controller {
	
	public $data;
	function __construct() 
	{
		parent::__construct();
		// $this->load->model('valuation_model');
		// $this->load->model('citations_model');
		// $this->load->model('users_model');
		$this->load->model('user_model');
		// $this->load->model('comments_model');
		// $this->load->model('tagging_model');
	}
	
public function index()
	{
	$data['logged'] = isLoggedBoolean();	
	$this->load->view('home/index', $data);	
	}

/////////////////////////////////////////////////////////////////////////////////
//// JSON OUTPUT REFS ~ accessing these gets JSON encoded data results     //////
/////////////////////////////////////////////////////////////////////////////////
// tag_families and all_tags used to populate front end interface and demarcate citations
	// public function tag_families() {
		// $this->tagging_model->getTagFamilies();
	// }
	
	// public function all_tags() {
		// $this->tagging_model->allTags();
	// }
	
	public function user_get()  
    {  
        if(!$this->get('id'))  
        {  
            $this->response(NULL, 400);  
        }  
  
        $user = $this->user_model->get( $this->get('id') );  
          
        if($user)  
        {  
            $this->response($user, 200); // 200 being the HTTP response code  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
    }  
	// 2013 METHODS--
	// User Controller   ** USERS **
	public function profile_create() {
		$this->user_model->user_profile_create();
	}
	
	public function profile_read() {
		$this->user_model->user_profile_read();
	}
	
	public function profile_update() {
		$this->user_model->user_profile_update();
	}
	
	public function profile_delete() {
		$this->user_model->user_profile_delete();
	}
	
	public function rating_create() {
		$this->user_model->user_rating_create();
	}
	
	public function rating_update() {
		$this->user_model->user_rating_update();
	}
	
	public function list_create() {
		$this->user_model->user_list_create();
	}
	
	public function list_delete() {
		$this->user_model->user_list_delete();
	}
	
}
	
	// //  **************   END USERS CONTROLLER **************************
	
	
	// // // Citations Controller  ** CITATIONS **
	// // public function create() {
		// // $this->citation_model->create();
	// // }
	
	// // public function read() {
		// // $this->citation_model->read();
	// // }
	
	// // public function update() {
		// // $this->citation_model->update();
	// // }
	
	// // public function delete() {
		// // $this->citation_model->delete();
	// // }
	
	// // public function flag() {
		// // $this->citation_model->flag();
	// // }
	
	// // public function tag() {
		// // $this->citation_model->tag();
	// // }
	// // // *******     END CITATIONS CONTROLLER  ****************
	
	// // Tags Controller   ** TAGS **
	// public function create() {
		// $this->tag_model->tag_create();
	// }
	
	// public function all_tags() {
		// $this->tag_model->all_tags();
	// }
	
	// // public function categories() {
		// // $this->tag_model->categories();
	// // }
	
	// public function delete() {
		// $this->tag_model->tag_delete();
	// }
	
	// // *******     END TAGS CONTROLLER  ****************
	
	// // comments Controller    ** COMMENTS **
	// public function create() {`
		// $this->comment_model->comment_create();
	// }
	
	// // public function read() {
		// // $this->comment_model->comment_read();
	// // }
	
	// // public function update() {
		// // $this->comment_model->comment_update();
	// // }
	
	// public function delete() {
		// $this->comment_model->comment_delete();
	// }
	
	// public function flag() {
		// $this->comment_model->comment_flag();
	// }
	
	// // public function tag() {
		// // $this->comment_model->comment_tag();
	// // }
	// // ****** END COMMENTS CONTROLLER ***********************
	
	// // ratings Controller    ** RATINGS **
	// public function create() {
		// $this->rating_model->rating_create();
	// }
	
	// public function read() {
		// $this->rating_model->rating_read();
	// }
	
	// public function update() {
		// $this->rating_model->rating_update();
	// }
	
	// public function delete() {
		// $this->rating_model->rating_delete();
	// }
	
	// public function flag() {
		// $this->rating_model->rating_flag();
	// }
	// // ****** END ratingS CONTROLLER ***********************
	
	// // Meta-Data Controller    ** META-DATA **
	// public function add_points() {
	// // event of sign-up, contributing entries/comments/votes.
		// $this->metadata_model->meta_add_points();
	// }
	
	// public function track_view() {
		// $this->metadata_model->meta_track_view();
	// }
	
	// public function update() {
		// $this->metadata_model->metadata_update();
	// }
	
	// public function delete() {
		// $this->metadata_model->metadata_delete();
	// }
	
	// public function flag() {
		// $this->metadata_model->metadata_flag();
	// }
	
	// public function tag() {
		// $this->metadata_model->metadata_tag();
	// }
	// //   **************  END META-DATA CONTROLLER ********************
	
	// // previous learning code.
	// public function allTags() {
		// $this->tagging_model->allTags();
	// }

	// public function user_status()
    // {
        // $logged_in = $this->users_model->logged_in();
        // $data = array(
            // 'isLoggedIn' => $logged_in,
            // 'userId' => $logged_in ? $this->session->userdata('userid') : ''
           // /* 'userName' => $logged_in ? $this->user_model->get_user()->username : '',
            // 'userGroup' => $logged_in ? $this->user_model->get_user()->group : '' */
        // );
        // $this->output->set_header('Content-type: application/json');
        // $this->output->set_output(json_encode($data));
    // }
	
	// public function register()
    // {
        // $logged_in = $this->users_model->logged_in();
        // $data = array(
            // 'isLoggedIn' => $logged_in,
            // 'userId' => $logged_in ? $this->session->userdata('userid') : ''
           // /* 'userName' => $logged_in ? $this->user_model->get_user()->username : '',
            // 'userGroup' => $logged_in ? $this->user_model->get_user()->group : '' */
        // );
        // $this->output->set_header('Content-type: application/json');
        // $this->output->set_output(json_encode($data));
    // }

// }

// /*
 // * end of Users.php CONTROLLER
 // *
 // */