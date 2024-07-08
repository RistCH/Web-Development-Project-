<?php
    include "dbconnect.php";
    $id=$_GET["bookid"];
    $sql_update = "SELECT * FROM `schedule` WHERE id=$id";
    $query_update = mysqli_query($conn, $sql_update);
    $row = mysqli_fetch_assoc($query_update);
    $date = mysqli_real_escape_string($conn, $row["date"]);
    $start_time = $row["start_time"];
    $end_time = $row["end_time"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Booking Details</title>
</head>

<body style="width: 100%; height: 100%; background-color: #3b7674;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-9 col-sm-10 col-md-3 m-auto position-absolute top-50 start-50 translate-middle">
                <div class="card">
                    <div class="card-body">
                       <?php
                             if (isset($_POST["submit-book"])){
                                $fullname = $_POST["fullname"];
                                $Email = $_POST["email"];
                                $Contact_No = $_POST["contact_no"];
                                $date = $_POST["date"];
                                $start_time_ins = $_POST["start_time"];
                                $end_time_ins = $_POST["end_time"];

                                $start_time_meridian = date("h:i a", strtotime($start_time_ins));
                                $end_time_meridian = date("h:i a", strtotime($end_time_ins));

                                $errors = array();
                        
                                if(empty($fullname) OR empty($Contact_No)){
                                    array_push($errors, "The fields are required.");
                                }

                                if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                                    array_push($errors, "Email is not valid.");
                                }
                        
                                if(strlen($Contact_No)!=11){
                                    array_push($errors, "Contact Number must be 11 numbers long.");
                                }
                                
                                if(count($errors)>0){
                                    foreach ($errors as $error){
                                        echo "<div class='alert alert-danger'>$error</div>";
                                    }
                                }else{
                                    require_once("dbconnect.php");
                                    $sql = "INSERT INTO appointment (fullname, email, contact_no, date, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                                    if($prepareStmt){
                                        mysqli_stmt_bind_param($stmt,"ssssss", $fullname, $Email, $Contact_No, $date, $start_time_meridian, $end_time_meridian);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class='alert alert-success'>You booked successfully!</div>";
                                    }else{
                                        die("Something went wrong.");
                                    }
                                }
                            }
                       ?>

                        <form method="post">
                            <h1 class="text-center">BOOKING DETAILS</h1>
                            <div class="form-group">
                                <input type="text" name="fullname" placeholder="Full Name" autocomplete=off class="form-control my-3 py-2">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email (Optional)" autocomplete=off class="form-control my-3 py-2">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact_no" placeholder="Contact Number" autocomplete=off class="form-control my-3 py-2" onkeypress="return event.charCode>=48 && event.charCode<=57">
                            </div>
                            <div class="form-group">
                                <input readonly type="text"  name="date" autocomplete=off value="<?php echo $date; ?>" class="form-control my-3 py-2">
                            </div>
                            <div class="form-group">
                                <input readonly type="text"  name="start_time"  autocomplete=off  value="<?php echo $start_time; ?>" class="form-control my-3 py-2">
                            </div>
                            <div class="form-group">
                                <input readonly type="text"  name="end_time"  autocomplete=off value="<?php echo $end_time; ?>" class="form-control my-3 py-2">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="BOOK" name="submit-book" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>