<?php 
    include('new_conn.php'); 
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
                </ul>
            </nav>
            <a href="cart.html"><img src="images/cart.png" width="30px" height="30px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <h2 class="title">OTP send</h2>
    <h3><center>Enter your email to reset your password</center></h3><br><br>

    <div class="main_box">
            <div class="box_div">
                <div class="form">
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <button name="forgot" class="btn">Send otp</button></a>

    </form>
                </div>
            </div>
    </div>
  

    </body>
</html>

<?php
$con=new mysqli("localhost","root","","ecommerce_website");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

$otp=rand(1000,9999);
echo "$otp";
if(isset($_POST['forgot'])){
    $email=$_POST['email'];

$mail = new PHPMailer();
$headers = 'From: OOPPT <pmer933@rku.ac.in>' . "\r\n";
$headers .= 'Reply-To: <pmer933@rku.ac.in>' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$to = "$email";
$subject = "<h1>forgot</h1>";
$body = $otp."<p>is Your OTP For Happy Store Please Don't Share otp.</p>";

$mail->IsSMTP(); // telling the class to use SMTP
// $mail->Mailer = "smtp";
// $mail->SMTPDebug  = 2;                // enables SMTP debug information (for testing)
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                         
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                     // enable SMTP authentication
$mail->SMTPSecure = "ssl";                    // sets the prefix to the servier
$mail->Host       = 'smtp.gmail.com';         // sets GMAIL as the SMTP server
$mail->Port       = 465;                      // set the SMTP port for the GMAIL server
$mail->Username   = "pmer933@rku.ac.in";  // GMAIL username(from)
$mail->Password   = "mp1592004";           // GMAIL password(from)
$mail->SetFrom('pmer933@rku.ac.in', 'OTP'); //from
$mail->AddReplyTo("$email", "OTP"); //to
$mail->Subject    = " piyush OTP";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->MsgHTML($body);
$address = "$email"; //to
$mail->AddAddress($address, "OTP");
if (!$mail->Send()) {
    $in="INSERT INTO otp(`opt_c`,`email`,`opt_time`) VALUES ('$otp','$email',CURRENT_TIMESTAMP)";
    $data=mysqli_query($con,$in);
    $_SESSION['error'] = "Failed to reset the password please try again after sometime";
} else {
    $_SESSION['success'] = "Password reset link has been sent to your registered email.Please check the spam also.";
}
    }
?>
<?php
$con = new mysqli("localhost", "root", "", "ecommerce_website");
if (isset($_POST['submit'])) {
    $mail1 = $_POST['email'];
    $pwd1 = $_POST['pwd1'];

    $sel = "SELECT * FROM login_page WHERE login_email='$mail1'";
    $result = $con->query($sel);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <script>
            window.location.href="vp.php";
        </script>
    <?php
    } else {
        echo "No user found with this email.";
    }
//     
}
?>