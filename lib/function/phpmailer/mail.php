<?php
include_once('PHPMailer.php');
include_once('SMTP.php');
include_once('Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail extends Main{

    //auto number generating module 
    function send_mail($to,$subject,$body){
            //Create an instance
            $mail = new PHPMailer();
             //Send using SMTP
            $mail->isSMTP();
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';  
            //Enable SMTP authentication
            $mail->SMTPAuth   = "true";    
            //Enable implicit TLS encryption
            $mail->SMTPSecure = "tls";  
            //TCP port to connect to; use 587 if you 
            $mail->Port       = "587";    
            //username
            $mail->Username   = "labour.deepartment.sl@gmail.com";
            //password
            $mail->Password   = "nfxpswhxuixpkhhu";  
            //send from address
            $mail->setFrom("labour.deepartment.sl@gmail.com");
            //content
            //subject
            $mail->Subject = "$subject";
            //enable html
            $mail->isHTML(true);
            //body
            $mail->Body    = "$body";
            //send address
            $mail->addAddress("$to");
            // sending mail
            if($mail->send()){
                echo 'Message has been sent';
            }
            else{
                echo "Message could not be sent.";
            }

            $mail->smtpClose();
        }
}
            ?>