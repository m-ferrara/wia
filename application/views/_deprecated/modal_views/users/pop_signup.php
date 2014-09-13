<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Account Registration</title>

<link rel='stylesheet' type='text/css' media='all'
	href='<?php echo base_url();?>assets/css/forms.css' />
	
	<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap-responsive.min.css' />
<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap.css' />
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script>
$(function() {
    $('.error').hide();
    $(".button").click(function() {
      // validate and process form here

      $('.error').hide();
	  var name = $("input#name").val();
		if (name == "") {
      $("label#name_error").show();
      $("input#name").focus();
      return false;
    }
	var email = $("input#email").val();
			if (email == "") {
	      $("label#email_error").show();
	      $("input#email").focus();
	      return false;
	    }
	var password = $("input#password").val();
				if (password == "") {
		      $("label#password_error").show();
		      $("input#password").focus();
		      return false;
		    }
	  var matchpass = $("input#matchpass").val();
		if (matchpass == "") {
    $("label#matchpass_error").show();
    $("input#matchpass").focus();
    return false;
  }
		if (matchpass !== password) {
	$("label#matchpass_error").html("Must match first password").show();
	$("input#matchpass").focus();
	return false;
		}
      
	  var dataObj = { 
		name: name,
		email: email,
		password: password
	  };
	  
  	 // var dataString = $('#topics_form').serialize(); 
 
 //	alert (dataString);return false;
  	 $.ajax({
   	    type: "POST",
   	    url: "<?php echo base_url()."default_controller/addUser";?>",
   	    data: dataObj,
   		dataType: "json",
   	    success: function(output_string) {
   	      $('#topics_form').html("<div id='message' style='height:200px;'>");
   	      $('#message').html("<h2>Registration Successful!" + output_string +"</h2>")
   	      .append("<p>Welcome to our community!</p><p>We encourage you to check out areas of interest and add comments, citations entries <br/>and help make this resource, more resourceful!</div>")
   	      .hide()
   	      .delay(400)
   	      .fadeIn(1500, function() {
   	      });
   	    }
   	  });
	  return false;
	  
     });
   });
   
  
</script> 
</head>
<body>
<div id="content-wrapper">

<form class="form-horizontal">
 <legend>Register Your Account Here</legend>
  <div class="control-group">
    <label class="control-label" for="inputName">Name</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="Name">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
     
      <div class='controls'>
      <input type="checkbox"></div><a class="controls policy-position" href="./toc.php" target="_blank">Agree To User Policy</a>
     
         <div class='controls'>
      <button type="submit" class="btn">Register</button>
      </div>
    </div>
</form>

</div>
</body>
</html>

  