<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

$mail = new PHPMailer();
$headers = 'From: Perfact Fashion <pniranjani601@rku.ac.in>' . "\r\n";
$headers .= 'Reply-To: <pniranjani601@rku.ac.in>' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$to = "niranjaniprashant8@gmail.com";
$subject = "Order Conformation";
$body = "<h1 background:color red;>Thank For Shipping</h1>";

$mail->IsSMTP(); // telling the class to use SMTP
// $mail->Mailer = "smtp";
$mail->SMTPDebug  = 2;                // enables SMTP debug information (for testing)
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                             // 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = 'smtp.gmail.com';      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "pniranjani601@rku.ac.in";  // GMAIL username(from)
$mail->Password   = "Prashant@RKU";            // GMAIL password(from)
$mail->SetFrom('pniranjani601@rku.ac.in', 'Perfact Fashion'); //from
$mail->AddReplyTo("niranjaniprashant8@gmail.com", "Perfact Fashion"); //to
$mail->Subject    = "Order Confirmation";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->MsgHTML($body);
$address = "niranjaniprashant8@gmail.com"; //to
$mail->AddAddress($address, "Perfact Fashion");
if (!$mail->Send()) {
    $_SESSION['error'] = "Failed to reset the password please try again after sometime";
} else {
    $_SESSION['success'] = "Password reset link has been sent to your registered email.Please check the spam also.";
}
?>
<script>
    window.location.href="demo.php"
</script>
