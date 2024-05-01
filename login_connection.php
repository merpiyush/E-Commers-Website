<?php 
    include('new_conn.php'); 
?>
<?php
    $mail1 = $_POST['mail1'];
    $pwd1 = $_POST['pwd1'];
    // $reg_name = $_POST['reg_name'];
    // $reg_mail = $_POST['reg_mail'];
    // $reg_pwd = $_POST['reg_pwd'];

    //Database connection
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn ->prepare("INSERT INTO login_page(mail,pwd)
                values(?,?)");
        $stmt->bind_param("ss",$mail,$pwd);
        $stmt->execute();
        ?>
            <!-- <script>
                window.location.href = "index.php";
            </script>  -->
        <?php
        echo "login_connection Data sent sucessfully";
        $stmt->close();
        $conn->close();
    }
?>