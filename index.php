<?php
session_start();
include "connection.php";
?>
<html>
  <head>
     <title> login page </title>
	 <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
    <div class="loginbox">
	<img src="img/login.png" class="logo">
	<h1> login here </h1>
	<form name="login" method="post" action="login_verify.php" onSubmit="return validate(this)">
	
	<?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
	
	  <p> USERNAME: </p>
	  <input type="text" name="u_nm" placeholder="Enter UserName">
	  <p> PASSWORD: </p>
	  <input type="password" name="u_pass" placeholder="Enter Password">
	  <input type="submit" value="LOGIN" name="login_submit">
	  <input type="reset" value="RESET" name="login_reset">

	  <a href="registrationform.php">SIGN UP HERE...</a>
	</form>
	</div>
  </body>

<!--script to validate the login form on submit -->
<script type="text/javascript">
function validate(login)
{
	if(login.u_nm.value == "")
	{
		alert("User Name Can Not Be Blank");
		login.u_nm.focus();
		return false;
	}
	if(login.u_pass.value == "")
	{
		alert("Password Can Not Be Blank");
		login.u_pass.focus();
		return false;
	}
}	
function onlyChar(e)
{
	var charCode=e.which || e.keyCode;
	if((charCode >= 65 && charCode <=90)|| (charCode >= 97 && charCode <=122) || charCode==9 || charCode==46 || charCode==8)
	return true;
	
	return false;
}
</script>
</html>