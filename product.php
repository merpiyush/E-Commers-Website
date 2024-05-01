<?php
  include_once ("pro_connection.php")
?>
<?php 
    include('new_conn.php'); 
    ?>
<?php
session_start();
error_reporting(0);

// Check if the form is submitted and the search query is set

?>
<?php
 $sql1 = "SELECT * FROM product_page2";
  $result1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #search{
            margin-right:3%;
            border: 1px solid #ff523b;
            border-radius: 5px;
            height: 25px;
            width:200px;
            margin-right:7px;
        }
        select{  
            border-radius: 5px;
        }
        .btn1{
            display: inline-block;
            background: gainsboro;
            color:#000;
            padding: 5px 23px;
            margin: 20px 0;
            border-radius: 20px;
            transition: background 0.5s;
        }
    </style>
</head>
<body class="cnt-home">
<div class="search-result-container">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active " id="grid-container">
                <div class="category-product inner-top-vs">
                    <div class="row">   
                    </div><!-- /.row -->
                </div><!-- /.category-product -->
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div><!-- /.search-result-container -->
    
    <!-- JavaScript libraries -->
    <script src="sea.js"></script>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/newlogo.png" style="margin-top: -100px;"></a>
            </div>
            <nav>
                
                <ul id="MenuItems">
        <form name="search" method="post" action="search-result.php">
            <input type="text" placeholder="Search here..." name="product_page2" required="required" id="search">
            <button type="submit" name="search" style="margin-right:505px; border: 1px solid #ff523b; border-radius: 5px; height: 25px; width:23px;"><i class="fa fa-search" ></i></button>
        </form>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                    <li><a href="login.php">Login</a></li>                    
                        <li><a href="register.php">Register</a></li>
                 
                        <li><a href="profile.php">Profile
                        <a href="profile.php"><img src="images/user.png" style="width: 30px;"></a>
                    </a></li>
                    <li><a href="logout.php">Logout</a></li> 
                </ul>
                <?php
                    $count=0;
                    if(isset($_SESSION['cart']))
                    {
                    $count=count($_SESSION['cart']);
                    }
                ?>
                    <a href="cart.php" class="">My Cart (<?php echo $count; ?>)</a>
            </nav>
            <a href="cart.html"><img src="images/cart.png" width="30px" height="25px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <form action="product.php" method="post" enctype="multipart/form-data">
    <!--Featured Products-->
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
        
            <div id="fil">
                <button class="btn1">Default Price</button>
                <button class="btn1">$0 to $25</button>
                <button class="btn1">$25 to $50</button>
                <button class="btn1">Short by rating</button>
                <button class="btn1">Short by sale</button>
            </div>
        </div>
<?php

?>
        <div class="row">
        <?php          
         while ($row1 = mysqli_fetch_array($result1)) {
                                ?>
            <div class="col-4">
                <a href="productdetail.php"><img src="<?php echo $row1["p_img"];?>"></a>
                <a href="productdetail.php"><h4><?php echo $row1["p_name"];?></h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p><?php echo $row1["p_price"];?></p>
                <button type="submit" name="Add_To_Cart" class="btn btn-info">Add to Cart</button>
                <input type="hidden" name="Item_Name" value="T-shirt 1">
                <input type="hidden" name="Price" value="100">
            </div>
            <?php
         }
                    ?>
           
                    <div class="page-btn">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>&#8594;</span>
                    </div>
           
        </div>
    </form>
        <!--Footer-->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and ios mobile phone.</p>
                        <div class="app-logo">
                            <img src="images/play-store.png">
                            <img src="images/app-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/newlogo.png">
                        <p>Our Purpose is To Sustainably make the Pleasure and
                            Benefits of Products Accessible to the Many.
                        </p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Cards</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow us</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>YouTube</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="lastline">Thank You for visit.</p>
            </div>
        </div>
        <!--JS for toggle menu-->
        <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";
            function menutoggle(){
                if( MenuItems.style.maxHeight = "0px"){
                    MenuItems.style.maxHeight = "200px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
</body>
</html>  

