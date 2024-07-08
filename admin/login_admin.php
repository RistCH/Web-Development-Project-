<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="admin.css">
    <title>Login</title>
</head>
<body class="login-body">
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-9 col-sm-8 col-md-2 m-auto position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-body">
                            <form action="login_admin.php" method="post">
                            <?php
                                if (isset($_POST["login"])){
                                    $username = $_POST["username"];
                                    $password = $_POST["password"];

                                    require_once "dbconnect.php";
                                    $sql = "SELECT * FROM admin_user WHERE username = '$username'";
                                    $result = mysqli_query($conn, $sql);
                                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    
                                    if ($user){
                                        require_once "dbconnect.php";
                                        if(password_verify($password, $user["password"])){
                                            session_start();
                                            $update_status="UPDATE `admin_user` SET `status`= 1 WHERE username='$username'";
                                            $conn->query($update_status);
                                            $_SESSION["user_admin"] = $username;
                                            header("Location: dashboard.php");
                                            die();
                                        }else{
                                            echo "<div class='alert alert-danger'>Password does not match.</div>";
                                        }
                                    }else{
                                        echo "<div class='alert alert-danger'>Username does not match.</div>";
                                    }
                                }
                            ?>
                                <h3 style="text-align: center;">Admin</h3>
                                <input type="text" name="username" placeholder="Username" class="form-control my-3 py-2">
                                <input type="password" name="password" placeholder="Password" class="form-control my-3 py-2" ondrop="return false;" onpaste="return false;">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" name="login">
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