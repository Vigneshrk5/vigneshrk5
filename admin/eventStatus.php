<!DOCTYPE html>
<html>
<head>
	<title>Event Staus</title>
	<link rel="stylesheet" type="text/css" href="assets/css/manageEvent.css">
	<link rel="stylesheet" type="text/css" href="ad.css">
</head>
<body >
	<?php
	include'dashboard.html';
	?>
<div class="tableOfCampaign">
        <div><div class="titleOfTable">Event Status</div><br><br>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Campaign Name</th>
                    <th>Campaign Amount</th>
                    <th>Aadhaar Number</th>
                    <th>Category</th>
                    <th>Details</th>
                </tr>
                <?php
                $conn=mysqli_connect("localhost","root","","FundRaiser");
                if($conn)  
        {
            
        }
        else
            echo("failed");
                ?>
                
               <?php
               //checking the event status which havent expired
                 $sql1="SELECT * FROM campaigns WHERE campaignExpiry='1' AND campaign_status='0'";
                 $result1=mysqli_query($conn,$sql1);
                 $num=1;
                 while($row= mysqli_fetch_assoc($result1))
                 	{
                        
                 		echo "<tr>";
                 		echo "<td>".$num;
                 		echo "<td>".$row['campaign_name'];
                 		echo "<td>".$row['campaign_amount'];
                        echo "<td>".$row['campaign_adh'];
                 		echo "<td>".$row['campaign_type'];
                        ?>
                 		<td><form method='post' action='reviewEventStatus.php'>
                            <input type="hidden" name="id" value="<?php echo $row['campaign_id'];?> "><button type="submit" name="review" class="reviewButton">Review Donation Status</button></form>
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