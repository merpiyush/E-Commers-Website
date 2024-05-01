<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <!-- <li><a href="account.php">Account</a></li> -->
                    <li><a href="login.php">Log in</a></li>
                </ul>
            </nav>
            <a href="cart.html"><img src="images/cart.png" width="30px" height="25px" style="margin-bottom: 120px;"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

       <!--------Account Page--------->
       <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image2.png" width="100%">
                </div>
                <div class="col-2">
                   <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>

                    <form id="LoginForm" action="account_connection.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Username" name="login_name">
                        <input type="password" placeholder="Password" name="login_pwd">
                        <button type="submit" class="btn">Login</button>
                        <a href="">Forgot password</a>
                    </form>

                    <form id="RegForm" action="account_connection.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Username" name="reg_name">
                        <input type="email" placeholder="Email" name="reg_mail">
                        <input type="password" placeholder="Password" name="reg_pwd">
                        <button type="submit" class="btn">Register</button>
                    </form>
                   </div>
                </div>
            </div>
        </div>
       </div>
      

        <!--Footer-->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and ios mobile phone.</p>
                        <div class="app-logo">
                            <img src="images/play-store.png">
                            <img src="images/app-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/newlogo.png">
                        <p>Our Purpose is To Sustainably make the Pleasure and
                            Benefits of Products Accessible to the Many.
                        </p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Cards</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow us</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>YouTube</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="lastline">Thank You for visit.</p>
            </div>
        </div>
        <!--JS for toggle menu-->
        <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";
            function    menutoggle(){
                if( MenuItems.style.maxHeight = "0px"){
                    MenuItems.style.maxHeight = "200px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
       

       <!-------------JS for toggle form--------->
       <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";               
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }
            function login(){
                RegForm.style.transform = "translateX(300px)";               
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
       </script>
</body>
</html>