<?php
class User_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}

		private function emailExists($user_email){
			$validateUniqueEmail = array('email' => $user_email);
			$this->db->where($validateUniqueEmail);
			$whereEmail = $this->db->get("user_profile");
			$emailResult = count($whereEmail->result_array());
		
			if ($emailResult == 0) {
				return false;
			}
			else {
				return true;
			}
		}	
		
		function ratingExists($u_id, $cit_id){
			$ratingId = array(
									'u_id' => $u_id,
									'cit_id'=>$cit_id
									);
			$this->db->where($ratingId);
			$whereMatches = $this->db->get("user_cit_ratings");
			$checkResult = count($whereMatches->result_array());
		
			if ($checkResult == 0) {
				return false;
			}
			else {
				return true;
			}
		}	

	function get_all() {
		$dbQry = $this->get("user_profile");
		$dbRslt = $dbQry->result();
		if ($dbRslt) {
			return $dbRslt;
		} else {
			return false;
		}
	}

	function get( $u_id ) {
		
			$queryArray = array(
				'u_id' => $u_id
				);
			$whereUser = $this->db->where($queryArray);
			$getUser = $this->db->get('user_profile');
			return $getUser->result_array();
		}
/*
 * user_profile_create Creates profile for authentication/login and user meta-data purposes.
 * @param POST from jQuery AJAX on modal_registration view
 * @return Boolean (true if insert successful, false if email already exists)
 * @throw if insert not work or if email already exists...
 */
	function user_profile_create() {
		$user_email = $this->input->post("email");
		$password = $this->input->post("password");
		$join_date = date("Y-d-m");
		
		$saltA = "xyZ1";
		$saltB = "Yzx2";
		$hash = md5($saltA.$password.$saltB);
		
		$insert_query = array(
			'email' => $user_email,
			'password' => $hash,
			'join_date' => $join_date
		);
		
		$emailAlreadyRegistered = $this->emailExists($user_email);
		
		if (!$emailAlreadyRegistered) {
			$dbAccess = $this->db->insert('user_profile', $insert_query);
			$u_id = $this->db->insert_id();
			
			$successMsg = array("u_id" => $u_id);
			 $this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($successMsg));
			
		} 
		else {
			$existsMsg = array("Response"=>"User Account Creation Error: Validate input and try again.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($existsMsg));
		}
		
	}
	
/*
 * user_profile_read 
 * @param {int} u_id POST
 * @return  u_id, email, password, display_name 
 * @throw Not Found
 */
	function user_profile_read() {
		// get user info
		$u_id = $this->input->post("u_id");
		$qArray = array(	'u_id' => $u_id );
		$this->db->where($qArray);
		$result = $this->db->get('user_profile');
		if (count($result) == 1) {
			$this->output->set_header('Content-type: application/json');
			return $this->output->set_output(json_encode($result->result_array()));
		} 
		else {
			return false;
		}
	}	
	
