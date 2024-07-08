<?php
    session_start();
    if (!isset($_SESSION["user"])){
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule An Appointment</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
    <div class="schedule-container">
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

        <div class="schedule-content">
            <div class="schedule-text"><span>SCHEDULE A</span>N APPOINTMENT</div>
            <div class="schedule-text-1">Schedule today to avail our services!</div>
            
            <br>

            <div class="dashboard-content px-3 mt-2 pt-2" style="margin: 50px;">

                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #eee; background:none;">Name</th>
                            <th style="color: #eee; background:none;">Date Available</th>
                            <th style="color: #eee; background:none;">Start Time</th>
                            <th style="color: #eee; background:none;">End Time</th>
                            <th style="color: #eee; background:none;">Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require_once "dbconnect.php";
                            $sql = "SELECT * FROM schedule";
                            $result = $conn -> query($sql);
    
                            if (!$result){
                                die("Invalid query: " . $conn -> $errors);
                            }

                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td style='color: #eee; background:none;'>" .$row["fullname"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["date"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["start_time"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["end_time"]. "</td>";
                                
    
                                echo "<td style='color: #eee; background:none;'> <a href='booking.php?bookid=".$row['id']."'> <button type='button' class='btn btn-primary btn-sm'>BOOK NOW</button> </a> </td>";
    
                                echo "</tr>"; 
                            }
                        ?>
                    </tbody>
                </table>
            
            

        </div>
    </div>
</body>
</html>