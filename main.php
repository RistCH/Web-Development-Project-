<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="FOOTER/Footer.css">
    <title>DreamBite</title>
</head>
<body>
    <div class="home-page" id="Home">
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

        <div class="dentist-display">
            <div class="rectangle-1">
                <img src="assets/img/dentist.png" alt="dentist.png" class="dentist">
                <div class="text-motto_1">A Dental Clinic That You Can Trust</div>
                <a href="schedule.php">
                    <button class="new_appoint">Set An Appointment</button>
                </a>
            </div>
        </div>
        
        <div class="text-motto_3">Schedule today and we’ll make you <span class="smile_2">&nbsp;smile&nbsp;</span>more.</div>
        
        <div class="web-info-bar">
            <div class="address-info">
                <img src="assets/img/location-marker.png" alt="location-marker.png" class="location-marker">
                <div class="address-info-text"><span>Lee Summit, 001</span> Kansas City, USA</div>
            </div>

            <div class="alarm-info">
                <img src="assets/img/clock-icon.png" alt="clock-icon.png" class="clock-icon">
                <div class="address-info-text"><span>Opening Hours</span> 10:00AM - 5:00PM</div>
            </div>

            <div class="phone-info">
                <img src="assets/img/phone-icon.png" alt="phone-icon.png" class="phone-icon">
                <div class="address-info-text"><span>Call Us Now!</span><br> +1 996 656 2355</div>
            </div>

            <div class="calendar-info">
                <img src="assets/img/calendar-icon.png" alt="calendar-icon.png" class="calendar-icon">
                <div class="address-info-text"><span>Schedule Now!</span><br> Available Mon-Fri except on Holidays</div>
            </div>
        </div>

        <div class="footer_box_main">

            <div class="Services_rectangle">
                <div class="Services_title"> <span style='color:#D4AFB9'> Servi<span style='color:#4ECBC4'>ces </span> </span> </div>

                <div class="Services_box">
                    <div class="Services_root"> <div class="Services_root1"> Root Canal Treatment </div> </div>
                    <div class="Services_white"><div class="Services_white1"> Teeth Whitening </div></div>
                    <div class="Services_bridge"><div class="Services_bridge1"> Bridge Works </div></div>
                    <div class="Services_dent"><div class="Services_dent1"> Dentures </div></div>
                    <div class="Services_Ortho"><div class="Services_Ortho1"> Orthodontics </div></div>
                    <div class="Services_cosme"><div class="Services_cosme1"> Cosmetic Fillings </div></div>
                </div>
            </div>

            <div class="Clinic_rectangle">
                <div class="Clinic_title"> <span style='color:#4ECBC4'> Clinic In<span style='color:#FEDC97'>formation </span> </span> </div>

                <div class="Clinic_box">
                    <div class="Clinic_about">  <div class="Clinic_about1"> About Us </div> </div>
                    <div class="Clinic_contact"> <div class="Clinic_contact1"> Contact Us </div> </div>
                    <div class="Clinic_staff"> <div class="Clinic_staff1"> Meet the Staff </div> </div>
                </div>
            </div>

            <div class="Reach_rectangle">
                <div class="Reach_title"> <span style='color:#F3DE8A'> Reach Out to<span style='color:#AC8887'> Our Clinic </span> </span> </div>

                <div class="Reach_box">
                    <div class="Reach_email"> <div class="Reach_email1"> <img class="email" alt="emailicon" src= "FOOTER/mail.png"> info@dreambite.com </div></div>
                    <div class="Reach_phone"><div class="Reach_phone1"> <img class="phone" alt="phoneicon" src= "FOOTER/phone.png"> +1 996 656 2355 </div></div>
                </div>

            </div>

            <div class="Location_rectangle">
                <div class="Loc_title"><span style='color:#AC8887'> Loca<span style='color:#D4AFB9'>tion </span> </span> </div>

                <div class="Loc_box">
                    <div class="Loc_add"><div class="Loc_add1"> <img class="mark" alt="markicon" src= "FOOTER/mark.png"> Lee Summit, Kansas City, USA </div> </div>
                </div>

            </div>

        
            <div class="tooth_box">
                <img class="crack" alt="toothicon1" src= "FOOTER/ToothwithCrack.png">
                <img class="healthy" alt="toothicon2" src= "FOOTER/Tooth.png">
                <img class="brace" alt="toothicon3" src= "FOOTER/Toothwithbrace.png">
                <img class="tool" alt="toothicon4" src= "FOOTER/Tools.png">
                <img class="install" alt="toothicon5" src= "FOOTER/install.png">
                <img class="open" alt="toothicon6" src= "FOOTER/open.png">
            </div>
    
            <div class="credits"> ©2023 DreamBite - All rights reserved </div>

        </div>


    </div>

    
</body>
</html>