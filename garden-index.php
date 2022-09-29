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

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
 
    <title>BookStore</title>
 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS 
    <link href="css/font-awesome.min.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
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
        </header><!-- end header -->

       <br><br><br>
 <center> <form action="garden-index.php" method="GET">
                                       <div style="background-color:black;color:white;border-radius:15%;width: 150px"><input type="radio" name="sort" value="asc" checked>Price: Low to High<br><input type="radio" name="sort" value="dec">Price: High to Low</div>
                                        <br>
                                        <input type="submit" value="Filter" style="background-color:black;color:white;border-radius:15%;">
                                    </form><br><br><br></center>
        <section class="section wb">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">

                            <div class="blog-list clearfix">

                                <div class="blog-box row">
                                   
                                        <?php
                                         $u1="UPDATE `temp` SET `flag`=0 WHERE 1";
                                            $ur1=mysqli_query($conn,$u1);
                                                  $q="select * from book";
                                           $res=mysqli_query($conn,$q);
    
                                           if($_GET["sort"] == "asc")
                                        {
                                           $q="select * from book ORDER BY b_price ASC";
                                           $res=mysqli_query($conn,$q);
                                       }else{
                                            $q="select * from book ORDER BY b_price DESC";
                                           $res=mysqli_query($conn,$q);

                                       }
                                      
                                         while($row=mysqli_fetch_array($res))
                                        {
    
                                        ?>
                                       
                                            <img width="200" height="400" src="<?php echo $row["b_img"]?>" alt="" class="img-fluid">
                                                
                                        <div class="blog-meta big-meta col-md-8">
                                     
                                        <span class="bg-aqua"><a href="#" title=""><?php echo $row["b_genre"]?></a></span>
                                        <h4><a href="#" title=""><?php echo $row["b_name"]?></a></h4>
                                        <p><?php echo $row["b_desc"]?></p>
                                          <small><a href="#" title="">by <?php echo $row["b_author"]?></a></small>
                                          <small><a href="#"><?php echo $row["b_price"]?> ₹</a></small><br><br>
                                          <form method="get" action="Cart.php">
                                            <input type="hidden" name="action" value="add">
                                            <input type="hidden" name="b_id" value="<?php echo $row["b_id"]?>">
                                        <input type="submit" name="add_cart" value="ADD CART"style="background-color:#34bf49;color:white;border-radius:15%;"></form>
                                    </div>
                              
                                      <?php
                                  
                              }
                              ?>
                                  
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
       </footer> 

  
  

</body>
</html>