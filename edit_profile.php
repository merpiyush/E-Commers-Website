<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile Page - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
        input{
            color: #555;
        }
        span{
            color: #ff523b;
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

    <h2 class="title">Edit Profile</h2>

    <form id="form" method="post" enctype="multipart/form-data" action="">
        <div class="main_box">
            <div class="box_div">
                <div class="form">
                  <h3 style="text-align:center;">Change profile pic</h3><br>
                <center><img src="images/user (1).png" style="height:150px"></center><br>
                <input type="file"><br>
                Name:<hr>
                <input type="text" id="username" name="username" value="Makvana Rahul"> <br><br>
                G-mail id:<hr> 
                <input type="email" id="email" name="email" value="mr.rahul706@gmail.com"> <br><br>
                Contact no:<hr>
                <input type="text" id="mobileno" name="mobileno" value="+91 1234567890"> <br><br>
                Office Address:<hr> 
                <input type="text" id="address" name="address" value="Rajkot,Gujarat."><br><br>
        
                <a href=""><button name="submit" class="btn">Save changes</button>
        
                </a>
                
                </div>
            </div>
        </div>
    </form>
    <center><a href="profile.php"><button name="submit" class="btn">Go Back</button></a></center>
</body>

</html>

<?php
    $con=new mysqli("localhost","root","","ecommerce_website");
    if($con){
        echo "true";
    }else{
        echo "false";
    }
?>
<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $mobileno=$_POST['mobileno'];
        $address=$_POST['address'];
        $insert="insert into edit_profile values('$username','$email','$mobileno','$address')";
        $data=mysqli_query($con,$insert);
        if($data){
            ?>
                <!-- <script>
                    window.location.href="login.php";
                </script>  -->
            <?php
           echo "Data inserted successfully!";
        }else{
            echo "Failed ";
        }
    }

?>


