<?php
    $login_name = $_POST['login_name'];
    $login_pwd = $_POST['login_pwd'];
    // $reg_name = $_POST['reg_name'];
    // $reg_mail = $_POST['reg_mail'];
    // $reg_pwd = $_POST['reg_pwd'];

    //Database connection
    $conn = new mysqli('localhost','root','','ecommerce_website');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn ->prepare("INSERT INTO account_us(login_name,login_pwd)
                values(?,?)");
        $stmt->bind_param("ss",$login_name,$login_pwd);
        $stmt->execute();
        echo "account_connection Data sent sucessfully";
        $stmt->close();
        $conn->close();
    }
?>