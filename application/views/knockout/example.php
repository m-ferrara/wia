<HTML>
<head>
	<title>Example WIA Front-End</title>
	<style>
		body {
				background-color: #DBDBDB;
				font-weight: bold;
			}
	</style>
<?php
echo "<script>";
echo "var graphicDisplay = ";
echo json_encode( $data );
echo ";</script>";
?>
</head>
<body>
<h1> Let the knockout templates begin! </h1>
<div id="main">
	<?php 
/*

$putArray = array("email"=> $this->input->post('email'));

$validations = array("email"=>"anything");

$sanatations = array("email"=>"email");

$mandatories = array('email');

$unique = array("email"=>"user_profile");

   $validator = new Custom_Validator($validations, $mandatories, $sanatations, $unique);

   

   $validator->validate($putArray);

   

   $Response = $validator->getJSON();

   echo $Response;*/

?></div>
<script id="categoriesTmpl" type="text/html">
	<p data-bind="text: cat, attr : {'id' : cat_id}"></p>
	
</script>

<script id="tagsTmpl" type="text/html">
	<p data-bind="text: tag, attr : {'id' : tag_id, 'tag_cat' : cat_id}"></p>

</script>


<div data-bind="template: {name: 'categoriesTmpl', foreach:categories}"></div>

<!-- now iterate Tags -->
<div data-bind="template: {name: 'tagsTmpl', foreach: tags}"></div>
<!-- -->
<?php
echo "<script src=\"".base_url()."/assets/js/knockout/knockout.js\" type=\"text/javascript\"></script>";
echo "<script src=\"".base_url()."/assets/js/knockout/example.js\" type=\"text/javascript\"></script>";
?>
</body>
</HTML>