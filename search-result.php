<?php 
    include('new_conn.php'); 
    ?>
<?php
session_start();
error_reporting(0);

//include_once 'header.php';

// Check if the form is submitted and the search query is set
if(isset($_POST['search']) && !empty($_POST['product_page2'])) {
    // Sanitize user input to prevent SQL injection (better to use prepared statements)
    $search_query = mysqli_real_escape_string($conn, $_POST['product_page2']);
    
    // Construct SQL query
    $sql = "SELECT * FROM product_page2 WHERE p_name LIKE '%$search_query%'";
    
    // Execute the SQL query
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <!-- Meta tags and CSS/JS links -->
    <style>
    .heading {
  background: url(./img/nikephotoes/nike.png) no-repeat;
  background-size: cover;
  background-position: center;
  text-align: center;
  padding-top: 6rem;
  padding-bottom: 6rem;
}

.heading h1 {
  color: sandybrown;
  font-size: 4rem;
}

.heading p {
  padding: top 1px;
  font-size: 2rem;
  color: darkgray;
}

.heading p a {
  color: #ff7800;
  padding-right: 0.5rem;
}
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
    <!-- Search result container and other HTML structure -->
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/newlogo.png" style="margin-top: -100px;"></a>
            </div>
            <nav>
                <ul id="MenuItems"> 
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
    <div class="search-result-container">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active " id="grid-container">
                <div class="category-product inner-top-vs">
                    <div class="row">   
                        <?php
                        if(isset($result) && mysqli_num_rows($result) > 0) {
                            // Display search results
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                
            <div class="col-4">
                <a href="productdetail.php"><img src="<?php echo $row["p_img"];?>"></a>
                <a href="productdetail.php"><h4><?php echo $row["p_name"];?></h4></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p><?php echo $row["p_price"];?></p>
                <button type="submit" name="Add_To_Cart" class="btn btn-info">Add to Cart</button>
                <input type="hidden" name="Item_Name" value="T-shirt 1">
                <input type="hidden" name="Price" value="100">
            </div>
                        <?php
                            }
                        } else {
                            // No results found
                            echo '<div class="col-sm-6 col-md-4 wow fadeInUp"><h3>No Product Found</h3></div>';
                        }
                        ?>
                    </div><!-- /.row -->
                </div><!-- /.category-product -->
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div><!-- /.search-result-container -->
    
    <!-- JavaScript libraries -->
</body>
</html>