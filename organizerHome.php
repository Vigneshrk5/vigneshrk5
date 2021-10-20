<?php
    include 'includes/sessions.inc.php';
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelpHands | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/organizerHome.css">
</head>

<body>
    <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="organizerHome.php">HOME</a>
            <a href="campaigns.php">EVENTS</a>
            <a href="donorfolder/donorss.php">DONORS</a>
            <a href="successfolder/success1.php">SUCCESSEVENTS</a>
        </div>

        <div class="btn-login-signup">
            
        <button type="submit" id="btn-logout" onclick="window.location.href='includes/logout.inc.php?logout=done'" name="submit">Log Out</button>
        </div>

       
        
    </div>

    <!-- body part -->

    <div class="buttonContainer">
            <button class="organizerButtons" onclick="window.location.href='createCampaign.php'">Raise Fund</button>
            <button class="organizerButtons" onclick="window.location.href='organizerProfile.php'">View Profile</button>
    </div>

    <!-- Footer section -->

    <?php
        include_once 'footer.php';
    ?>