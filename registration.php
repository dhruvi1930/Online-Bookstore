<?php session_start(); ?>
<html>
  <head>
     <title> login page </title>
	 <link rel="stylesheet" type="text/css" href="registration.css">
  </head>
  <body>
       <p>&nbsp;&nbsp;</p>
    <div class="loginbox">
	<img src="img/reg.png"class="logo"> 
	<?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
	<h1> Registration form </h1>
	<form name="crt_user"  method="post" onSubmit="return validate(this)">
	 <p> USER NAME: </p>
	  <input type="text" name="u_nm" placeholder="Enter your UserName" onKeyDown="return onlyChar(event);"><br>
	  <p> FIRST NAME: </p> 
	  <input type="text" name="f_nm" placeholder="Enter your FirstName" onKeyDown="return onlyChar(event);" ><br>
	  <p> LAST NAME: </p>
	  <input type="text" name="l_nm" placeholder="Enter your LastName" onKeyDown="return onlyChar(event);"><br>
	  <p> PASSWORD: </p>
	  <input type="password" name="u_pass" placeholder="Enter Password"><br>
	  <p> CONFORM PASSWORD: </p>
	  <input type="password" name="con_pass" placeholder="Enter Your conform Password"><br>
	  <p>EMAIL_ID:</p>
	  <input type="text" name="e_mail" placeholder="enter your Email_id " onBlur="return email1();">
	   <P>MOBILE NO:<p>
	   <input type="text" name="u_mob_no" placeholder="enter your Mobile Number " onKeyDown="return onlyNumbers(event);" maxlength="10"/><br>
	  
      <p> GENDER: </p>
	  MALE<input type="radio" name="gender" <?php if (isset($gender) && $gender=="M") echo        "checked";?> value="M"> FEMALE <input type="radio" name="gender" <?php if (isset($gender) && $gender=="F") echo "checked";?> value="F"> 
		
		<br><br>
		
	 <p>Select Secrete Question</p>
	   
		<select name="sec_question">
		<option>What is Your Pet Name?</option>
		<option>Which is Your Birth Place?</option>
		<option>What is the Name of Your School?</option>
		<option>What is Your Grand Mother Name?</option>
		<option>Who is Your Favourite Hero?</option>
		</select>
	
      <br><br>
	 <p> Enter Your Answer</p>
	   <input type="text" name="sec_ans" placeholder="enter your answer" onKeyDown="return onlyChar(event);" />  
	   
		<input type="text" name="captcha" onKeyDown="return onlyChar(event);">        
	  <input type="submit" value="SUBMIT" name="create_login">
	  <input type="reset" value="RESET" name="reset_login">
	 
	  
	</form>
	</div>
	
  </body>

<!--script to validate the create user form on submit -->
<script type="text/javascript">
function validate(crt_user)
{
	if(crt_user.u_nm.value == "")
	{
		alert("Enter User name");
		crt_user.u_nm.focus();
		return false;
	}
	else if(crt_user.f_nm.value == "")
	{
		alert("Enter User First Name");
		crt_user.f_nm.focus();
		return false;
	}
	else if(crt_user.l_nm.value == "")
	{
		alert("Enter User Last Name");
		crt_user.l_nm.focus();
		return false;
	}
	
	else if(crt_user.u_pass.value == "")
	{
		alert("Enter User Password");
		crt_user.u_pass.focus();
		return false;
	}
	else if(crt_user.con_pass.value == "")
	{
		alert("Enter User Confirm Password");
		crt_user.con_pass.focus();
		return false;
	}
	else if(crt_user.e_mail.value == "")
	{
		alert("Enter User Email Id");
		crt_user.e_mail.focus();
		return false;
	}
	else if(crt_user.u_mob_no.value == "")
	{
		alert("Enter User Mobile No");
		crt_user.u_mob_no.focus();
		return false;
	}
	else if(crt_user.sec_ans.value == "")
	{
		alert("Enter Your Secrete Answer");
		crt_user.sec_ans.focus();
		return false;
	}
	else if(crt_user.u_pass.value!=crt_user.con_pass.value)
	{
		alert("Reenter Your Correct Password");
		crt_user.u_pass.focus();
		return false;
	}
	// else if(crt_user.captcha.value == "")
	//  {
	// 	alert("Enter Captcha");
	//     crt_user.captcha.focus();
	//     return false ; 
	//  } 
	return true;	
}
function onlyChar(e)
{
	var charCode=e.which || e.keyCode;
	if((charCode >= 65 && charCode <=90)|| (charCode >= 97 && charCode <=122) || charCode==9 || charCode==46 || charCode==8)
	return true;
	return false;
}
function email1()
{
    var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(crt_user.e_mail.value) == false)
	{
		alert ('Invalid Email Address');
		crt_user.e_mail.focus();
		return false;
		
	}
}
function onlyNumbers(e)
{
	var charCode=e.which || e.keyCode;
	//8-back space 9-tab key 48-57 0 to 9
	if((charCode >= 48 && charCode <=57) || charCode==9 || charCode==8)
	return true;
	return false;
}
</script>
</html>