<?php
    require_once 'dbconnect.php';

    $id = $_GET['id'];
    $availability=$_GET['availability'];

    $update_status = "UPDATE admin_user SET availability=$availability WHERE id=$id";

    mysqli_query($conn, $update_status);

    header('location: dashboard.php');

?>