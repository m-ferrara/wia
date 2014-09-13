/* js file
	Controller generator
	<?php defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH.'/libraries/REST_Controller.php';
*/

// js doc
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
};
var ione = {}, $_PHP_OUTPUT_VAR = '';
ione.METHODS = ['GET','PUT','POST','DELETE'];
ione.ENTITIES = [
  {
    'resource' : 'citation'
	,'table_name' : 'citations'
	,'attributes' : ['cit_id', 'author', 'source', 'source_secondary', 'pub_yr', 'pub_date', 'title', 'isbn_id', 'cit_desc', 'internet_address', 'pages']
	,'identifiers' : ['cit_id']
  },
  {
    'resource' : 'comment'
	,'table_name' : 'cit_cmts'
	,'attributes' : ['cmt_id', 'cit_id', 'author', 'cmt_body', 'cmt_date', 'u_id']
	,'identifiers' : ['cmt_id']
  },
  {
    'resource' : 'earn'
	,'table_name' : 'user_points'
	,'attributes' : ["u_id", "pts_total"]
	,'identifiers' : ['u_id']
  },
  {
    'resource' : 'favorite'
	,'table_name' : 'user_saved_lists'
	, 'attributes' : ["list_id", "list_name", "u_id"]
	,'identifiers' : ['list_id']
  },
  {
    'resource' : 'meta'
	,'table_name' : 'cit_meta'
	,'attributes' : ['cit_id', 'amnt_votes', 'avg_rating', 'added_by', 'cit_views_ct', 'cit_cmts_ct']
	,'identifiers' : ['cit_id']
  },
  {
    'resource' : 'share'
	,'table_name' : 'user_shares'
	,'attributes' : ["sender_id", "recipient_id", "cit_id", "timestamp"]
	,'identifiers' : ['sender_id', 'timestamp']
  },
  {
    'resource' : 'tag'
	,'table_name' : 'all_tags'
	,'attributes' : ['tag_id', 'tag', 'cat_id']
	,'identifiers' : ['tag_id']
  },
  {
    'resource' : 'category'
	,'table_name' : 'tag_categories'
	,'attributes' : ['cat', 'cat_id']
	,'identifiers' : ['cat_id']
  },
  {
    'resource' : 'user'
	,'table_name' : 'user_profile'
	,'attributes' : ['u_id', 'email', 'password', 'name_first', 'name_last', 'join_date']
	,'identifiers' : ['u_id']
  },
  {
    'resource' : 'vote'
	,'table_name' : 'user_cit_ratings'
	,'attributes' : ['u_id', 'cit_id', 'rt_val']
	,'identifiers' : ['u_id', 'cit_id']
  }
];

ione.BUILD_CRUD = function ()
{
  // iterate ENTITIES to output PHP RESTful Model (GET, PUT, POST, DELETE)
  var $EntitiesCt = ione.ENTITIES.length,
	entities = ione.ENTITIES,
	counter,
	counterDx;

  for ( counter = 0; counter < $EntitiesCt; counter++) {
	// iterate through each object - using resource name and HTTP method as name convention for Model Methods.
	var $RESOURCE = entities[ counter ].resource,
		  $DB_TABLE = entities[ counter ].table_name,
		  $ATTRIBUTES = entities[ counter ].attributes,
		  $ID_PARAMS = entities[ counter ].identifiers,
		  attrCounter, idCounter;
		  
		  $_PHP_OUTPUT_VAR += $RESOURCE + "|" + "<?php defined('BASEPATH') OR exit('No direct script access allowed');require APPPATH.'/libraries/REST_Controller.php';";
		  $_PHP_OUTPUT_VAR += "class " + $RESOURCE.capitalize() + " extends REST_Controller {";
		   $_PHP_OUTPUT_VAR += "	function __construct() ";
		   $_PHP_OUTPUT_VAR += "	{ ";
		   $_PHP_OUTPUT_VAR += "	parent::__construct();";
		   $_PHP_OUTPUT_VAR += "	$this->load->model('" + $RESOURCE + "_model');";
		   $_PHP_OUTPUT_VAR += " 	}  ";
		  
		  for ( counterDx = 0; counterDx < ione.METHODS.length; counterDx++ ) {
		  // GET, PUT, POST, DELETE from  ione.METHODS array.
	// end function declaration BEGIN function Body.
				switch (ione.METHODS[ counterDx ]) {
					case "GET" :
						// call get generator, pass params
						ione.GET_GENERATOR( $RESOURCE, $DB_TABLE, $ID_PARAMS);
						break;
					case "PUT" :
						// call put generator, pass params
						ione.PUT_GENERATOR( $RESOURCE, $DB_TABLE, $ATTRIBUTES, $ID_PARAMS);
						break;
					case "POST" :
						// call post generator, pass params
						ione.POST_GENERATOR( $RESOURCE, $DB_TABLE, $ATTRIBUTES, $ID_PARAMS);
						break;
					case "DELETE" :
						// call delete generator, pass params
						ione.DELETE_GENERATOR( $RESOURCE, $DB_TABLE, $ATTRIBUTES, $ID_PARAMS);
						break;					
				 default :
						break;
				}
	}
	$_PHP_OUTPUT_VAR += "} ";
	
	$_PHP_OUTPUT_VAR += "";
	$_PHP_OUTPUT_VAR += "";
	
	$_PHP_OUTPUT_VAR += " /* end of "+ $RESOURCE.capitalize() +".php */\n";
  }
	//console.log( $_PHP_OUTPUT_VAR );
	return $_PHP_OUTPUT_VAR;
};

