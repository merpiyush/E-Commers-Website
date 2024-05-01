<?php
    include_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Enter email"><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <input type="submit" value="login" name="submit">
        <input type="submit" value="forgot password" name="forgotpass" >
        <input type="submit" value="register" name="reg">
    </form>
<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    // $insert="INSERT INTO `users`(`email`, `password`) VALUES ('$email','$password')";
    // $conn->query($insert);
    $data="SELECT * FROM `users`WHERE email ='$email' ";
    $result=$conn->query($data);
    $row=mysqli_fetch_assoc($result);
    if($result->num_rows>=1){
       if($email==$row['email'] || $password==$row['password'] ){
            echo "logged in succefully";
       }
    }else{
        echo "user not registered";
    }
}
if(isset($_POST['forgotpass'])){
    ?>
        <script>window.location.href="forgot.php";</script>
    <?php
}
if(isset($_POST['reg'])){
    ?>
        <script>window.location.href="new.php";</script>
    <?php    
}

?>   
</body>
</html>
