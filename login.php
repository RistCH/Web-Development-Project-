
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>DreamBite</title>
</head>
<body>
    <div class="login-container"> 
        <img src="assets/img/full-equiped-medical-cabinet.png" alt="full-equiped-medical-cabinet.png" class="login-bg">
        
        <div class="navbar" id="nav">
            <a href="main.php" class="dreambite"><span class="dream">Dream</span><span class="bite">Bite</span></a>
            <div class="navlink">
                <a href="main.php" class="home">Home</a>
                <a href="services.php" class="services">Services</a>
                <a href="contact-us.php" class="contact">Contact Us</a>
                <a href="about-us.php" class="about">About Us</a>
            </div>
            <?php
                require_once "dbconnect.php";
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                session_start();
                if (isset($_SESSION["user"]) == $user["email"]){
                    echo "<a href='logout.php'>
                    <button class='signup-btn'>Logout</button>
                    </a>";
                    
                } else{
                    echo "<a href='login.php' class='login'>Login</a>";
                    echo "<a href='signup.php'>
                    <button class='signup-btn'>Sign Up</button>
                    </a>";
                } 
            ?>
        </div>


        <div class="form-container">
            <form action="login.php" method="post">
            <?php
                if (isset($_POST["submit_login"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    require_once "dbconnect.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    if ($user){
                        if(password_verify($password, $user["password"])){
                            session_start();
                            $update_status="UPDATE `users` SET `status`= 1 WHERE email='$email'";
                            $conn -> query($update_status);
                            $_SESSION["user"] = $email;
                            if (isset($_SESSION["user"])){
                                header("Location: main.php");
                            }
                            die();
                        }else{
                            echo "<div class='alert alert-danger m-3'>Password does not match.</div>";
                        }
                    }else{
                        echo "<div class='alert alert-danger m-3'>Username does not match.</div>";
                    }
                }
            ?>
                <div class="patient-client-text">Login</div>
                
                <div class="form-group">
                    <input type="text" name="email" placeholder="Enter your email" class="form-control my-3 py-2">
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter your password" ondrop="return false;" onpaste="return false;" class="form-control my-3 py-2">
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit_login" value="Login" class="submit-login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>