<?php
    if(!isset($_POST['donate'])) { //if anyone try to access singlecampaignpost directly
        header("Location: campaigns.php");
    }
?>

<?php
    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];

        include 'includes/dbh.inc.php';

        $sql = "SELECT *,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns WHERE campaign_id = $campaignId;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result); 
            $campaignName = $row['campaign_name'];
            $campaignAge = $row['campaign_age'];
            $campaignType = $row['campaign_type'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            $campaignAmount = $row['campaign_amount'];
            $campaignDescription = $row['campaign_description'];
            $campaignPhone = $row['campaignPhone'];
            $campaignImage = $row['campaignImage']; 

            $campaignCreator = $row['campaignCreator']; //this is organizer's username

            $sql = "SELECT organizer_fullname,organizer_phone FROM organizers WHERE organizer_username = '$campaignCreator';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                $data = mysqli_fetch_assoc($result); 
                $organizerPhone = $data['organizer_phone'];
                $campaignCreatorFullname =  $data['organizer_fullname'];    
            }   

          
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelpHands | Raise Fund At An Ease</title>
    <link rel="stylesheet" type="text/css" href="assets/css/singleCampaignPost.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
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
    

    <div class="container">
        <h1><?php echo "Name : ".$campaignName;?></h1><br><br>

        <div class="c-image">
        <img src="images/<?php echo $row['campaignImage']; ?> " alt="image" width="150" height="150">
            
            <div class="image-caption">
                <span><?php echo $campaignType;?>:(<?php echo $campaignName;?>)</span><br>
                <span><?php echo "Total Amount : "."Rs.".$campaignAmount;?></span>
                
            </div>
           
        </div><br><br>
        <table cell>
        <tr>
                <td><strong>Beneficiary Age</strong></td>
                <td>:</td>
                <td><?php echo $campaignAge;?></td>
            </tr>
            <tr>
                <td style="width: 50%;"><strong>Type Of Campaign</strong></td>
                <td>:</td>
                <td><?php echo $campaignType;?></td>
            </tr>
            <tr>
                <td><strong>Event Started On</strong></td>
                <td>:</td>
                <td><?php echo $campaignStartDate;?></td>
            </tr>
            <tr>
                <td><strong>Event will end on</strong></td>
                <td>:</td>
                <td><?php echo $campaignEndDate;?></td>
            </tr>
            
            <tr>
                <td><strong>Event organizer</strong></td>
                <td>:</td>
                <td><?php echo $campaignCreatorFullname;?></td>
            </tr>
            <tr>
                <td><strong>Phone(Beneficiary)</strong></td>
                <td>:</td>
                <td><?php echo $campaignPhone;?></td>
                </tr>
           
            <tr>
                <td><strong>Phone(Organizer's)</strong></td>
                <td>:</td>
                <td><?php echo $organizerPhone;?></td>
               
            </tr>
            <tr>
                <td><strong>Beneficiary Scanned Aadhar:</strong></td>
                <td>:</td>
                <td><img src="aadhar/<?php echo $row['campaignadhImage']; ?> " alt="image" width="150" height="150"></td>
                
            </tr>
            <tr>
            <td><strong>Proof Document of Beneficiary:</strong></td>
                <td>:</td>
                <td><img src="proof/<?php echo $row['campaignproofImage']; ?> " alt="image" width="150" height="150"></td>
            </tr>
            
            
        </table>
        
        

        <h2>About the Event</h2>
        <p><?php echo $campaignDescription;?></p>

        <div class="container">
            <div class="c-amount">
            <?php echo "<b><u>Donation Status</u></b>"?><br>
            <?php echo "<font color=red>Total Amount : </font>"."Rs.".$campaignAmount;?><br>
                <?php $sql3="SELECT SUM(donate_amount) AS amnt FROM donationproof WHERE campaign_id=$campaignId";
				    $result3=mysqli_query($conn,$sql3);
				    $row= mysqli_fetch_assoc($result3);
				    echo "<font color=green>Fund Raised : </font>"."Rs.".$row['amnt'];
				     ?>
            </div>
        </div>
        <br>

        <div class="donate-text">Donate For this Event</div> <br>
        <button class="donate-btn" onclick="window.location.href='donate.php?campaignId=<?php echo $campaignId;?>'">Donate</button>
        

    <?php
        include_once 'footer.php';
    ?>