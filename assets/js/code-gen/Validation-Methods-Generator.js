/*
 *  Create PHP Validator Functions.
 *  @Returns PHP Check for presence and datatype of HTTP-Request Methods.
 *  				   Per Request Method, e.g. getValidator()
 */
var ATTRIBUTES_CT = EntityValidationRules.length;

function iterateEntityRuleSets( entity ) {
	var output = '';
	for (var i=0; i<EntityValidationRules.length; i++){
	  if (entity == EntityValidationRules[i].ENTITY)
		{
			  var entityObj = EntityValidationRules[ i ],
				  entName = entityObj.ENTITY,
				  methodSet = entityObj.METHOD,
				  getSet = methodSet.GET,
				  putSet = methodSet.POST,
				  postSet = methodSet.PUT,
				  deleteSet = methodSet.DELETE;
			
			// GET
			output += "function getValidator( $RequestPayload )  {";
			output += validatorInner( getSet );
			output += "}";
			
			// PUT
			output += "function putValidator( $RequestPayload )  {";
			output += validatorInner( putSet );
			output += "}";
			
			// POST
			output += "function postValidator( $RequestPayload )  {";
			output += validatorInner( postSet );
			output += "}";
			
			// DELETE
			output += "function deleteValidator( $RequestPayload )  {";
			output += validatorInner( deleteSet );
			output += "}";  	
		  
		}
	}
	
	return output;
}

/*  receives request payload (attributes Array)
 *  in form of REQUIRED, OPTIONAL, UNIQUE.
 *  REQUIRED = Presence of NOT NULL VALUE, 
 *  UNIQUE = Presence Existing in DB Invalidates Payload.
 *  Each Array must have it's Attributes cross-referenced 
 *  to return dataType. 
 */
 /* @METHOD validatorInner
 * @PARAMS methodSetObj { Object } Arrays of Attributes Required, Optional and Uniqueness condition.
 * @RETURNS { Object }  The Rules object of Specified Attribute, ie 'u_id' returns 
 *										{attribute : 'u_id', dataType : 'integer', regex: null}
*/
function validatorInner( methodSetObj ) {
	  	var required = methodSetObj.REQUIRED,
	  		attributes = aggregateAttributes( methodSetObj ),
			unique = methodSetObj.UNIQUE,
			returnString = '';
/* DATATYPES:  "boolean"  "integer"  "double"   "string"  "array"  "object"  "resource"  "NULL"  */

	  //	$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);
 // iterate required
  // optional if supplied test dataType, null empty value allowable
		returnString += createValidations( attributes );
		
 // test dataType, and not null or empty value
		returnString += createRequired( required );

// sanatations - query db for exact or similar match
		returnString += createSanatations( attributes );		
		
 // unique - query db for exact or similar match
		returnString += createUnique( unique );
		
		returnString += "$validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);";
		
		returnString += "if ($validator->validate($RequestPayload)) {";
		returnString += "$sanatizedPayload = $validator->sanatize($RequestPayload);";
		returnString += "return array(\"isValid\" => true, \"payload\" => $sanatizedPayload);";
		returnString += "} else {";
		returnString += "return array(\"isValid\" => false, \"errorMsg\" => $validator->getJSON());";
		returnString += "}";
		
		return returnString;
}


function createRequired( required ) {
	var output = "$mandatories = array(",
		n = required.length;
	
	required.forEach(function( attr, index ) {
		if ((n - 1) !== index) {
			output +=  "\"" + attr + "\", ";
		} else {
			output +=  "\"" +  attr + "\"";
		}
	});
	
	output += ");";
	
	return output;
}

function createValidations( attributes ) {
	var output = "$validations = array(",
		n = attributes.length;
		
	attributes.forEach(function( attr, index ) {
		// get Attribute Validation Rules
		var attrRules = attributeRules( attr );
		if ((n - 1) !== index) {
			output += "\"" + attr + "\"=>\"" + attrRules.validation + "\", ";
		} else {
			output += "\"" + attr + "\"=>\"" + attrRules.validation + "\"";
		}
	});
	
	output += ");";
	
	return output;
}

/*	 *
	 *  createUnique assembles array of payload values and their corresponding db table.
	 *  @returns array($key=>$table_name,...)
	 *  
	 */
function createUnique( unique ) {
	var output = "$unique = array(",
		n = unique.length;
	unique.forEach(function( attr, index ) {
		// get Attribute Validation Rules
		var attrRules = attributeRules( attr );
		if ((n - 1) !== index) {
			output += "\"" + attr + "\"=>\"" + attrRules.tableName + "\", ";
		} 
		else {
			output += "\"" + attr + "\"=>\"" + attrRules.tableName + "\"";
		}
		
	});
	
	output += ");";
	
	return output;
}

/*	 *
 *  createUnique assembles array of payload values and their corresponding db table.
 *  @returns array($key=>$table_name,...)
 *  
 */
function createSanatations( attributes ) {
	//console.log( attributes.toString() );
	var output = "$sanatations = array(",
		n = attributes.length;
		
	attributes.forEach(function( attr, index ) {
		// get Attribute Validation Rules
		var attrRules = attributeRules( String(attr) );
		//console.log(attrRules);
		if ((n - 1) !== index) {
			output += "\"" + attr + "\"=>\"" + attrRules.validation + "\", ";
		} else {
			output += "\"" + attr + "\"=>\"" + attrRules.validation + "\"";
		}
		
	});
	
	output += ");";
	
	return output;
}
/*	 *  @method aggregateAttributes
	 * @params methodSet Object containing several arrays
	 * @returns concatenated array, result of combining 
	 * 			Required and Optional entity attributes - 
	 * 			forming complete array of attributes.
	 * 
	 */
function aggregateAttributes( methodSet ) {
	// iterate REQUIRED, OPTIONAL arrays, placing values into AGGREGATE ARRAY
	var ar1 = methodSet.REQUIRED, 
		ar2 = methodSet.OPTIONAL;
		
		return ar1.concat( ar2 );
}

/* @METHOD   attributeRules
 * @PARAMS   attribute { String } Given attribute of an Entity's HTTP-Request Payload Body.
 * @RETURNS   Rules object - of Specified Attribute, ie 'u_id' returns 
 *										{attribute : 'u_id', dataType : 'integer', regex: null}
*/
function attributeRules( attribute ) {
	var rulesObj = {},
		i;
	
	AttributeValidationRules.forEach(function( attrObj, index ) {
		// get Attribute Validation Rules
		if ( attribute == attrObj.attribute )
		{
			//console.log(AttributeValidationRules[ i ]["attribute"]+ " " + attribute + " is good.");
			rulesObj.dataType = attrObj.dataType;
			rulesObj.regex = attrObj.regex;
			rulesObj.validation = attrObj.validation;
			rulesObj.sanatation = attrObj.sanatation;
			rulesObj.isUnique = attrObj.isUnique;
			rulesObj.tableName = attrObj.table_name;
			//else { continue; }
			return rulesObj;		
		}
	});	
	
	//console.log( "NOT GOOD: " + attribute + ".");
		// attribute undetected in ValidationRules [] Array, so return unspecified.
		rulesObj.dataType = "unspecified";
	//	console.log( attribute );
		return rulesObj;
}