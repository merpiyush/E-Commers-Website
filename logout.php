<?php
    session_start();

    //unset sesssion variables
    unset($_SESSION['username']);

    //Destroy the session
    session_destroy();

    //Redirect to login page
    header("Location: index.php");
    exit();
?>