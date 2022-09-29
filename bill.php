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
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>BookStore</title>
   
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="css/version/garden.css" rel="stylesheet">

</head>
<body>

   
        <div class="header-section">
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo" style="background-color: black;height: 80px"><br>
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
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link color-green-hover" href='garden-index.php?sort="asc"'>Home</a>
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
        </header><!-- end header --><?php
$username=$_SESSION['u_nm'];
$t=$_GET['rn'];
?>
                            <div class="blog-box row">
                                 <div class="blog-meta big-meta col-md-8">
                                       <center>
                                       <table border="2" width="50%" style="margin-left:450px;" >
                                       <tr>
                                           <th>Name</th>
                                           <th>Total</th>
                                       </tr>
                                       <tr>
                                           <td><?php echo $username?></td>
                                           <td><?php echo $t?></td>
                                       </tr> 
                                       </table>
                                       </center>
                                        
                                    </div>
                         </div>
<br><br><br><br>
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

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

   

</body>
</html>