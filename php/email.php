<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
// try try
include 'connect.php';
if($_POST){
	$input = $_POST['input'];

$em;
$ot;
$i;
// 
$sql = "SELECT * from `users`";
$result = mysqli_query($con,$sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $email = $row['email'];
        $g = $row['otp'];
      
        //cond
        if($input == $id || $email == $input){
            $i = $id;
        }
    }   
}else{
    die("Adding Failed: " . mysqli_error());
}
//dine ano updet
    $seconds = strtotime("now");
    $OTP = rand(1000,9999);
    $sqlz = "UPDATE `users` SET `otp`='$OTP',`seconds`='$seconds' WHERE `id` = $i;";
        
    
    $resultz = mysqli_query($con,$sqlz);
    if($resultz){
        echo"Successfully Updated";
    }else{
        die("Adding Failed: " . mysqli_error());
    }
//get uli
$sqli = "SELECT * from `users`";
$resulti = mysqli_query($con,$sqli);
if($resulti){
    while($row = mysqli_fetch_assoc($resulti)){
        $id = $row['id'];
        $email = $row['email'];
        $otp = $row['otp'];
      
        //cond
        if($input == $id || $email == $input){
            $em = $email;
            $ot = $otp;
        }
    }   
}else{
    die("Adding Failed: " . mysqli_error());
}

// 
if($em){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thsschedulingsystem@gmail.com';                     //SMTP username
        $mail->Password   = 'znkkvywsiclcsaxp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('thsschedulingsystem@gmail.com', 'THS: Scheduling System');
        // $mail->addAddress('ryankaindoy12@gmail.com', 'Joe User');     //Add a recipient
        $mail->addAddress($em);               //Name is optional
        $mail->addReplyTo('thsschedulingsystem@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'One Time Pin for the User';
        $mail->Body    = '<p>Hello, </p><p> Please use this 4 pin OTP verification code for the Prof Sched Application: </p><p> <em> <h2>'.$ot.'</h2></em> </p> <p>This will expire exactly at 5 minutes</p><p>Thanks! </p> <p>Ps: Schedsys Team</p>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
 
}
}
// unset the update
exit();
?>