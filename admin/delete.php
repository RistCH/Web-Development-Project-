<?php
    require_once 'dbconnect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
 
        $sql = "DELETE FROM admin_user where id=$id";
        mysqli_query($conn, $sql);
        header("Location: dashboard.php");
    }


?>