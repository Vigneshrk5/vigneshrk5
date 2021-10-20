<?php
$conn=mysqli_connect("localhost","root","","FundRaiser");
?>
<?php

if (isset($_POST['accept'])) {
	//checking the campaign status of how much
	  	$id = $_POST['id'];
	  	$row=$id;
	  
	  	$status='1';


        $sql="UPDATE `campaigns` SET `campaign_status`='$status' WHERE campaign_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
            
	  		header("Location: ../successMessage.php?message=accept");
	  		
	  	}

	  }
	  ?>
	  <?php
	  if (isset($_POST['delete'])) {
	  	$id =$_POST['id'];
	  	echo $id;
	  	$row=$id;
	  	$campaignName=$_POST['campaignName'];
	  	echo $campaignName;

		  $statusf='2';

	  	$sql="UPDATE `campaigns` SET `campaign_status`='$statusf' WHERE campaign_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	
	  	header("Location: ../successMessage.php?message1=delete");

	  }

	  ?>
	  
	 