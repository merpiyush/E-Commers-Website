<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Page - Online shopping</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #search{
            margin-left: 1%;
            border: 1px solid #ff523b;
            border-radius: 5px;
            height: 25px;
        }
        #search_img{
            height: 20px;
            width: 20px;
            margin-right: 20px;
        }
        select{  
            border-radius: 5px;
        }
    </style>
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
            
            <!-- <a href="cart.php"><img src="img/cart.png" width="30px" height="30px" style="margin-bottom: 120px;">(<?php echo $count; ?>)</a> -->
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

</body>
</html>
    