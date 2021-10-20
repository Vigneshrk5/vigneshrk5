<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelpHands | Raise Fund At An Ease</title>
    <link rel="stylesheet" type="text/css" href="css/manageEvent.css">
    <link rel="stylesheet" type="text/css" href="css/singleCampaignPost.css">
    <link rel="stylesheet" href="css/donors.css">
</head>

<body>
   <?php
    include 'dashboarddon.html';
    ?>
    <!-- body part -->

    <div class="main-container">
        <div class="text-content">
            <h1>List of Donors</h1>
            <p>Here Below are the list of donors who donated in different funding event created on our site.</p>
        </div>

        <table>
            <tr>
                <th width="5%">S.N</th>
                <th width="15%">Donor Name</th>
                <th width="20%">Address</th>
                <th width="20%">Donated Amount (INR)</th>
                <th width="20%">Date (yyyy-mm-dd)</th>
                <th width="25%">Beneficiary Name</th>
            </tr>
            <!-- It display donors -->
            <?php 
                    include '../includes/dbh.inc.php';
                    $sql = "SELECT * FROM campaigns,donationproof,donors
                    WHERE donationproof.admin_approval = 1
                    AND donors.donor_id = donationproof.donor_id 
                    AND campaigns.campaign_id = donationproof.campaign_id
                    ORDER BY donate_amount desc;";

                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);            
                    if($resultCheck > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            static $counter = 1;
                            // $donorId = $row['donor_id'];
                            // $campaignId = $row['campaign_id'];
                            $donorName = $row['donor_name'];
                            $donorAddress = $row['donor_address'];
                            $donatedAmount = $row['donate_amount'];
                            $donatedDate = $row['proof_submit_date'];
                            $campaignName = $row['campaign_name'];
                ?>
                <tr>
                    <td><?php echo $counter++;?></td>
                    <td><?php echo $donorName; ?></td>
                    <td><?php echo $donorAddress; ?></td>
                    <td><?php echo $donatedAmount; ?></td>
                    <td><?php echo $donatedDate; ?></td>
                    <td><?php echo $campaignName; ?></td>                    
                </tr>
                <?php
                        }
                    }
                ?>

        </table>
    </div>

   