<?php
// include 'nav.php';

$conn = new mysqli("localhost", "root", "", "ecommerce_website");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $otp = rand(1000, 9999);

    // Check if email exists in the database
    $sql_check_email = "SELECT * FROM register_page WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows >= 1) { // Check if exactly one row exists
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'rmakvana400@rku.ac.in'; // SMTP username (sender mail id)
            $mail->Password = 'R9622220'; // SMTP password (sender mail id password)
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to

            // Recipients
            $mail->setFrom('mr.rahul7706@gmail.com'); // Sender's email address and name
            $mail->addAddress($email); // Recipient's email address

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = 'Your OTP for password reset is: ' . $otp ;
            // Send the email
            $mail->send();

            // Insert OTP into database
            // $data = "INSERT INTO `otps` VALUES('$email', '$otp', NOW())";
            // $res = mysqli_query($conn, $data);
            

            // Redirect or display success message
            echo "OTP sent successfully. Check your email.";
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        // Email not registered
        echo "Email is not registered. Please enter a valid email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password Page - Online Shopping</title>
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
                    var mail_regx = /^[\w\.]+@([\w]+\.)+[\w]{2,4}$/;
                    return this.optional(element) || mail_regx.test(value);
                },
                "Please enter a valid email format"
            );

             /*-------------------------------*/
            $("#form").validate({
                rules: {
                    mail1: {
                        required: true,
                        mailregex: true,
                    },
                },

                /*----------------------------------------------*/
                messages: {
                    mail1: {
                        required: "Please enter your mail",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "mail1") {
                        $("#mail_err").html(error);
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
            <!-- <a href="cart.html"><img src="images/cart.png" width="30px" height="30px" style="margin-bottom: 120px;"></a> -->
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <h2 class="title">OTP send</h2>
    <h3><center>Enter your email to reset your password</center></h3><br><br>

    <div class="main_box">
            <div class="box_div">
                <div class="form">
    <form action="verify_otp.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <a href="verify_otp.php"><button name="submit" class="btn">Click for Registration</button></a>

    </form>
                </div>
            </div>
    </div>
  

    </body>
</html>
<!-- <div class="container mt-5">
    <div class="row text-center">
        <div class="col-12 display-5">FORGOT PASSWORD</div>
    </div>
    <div class="row text-center">
        <div class="col-12 h5 mt-3">Forgot password with email</div>
    </div>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" name="forgot" value="Reset Password">
    </form>
</div> -->
