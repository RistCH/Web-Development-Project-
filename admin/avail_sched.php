<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="admin.css">
    <title>Set A Schedule</title>
</head>
<body>
<section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-9 col-sm-10 col-md-3 m-auto position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                if (isset($_POST["submit-sched"])){
                                    $fullname = $_POST["fullname"];
                                    $date= $_POST["date"];
                                    $start_time = $_POST["start_time"];
                                    $end_time = $_POST["end_time"];

                                    $start_time_meridian = date("h:i a", strtotime($start_time));
                                    $end_time_meridian = date("h:i a", strtotime($end_time));

                                    $errors = array();

                                    if(empty($fullname) OR empty($date) OR empty($start_time) OR empty($end_time)){
                                        array_push($errors, "The fields are required.");
                                    }

                                    if(count($errors)>0){
                                        foreach ($errors as $error){
                                            echo "<div class='alert alert-danger'>$error</div>";
                                        }
                                    }else{
                                        require_once("dbconnect.php");
                                        $sql = "INSERT INTO schedule (fullname, date, start_time, end_time) VALUES (?, ?, ?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                        if($prepareStmt){
                                            mysqli_stmt_bind_param($stmt,"ssss", $fullname, $date, $start_time_meridian, $end_time_meridian);
                                            mysqli_stmt_execute($stmt);
                                            echo "<div class='alert alert-success'>Schedule added successfully.</div>";
                                            header("Location: appointment.php");
                                        }else{
                                            die("Something went wrong.");
                                        }
                                    }
                                }
                            ?> 

                            <form action="avail_sched.php" method="post">
                                <h1 class="text-center">Add Available Schedule</h1>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" id="First_Name" name="fullname" placeholder="Full Name" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Date Available</label>
                                    <input type="date" id="Contact_No" name="date" placeholder="Date Available" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Start Time</label>
                                    <input type="time" id="Email" name="start_time" placeholder="Start Time" class="form-control my-3 py-2">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">End Time</label>
                                    <input type="time" id="Username" name="end_time" placeholder="End Time" class="form-control my-3 py-2">
                                </div>
                                <div class="text-center">
                                    <input type="submit" id="submit-reg" value="Add Schedule" name="submit-sched" class="btn btn-primary" >
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