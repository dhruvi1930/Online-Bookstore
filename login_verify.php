<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
    session_start(); 
   include "connection.php";
   if($_SESSION['u_nm']=='')
{
    header("Location:index.php");
}
   ?>
   <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
	<?php
 
if(isset($_POST['u_nm']))
{
	 $u_nm = $_POST['u_nm'];
 	 $u_pass = $_POST['u_pass'];
	 $rs ="select * from  registration where u_nm='".$u_nm."' and u_pass='".$u_pass."'";
	 $res=mysqli_query($conn,$rs);
	 $cnt=mysqli_num_rows($res);
	 if($cnt > 0)
	 {	
		$_SESSION['u_nm'] = $u_nm;	
	 	header('Location:garden-index.php?sort="asc"');
	 }
	else
	{
		$msg = "<center><h1> Username or Password are not correct, try again.</center></h1>";
		header("Location:index.php?msg=$msg");
	}
}	 
?>

</body>
</html>
