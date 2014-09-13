<!DOCTYPE html>
<html lang="en">
<head>
<style>
  .row {
	  display: block;
	  min-height: 1px;
	  height: auto;
	  margin: 0 auto;
  }
  form {
	  width: 960px;
	  margin: 0 auto;
  }
</style>
</head>
<body>
<form name="login" id="login" action="#">
<div class="row">
  <label for="username">Email: <input type="text" name="username" placeholder="email" /></label>
</div>
<div class="row">
  <label for="password">Password: <input type="password" name="password" placeholder="password" /></label>
</div>  
<div class="row">
  <button class="submit">Log In</button>
</div>
</form>
</body>
</html>