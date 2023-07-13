<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
// try try
include '../connect.php';

//get data
$sql = "SELECT * from `logs` WHERE `open` = '1'";
$result = mysqli_query($con,$sql);

//rows
$limiter = array();
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $state = $row['state'];
        $user = $row['faculty'];
        array_push($limiter,$user);
    }   
}else{
    die("Adding Failed: " . mysqli_error());
}
// echo $limiter[0];
// unsetting
$filtered = array_unique($limiter);
// 
for($x = 0; $x < count($filtered); $x++){
    $gt = $filtered[$x];
    $sqluser = "SELECT * from `users` WHERE `id` = '$gt'";
    $resultuser = mysqli_query($con,$sqluser);

    //rows
    if($resultuser){
        while($row = mysqli_fetch_assoc($resultuser)){
            $email = $row['email'];
            $not = $row['notify'];
            $mail = new PHPMailer(true);
            if($not !=0){
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
                $mail->addAddress($email);               //Name is optional
                $mail->addReplyTo('thsschedulingsystem@gmail.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Update of Schedules';
                $mail->Body    = '<p>This is to inform you that there are updates regarding your schedule, please check the updated schedules.</p><p>Ps: SchedSys team</p>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
        }   
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}
// unset the update
    $sql = "UPDATE `logs` SET `open`=0;";
    $result = mysqli_query($con,$sql);
    if($result){
        $e = "Sucessfully updated"; 
    }else{
        die("Adding Failed: " . mysqli_error());
    }
    echo $e;
?>