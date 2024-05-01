<?php
    session_start();
?>
<?php 
    include('new_conn.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page - Online Shopping</title>
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
        /* #fn{
            color: #555;
        }
        #fn_err span{
            color: #ff523b;
        } */
        /* #ln{
            color: #555;
        }
        #ln_err{
            color: #ff523b;
        }
        #num_err{
            color: #ff523b;
        } */
    </style>
    <script>
        $(document).ready(function() {
             $.validator.addMethod(
                "mailregex",
                function(value, element) {
                    var mail_regx = /^([A-Za-z0-9])+@([A-Za-z])+\.([A-Za-z])+$/;
                    return this.optional(element) || mail_regx.test(value);
                },
                "Please enter a valid email format"
            );

            $.validator.addMethod(
                "pwdregex",
                function(value, element) {
                    var pwd_regx = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
                    return this.optional(element) || pwd_regx.test(value);
                },
                "Please enter a valid password format"
            );

             /*-------------------------------*/
            $("#form").validate({
                rules: {
                    mail1: {
                        required: true,
                        mailregex: true,
                    },
                    pwd1: {
                        required: true,
                        minlength: 4,
                        maxlength: 20,
                        pwd_regx: true, 
                    }
                },

                /*----------------------------------------------*/
                messages: {
                    mail1: {
                        required: "Please enter your mail",
                    },
                    pwd1: {
                        required: "Please enter your password",
                        minlength: "Password minimum 4 characters",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "mail1") {
                        $("#mail_err").html(error);
                    }
                    if (element.attr("name") === "pwd1") {
                        $("#pwd_err").html(error);
                    }
                },
            });
        });
    </script>
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

    <h2 class="title">Sign in</h2>

    <form action="#" id="form" method="post" enctype="multipart/form-data">
        <div class="main_box">
            <div class="box_div">
                <div class="form">
        Enter your Mail:<input type="text" name="mail1" id="mail1" /><br>
        <span id="mail_err"></span><br /> 

        Enter your Password:<input type="password" name="pwd1" id="pwd1" /><br>
        <span id="pwd_err"></span><br />

        <a href="index.php"><button name="submit" class="btn">Click for Sign in</button></a>
               
        Click here <a href="for.php">Forgot password?</a>

               </div>
            </div>
        </div>
    </form>
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
        $mail1=$_POST['mail1'];
        $pwd1=$_POST['pwd1'];
        $insert="insert into login_page values('$mail1','$pwd1')";
        $data=mysqli_query($con,$insert);
        if($data){
            $_SESSION['$mail1'];
            ?>
                <script>
                    window.location.href="index.php";
                </script>
            <?php
          //  echo "Data inserted successfully!";
        }else{
            echo "Failed ";
        }
    } 

?>

<!----------------New---------------------------->
<?php
// Start the session


// Check if the user is already logged in, if yes, redirect them to the home page
if(isset($_SESSION["email"])) {
    header("location: index.php");
    exit;
}

// Handle login form submission
if(isset($_POST["submit"])) {
    // Validate login credentials (you should also sanitize inputs and prevent SQL injection)
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Assuming you have a database connection ($con) established
    // Query the database to check if the user exists with the provided credentials
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if($row) {
        // Authentication successful, set session variables
        $_SESSION["email"] = $email;
        // Redirect to the home page or any other authenticated page
        header("location: index.php");
        exit;
    } else {
        // Authentication failed, display an error message
        $error = "Invalid email or password!";
    }
}
?>
