<?php
    require_once 'dbconnect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
 
        $sql = "DELETE FROM schedule where id=$id";
        mysqli_query($conn, $sql);
        header("Location: appointment.php");
    }


?>