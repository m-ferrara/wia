// js doc
/**
  *
  * Code Generator. Models.  Perform Validation per HTTP Method validation requirements.
  *
**/
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
	,'attributes' : ['u_id', 'email', 'password', 'display_name', 'join_date']
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
		  
		  $_PHP_OUTPUT_VAR += $RESOURCE + "|" + "<?php class " + $RESOURCE.capitalize().trim() + "_model extends CI_Model {";
		  $_PHP_OUTPUT_VAR += "	function __construct() ";
		  $_PHP_OUTPUT_VAR += "	{ ";
		  $_PHP_OUTPUT_VAR += "	parent::__construct();";
		  $_PHP_OUTPUT_VAR += " 	}  ";
		  
		  // construct validator function
		 // ione.VALIDATOR_GENERATOR( $RESOURCE, $DB_TABLE, $ATTRIBUTES, $ID_PARAMS );
		  
		  for ( counterDx = 0; counterDx < ione.METHODS.length; counterDx++ ) {
		  // GET, PUT, POST, DELETE from  ione.METHODS array.
		// Construct functions to handle http-request methods.	
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
	$_PHP_OUTPUT_VAR += "";
	
	$_PHP_OUTPUT_VAR += "function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case 'get': $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case 'put': $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case 'post': $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case 'delete': $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }";
	
	$_PHP_OUTPUT_VAR += iterateEntityRuleSets($RESOURCE);
	
	$_PHP_OUTPUT_VAR += "}";
	
	$_PHP_OUTPUT_VAR += "/* end of "+ $RESOURCE.capitalize() +"_model.php */\n";
  }
	//console.log( $_PHP_OUTPUT_VAR );
	return $_PHP_OUTPUT_VAR;
};

ione.GET_GENERATOR = function( resource, db_table, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function get ( $getArray ) { ";
	
	// // construct get array
	// $_PHP_OUTPUT_VAR += "$getArray = array(";
	// for (var u=0; u<ids.length; u++)
	// {
		// if(u !== (ids.length - 1)) {
		// $_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $" + ids[ u ] + ",";
		// } else {
		// $_PHP_OUTPUT_VAR += "\"" + ids[ u ] + "\"=> $" + ids[ u ];
		// }
	// }	
	// $_PHP_OUTPUT_VAR += ");";	
	// db calls
	$_PHP_OUTPUT_VAR += "$dbWhere = $this->db->where( $getArray ); ";
	$_PHP_OUTPUT_VAR += "$dbResult = $this->db->get( '" + db_table + "' );";
	$_PHP_OUTPUT_VAR += "return $dbResult->result();";
	$_PHP_OUTPUT_VAR += "}";
};

ione.POST_GENERATOR = function( resource, db_table, attributes, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function post ( $postArray ) { ";
	
	// put array
	// $_PHP_OUTPUT_VAR += "$putArray = array(";
	// for (var u=0; u < attributes.length; u++)
	// {
		// if(u !== (attributes.length - 1)) {
		// $_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $" + attributes[ u ] + ",";
		// } else {
		// $_PHP_OUTPUT_VAR += "\"" + attributes[ u ] + "\"=> $" + attributes[ u ];
		// }
	// }	
	// $_PHP_OUTPUT_VAR += ");";	
	// db call
	$_PHP_OUTPUT_VAR += "$dbInsert = $this->db->insert( '" + db_table + "', $postArray );";
	$_PHP_OUTPUT_VAR += "if ($dbInsert) {";
	$_PHP_OUTPUT_VAR += "return $this->db->insert_id();";
	$_PHP_OUTPUT_VAR += "}";
	$_PHP_OUTPUT_VAR += "else {";
	$_PHP_OUTPUT_VAR += "return false;";
	$_PHP_OUTPUT_VAR += "}";
	$_PHP_OUTPUT_VAR += "}";
};

ione.PUT_GENERATOR = function( resource, db_table, attributes, ids) {
// function declaration.
	$_PHP_OUTPUT_VAR += "function put ( $putArray, $whereArray ) { ";

	// db calls
	$_PHP_OUTPUT_VAR += "$dbWhere = $this->db->where( $whereArray );";
	$_PHP_OUTPUT_VAR += "$dbUpdate = $this->db->update( '" + db_table + "', $putArray );";
	$_PHP_OUTPUT_VAR += "if ($dbUpdate) {";
	$_PHP_OUTPUT_VAR += "return true;";
	$_PHP_OUTPUT_VAR += "}";
	$_PHP_OUTPUT_VAR += "else {";
	$_PHP_OUTPUT_VAR += "return false;";
	$_PHP_OUTPUT_VAR += "}";
	
	$_PHP_OUTPUT_VAR += "}";
};

ione.DELETE_GENERATOR = function( resource, db_table, attributes, ids) {
	// function declaration
	$_PHP_OUTPUT_VAR += "function delete ( $whereArray ) { ";
	
	// db calls
	$_PHP_OUTPUT_VAR += "$dbWhere = $this->db->where( $whereArray );";
	$_PHP_OUTPUT_VAR += "$dbDelete = $this->db->delete( '" + db_table + "' );";
	
	$_PHP_OUTPUT_VAR += "}";
};