<?php
    session_start();
    if (!isset($_SESSION["user_admin"])){
        header("Location: login_admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-6/css/all.min.css">
    <link rel="stylesheet" href="fontawesome-6/css/fontawesome.css">
    <link rel="stylesheet" href="admin.css">
    <script defer src="script.js"></script>
    <title>Admin</title>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-2 pt-3 pb-4">
                <h1 class="fs-4 px-3">DreamBite</h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="dashboard.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class=""><a href="users.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> Users</a></li>
                <li class=""><a href="appointment.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar"></i> Appointments</a></li>
                <li class=""><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>

            <hr class="h-color mx-2">
        </div>

        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin</a>
                    
                </div>
            </nav>

            <div class="dashboard-content px-3 mt-2 pt-2" style="margin: 50px;">
                <h2 class="fs-35 col-md-12 fw-bold">APPOINTMENT</h2>
                <h4 class="fs-35 col-md-12 fw-normal" style="margin-top: 30px;">Available Schedules</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #eee; background:none;">ID</th>
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
                                echo "<td style='color: #eee; background:none;'>" .$row["id"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["fullname"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["date"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["start_time"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["end_time"]. "</td>";
                                
    
                                echo "<td style='color: #eee; background:none;'> <a href='delete_sched.php?deleteid=" .$row['id']. "'> <button type='button' class='btn btn-danger btn-sm'> DELETE </button> </a> </td>";
    
                                echo "</tr>"; 
                            }
                        ?>
                    </tbody>
                </table>

                <div class="text-center">
                    <a href="avail_sched.php"><button class="btn btn-primary mt-3">Add Available Schedule</button></a>
                </div>

                <h4 class="fs-35 col-md-12 fw-normal" style="margin-top: 30px;">Appointment Schedules</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #eee; background:none;">Name</th>
                            <th style="color: #eee; background:none;">Email</th>
                            <th style="color: #eee; background:none;">Contact Number</th>
                            <th style="color: #eee; background:none;">Date</th>
                            <th style="color: #eee; background:none;">Start Time</th>
                            <th style="color: #eee; background:none;">End Time</th>
                            <th style="color: #eee; background:none;">Operations</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            require_once "dbconnect.php";
                            $sql = "SELECT * FROM appointment";
                            $result = $conn -> query($sql);
    
                            if (!$result){
                                die("Invalid query: " . $conn -> $errors);
                            }

                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td style='color: #eee; background:none;'>" .$row["fullname"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["email"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["contact_no"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["date"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["start_time"]. "</td>";
                                echo "<td style='color: #eee; background:none;'>" .$row["end_time"]. "</td>";
                                
    
                                echo "<td style='color: #eee; background:none;'> <a href='delete_sched.php?deleteid=" .$row['id']. "'> <button type='button' class='btn btn-danger btn-sm'> DELETE </button> </a> </td>";
    
                                echo "</tr>"; 
                            }
                        ?>
                    </tbody>
                    
                </table>

                
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    
</body>
</html>