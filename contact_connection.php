<?php
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $mail1 = $_POST['mail1'];
    $num1 = $_POST['num1'];
    $msg = $_POST['msg'];

    //Database connection
    $conn = new mysqli('localhost','root','','ecommerce_website');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn ->prepare("INSERT INTO contact_us(fn,ln,mail1,num1,msg)
                values(?,?,?,?,?)");
        $stmt->bind_param("sssis",$fn,$ln,$mail1,$num1,$msg);
        $stmt->execute();
        ?>
        <!-- <script>
            window.location.href = "index.php";
        </script> -->
        <?php
         echo "contact_connection Data sent sucessfully";
        $stmt->close();
        $conn->close();
    }
?>