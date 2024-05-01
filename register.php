<?php 
    include('new_conn.php'); 
    ?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script>
        $(document).ready(function() {
            $.validator.addMethod(
                "fnregex",
                function(value, element) {
                    var fn_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || fn_regx.test(value);
                },
                "Name cannot contain numbers"
            );

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
                    fn: {
                        required: true,
                        minlength: 5,
                        maxlength: 10,
                        fnregex: true,
                    },
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
                    fn: {
                        required: "Please enter your first name",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 10 characters are allowed",
                    },
                    mail1: {
                        required: "Please enter your mail",
                    },
                    pwd1: {
                        required: "Please enter your password",
                        minlength: "Password minimum 4 characters",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "fn") {
                        $("#fn_err").html(error);
                    }
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

    <h2 class="title">Register</h2>

    <form action="#" id="form" method="post" enctype="multipart/form-data">
        <div class="main_box">
            <div class="box_div">
                <div class="form">

        Enter your User Name: <input type="text" name="fn" id="fn" /><br>
        <span id="fn_err"></span><br /> 

        Enter your Mail:<input type="text" name="mail1" id="mail1" /><br>
        <span id="mail_err"></span><br /> 

        Enter your Password:<input type="password" name="pwd1" id="pwd1" /><br>
        <span id="pwd_err"></span><br /> 

        <a href="login.php"><button name="submit" class="btn">Click for Registration</button></a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<?php
    $con=new mysqli("localhost","root","","ecommerce_website");
    if($con){
        //echo "true";
    }else{
        echo "false";
    }
?>
<?php
    if(isset($_POST['submit'])){
        $fn=$_POST['fn'];
        $mail1=$_POST['mail1'];
        $pwd1=$_POST['pwd1'];

        $sql = "INSERT INTO register_page (username, password, email) VALUES ('$fn','$pwd1','$mail1')";
        $data=mysqli_query($con,$sql);
        if($data){
            ?>
                <script>
                    window.location.href="login.php";
                </script>
            <?php
           // echo "Data inserted successfully!";
        }else{
            echo "Failed ";
        }
    }

?>