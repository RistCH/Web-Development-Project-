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
            <a href="login.php" class="login">Login</a>

            <a href="signup.php">
                <button class="signup-btn">Sign Up</button>
            </a>
        </div>

        <div class="form-container">
            <form action="signup.php" method="post">
                <?php
                    if (isset($_POST["submit_registration"])){
                        $First_name = $_POST["fullname"];
                        $Contact_No = $_POST["contact_no"];
                        $Email = $_POST["email"];
                        $Password = $_POST["password"];
                        $PasswordRepeat = $_POST["password-repeat"];

                        $passwordHash = password_hash($Password, PASSWORD_DEFAULT);

                        $errors = array();

                        if(empty($First_name) OR empty($Contact_No) OR empty($Email) OR empty($Password) OR empty($PasswordRepeat)){
                            array_push($errors, "The fields are required.");
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
                        $sql = "SELECT * FROM users WHERE email = '$Email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if($rowCount>0){
                            array_push($errors, "Email already used!");
                        }

                        require_once "dbconnect.php";
                        $sql = "SELECT * FROM users WHERE Contact_No = '$Contact_No'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if($rowCount>0){
                            array_push($errors, "Contact Number already used!");
                        }

                        require_once "dbconnect.php";
                        $sql = "SELECT * FROM users WHERE Password = '$passwordHash'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if($rowCount>0){
                            array_push($errors, "Password already used!");
                        }

                        if(count($errors)>0){
                            foreach ($errors as $error){
                                echo "<div class='alert alert-danger m-3 p-1'>$error</div>";
                            }
                        }else{
                            require_once("dbconnect.php");
                            $sql = "INSERT INTO users (fullname, email, contact_no, password) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                            if($prepareStmt){
                                mysqli_stmt_bind_param($stmt,"ssss", $First_name, $Email, $Contact_No, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                                header("Location: login.php");
                            }else{
                                die("Something went wrong.");
                            }
                        }
                    }
                ?> 
                <div class="patient-client-text">Register</div>

                <div class="form-group">
                    <input type="text" name="fullname" placeholder="Enter your name" class="form-control my-3 py-2">
                </div>

                <div class="form-group">
                    <input type="text" name="email" placeholder="Enter your email" class="form-control my-3 p-2">
                </div>

                <div class="form-group">
                    <input type="text" name="contact_no" placeholder="Enter your contact number" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control my-3 py-2">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter your password" ondrop="return false;" onpaste="return false;" class="form-control my-3 py-2">
                </div>

                <div class="form-group">
                    <input type="password" name="password-repeat" placeholder="Confirm your password" ondrop="return false;" onpaste="return false;" class="form-control my-3 py-2">
                </div>

                <input type="submit" name="submit_registration" value="Register" class="submit-registration">
            </form>
        </div>
    </div>
</body>
</html>