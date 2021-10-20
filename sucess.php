<!DOCTYPE html>
<html>
<head>
	<title>Manage Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/success.css">
    <link rel="stylesheet" type="text/css" href="assets/css/singleCampaignPost.css">
	<link rel="stylesheet" type="text/css" href="ad.css">
</head>
<body >

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
	
<div class="tableOfCampaign">
        <div><div class="titleOfTable">List of sucesssfull Events</div><br><br>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Beneficiary Name</th>
                    <th>Event Organizer</th>
                    <th>Amount</th>
                    <th>Date & Time</th>
                    <th>Category</th>
                   
                </tr>
                <?php
                $conn=mysqli_connect("localhost","root","","FundRaiser");
                if($conn)  
        {
            // echo("Connected Successfully");
        }
        else
            echo("failed");
                ?>
               <?php
                 $sql1="SELECT * FROM campaigns WHERE campaign_status='1'";
                 $result1=mysqli_query($conn,$sql1);
                 $num=1;
                 while($row= mysqli_fetch_assoc($result1))
                 	{
                        
                 		echo "<tr>";
                 		echo "<td>".$num;
                 		echo "<td>".$row['campaign_name'];
                        echo "<td>".$row['campaignCreator'];
                        echo "<td>".$row['campaign_amount'];
                 		echo "<td>".$row['campaign_reg_date'];
                 		echo "<td>".$row['campaign_type'];
                        ?>
                 		
                 		<?php echo "</tr>";
                        $num++;
                         
                
                 	
                 	}

                 	?>

                
    
 

            </table>
        </div>

    </div>
</div>

</div>


</body>
</html>