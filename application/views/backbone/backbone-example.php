<!DOCTYPE html>
<html>
<head>
	  <title>I have a back bone</title>
</head>
<body>
	<?php 
	
	$a = 010;
	$b = 0XA;
	$c = 2;
	print $a + $b + $c; ?>
    <button id="add-friend">Add Friend</button>
    <ul id="friends-list">
    </ul>

  <!-- ========= -->
  <!-- Libraries -->
  <!-- ========= -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
  <!-- script src="http://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.0/backbone.localStorage-min.js" type="text/javascript"></script --> 
<script src="<?php echo base_url()."assets/js/wia-backbone.js"; ?>" type="text/javascript"></script>
</html>