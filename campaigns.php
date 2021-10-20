<!-- logic to remove expired campaign -->
<?php
    $currentDate = date('Y-m-d');

    include_once 'includes/dbh.inc.php';
    $sql = "SELECT campaign_id,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns;";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $campaignId = $row['campaign_id'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            if($currentDate > $campaignEndDate) {
                $sql = "UPDATE campaigns
                        SET campaignExpiry = 0 
                        WHERE campaign_id = '$campaignId';";
                mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="assets/css/campaigns.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

    <div class="main-container">
            <h2>Here below are some events where you can Donate Funds as much as you like.</h2>

            <div class="all-campaigns">
                <?php
                    $sql = "SELECT * FROM campaigns WHERE campaignApproval = 1 and campaignExpiry = 1 ORDER BY campaign_id DESC;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);            
                    if($resultCheck > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $campaignId = $row['campaign_id'];;
                            $camapignAmount= $row['campaign_amount']
                                        
                ?>
                <div class="preview-box">
                    <form action="singleCampaignPost.php?campaignId=<?php echo $campaignId;?>" method="POST">
                        <span id='campaign-name'><?php echo $row['campaign_name']; ?></span><br><br>
                        <span id='campaign-type'><?php echo $row['campaign_type']; ?></span><br><br>
                        <span id='campaign-amount'><?php echo "Amount : Rs. ".$camapignAmount?></span>
                     <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-blue w3-round-xlarge" style="width:<?php $sql3="SELECT SUM(donate_amount) AS amnt FROM donationproof WHERE campaign_id=$campaignId";
				    $result3=mysqli_query($conn,$sql3);
				    $row= mysqli_fetch_assoc($result3);
				    echo $row['amnt']*100/$camapignAmount?>%">
                    <?php $sql3="SELECT SUM(donate_amount) AS amnt FROM donationproof WHERE campaign_id=$campaignId";
				    $result3=mysqli_query($conn,$sql3);
				    $row= mysqli_fetch_assoc($result3);
				    echo $row['amnt']*100/$camapignAmount."%&nbsp;";
				     ?></div>
                    </div>
                     <br><br>
                        <button class="btn" type="submit" name="donate">View Event</button>
                    </form>
                </div>   
                <?php
                    }
                } else if($resultCheck == 0) {
                    echo "<p>There are no active Campaign right now</p>";
                } else {
                    exit();
                }
                ?>    
            </div>        
    </div>

    <?php
        include_once 'footer.php';
    ?>