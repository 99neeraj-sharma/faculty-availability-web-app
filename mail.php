<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
  $to = 'b17050@students.iitmandi.ac.in';
  $mail = new PHPMailer;
  $mail->setFrom('admin@example.com');
  $mail->addAddress($to);
  $mail->Subject = 'Confirmation Link do not reply';
  $mail->Body = 'Write your message here';
  $mail->IsSMTP();
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'ssl://smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Port = 465;

  //Set your existing gmail address as user name
  $mail->Username = 'neera99j@gmail.com';
  //Set the password of your gmail address here
  $mail->Password = 'password'; //password is removed


  if(!$mail->send()) {
    echo 'Email is not sent.';
    echo 'Email error: ' . $mail->ErrorInfo;
  } else {
    echo 'Email has been sent.';
  } 
 
?>