<?php 
    include('new_conn.php'); 
    ?>
<?php
    $reg_name = $_POST['reg_name'];
    $reg_email = $_POST['reg_email'];
    $reg_pass= $_POST['reg_pass'];


    //Database connection
    if($con->connect_error){
        die('Connection Failed : '.$con->connect_error);
    }
    else{
        $stmt = $con ->prepare("INSERT INTO register_page(reg_name,reg_email,reg_pass)
                values(?,?,?)");
        $stmt->bind_param("sss",$reg_name,$reg_email,$reg_pass);
        $stmt->execute();
        $stmt->close();
        $con->close();
    }
?>
<script>
window.location.href="login.php";
</script>
