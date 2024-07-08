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
                                if (isset($_POST["submit-reg"])){
                                    $First_name = $_POST["First_Name"];
                                    $Contact_No = $_POST["Contact_No"];
                                    $Email = $_POST["Email"];
                                    $Username = $_POST["Username"];
                                    $Password = $_POST["Password"];
                                    $PasswordRepeat = $_POST["Re-password"];

                                    $passwordHash = password_hash($Password, PASSWORD_DEFAULT);

                                    $errors = array();

                                    if(empty($First_name) OR empty($Contact_No) OR empty($Email) OR empty($Username) OR empty($Password) OR empty($PasswordRepeat)){
                                        array_push($errors, "The fields are required.");
                                    }

                                    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                                        array_push($errors, "Email is not valid.");
                                    }

                                    if(strlen($Password)<4){
                                        array_push($errors, "Password must be at least 8 characters long.");
                                    }

                                    if($Password!==$PasswordRepeat){
                                        array_push($errors, "Password does not match.");
                                    }

                                    if(strlen($Contact_No)!=11){
                                        array_push($errors, "Contact Number must be 11 numbers long.");
                                    }
                                    
                                    require_once "dbconnect.php";
                                    $sql = "SELECT * FROM admin_user WHERE email = '$Email'";
                                    $result = mysqli_query($conn, $sql);
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount>0){
                                        array_push($errors, "Email already used!");
                                    }

                                    require_once "dbconnect.php";
                                    $sql = "SELECT * FROM admin_user WHERE Contact_No = '$Contact_No'";
                                    $result = mysqli_query($conn, $sql);
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount>0){
                                        array_push($errors, "Contact Number already used!");
                                    }
                                    

                                    require_once "dbconnect.php";
                                    $sql = "SELECT * FROM admin_user WHERE Username = '$Username'";
                                    $result = mysqli_query($conn, $sql);
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount>0){
                                        array_push($errors, "Username already used!");
                                    }

                                    require_once "dbconnect.php";
                                    $sql = "SELECT * FROM admin_user WHERE Password = '$passwordHash'";
                                    $result = mysqli_query($conn, $sql);
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount>0){
                                        array_push($errors, "Password already used!");
                                    }

                                    if(count($errors)>0){
                                        foreach ($errors as $error){
                                            echo "<div class='alert alert-danger'>$error</div>";
                                        }
                                    }else{
                                        require_once("dbconnect.php");
                                        $sql = "INSERT INTO admin_user (fullname, username, password, contact_no, email) VALUES (?, ?, ?, ?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                        if($prepareStmt){
                                            mysqli_stmt_bind_param($stmt,"sssss", $First_name, $Username, $passwordHash, $Contact_No, $Email);
                                            mysqli_stmt_execute($stmt);
                                            echo "<div class='alert alert-success'>You are registered successfully.</div>";
                                            header("Location: dashboard.php");
                                        }else{
                                            die("Something went wrong.");
                                        }
                                    }
                                }
                            ?> 

                            <form action="register_admin.php" method="post">
                                <h1 class="text-center">Register</h1>
                                <div class="form-group">
                                    <input type="text" id="First_Name" name="First_Name" placeholder="Full Name" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Contact_No" name="Contact_No" placeholder="Contact Number" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Email" name="Email" placeholder="Email" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="Username" name="Username" placeholder="Username" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="Password" name="Password"  placeholder="Create Password" ondrop="return false;" onpaste="return false;" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="Re-password" name="Re-password" placeholder="Re-Type your password" ondrop="return false;" onpaste="return false;" class="form-control my-3 py-2">
                                </div>
                                <div class="text-center">
                                    <input type="submit" id="submit-reg" value="Register" name="submit-reg" class="btn btn-primary" >
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