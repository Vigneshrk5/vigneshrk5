<?php



    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];
        
    } else {
        header("Location: campaigns.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelpHands | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/donate.css">

   
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
        <br>
        <h1>Donate via Bank | Online</h1>

        <div class="bank-details">
            <h2>You can donate fund via Bank Transfer. The Bank details are below:</h2><hr>
                <div class="banks">
                    <table>
                        <tr>
                            <th colspan="3">State Bank of India</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Helphands</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                    <br>
                    
                    <br>
                    
                </div>
            <br><hr>
            <h1>Donate via InstaMojo | Online Payment Gateway</h1>
            <img src="assets/images/instamojo.png" alt="" width="120" height="80">
        <div class="donor-form">
                <div class="boxtwo">
                <br><br>
                
                    <form action="pay.php?campaignId=<?php echo $campaignId;?>" method="POST">
                    <!-- to-do full name html pattern -->
                    
                        <input type="text" name="amount" placeholder="Enter your amount" required><br><br>
                        <input type="submit" name="pay" value="DONATE" id="submit">
                    </form>
                </div>
            </div>
        <br>
    <hr>
    <br> <br>
            <div class="donor-notice">Subscribe to HelpHands, So that we can track your donation and guide you for the donatation process. Once you submit your details, We will send you an email and you can submit the proof of the donation that you made. By doing this, you will be listed in our donor list as an donor.
                The proof file can simply be:
                <ul>
                    <li><strong>Bank deposit voucher or receipt</strong> </li>
                    <li><strong>Online payment receipt</strong> </li>
                    
                </ul>
            </div><br><hr>
            <h2>Be in touch with us</h2>
            <div class="donor-form">
                <div class="boxtwo">
                <br><br>
                    <form action="includes/donate.inc.php?campaignId=<?php echo $campaignId;?>" method="POST">
               
                        <input type="text" name="fullname" placeholder="Enter full Name" required><br><br>
                        <input type="email" name="email" placeholder="E-mail" required><br><br>
                        <input type="submit" name="submit" value="Subscribe" id="submit">
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <br>
        <br>
        <br>
        
    <?php
        include_once 'footer.php';
    ?>