ione.GET_GENERATOR = function( resource, db_table, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function index_get() { ";
	
	// construct get array
	$_PHP_OUTPUT_VAR += "$getArray = array(";  // CONSTRUCT GET ARRAY
	for (var u=0; u<ids.length; u++)
	{
		if(u !== (ids.length - 1)) {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->get('" + ids[ u ] + "'),";
		} else {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->get('" + ids[ u ] + "')";
		}
	}	
	$_PHP_OUTPUT_VAR += ");";	

	
	$_PHP_OUTPUT_VAR += "$validData = $this->"+ resource +"_model->validate( $getArray, 'get' );"; // VALIDATE METHOD INVOCATION 
	
	$_PHP_OUTPUT_VAR += "if	(!$validData[\"isValid\"]){";  // INVALID REQUEST PARAMS HANDLER
	$_PHP_OUTPUT_VAR += "$this->response( json_decode($validData[\"errorMsg\"]) );";
	$_PHP_OUTPUT_VAR += "} ";
	$_PHP_OUTPUT_VAR += "else { $sanatizedPayload = $validData[\"payload\"];";  // BEGIN ELSE block: VALID REQUEST PARAMS
	
		$_PHP_OUTPUT_VAR += "$modelResult = $this->"+ resource +"_model->get( $sanatizedPayload );";  // MODEL REQUEST METHOD INVOCATION
		
		$_PHP_OUTPUT_VAR += "if(!$modelResult) {";  // MODEL REQUEST FAILURE HANDLER
		$_PHP_OUTPUT_VAR += "  $this->response(array('error'=>'Sorry, " + resource + " Get request failure (does not exist).'), 404);";
		$_PHP_OUTPUT_VAR += "} ";
		$_PHP_OUTPUT_VAR += "else { ";  // BEGIN ELSE: MODEL REQUEST SUCCESS
		
		$_PHP_OUTPUT_VAR += "   $this->response($modelResult, 200); ";
	
		$_PHP_OUTPUT_VAR += "}"; // END of ELSE: MODEL REQUEST SUCCESS
	
	$_PHP_OUTPUT_VAR += "}"; // END of ELSE block

	$_PHP_OUTPUT_VAR += "}";
};

ione.POST_GENERATOR = function( resource, db_table, attributes, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function index_post() { ";
	
	// put array
	$_PHP_OUTPUT_VAR += "$postArray = array(";  // CONSTRUCT post ARRAY
	for (var u=0; u < attributes.length; u++)
	{
		if(u !== (attributes.length - 1)) {
		$_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $this->post('" + attributes[ u ] + "'),";
		} else {
		$_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $this->post('" + attributes[ u ] + "')";
		}
	}	
	$_PHP_OUTPUT_VAR += ");";	
// ARRAY CONSTRUCTED

	$_PHP_OUTPUT_VAR += "$validData = $this->"+ resource +"_model->validate( $postArray, 'post' );"; // VALIDATE METHOD INVOCATION 
	
	$_PHP_OUTPUT_VAR += "if	(!$validData[\"isValid\"]){";   // INVALID REQUEST PARAMS HANDLER
	$_PHP_OUTPUT_VAR += "$this->response( json_decode($validData[\"errorMsg\"]) );";
	$_PHP_OUTPUT_VAR += "} ";
	$_PHP_OUTPUT_VAR += "else { $sanatizedPayload = $validData[\"payload\"];";  // BEGIN ELSE block: VALID REQUEST PARAMS
	
		$_PHP_OUTPUT_VAR += "$modelResult = $this->"+ resource +"_model->post( $sanatizedPayload );";  // MODEL REQUEST METHOD INVOCATION
		
		$_PHP_OUTPUT_VAR += "if(!$modelResult) {";  // MODEL REQUEST FAILURE HANDLER
		$_PHP_OUTPUT_VAR += "  $this->response(array('error'=>'" + resource + " post request failure.'), 404);";
		$_PHP_OUTPUT_VAR += "} ";
		$_PHP_OUTPUT_VAR += "else { ";  // BEGIN ELSE: MODEL REQUEST SUCCESS
		
		$_PHP_OUTPUT_VAR += "   $this->response($modelResult, 200); ";
	
		$_PHP_OUTPUT_VAR += "}"; // END of ELSE: MODEL REQUEST SUCCESS
	
	$_PHP_OUTPUT_VAR += "}"; // END of ELSE block
	
	
	$_PHP_OUTPUT_VAR += "}";
};

ione.PUT_GENERATOR = function( resource, db_table, attributes, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function index_put() { ";
	
	// where array
	$_PHP_OUTPUT_VAR += "$whereArray = array(";   // CONSTRUCT WHERE  ARRAY
	for (var u=0; u<ids.length; u++)
	{
		if(u !== (ids.length - 1)) {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->put('" + ids[ u ] + "'),";
		} else {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->put('" + ids[ u ] + "')";
		}
	}	
	$_PHP_OUTPUT_VAR += ");";	
	// WHERE ARRAY CONSTRUCTED
	
	
	$_PHP_OUTPUT_VAR += "$putArray = array(";   // CONSTRUCT PUT ARRAY
	for (var u=0; u<attributes.length; u++)
	{
		if(u !== (attributes.length - 1)) {
		$_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $" + attributes[ u ] + ",";
		} else {
		$_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $" + attributes[ u ];
		}
	}	
	$_PHP_OUTPUT_VAR += ");";	
	// PUT ARRAY CONSTRUCTED

	
	$_PHP_OUTPUT_VAR += "$validData = $this->"+ resource +"_model->validate( $putArray, 'put' );"; // VALIDATE METHOD INVOCATION 
	
	$_PHP_OUTPUT_VAR += "if	(!$validData[\"isValid\"]){";  // INVALID REQUEST PARAMS HANDLER
	$_PHP_OUTPUT_VAR += " $this->response( json_decode($validData[\"errorMsg\"]) );";
	$_PHP_OUTPUT_VAR += "} ";
	$_PHP_OUTPUT_VAR += "else { $sanatizedPayload = $validData[\"payload\"];";  // BEGIN ELSE block: VALID REQUEST PARAMS
	
		$_PHP_OUTPUT_VAR += "$modelResult = $this->"+ resource +"_model->put( $sanatizedPayload, $whereArray );";  // MODEL REQUEST METHOD INVOCATION
		
		$_PHP_OUTPUT_VAR += "if(!$modelResult) {";  // MODEL REQUEST FAILURE HANDLER
		$_PHP_OUTPUT_VAR += "  $this->response(array('error'=>'" + resource + " put request failure.'), 404);";
		$_PHP_OUTPUT_VAR += "} ";
		$_PHP_OUTPUT_VAR += "else { ";  // BEGIN ELSE: MODEL REQUEST SUCCESS
		
		$_PHP_OUTPUT_VAR += "   $this->response($modelResult, 200); ";
	
		$_PHP_OUTPUT_VAR += "}"; // END of ELSE: MODEL REQUEST SUCCESS
	
	$_PHP_OUTPUT_VAR += "}"; // END of ELSE block
	
	
	$_PHP_OUTPUT_VAR += "}";
};

ione.DELETE_GENERATOR = function( resource, db_table, attributes, ids) {
	// function declaration
	$_PHP_OUTPUT_VAR += "function index_delete() { ";
	// where array
	$_PHP_OUTPUT_VAR += "$whereArray = array(";   // CONSTRUCT WHERE  ARRAY
	for (var u=0; u<ids.length; u++)
	{
		if(u !== (ids.length - 1)) {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->delete('" + ids[ u ] + "'),";
		} else {
		$_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $this->delete('" + ids[ u ] + "')";
		}
	}	
	$_PHP_OUTPUT_VAR += ");";	
	// ARRAY CONSTRUCTED
	
	$_PHP_OUTPUT_VAR += "$validData = $this->"+ resource +"_model->validate( $whereArray, 'delete' );"; // VALIDATE METHOD INVOCATION 
	
	$_PHP_OUTPUT_VAR += "if	(!$validData[\"isValid\"]){$this->response( json_decode($validData[\"errorMsg\"]) );}";  // INVALID REQUEST PARAMS HANDLER	
	
	$_PHP_OUTPUT_VAR += "else { $sanatizedPayload = $validData[\"payload\"];"; 
	
		$_PHP_OUTPUT_VAR += "$modelResult = $this->"+ resource +"_model->delete( $whereArray );";  // MODEL REQUEST METHOD INVOCATION
		
		$_PHP_OUTPUT_VAR += "if(!$modelResult) {";  // MODEL REQUEST FAILURE HANDLER
		$_PHP_OUTPUT_VAR += "  $this->response(array('error'=>'" + resource + " delete request failure.'), 404);";
		$_PHP_OUTPUT_VAR += "} ";
		$_PHP_OUTPUT_VAR += "else { ";  // BEGIN ELSE: MODEL REQUEST SUCCESS
		
		$_PHP_OUTPUT_VAR += "   $this->response($modelResult, 200); ";
	
		$_PHP_OUTPUT_VAR += "}"; // END of ELSE: MODEL REQUEST SUCCESS
	
	$_PHP_OUTPUT_VAR += "}"; // END of ELSE block

	
	$_PHP_OUTPUT_VAR += "}";
};