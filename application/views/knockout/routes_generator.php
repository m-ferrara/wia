<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<textarea id="output" rows="500" cols="100"></textarea>
		
		
		
		<script src="<?php echo base_url().'assets/js/code-gen/jquery.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/js/code-gen/newAttrRules.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/js/code-gen/Entity-Validation-Rules-Obj-OFFICIAL.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/js/code-gen/Validation-Methods-Generator.js'; ?>"></script>
		<script>
			
			var j = jQuery.noConflict();
			var output_stream ='';
			var ENTITIES_CT = EntityValidationRules.length;
			for (var i = 0; i < ENTITIES_CT; i++)
			{
				var ENTITY = EntityValidationRules[i].ENTITY;
				var capitalized = EntityValidationRules[i].ENTITY.substr(0,1).toUpperCase() + EntityValidationRules[i].ENTITY.substr(1);

				output_stream += "/* - - - " + capitalized  + " ROUTES \n* \n* v0.1.0  Notes: Auto-Gen(5-28-2014)\n* - - - */\n";
//				output_stream += "$route['webservice/" + ENTITY + "/'] = \"webservice/" + capitalized + "/" + ENTITY + "/\";\n";
//				output_stream += "$route['webservice/" + ENTITY + "/(:any)/(:num)/(:any)/(:any)']  = \"webservice/" + capitalized + "/" + ENTITY + "/$1/$2/$3/$4\";\n";
//				output_stream += "$route['webservice/" + ENTITY + "/(:any)/(:any)/(:any)/(:any)']  = \"webservice/" + capitalized + "/" + ENTITY + "/$1/$2/$3/$4\";\n";
				output_stream += "$route['webservice/" + ENTITY + "'] = \"webservice/" + capitalized + "/\";\n";
				output_stream += "$route['webservice/" + ENTITY + "/(:any)/(:num)/(:any)/(:any)']  = \"webservice/" + capitalized + "/index/$1/$2/$3/$4\";\n";
				output_stream += "$route['webservice/" + ENTITY + "/(:any)/(:any)/(:any)/(:any)']  = \"webservice/" + capitalized + "/index/$1/$2/$3/$4\";\n";
			};
			
			console.log( output_stream );
			
			j("#output").val( output_stream );
			
		</script>
		</body>
</html>