<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="campaigns.php">EVENTS</a>
            <a href="donorfolder/donorss.php">DONORS</a>
            <a href="successfolder/success1.php">SUCCESSEVENTS</a>
            <a href=""><b><i>HelpHands</i></b></a>
            
        </div>

        <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='login.php'">LOGIN</button>
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>

    <!-- body part -->

    <img src="assets/images/canvas.png" alt="" id="canvas-image">
    <div class="banner">
        <img src="assets/images/banner.png" alt=""><br><br>
        <span id="banner-quote">
            "No one has ever become <br> poor by giving."
        </span>
    </div>

    <div class="get-started">
        <span id="create-campaign">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CREATE YOUR OWN EVENT 
        </span>
        <br>
        <br>
        <br>
        <br>

        <button type="submit" onclick="window.location.href='signup.php'">GET STARTED</button>
    </div>
<?php
    include_once 'footer.php';
?>