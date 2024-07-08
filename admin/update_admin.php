<?php
    include "dbconnect.php";
    $id=$_GET["updateid"];
    $sql_update = "SELECT * FROM `admin_user` WHERE id=$id";
    $query_update = mysqli_query($conn, $sql_update);
    $row = mysqli_fetch_assoc($query_update);
    $full_name = mysqli_real_escape_string($conn, $row["fullname"]);
    $E_mail = mysqli_real_escape_string($conn, $row["email"]);
    $User_name = $row["username"];
    $ContactNo = $row["contact_no"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
</head>
<body>


<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-9 col-sm-10 col-md-3 m-auto position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                if (isset($_POST["submit-update"])){
                                    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
                                    $Contact_No = $_POST['Contact_No'];
                                    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);
                                    $Username = $_POST['Username'];
                            
                                    $errors = array();
                                                    
                                    if(empty($fullname) OR empty($Email) OR empty($Contact_No) OR empty($User_name)){
                                        array_push($errors, "The fields are required.");
                                    }
                            
                                    if(strlen($Contact_No)!=11){
                                        array_push($errors, "Contact Number must be 11 numbers long.");
                                    }
                                    
                                    if(count($errors)>0){
                                        foreach ($errors as $error){
                                            echo "<div class='alert alert-danger'>$error</div>";
                                        }
                                    }else{
                            
                                        $sql = "UPDATE `admin_user` 
                                        SET id=$id, 
                                        fullname='$fullname', 
                                        username='$Username', 
                                        contact_no='$Contact_No', 
                                        email='$Email'
                                        WHERE id=$id";
                            
                                        $query = mysqli_query($conn, $sql);
                                        if($query){
                                        echo "<div class='alert alert-success'>The records are updated successfully!</div>";
                                        header("Location: dashboard.php");
                                        }
                                    }
                                }

                            ?>

                            <form method="post">
                                <h1 class="text-center">UPDATE RECORDS</h1>
                                <div class="form-group">
                                    <input type="text" id="First_Name" name="fullname" placeholder="Full Name" autocomplete=off value="<?php echo $full_name;?>" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Username" name="Username" placeholder="Username" autocomplete=off value="<?php echo $User_name; ?>" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Contact_No" name="Contact_No" placeholder="Contact Number" autocomplete=off  value="<?php echo $ContactNo; ?>" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Email" name="Email" placeholder="Email" autocomplete=off value="<?php echo $E_mail; ?>" class="form-control my-3 py-2">
                                </div>
                                <div class="text-center">
                                    <input type="submit" id="submit-update" value="UPDATE" name="submit-update" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
</section>

</body>
</html>