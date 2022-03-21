<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="public/css/styles_main.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="public/js/script.js"></script>
    <title>Personal Portfolio</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <img src="public/images/avatar.jpg" style="width:45%;" class="w3-round"><br><br>
            <h4><b>PORTFOLIO</b></h4>
            <p class="w3-text-grey">I'm a full-time dreamer</p>
        </div>
        <div class="w3-bar-block">
            <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a> 
            <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
            <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
        </div>
        <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
    </nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
    <!-- Header -->
    <header>
        <a href="#"><img src="public/images/avatar2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
        <div class="w3-container w3-bottombar">
        <h1><b>My Mock Portfolio</b></h1>
        </div>
    </header>
        <!-- Container (About Section) -->
        <div class="w3-row-padding w3-padding-16" id="about">

        </div>
        <div class="w3-container w3-padding-large" style="margin-bottom:32px">
            <h3 class="w3-center">About Me</h3>
            <p class="w3-center"><em>Money does not grow on trees - You better work!</em></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Molestie at elementum eu facilisis sed odio morbi. Fringilla urna porttitor rhoncus dolor purus non enim. Posuere ac ut consequat semper viverra nam. Pulvinar sapien et ligula ullamcorper malesuada. Elementum integer enim neque volutpat ac tincidunt vitae. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. At erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim.</p>
            <hr>
            <h4>What I Am Good At</h4>
            <!-- Progress bars / Skills -->
            <!-- <p>Project Management</p>
            <div class="w3-green" >
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
            </div>
            <p>Web Developement</p>
            <div class="w3-green">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:90%">90%</div>
            </div>
            <p>Adobe Suite</p>
            <div class="w3-green">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
            </div>
            <p>UX Design</p>
            <div class="w3-green">
                <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
            </div> -->
            <ul>
                <?php
                $query = 'SELECT *
                    FROM skills
                    ORDER BY name DESC';
                $result = mysqli_query($connect, $query);
                ?>

                <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                    <li>
                        <img src="<?php echo $record['logo']; ?>" width="50">
                            <?php echo $record['name']; ?>
                        <div class="confidence-container">
                            <div class="confidence-bar" style="width:<?php echo $record['confidence']; ?>%;">
                                <?php echo $record['confidence']; ?>%
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <ul>
            <p>
                <button class="w3-button w3-green w3-padding-large w3-margin-top w3-margin-bottom">
                    <i class="fa fa-download w3-margin-right"></i><a href="https://drive.google.com/file/d/1iSjP5oW_-lvWsfgVxQPSPhBs2ugdhxWW/view" target="_blank">Download Resume</a>
                </button>
            </p>
            <div>
            <hr>
            <h4>Education</h4>
            <ul>
                <?php
                $query = 'SELECT *
                    FROM educations
                    ORDER BY degree DESC';
                $result = mysqli_query($connect, $query);
                ?>

                <?php while ($record = mysqli_fetch_assoc($result)) : ?>
                    <li>
                        <?php echo $record['degree']; ?>
                        <div>
                            <?php echo $record['date']; ?>
                        </div>
                        <div class="school">
                            <?php echo $record['school']; ?>
                        </div>
                        <div class="honors">
                            <?php echo $record['honors']; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            <ul>
            </div>
        </div>
    <!-- First Photo Grid-->
    <h2>My Projects</h2>
    <div class="w3-row-padding" id="portfolio">
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="public/images/project1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
                <p><b>Lorem Ipsum</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
            </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="public/images/project2.jpg" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
                <p><b>Lorem Ipsum</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
            </div>
        </div>
        <div class="w3-third w3-container">
            <img src="public/images/project3.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
                <p><b>Lorem Ipsum</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
        <div class="w3-bar">
            <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
            <a href="#" class="w3-bar-item w3-black w3-button">1</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
    </div>
    <!-- Contact Section -->
    <div class="w3-container w3-padding-large w3-dark-grey">
        <h4 id="contact"><b>Contact Me</b></h4>
        <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
            <div class="w3-third w3-dark-grey">
                <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
                <p>email@email.com</p>
            </div>
            <div class="w3-third w3-pink">
                <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
                <p>Toronto, ON, CA</p>
            </div>
            <div class="w3-third w3-dark-grey">
                <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
                <p>12345678</p>
            </div>
        </div>
                    
 
        <hr class="w3-opacity">
        <form action="insert.php" method="POST">
            <div class="w3-section">
                <label>First</label>
                <input class="w3-input w3-border" type="text" name="first">
            </div>
            <div class="w3-section">
                <label>Last</label>
                <input class="w3-input w3-border" type="text" name="last">
            </div>
            <div class="w3-section">
                <label>Email</label>
                <input class="w3-input w3-border" type="text" name="email">
            </div>
            <div class="w3-section">
                <label>Message</label>
                <input class="w3-input w3-border" type="text" name="message">
            </div>
            <button type="submit" class="w3-button w3-pink w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right" value="submit"></i>Send Message</button>
        </form>
    </div>  
    <!-- Footer -->
    <footer class="w3-container w3-padding-small w3-green">
    <div class="w3-row-padding">
        <h5>&copy; Leo Nguyen</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    </footer>

<!-- End page content -->
</div>
    
</body>
</html>