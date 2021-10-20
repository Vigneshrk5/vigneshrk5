<?php
 
 require 'D:\xampp\htdocs\helphands\includes\PHPMailer\PHPMailerAutoload.php';

if(!isset($_POST['submit'])) { //if one try to access signup.inc.php without access
    header("Location: ../signup.php");
    exit();
} else {
    include_once 'dbh.inc.php'; //creating connection to database

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // for email verification: generate vkey
    $vkey = md5(time().$username); //will generate a random verification string key

    // check if the input characters are valid
    if(!preg_match("/^[a-zA-Z'. -]+$/", $fullname)) {    
        header("Location: ../signup.php?signup=invalidname");
        exit();
    } else {
        // check if there is already a username with same inputted data by new user
        $sql = "SELECT * FROM organizers WHERE organizer_username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../signup.php?signup=usernametaken");
            exit();
        } else {
            // password hashing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // insert the organizer into database
            $sql = "INSERT INTO organizers(organizer_fullname, organizer_username, organizer_email, organizer_password, organizer_phone, vkey) VALUES('$fullname','$username','$email','$hashedPassword','$phone','$vkey');";
            $insertSuccess = mysqli_query($conn, $sql);
            // if signup data successfully inserted in database then send email to him for verification using vkey

            if($insertSuccess) {

               

               

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
                $url = "http://localhost/helphands/includes/verifyEmail.inc.php?vkey=".$vkey;                                //Set email format to HTML
                $mail->Subject = 'Email Verification';
                $mail->Body    = '<p>Here is your email verification link. Click below to verify your email :</br></p><a href="' .$url. '">Verify Email</a></p>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
               
             

                header("Location: ../assets/html/thankyouemail.html");
                exit();
            } else {
                echo $conn->error;
            }        
        }
    }

}