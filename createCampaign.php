<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> HelpHands | Raise Fund At An Ease</title>
    <link rel="stylesheet" type="text/css" href="assets/css/createCampaign.css">
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

    <div class="signupbox">
        <div class="boxone">
            <span id="create">Be a Fundraiser</span>
        </div>

        <div class="boxtwo" >
        <br>
            <form action="includes/createCampaign.inc.php" method="POST" enctype="multipart/form-data" >
                <input type="text" name="campaignName" placeholder="beneficiary name" required><br><br>
                <input type="text" name="campaignAdh" placeholder="Beneficiary Aadhar Number" required><br><br>
                <input type="text" name="campaignAge" placeholder="Beneficiary Age" required><br><br>
                <select name="campaignType" required>
                    <option disabled selected>Type of Fund</option>
                    <option value="Medical">Medical</option>
                    <option value="Education">Education</option>
                    <option value="Sports">Sports</option>  
                </select><br><br>
                <input type="number" min="1" name="campaignDays" placeholder="Estimated Days" required><br><br>
                <input type="text" name="campaignAmount" placeholder="Estimated Amount" required><br><br>
                <textarea rows="5" cols="50" name="campaignDescription" placeholder="Description for fundraising" required></textarea><br><br>
                <input type="tel" name="phone" placeholder="Phone: 98********" pattern="[0-9]{10}" required><br><br>
                <!-- upload file -upload image only-->
                <span id="campaignImage">Upload image of beneficiary</span> <br>
                <input type="file" name="campaignPhoto" accept="image/*"><br><br>
                <!-- upload file -upload scanned aadhar only-->
                <span id="campaignImage">Upload scanned aadhar of campaign</span> <br>
                <input type="file" name="campaignadhPhoto" accept="image/*"><br><br>
                <span id="campaignImage">Upload Proof document</span> <br>
                <input type="file" name="campaignproofPhoto" accept="image/*"><br><br><br>
                <input type="checkbox" required><span id="agreeterms"> Agree all terms and conditions</span><br>
                <input type="submit" name="submit" value="Create Event">
            </form>
        </div>
    </div>
    <br><br><br><br>
    <br><br><br><br>

    <!-- extra information section is right side-->
    <div class="extraInfo">
        <div class="infoTextHeading">
        <span id="create">Details to be filled:</span>
        </div>

        <div class="infoText">
            <ul>
                <li>Enter the name of your event.</li>
                <li>Enter the type which fits your event</li>
                <li>Enter the number of days you want to run the event and estimated amount.</li>
                <li>Enter the detailed description of your event. Why it is necessary and for whom you are creating this event etc.</li>
                <li>Enter the phone number of the person associated with this event.</li>
                <li>Upload the image the suits the event.(Optional)</li>
            </ul>
        </div>
    </div>
    <br><br><br><br><br>
    

    <!-- Footer section -->

    <?php
        include_once 'footer.php';
    ?>