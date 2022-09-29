<?php
session_start();
include "connection.php";
if($_SESSION['u_nm']=='')
{
    header("Location:index.php");
}

$u_nm=$_POST['u_nm'];
$f_nm=$_POST['f_nm'];
$l_nm=$_POST['l_nm'];
$u_pass=$_POST['u_pass'];

$e_mail=$_POST['e_mail'];
$u_mob_no=$_POST['u_mob_no'];
$gender=$_POST['gender'];

	$select="select e_mail from registration where e_mail = ? Limit 1";
	$ins="INSERT Into registration(u_nm,f_nm,l_nm,u_pass,e_mail,u_mob_no,gender) values (?,?,?,?,?,?,?)";
	$stmt= $conn->prepare($select);
	$stmt->bind_param("s",$e_mail);
	$stmt->execute(); 
	$stmt->bind_result($e_mail);
	$stmt->store_result(); 
	$rnum=$stmt->num_rows;
	if($rnum==0)
	{
		$stmt->close(); 
		$stmt= $conn->prepare($ins);
		$stmt->bind_param("sssssis",$u_nm,$f_nm,$l_nm,$u_pass,$e_mail,$u_mob_no,$gender);
		$stmt->execute(); 
		header("Location:index.php");
	}else
	{
		$msg="already register";
		header("Location:index.php?msg=$msg");
	}
	$stmt->close();
?>