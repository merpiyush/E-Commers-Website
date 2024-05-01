<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirm Password Page - Online Shopping</title>
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
                "pwdregex",
                function(value, element) {
                    var pwd_regx = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
                    return this.optional(element) || pwd_regx.test(value);
                },
                "Please enter a valid Password"
            );

            $.validator.addMethod(
                "pwd2regex",
                function(value, element) {
                    var pwd2_regx = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?!.*[/s]).{8,20}$/;
                    return this.optional(element) || pwd2_regx.test(value);
                },
                "Please enter a valid Password"
            );


            /*-------------------------------*/
            $("#form").validate({
                rules: { 
                    pwd1: {
                        required: true,
                        minlength: 4,
                        maxlength: 6,
                        pwd_regx: true, 
                    },
                    pwd2: {
                        required: true,
                        minlength: 4,
                        maxlength: 6,
                        pwd_regx: true, 
                    }              
                },

                /*----------------------------------------------*/
                messages: {
                    pwd1: {
                        required: "Please enter your Password",
                        minlength: "Password minimum 4 digit",
                    },
                    pwd2: {
                        required: "Please enter your confirm Password",
                        minlength: "Password and Confirm Password must be same",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "pwd1") {
                        $("#pwd_err").html(error);
                    }
                    if (element.attr("name") === "pwd2") {
                        $("#pwd2_err").html(error);
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
                    <li><a href="login.php">Log in</a></li>
                    <li><a href="register.php">Register</a></li> 
                    <!-- <li><a href="account.php">Account</a></li> -->
                </ul>
            </nav>
            <a href="cart.html"><img src="images/cart.png" width="30px" height="30px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <h2 class="title">Verify Password</h2>

    <form action="index.php" id="form" method="post" enctype="multipart/form-data">
        <div class="main_box">
            <div class="box_div">
                <div class="form">
        New Password:<input type="password" name="pwd1" id="pwd1" /><br>
        <span id="pwd_err"></span><br /> 

        Confirm Password:<input type="password" name="pwd2" id="pwd2" /><br>
        <span id="pwd2_err"></span><br /> 

        <a href="index.php"><button name="submit" class="btn">Submit Password</button></a>

                </div>
            </div>
        </div>
    </form>