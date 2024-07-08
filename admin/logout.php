<?php
    session_set_cookie_params(600,'dashboard.php','localhost');
    session_start();
    require_once "dbconnect.php";
    $update_status_admin="UPDATE `admin_user` SET `status`= 0 WHERE username='".$_SESSION["user_admin"]."'";
    $conn->query($update_status_admin);
    session_destroy();
    header("Location: login_admin.php");
?>