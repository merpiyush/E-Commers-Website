<?php 
    include('new_conn.php'); 
    ?>
<?php

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the about_us table
    $select = "SELECT * FROM product_details";
    $result = $conn->query($select);

    // Check if the query was successful and if there is data to display
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();
        $img2 = $row['img2'];
        $img3 = $row['img3'];
        $img4 = $row['img4'];
        $img5 = $row['img5'];
        $t1 = $row['t1'];
        $t2 = $row['t2'];
        $t3 = $row['t3'];
        $t4 = $row['t4'];
        $t5 = $row['t5'];
        $t6 = $row['t6'];
        $f1 = $row['f1'];
        $f2 = $row['f2'];

    } else {
        // $aboutText = "No data available";
    }
    
    $select = "SELECT * FROM product_page2";
    $result = $conn->query($select);
    
    // Check if the query was successful and if there is data to display
    while ($row = mysqli_fetch_array($result)) {
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it     
        $row = $result->fetch_assoc();
        //Product name         
    
        $p_n = $row['p_name'];
        $img1 = $row['p_img'];
        $i1 = $row['p_name'];
        $pr1 = $row['p_price'];

    } else {
        // $aboutText = "No data available";
    }
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
    <title>Product Details - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <a href="index.php"><img src="images/newlogo.png" style="margin-top: -100px;"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
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
<a href="cart.html"><img src="images/cart.png" width="30px" height="25px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <!------------Single Product Details------------>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
             
                <img src="<?= $img1 ?>" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="<?= $img1 ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= $img1 ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= $img1 ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= $img1 ?>" width="100%" class="small-img">
                    </div>
                </div>

            </div>
            <div class="col-2">
                <p><?=$p_n?></p>
                <h1><?=$i1?></h1>
                <h4><?=$pr1?>
                    <!-- =$p_price -->
                </h4>
                <select>
                    <option><?=$t1?></option>
                    <option><?=$t2?></option>
                    <option><?=$t3?></option>
                    <option><?=$t4?></option>
                    <option><?=$t5?></option>
                    <option><?=$t6?></option>
                </select>
                <input type="number" value="1">
                <a href="register.php" class="btn">Add To Cart</a>
                <h3><?=$f1?><i class="fa fa-indent"></i></h3>
                <br>
                <p><?=$f2?></p>
            </div>
        </div>
    </div>

        <!--------Title---------->
       
        <!----------------Footer----------------->
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

        <!----JS for product gallery-------->

        <script>
          var ProductImg = document.getElementById("ProductImg");
          var SmallImg = document.getElementsByClassName("small-img");
          
          SmallImg[0].onclick = function()
          {
            ProductImg.src = SmallImg[0].src;
          }
          SmallImg[1].onclick = function()
          {
            ProductImg.src = SmallImg[1].src;
          }
          SmallImg[2].onclick = function()
          {
            ProductImg.src = SmallImg[2].src;
          }
          SmallImg[3].onclick = function()
          {
            ProductImg.src = SmallImg[3].src;
          }
        </script>

</body>
</html>