/*
 * user_profile_update 
 * @param Profile Variables/Values
 * @return  Updated Profile Values
 * @throw 
 */
	function user_profile_update() {
		// get user info
		$u_id = $this->input->post("u_id");
		$qArray = array(	'u_id' => $u_id );
		$this->db->where($qArray);
		$result = $this->db->get('user_profile');
		if (count($result) == 1) {
		// update user
			$password = $this->input->post('password');
			$saltA = "xyZ1";
			$saltB = "Yzx2";
			$hash = md5($saltA.$password.$saltB);
			
			$email = $this->input->post('email');
			$displayName = $this->input->post('display_name');
			$updateArray = array(
				'email'=> $email, 
				'password'=>$hash, 
				'display_name'=>$displayName
				);
			$this->db->where($qArray);
			$updateQ = $this->db->update('user_profile', $updateArray);
			if ($updateQ) {
				$this->db->where($qArray);
				$result = $this->db->get('user_profile');
				$this->output->set_header('Content-type: application/json');
				return $this->output->set_output(json_encode($result->result_array()));
			}
		
	}
	else {
			$errorMsg = array("Response"=>"Update Error, Please Try Again Later.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($errorMsg));
		}
	}		
	
/*
 * user_profile_delete
 * @param 
 * @return  
 * @throw 
 */
	function user_profile_delete() {
		// get user info
		$u_id = $this->input->post("u_id");
		$qArray = array(	'u_id' => $u_id );
		$this->db->where($qArray);
		$result = $this->db->get('user_profile');
		if (count($result) == 1) {
			$this->db->where($qArray);
			$this->db->delete('user_profile');	
			
			$deletedMsg = array("Response"=>"Account Successfully Deleted.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($deletedMsg));
		} else {
			$errorMsg = array("Response"=>"Removal Error, Please Try Again Later.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($errorMsg));
		}
	}	

/*
 * user_rating_create INSERTS numeric (1-5) value, user_id value and cit_id value in 'user_ratings'.
 * @param 
 * @return  
 * @throw 
 */
	function user_rating_create() {
		$u_id = $this->input->post("u_id");
		$cit_id = $this->input->post("cit_id");
		$rating = $this->input->post("rating");
		
		$ratingExists = $this->ratingExists($u_id, $cit_id);
		if (!$ratingExists && $rating <=5 ) {
			$qArray = array(	
										'u_id' => $u_id,
										'cit_id' => $cit_id,
										'rt_val' => $rating
									);
									
			$recordRating = $this->db->insert('user_cit_ratings', $qArray);
			
			if ($recordRating) {
				$successMsg = array("Response"=>"Rating Recorded.");
				$this->output->set_header('Content-type: application/json');
				return $this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				return $this->output->set_output(json_encode($errorMsg));
			}
		} 
		else {
				$this->user_rating_update();
			}
	} 		

/*
 * user_rating_update UPDATES numeric (1-5) value, user_id value and cit_id value in 'user_ratings'.
 * @param 
 * @return  
 * @throw 
 */
	function user_rating_update() {
		$u_id = $this->input->post("u_id");
		$cit_id = $this->input->post("cit_id");
		$rating = $this->input->post("rating");
		
		$wArray = array(	
									'u_id' => $u_id,
									'cit_id' => $cit_id
									);
		
		$qArray = array(	
									'u_id' => $u_id,
									'cit_id' => $cit_id,
									'rt_val' => $rating
								);
								
		$this->db->where( $wArray );		
		$ratingExists = $this->db->get('user_cit_ratings');
		if (count( $ratingExists ) == 1  && $rating <=5) {
			$this->db->where( $wArray );	
			$recordRating = $this->db->update('user_cit_ratings', $qArray);
			if ($recordRating) {
				$successMsg = array("Response"=>"Rating Successfully Updated.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"Rating Update Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($errorMsg));
			}
		} else {
			$errorMsg = array("Response"=>"Rating Update Error, Please Try Again Later.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($errorMsg));
		}
	}			
	
/*
 * user_list_create INSERT numeric cit_id value and user_id value in 'user_cit_favorites'.
 * @param 
 * @return  
 * @throw 
 */
	function user_list_create() {
		$u_id = $this->input->post("u_id");
		$list_name = $this->input->post("list_name");
		// get user info
		$qArray = array(	
									'u_id' => $u_id,
									'list_name' => $list_name
								);
								
		$this->db->where( $qArray );		
		$listExists = $this->db->get('user_saved_lists');
		if (count( $listExists ) == 0) {
			$this->db->where( $qArray );	
			$addList = $this->db->insert('user_saved_lists', $qArray);
			if ($addList) {
				$successMsg = array("Response"=>"List Successfully Created.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"List Create Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($errorMsg));
			}
		} else {
			$errorMsg = array("Response"=>"List Create Error: List Name Already Exists.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($errorMsg));
		}
	}	

/*
 * user_list_delete REMOVES numeric cit_id value and user_id value from 'user_cit_favorites'.
 * @param 
 * @return  
 * @throw 
 */
	function user_list_delete() {
		$u_id = $this->input->post("u_id");
		$list_id = $this->input->post("list_id");
		
		$qArray = array(	
									'u_id' => $u_id,
									'list_id' => $list_id
								);
		
		$this->db->where( $qArray );		
		$listDeleted = $this->db->delete('user_saved_lists');
		
		if ($listDeleted) {
				$successMsg = array("Response"=>"List Successfully Deleted.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"List Deletion Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($errorMsg));
			}
	}	
	
/*
 * user_list_entry INSERT numeric cit_id value and user_id value from 'user_cit_favorites'.
 * @param 
 * @return  
 * @throw 
 */
	function user_list_item_entry() {
		$cit_id = $this->input->post("cit_id");
		$list_id = $this->input->post("list_id");
		// get user info
		
		$qArray = array(	
									'cit_id' => $cit_id,
									'list_id' => $list_id
								);
		
	$this->db->where( $qArray );		
		$entryExists = $this->db->get('user_list_data');
		if (count( $entryExists ) == 0) {
			$this->db->where( $qArray );	
			$addListEntry = $this->db->insert('user_list_data', $qArray);
			if ($addListEntry) {
				$successMsg = array("Response"=>"List  Entry Successfully Created.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"List Item Entry Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($errorMsg));
			}
		} else {
			$errorMsg = array("Response"=>"List Item Create Error: List Entry Already Exists.");
			$this->output->set_header('Content-type: application/json');
			$this->output->set_output(json_encode($errorMsg));
		}
	}		

/*
 * user_list_remove INSERT numeric cit_id value and user_id value from 'user_cit_favorites'.
 * @param 
 * @return  
 * @throw 
 */
	function user_list_item_remove() {
		$list_id = $this->input->post("list_id");
		$cit_id = $this->input->post("cit_id");
		// get user info
		
		$qArray = array(	
									'cit_id' => $cit_id,
									'list_id' => $list_id
								);
		
		$this->db->where( $qArray );		
		$listItemDeleted = $this->db->delete('user_list_data');
		
		if ($listItemDeleted) {
				$successMsg = array("Response"=>"List Item Successfully Deleted.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($successMsg));
			} else {
				$errorMsg = array("Response"=>"List Item Deletion Error, Please Try Again Later.");
				$this->output->set_header('Content-type: application/json');
				$this->output->set_output(json_encode($errorMsg));
			}
	}			
	
}
/* end of user_model.php */
/* location: appname/application/models/ */