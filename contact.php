<?php 
    include('new_conn.php'); 
    ?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact us - Online Shopping</title>
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
                "fnregex",
                function(value, element) {
                    var fn_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || fn_regx.test(value);
                },
                "Name cannot contain numbers"
            );

            $.validator.addMethod(
                "lnregex",
                function(value, element) {
                    var ln_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || ln_regx.test(value);
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
                "numregex",
                function(value, element) {
                    var fn_num = /^[0-9]{10}$/;
                    return this.optional(element) || fn_num.test(value);
                },
                "Number cannot contain non-numeric characters"
            );

            $.validator.addMethod(
                "msgregex",
                function(value, element) {
                    var msg_regx = /^([A-Za-z0-9])+$/;
                    return this.optional(element) || msg_regx.test(value);
                },
                "Please enter a any message"
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
                    ln: {
                        required: true,
                        minlength: 5,
                        maxlength: 10,
                        fnregex: true,
                    },
                    mail1: {
                        required: true,
                        mailregex: true,
                    },
                    num1: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        numregex: true,
                    },
                    msg: {
                        required: true,
                    },
                 
                },

                /*----------------------------------------------*/
                messages: {
                    fn: {
                        required: "Please enter your first name",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 10 characters are allowed",
                    },
                    ln: {
                        required: "Please enter your last name",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 10 characters are allowed",
                    },
                    mail1: {
                        required: "Please enter your mail",
                    },
                    num1: {
                        required: "Please enter your number",
                        minlength: "Number must be exactly 10 characters",
                        maxlength: "Number must be exactly 10 characters",
                    },
                    msg: {
                        required: "Please enter your message",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "fn") {
                        $("#fn_err").html(error);
                    }
                    if (element.attr("name") === "ln") {
                        $("#ln_err").html(error);
                    }
                    if (element.attr("name") === "mail1") {
                        $("#mail_err").html(error);
                    }
                    if (element.attr("name") === "num1") {
                        $("#num_err").html(error);
                    }
                    if (element.attr("name") === "msg") {
                        $("#msg_err").html(error);
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

    <h2 class="title">Get in touch</h2>

    <form action="contact_connection.php" id="form" method="post" enctype="multipart/form-data">
        <div class="main_box">
            <div class="box_div">
                <div class="form">
        Enter your First Name: <input type="text" name="fn" id="fn" /><br>
        <span id="fn_err"></span><br /> 

        Enter your Last name: <input type="text" name="ln" id="ln" /><br>
        <span id="ln_err"></span><br /> 

        Enter your Mail:<input type="text" name="mail1" id="mail1" /><br>
        <span id="mail_err"></span><br /> 

        Enter your Mobile Number: <input type="text" name="num1" id="num1" /><br>
         <span id="num_err"></span><br /> 

        Enter your Message: <textarea name="msg" id="msg"></textarea><br>
         <span id="msg_err"></span><br>

        <a href="index.php"><button name="submit" class="btn">Sent your message</button></a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>