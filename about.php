<?php 
    include('new_conn.php'); 
    ?>
<?php
    session_start();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the about_us table
    $select = "SELECT * FROM about_us";
    $result = $conn->query($select);

    // Check if the query was successful and if there is data to display
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();
        //Paragraph text 
        $head1 = $row['heading_1'];
        $aboutText1 = $row['p1'];

        $head2 = $row['heading_2'];
        $aboutText2 = $row['p2'];

        $head3 = $row['heading_3'];
        $aboutText3 = $row['p3'];

        //Testimonial code
        $udetail1 = $row['u_detail1'];
        $uname1 = $row['u_name1'];

        $udetail2 = $row['u_detail2'];
        $uname2 = $row['u_name2'];

        $udetail3 = $row['u_detail3'];
        $uname3 = $row['u_name3'];
    } else {
        $aboutText = "No data available";
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
    <title>About Page - Online Shopping</title>
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
            <!-- <a href="cart.php"><img src="images/cart.png" width="30px" height="30px" style="margin-bottom: 120px;"></a> -->
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <h2 class="title">About us</h2>

    <div class="about-section">
        <div class="container">
            
            <div class="refund-policy">
                <h3><?=$head1?></h3>
                <p><?=$aboutText1?></p>
                 </div>
            <br>

            <div class="free-shipping">
                    <h3><?=$head2?></h3>
                    <p><?=$aboutText2?></p>
              </div>
            <br>

            <div class="services">
            <h3><?=$head3?></h3>
                <p><?=$aboutText3?></p>
            </div>

            
            <!-- JavaScript for toggle menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight === "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
        </div>

    </div>

    <!--Testimonial-->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p><?= $udetail1 ?></p>
                       <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                       </div>
                       <img src="images/user-1.png">
                       <h3><?= $uname1 ?></h3>
                </div>

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p><?= $udetail2 ?></p>

                       <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                       </div>
                       <img src="images/user-2.png">
                       <h3><?= $uname2 ?></h3>
                </div>

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>

                    <p><?= $udetail3 ?></p>

                      <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                       </div>
                       <img src="images/user-3.png">
                       <h3><?= $uname3 ?></h3>

                </div>
            </div>
        </div>
    </div>