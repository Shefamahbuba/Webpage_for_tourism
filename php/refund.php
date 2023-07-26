<?php

     session_start();
     $i_email=$_GET['issue_email'];
    
  $_SESSION['i_email']=$_GET['issue_email'];

       require '../php/PHPMailer-master/src/PHPMailer.php';
       require '../php/PHPMailer-master/src/SMTP.php';
       require '../php/PHPMailer-master/src/Exception.php';
      

       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;
       use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer();
    $mail-> isSMTP();
    $mail->Host ="smtp.gmail.com";
    $mail->SMTPAuth ="true";
    $mail->SMTPSecure ="tls";
    $mail->Port ="587";
    $mail->Username="abidahasina@gmail.com";
    $mail->Password="allah@akber";
    $mail->Subject="Refund";
    $mail->setFrom("abidahasina@gmail.com");
    $mail->Body ="As per your request, your booking has been cancelled.To get refund, contact us.";
    $mail->addAddress("$i_email");
    
    if($mail->send()){
        echo "email sent successfully";

    }
    else{
        echo "email sent unsuccessfully";

    }


  

         ?>


