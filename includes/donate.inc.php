<?php
require 'D:\xampp\htdocs\helphands\includes\PHPMailer\PHPMailerAutoload.php';

if(isset($_GET['campaignId'])) {
    $campaignId = $_GET['campaignId'];
} else {
    header("Location: ../campaigns.php");
}
$fullname = $_POST['fullname'];
$email = $_POST['email'];

include 'dbh.inc.php';
$sql = "INSERT INTO donors(`donor_name`,donor_email,campaign_id) VALUES('$fullname','$email',$campaignId);";
$insertSuccess = mysqli_query($conn,$sql);

if($insertSuccess) {
    $sql = "SELECT donor_id from donors WHERE `donor_name`='$fullname' and campaign_id=$campaignId and donor_email = '$email';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'vigneshrajkumar2@gmail.com';                 // SMTP username
        $mail->Password =' muralivijaymonk';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('vigneshrajkumar2@gmail.com', 'HelpHands');
        $mail->addAddress($email);     // Add a recipient

        
            
          
            //Content
            $mail->isHTML(true);  
            $url = "http://localhost/helphands/donationProof.php?campaignId=".$campaignId."&donorId=".$row['donor_id'];                               //Set email format to HTML
            $mail->Subject = 'Donation Proof submission';
            $mail->Body    = '<p>Please click the link below to submit the proof for donation</p><a href="' .$url. '">Submit proof</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
      

        header("Location: ../assets/html/donorSubscribe.html");
        exit();
    } 
} else {
    echo $conn->error;
} 

