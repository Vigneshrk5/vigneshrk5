<?php
$conn=mysqli_connect("localhost","root","","FundRaiser");
?>
<?php


if (isset($_POST['accept'])) {
	//if the donation is accepted
	  	$id = $_POST['id'];
	  	$row=$id;
	  	$donorName=$_POST['donorName'];
	  	$donatedAmount=$_POST['donatedAmount'];
	  	$campaignName=$_POST['campaignName'];
	  	$donorAddress=$_POST['dAddress'];
	  	$approval='1';
	  
	  

	  
	  	$result1=mysqli_query($conn,"UPDATE `donationproof` SET `admin_approval`='$approval' WHERE donor_id=$id");
	  	if($result1)
	  	{
	  		echo "hello";
	  		header("Location: ../successMessage1.php?message=accept");
	  		
	  	}

	  }
	  
	
	  
	  ?>
	  <?php
	  if (isset($_POST['delete'])) {
		  //if the campaign is deleted
	  	$id =$_POST['id'];
	  	echo $id;
	  	$row=$id;
	  	$campaignName=$_POST['campaignName'];
	  	echo $campaignName;

	  	$sql="DELETE FROM `donors` WHERE donor_id=$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	header("Location: ../successMessage1.php?message1=delete");

	  }

	  ?>
	  
	  