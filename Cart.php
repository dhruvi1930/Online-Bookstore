<?php
session_start();
include "connection.php";
if($_SESSION['u_nm']=='')
{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>  
    <style>
        tr:hover .addcart {background-color:gray;}
        table
        {
            width:100%;
        }

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>BookStore</title>
  
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">


    <link href="css/responsive.css" rel="stylesheet">


    <link href="css/colors.css" rel="stylesheet">

    <link href="css/version/garden.css" rel="stylesheet">

</head>
<body>

   
       <div class="header-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo" style="background-color:black;height: 80px"><br>
                            <a href="C:\xampp\htdocs\dp\garden-index.php"><center><font size="100%" face="jokerman" color="white">BOOK-HOUSE</font></center></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                   
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav" style="background-color: black;border-radius: 20px;">
                            <li class="nav-item" >
                                <a class="nav-link color-green-hover" style="color:white;" href='garden-index.php?sort="asc"'>Home</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link color-green-hover" href="cart.php">Cart</a>
                            </li>
                               <li class="nav-item">
                                <a style="color:white;" class="nav-link color-green-hover" href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

                                 <?php


 $u1="UPDATE `temp` SET `flag`=0 WHERE 1";
         $ur1=mysqli_query($conn,$u1);
if(isset($_GET["action"]))
{
 if($_GET["action"] == "add")
 {
$q="select * from book where b_id=".$_GET['b_id']."";
$res=mysqli_query($conn,$q);
$r="INSERT INTO temp (t_id,flag) VALUES ('".$_GET['b_id']."',0)";
$w=mysqli_query($conn,$r);
 while($row=mysqli_fetch_array($res))
     {

if(isset($_GET["add_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $b_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["b_id"], $b_id))
        {
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
        'item_id'          =>  $_GET["b_id"],
        'item_name'        =>  $row["b_name"],
        'item_price'       =>  $row["b_price"],
        'item_genre'       =>  $row["b_genre"],
        'item_author'      =>  $row["b_author"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
        echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
        'item_id'          =>  $_GET["b_id"],
        'item_name'        =>  $row["b_name"],
        'item_price'       =>  $row["b_price"],
        'item_genre'       =>  $row["b_genre"],
        'item_author'      =>  $row["b_author"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
 
}
}
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $r="DELETE FROM `temp` WHERE t_id = ('".$_GET['b_id']."')";
        $w=mysqli_query($conn,$r);
        if($values["item_id"] == $_GET["b_id"])
        {
       
        unset($_SESSION["shopping_cart"][$keys]);
        
        echo '<script>window.location="Cart.php"</script>';
        }
        }
       
      
        
    }
}
 
?>


        <section class="section wb">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">

                            <div class="blog-list clearfix">

                                <div class="blog-box row">
                                 <div class="blog-meta big-meta col-md-12">
                    <div style="border:2px solid black;padding:3px;">
                    Total: 
                                <table>
                                    <tr id="ac" onmouseout="change1()" onmouseover="change2()">
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>genre</th>
                                        <th>author</th>
                                        <th>remove</th>
                                    </tr>
                               <?php
                               $total=0;
        if(!empty($_SESSION["shopping_cart"]))
        {
        $total = 0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
           $t1="select * from temp where flag=0";
            $tr1=mysqli_query($conn,$t1); 

            while($row=mysqli_fetch_array($tr1))
            {
                $u1="UPDATE `temp` SET `flag`=1 WHERE `t_id`=".$row['t_id']."";
                $ur1=mysqli_query($conn,$u1);
                $o1="select * from book where b_id=".$row['t_id']."";
                $or1=mysqli_query($conn,$o1);
                $rw=mysqli_fetch_array($or1);
                

        ?>                     
        <tr onmouseout="change1()" onmouseover="change2()">
        <td><?php echo $rw["b_name"]; ?></td>
        <td><?php echo $rw["b_price"]; ?></td>
        <td><?php echo $rw["b_author"]; ?></td>
        <td><?php echo $rw["b_genre"]; ?></td>
        <td><a href="Cart.php?action=delete&b_id=<?php echo $rw["b_id"]; ?>"><span class="text-danger">Remove</span></a></td>
        </tr>
        <?php
        $total = ($total + $rw["b_price"]);
         }

        ?>
        
        <?php
        }
    }
    echo $total;
        ?>
 <script type="text/javascript">
                                       function change1()
                                       {
                                        document.getElementById("ac").style.color = "black";
                                        document.getElementById("ac").style.backgroundColor ="white";
                                       }
                                       function change2()
                                       {
                                        document.getElementById("ac").style.color ="white";
                                        document.getElementById("ac").style.backgroundColor ="black";
                                       }
                                   </script> 
                                </table>  
</div>
                            </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <center><?php echo "<a href='bill.php?rn=$total' style='background-color:black;color:white;margin:5px;padding:10px;border-radius:25px;'
        >checkout</a>"; ?></center>
<br><br>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.html"><img src="img/logo.png" alt="" class="img-fluid"></a>
                                <p>Book House is a which gives you range of books that you can add to cart and buy.</p>
                               

                                <hr class="invis">
                               <img src="img/dh.png" style="border-radius:100%;width:80px;float:left;">
                                <img src="img/pa.jpg" style="border-radius:100%;width:80px;float:right;"><br><br><br><br>
                                 <h4 style="color:white;float:left">Email id:dhruvihl369@gmail.com<br>Contact No:9426128596</h4>
                                 
                                 <h4 style="color:white;float:right;">Email id:parv51199@gmail.com<br>Contact No:7069903030</h4>

                               
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy;Book House,2019</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>