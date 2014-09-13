<?php  
// require(APPPATH'.libraries/REST_Controller.php');  
  
// class Citation extends REST_Controller {
class Citation extends CI_Controller {	
	public $data;
	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('citation_model');
	}

// Citations Controller  ** CITATIONS **

public function index_get()
	{
	//	$this->response($this->db->get('all_tags')->result_array());
	}

	public function create() {
		$this->citation_model->create();
	}
	
	public function read() {
	$cit_id = $this->input->get('cit_id');
		$data['citations'] = $this->citation_model->read($cit_id);
		$this->output->cache(5);
		$this->load->view('citation/read', $data);
		// $dbQry = $this->db->get("citations");
		// $dbRslts = $dbQry->results();
		// $this->response( $dbRslts );
	}
	
	public function update() {
		$this->citation_model->update();
	}
	
	public function delete() {
		$this->citation_model->delete();
	}
	
	public function flag() {
		$this->citation_model->flag();
	}
	
	public function tag() {
		$this->citation_model->tag();
	}
	// *******     END CITATIONS CONTROLLER  ****************
	
}
// End of citation.php