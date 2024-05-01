<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Page - Online Shopping</title>
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
                "fnameregex",
                function(value, element) {
                    var fname_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || fname_regx.test(value);
                },
                "Name cannot contain numbers"
            );

            $.validator.addMethod(
                "lnameregex",
                function(value, element) {
                    var lname_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || lname_regx.test(value);
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
                "mobilenoregex",
                function(value, element) {
                    var mobileno_regx = /^([0-9])+$/;
                    return this.optional(element) || mobileno_regx.test(value);
                },
                "Please enter a mobile number"
            );

            $.validator.addMethod(
                "addressregex",
                function(value, element) {
                    var address_regx = /^[a-zA-Z]+$/;
                    return this.optional(element) || address_regx.test(value);
                },
                "Address cannot contain numbers"
            );
            


            /*-------------------------------*/
            $("#form").validate({
                rules: {
                    fname: {
                        required: true,
                        minlength: 5,
                        maxlength: 10,
                        fnregex: true,
                    },
                    lname: {
                        required: true,
                        minlength: 5,
                        maxlength: 10,
                        fnregex: true,
                    },
                    mail1: {
                        required: true,
                        mailregex: true,
                    }, 
                    mobileno: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        mobileno_regx: true, 
                    },
                    address: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        addressregex: true,
                    },  
                    
                },

                /*----------------------------------------------*/
                messages: {
                    fname: {
                        required: "Please enter your first name",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 10 characters are allowed",
                    },
                    lname: {
                        required: "Please enter your last name",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 10 characters are allowed",
                    },
                    mail1: {
                        required: "Please enter your mail",
                    },
                    mobileno: {
                        required: "Please enter your mobile no",
                        minlength: "Minimum 10 digit are required",
                        maxlength: "Maximum 10 digit are allowed",
                    },
                    address: {
                        required: "Please enter your address",
                        minlength: "Minimum 5 characters are required",
                        maxlength: "Maximum 20 characters are allowed",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "fname") {
                        $("#fname_err").html(error);
                    }
                    if (element.attr("name") === "lname") {
                        $("#lname_err").html(error);
                    }
                    if (element.attr("name") === "mail1") {
                        $("#mail_err").html(error);
                    }
                    if (element.attr("name") === "mobileno") {
                        $("#mobileno_err").html(error);
                    }
                    if (element.attr("name") === "address") {
                        $("#address_err").html(error);
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
    <h2 class="title">Fill your details</h2>

     <!-- contact -->
     
    
     <form action="index.php" id="form" method="post" enctype="multipart/form-data">
          <div class="main_box">
          <div class="box_div">
          <div class="form">
          Enter your First Name: <input type="text" name="fname" id="fname" /><br>
          <span id="fname_err"></span><br /> 

          Enter your Last Name: <input type="text" name="lname" id="lname" /><br>
          <span id="lname_err"></span><br /> 

          Enter your Mail:<input type="text" name="mail1" id="mail1" /><br>
          <span id="mail_err"></span><br /> 

          Enter your Mobile no:<input type="number" name="mobileno" id="mobileno" /><br>
          <span id="mobileno_err"></span><br />

          Enter your Address: <input type="text" name="address" id="address" /><br>
          <span id="address_err"></span><br /> 
                    
          <a href="index.php"><button name="submit" class="btn">Submit</button></a>
          </div>
          </div>
          </div>
      </form>
      
</body>
</html>

<?php
    $con=new mysqli("localhost","root","","ecommerce_website");
    if($con){
      //  echo "true";
    }else{
        echo "false";
    }
?>
<?php
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mail1=$_POST['mail1'];
        $mobileno=$_POST['mobileno'];
        $address=$_POST['address'];
        $insert="insert into checkout_page values('$fname','$lname','$mail1','$mobileno','$address')";
        $data=mysqli_query($con,$insert);
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