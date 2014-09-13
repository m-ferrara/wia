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
		<script src="<?php echo base_url().'assets/js/code-gen/Models-Generator.js'; ?>"></script>
		<script>
			
			var j = jQuery.noConflict();
			var output = ione.BUILD_CRUD();
			j("#output").val( output );
			
		</script>
		</body>
</html>