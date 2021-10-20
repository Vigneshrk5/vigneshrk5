<?php
include_once 'sessions.inc.php';
$campaigncreator = $data['organizer_username'];
if(!isset($_POST['submit'])) { //if one try to access createcampaign.inc.php without access
    header("Location: ../createCampaign.php");
    exit();
} else {
    include_once 'dbh.inc.php'; //creating connection to database
    $campaignName = $_POST['campaignName'];
    $campaignAdh = $_POST['campaignAdh'];
    $campaignAge = $_POST['campaignAge'];
    $campaignType = $_POST['campaignType'];
    $campaignDays = $_POST['campaignDays'];
    $campaignAmount = $_POST['campaignAmount'];
    $campaignDescription = $_POST['campaignDescription'];
    $campaignPhone = $_POST['phone'];
    $campaignImagePath = $_POST['campaignPhoto'];
    // error handling
    if(!preg_match("/^[a-zA-Z'. -]+$/", $campaignName)) {    
        header("Location: ../createCampaign.php?campaign=invalidname");
        exit();
    } else {
        // check if there is already a campaign with same inputted campaignName by the organizer
        $sql = "SELECT * FROM campaigns WHERE campaign_name = '$campaignName'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../createCampaign.php?campaign=camapignNameTaken");
            exit();
        } else {
            // for campaign photo part
            $name=$_FILES['campaignPhoto']['name'];
            $tmp=$_FILES['campaignPhoto']['tmp_name'];
            echo $campaignImagePath="../images/".$name;
            move_uploaded_file($tmp,$campaignImagePath);
            // for campaign aadharphoto part
            $name=$_FILES['campaignadhPhoto']['name'];
            $tmp=$_FILES['campaignadhPhoto']['tmp_name'];
            echo $campaignadhImagePath="../aadhar/".$name;
            move_uploaded_file($tmp,$campaignadhImagePath);

            $name=$_FILES['campaignproofPhoto']['name'];
            $tmp=$_FILES['campaignproofPhoto']['tmp_name'];
            echo $campaignproImagePath="../proof/".$name;
            move_uploaded_file($tmp,$campaignproImagePath);
             // insert the input value into database
             $sql = "INSERT INTO campaigns(campaign_name,campaign_adh,campaign_age, campaign_type, campaign_days, campaign_amount, campaign_description,campaignPhone,campaignImage,campaignadhImage,campaignproofImage,`campaignCreator`) VALUES('$campaignName',$campaignAdh, $campaignAge,'$campaignType',$campaignDays,$campaignAmount,'$campaignDescription',$campaignPhone,'$campaignImagePath','$campaignadhImagePath','$campaignproImagePath','$campaigncreator');";
             $insertSuccess = mysqli_query($conn, $sql);

             // if campaign input data successfully inserted in database then redirect him to success page with link of organizer profile
             if($insertSuccess) {
                
                header("Location: ../assets/html/organizerCampaignSuccess.html");
             } else {
                 echo $conn->error;
             }
        }
    }
}