<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gmail = $_POST['gmail'];
    $mobileno= $_POST['mobileno'];
    $address = $_POST['address'];
    $taluka = $_POST['taluka'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    //Database connection
    $conn = new mysqli('localhost','root','','ecommerce_website');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn ->prepare("INSERT INTO address_connection(fname,lname,gmail,mobileno,address,taluka,district,state,country)
                values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssss",$fname,$lname,$gmail,$mobileno,$address,$taluka,$district,$state,$country);
        $stmt->execute();
        echo "address_connection Data sent sucessfully";
        $stmt->close();
        $conn->close();
    }
?>