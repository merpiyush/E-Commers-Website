<?php 
    include('new_conn.php'); 
    ?>
<?php
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the about_us table
    $select = "SELECT * FROM index_page";
    $result = $conn->query($select);

    // Check if the query was successful and if there is data to display
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();
        //Title text 
        $heading_1 = $row['heading1'];
        //Paragraph text 1
        $p_1 = $row['p1'];
        //Title image
        // $title_image = $row['title_image'];
        //Heading 2
        $heading_2 = $row['heading2'];
        //Paragraph text 2
        $p_2 = $row ['p2'];

        $image = $row ['image'];

        $image1 = $row ['image1'];

        $img1 = $row ['img1'];
        $img2 = $row ['img2'];
        $img3 = $row ['img3'];

        $im1 = $row ['im1'];
        $im2 = $row ['im2'];
        $im3 = $row ['im3'];
        $im4 = $row ['im4'];
        $im5 = $row ['im5'];
   



    } else {
        // $aboutText = "No data available";
        //  $heading_1;
        //  $p_1;
    }

    // Close the database connection
    $conn->close();
    
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
<body>
    <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
               <a href="index.php"><img src="images/newlogo.png" style="margin-top: -100px;"></a>
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
                    <!-- <li><a href="account.php">Account</a></li> -->
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
            <a href="cart.html"><img src="images/cart.png" width="30px" height="30px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1><?= $heading_1 ?></h1>
                <p><?= $p_1 ?></p>
                    <a href="product.php" class="btn">Explore now &#8594</a>
            </div>
            <div class="col-2">
                <!-- <?=$title_image?> -->
                     <img src="<?= $image ?>">
            </div>
        </div>
    </div>
    </div>   
    
    <!-- Featured categories-->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="<?= $img1 ?>" alt="">
                </div>
                <div class="col-3">
                    <img src="<?= $img2 ?>" alt="">
                </div>  
                <div class="col-3">
                    <img src="<?= $img3 ?>" alt="">
                </div>
            </div>
        </div>
       
    </div>

    <!--Featured Products
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <a href="productdetail.html"><img src="images/product-1.jpg"></a>
                <a href="productdetail.html"><h4>Red Printed T-shirt</h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p> $50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail.html"><img src="images/product-2.jpg"></a>
                <a href="productdetail.html"><h4>Red Printed T-shirt</h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p> $50.00</p>   
            </div>

            <div class="col-4">
                <img src="images/product-3.jpg">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p> $50.00</p>
            </div>

            <div class="col-4">
                <img src="images/product-4.jpg">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            </div>

            Latest Products
            <h2 class="title">Latest Products</h2>
            <div class="row">
                <div class="col-4">
                    <img src="images/product-5.jpg">
                    <h4>Red Printed T-shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p> $50.00</p>
                </div>
    
                <div class="col-4">
                    <img src="images/product-6.jpg">
                    <h4>Red Printed T-shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p> $50.00</p>   
                </div>
    
                <div class="col-4">
                    <img src="images/product-7.jpg">
                    <h4>Red Printed T-shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p> $50.00</p>
                </div>
    
                <div class="col-4">
                    <img src="images/product-8.jpg">
                    <h4>Red Printed T-shirt</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p> $50.00</p>
                </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <img src="images/product-9.jpg">
                        <h4>Red Printed T-shirt</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$50.00</p>
                    </div>
        
                    <div class="col-4">
                        <img src="images/product-10.jpg">
                        <h4>Red Printed T-shirt</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p> $50.00</p>   
                    </div>
        
                    <div class="col-4">
                        <img src="images/product-11.jpg">
                        <h4>Red Printed T-shirt</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <p> $50.00</p>
                    </div>
        
                    <div class="col-4">
                        <img src="images/product-12.jpg">
                        <h4>Red Printed T-shirt</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p> $50.00</p>
                    </div>
                    </div>               
        </div>
        Offer   -->
        
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="<?= $image1 ?>" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusively Available on Happy Store</p>
                        <h1><?=$heading_2?></h1>
                        <small><?=$p_2?></small><br>
                        <a href="" class="btn">Buy Now &#8594;</a>
                    </div>       
                </div>
            </div>
        </div>
        <br>

        <!--Testimonial
        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                           Maxime reprehenderit sed, voluptatum expedita quos,
                           consequatur quae eos suscipit consectetur ipsam 
                           beatae quia, nesciunt assumenda vitae numquam et 
                           cupiditate repudiandae impedit?</p>
                           <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                           </div>
                           <img src="images/user-1.png">
                           <h3>Lorem ipsum</h3>
                    </div>

                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                           Maxime reprehenderit sed, voluptatum expedita quos,
                           consequatur quae eos suscipit consectetur ipsam 
                           beatae quia, nesciunt assumenda vitae numquam et 
                           cupiditate repudiandae impedit?</p>
                           <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                           </div>
                           <img src="images/user-2.png">
                           <h3>Lorem ipsum</h3>
                    </div>

                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                           Maxime reprehenderit sed, voluptatum expedita quos,
                           consequatur quae eos suscipit consectetur ipsam 
                           beatae quia, nesciunt assumenda vitae numquam et 
                           cupiditate repudiandae impedit?</p>
                           <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                           </div>
                           <img src="images/user-3.png">
                           <h3>Lorem ipsum</h3>
                    </div>
                </div>
            </div>
        </div>
    -->
        <h2 class="title">Our Sponsors</h2>
        <!--Brands-->
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="<?= $im1 ?>">
                    </div>
                    <div class="col-5">
                        <img src="<?= $im2 ?>">
                    </div>
                    <div class="col-5">
                        <img src="<?= $im3 ?>">
                    </div>
                    <div class="col-5">
                        <img src="<?= $im4 ?>">
                    </div>
                    <div class="col-5">
                        <img src="<?= $im5 ?>">
                    </div>
                </div>
            </div>
        </div>

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