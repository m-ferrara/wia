<?php

// Display_data Controller assembles the information which will construct
// the front-end user interface - otherwise known as the View Model Object.
// There will be a JavaScript Library (e.g. Knockout) which will bind the model
// to templates which represent the information in valid HTML5 mark-up.



class Display_data extends CI_Controller {


function __construct() 

{

parent::__construct();

$this->load->model('display_model');

}


//  will be invoking display_model methods to return category, tag, and associated navigation information.

//  this information will be consumed by a knockout template and code.

function makeObject(){
/*	$Categories = $this->getCategories();
	$Tags = $this->getTags();
	
	
	$resultArray = array("categories"=>$Categories, "tags"=>$Tags);
	
	
	echo json_encode( $resultArray );*/
	$resultArray = $this->display_model->makeObject();
	echo json_encode( $resultArray );
}


function cachedGraphicDisplayModel(){
/*	$Categories = $this->getCategories();
	$Tags = $this->getTags();
	
	
	$resultArray = array("categories"=>$Categories, "tags"=>$Tags);
	
	
	echo json_encode( $resultArray );*/
	$data["GraphicDisplayModel"] = $this->display_model->makeObject();
	$this->output->cache(1);
	$this->load->view("WIA-VIEWS/BACK-END/DISPLAY/Graphic_Display_Model", $data);	
}




}
/* end of display_data.php */