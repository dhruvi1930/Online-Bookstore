<?php
session_start();
 $r="DELETE FROM `temp` WHERE 1";
 $w=mysqli_query($conn,$r);
session_destroy();
header("Location:index.php");
?>