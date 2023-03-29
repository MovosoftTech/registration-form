<?php
 session_start();
 include('server.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

 function send_password_reset($get_name,$get_email,$token){
  $mail = new PHPMailer(true);

try {
    //Server settings                      
    $mail->isSMTP();                                            
                        
    $mail->SMTPAuth   = true; 

    $mail->Host       = 'smtp.example.com'; 
    $mail->Username   = 'mmuthomibrian@gmail.com';                     
    $mail->Password   = '""';    

    $mail->SMTPSecure ="tls";            
    $mail->Port       = 465;

    $mail->setFrom('mmuthomibrian.com', $get_name);
    $mail->addAddress($get_email);
    
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

 }
}

if (isset($_POST['password_reset_link'])){
  $email=mysqli_real_escape_string($con,$POST['email']);
  $token=md5(rand());

  $check_email="SELECT  email FROM new_users WHERE email='$email LIMIT 1";
  $check_email_run=mysqli_query($con,$check_email);

  if (mysqli_num_rows($check_email_run)>0) {
    $row=mysqli_fetch_array($check_email_run);
    $get_name=$row['username'];
    $get_email=$row['email'];

    $update_token="UPDATE users SET token='$token' WHERE email='$get_email' LIMIT 1";
    $update_token_run= mysqli_query($con,$update_token);

  if (update_token_run) {
      send_password_reset($get_name,$get_email,$token);
      $_session['status']="we emailed you a password reset link";
      header("location: index.php");
      exit(0)
  }
    else {
      $_session['status']="something went wrong .#1";
      header("location: password-reset.php");
      exit(0)
    }
  }
  else {
    $_session['status']="No email found";
    header("location: password-reset.php");
    exit(0)
  }

}




?>
