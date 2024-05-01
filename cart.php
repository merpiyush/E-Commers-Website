<?php 
    include('new_conn.php'); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page - Online Shopping</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    

       <!-------Cart item details---------->
       
  
        <h2 class="title">Add To Cart</h2>

        <div class="small-container cart-page">
            <div>
                <thead>
                <table>
                    <tr>
                    <th scope="col" style="text-align:center;">Serial No.</th>
                    <th scope="col" style="text-align:center;">Item Name</th>
                    <th scope="col" style="text-align:center;">Item Price</th>
                    <th scope="col" style="text-align:center;">Quantity</th>
                    <th scope="col" style="text-align:center;">Total</th>
                    <th scope="col" style="text-align:center;"></th>
                    </tr>
                </thead>

                <tbody  style="text-align:center;">
                <?php 
        if(isset($_SESSION['cart']))
        {
        foreach($_SESSION['cart'] as $key => $value)
        {
            $sr=$key+1;
            echo 
            "<tr>
                <td>$sr</td>
                <td>$value[Item_Name]</td>
                <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                <td>
                    <input class='iquantity' onchange='subTotal();' type='number' value='$value[Quantity]' min='1' max='10'>
                </td>
                <td class='itotal'></td>
                <td>
                    <form action='manage_cart.php' method='POST'>
                    <button name='Remove_Item' class='btn'>REMOVE</button>
                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                    </form>
                </td>
             </tr>";
        }
        }
    ?>
                </tbody>
                </table>   
        <div class="row">
            <div  class="refund-policy">
            <h4>Total Amount:</h4>
            <h3 class="total_price" id="gtotal"></h3>   
            <br>
            <form>
                <a href="address.php" class="btn">Checkout</a>            
            </form>
            </div>
        </div>  
        </div>
        </div>
    <br>


        <script>
            var gt=0;
            var iprice=document.getElementsByClassName('iprice');
            var iquantity=document.getElementsByClassName('iquantity');
            var itotal=document.getElementsByClassName('itotal');
            var gtotal=document.getElementById('gtotal');

            function subTotal()
            {
                gt=0;
                for(i=0;i<iprice.length;i++)
                {
                    itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                    gt=gt+(iprice[i].value)*(iquantity[i].value);
                }
                gtotal.innerText=gt;
            }
            subTotal();
        </script>

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
            function menutoggle(){
                if( MenuItems.style.maxHeight = "0px"){
                    MenuItems.style.maxHeight = "200px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
       
</body>
</html>