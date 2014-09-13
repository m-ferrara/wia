<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link rel='stylesheet' type='text/css' media='all'
	href='<?php echo base_url();?>assets/css/forms.css' />
	<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap-responsive.min.css' />
<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap.css' />
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="../assets/js/modaljs/login.js"></script>  
</head>
<body>
<div id="content-wrapper">

<form class="form-horizontal">
	<fieldset>
	 <legend>Sign In</legend>
	   <div class="control-group">
	    <label class="control-label" for="inputEmail">Email Address</label>
	    <div class="controls">
	      <input type="text" id="inputEmail" placeholder="Email">
	    </div>
	      <div class="control-group error">
	        <label id="email_error" class="error">Fill in username</label>
	  	  </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">Password</label>
	    <div class="controls">
	      <input type="password" id="inputPassword" placeholder="Password">
	    </div>
	      <div class="control-group error">
	    <label id="password_error" class="error">Fill in password</label>
	       </div>
	  </div>
	  <div class="control-group">
	         <div class='controls'>
	      <button type="submit" class="btn">Sign In</button>
	      </div>
	    </div>
   </fieldset>
</form>

</div>
</body>
</html>

  
  