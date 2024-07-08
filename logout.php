<?php
    session_start();
    require_once "dbconnect.php";
    $update_status="UPDATE `users` SET `status`= 0 WHERE email='".$_SESSION["user"]."'";
    $conn->query($update_status);
    session_destroy();
    header("Location: main.php");
?>