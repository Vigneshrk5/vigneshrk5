<?php
    if(!isset($_GET['donorId']) && !isset($_GET['campaignId']))
    {
        header("Location: campaigns.php");
        exit();
    } else {
        $donorId = $_GET['donorId'];
        $campaignId = $_GET['campaignId'];
    }
?>
<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/donationProof.css">
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
    </div>

    <!-- body part -->
<!-- login box -->
    <div class="loginbox">
        <div class="boxone">
            <span id="logintext">Submit the donation proof here. After submitting the proof you will be listed in the donors list of our site.</span>
        </div>

        <div class="boxtwo">
            <br><br>
            <form action="includes/donationProof.inc.php?donorId=<?php echo $donorId;?>&campaignId=<?php echo $campaignId;?>" method="POST" enctype="multipart/form-data">
                <input type="number" name="donatedAmount" placeholder="Enter amount you donated" required><br><br>
                <input type="text" name="address" placeholder="Enter your address" required><br><br>
                
                <span id="proofImage">Upload proof image</span> <br>
                <input type="file" name="proofImage" accept="image/*"><br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>

    <div class="proofInfo">
        <p>--Proof file requirements--</p>
        <ul>
            <li>Bank Deposit voucher or Receipt</li>
          
        </ul>
    </div>

<?php
    include_once 'footer.php';
?>