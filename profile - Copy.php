<?php

    session_start();

    $loggedIn = isset($_SESSION['username']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "ecommerce_website";

    $loggedIn = isset($_SESSION['username']);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the about_us table
    $select = "SELECT * FROM profile";
    $result = $conn->query($select);

    // Check if the query was successful and if there is data to display
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();
        //Title text 
        $u_name = $row['name'];
        //Paragraph text 1
        $u_gmail = $row['gmail'];
        //Title image 1
        $u_contact = $row['contact'];
        //Heading 2
        $u_office_address = $row['office_address'];

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
    <title>Profile Page - Online Shopping</title>
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
                   
                 <!--     <li><a href="account.php">Account</a></li> -->        
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

    <h2 class="title">Profile</h2>

    <form id="form" method="post" enctype="multipart/form-data" action="edit_profile.php">
        <div class="main_box">
            <div class="box_div">
                <div class="form">
                <center><img src="images/user (1).png" style="height:150px"></center><br>
                Name:<hr> <?=$u_name?> <br><br>
                G-mail id:<hr> <?=$u_gmail?> <br><br>
                Contact no:<hr> <?=$u_contact?> <br><br>
                Office Address:<hr> <?=$u_office_address?><br><br>
                Available website account on:<hr> 
                <img src="images/insta.png" style="height:25px">&nbsp;
                <img src="images/facebook.png" style="height:25px">&nbsp;
                <img src="images/twitter.png" style="height:25px"><br><br>
                <a href=""><button name="submit" class="btn">Edit Profile</button>
        
                </a>
                
                </div>
            </div>
        </div>
    </form>
    <center><a href="index.php"><button name="submit" class="btn">Go Back</button></a></center>
</body>

</html>



