<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="FOOTER/Footer.css">
    <title>Services</title>
</head>
<body>
    <div class="services-page-container" id="Services">
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

        <div class="our-services"><span>Our&nbsp;</span>Services</div>
            <div class="root-canal">
                <img src="assets/img/root-canal.png" alt="root-canal.png" class="root-canal-img">
                <div class="root-canal-text">Root Canal Treatment</div>
                <div class="root-canal-details">A dental procedure to repair teeth that are infected or badly decayed.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>

            <div class="teeth-whitening">
                <img src="assets/img/teeth-whitening.png" alt="teeth-whitening.png" class="teeth-whitening-img">
                <div class="root-canal-text">Teeth Whitening</div>
                <div class="root-canal-details">Want whiter smile? Dentist will combine hydrogen peroxide gel with light source to speed up the whitening process.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>

            <div class="dentures">
                <img src="assets/img/dentures.png" alt="dentures.png" class="dentures-img">
                <div class="root-canal-text">Dentures</div>
                <div class="root-canal-details">Have you lost all of your teeth ? Dentures are removable appliances that can replace missing teeth.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>

            <div class="orthodontics">
                <img src="assets/img/orthodontics.png" alt="orthodontics.png" class="orthodontics-img">
                <div class="root-canal-text">Orthodontics</div>
                <div class="root-canal-details">It is never too late to set your teeth straight, and an orthodontist goes beyond the mile with a smile, to prepare for a stronger smile.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>

            <div class="bridge-works">
                <img src="assets/img/bridge-works.png" alt="bridge-works.png" class="bridge-works-img">
                <div class="root-canal-text">Bridge Works</div>
                <div class="root-canal-details">Dental bridge can restore your smile, improve your appearance, and take years off your look.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>

            <div class="cosmetic-fillings">
                <img src="assets/img/cosmetic-fillings.png" alt="cosmetic-fillings.png" class="cosmetic-fillings-img">
                <div class="root-canal-text">Cosmetic Fillings</div>
                <div class="root-canal-details">Cosmetic fillings can improve the appearance of your smile. they cemented onto the existing teeth using a bonding agent.</div>
                <a href="schedule.php" target="_blank">
                    <button class="schedule-now-button">SCHEDULE NOW</button>
                </a>
            </div>  

            <div class="footer_box_services">

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