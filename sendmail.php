<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

function sendemail($username,$useremail,$subject,$message){
  $mail= new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'ssl'; 
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->IsHTML(true);
  // enter your gmail address
  $mail->Username = "";
  // enter your password
  $mail->Password = "";
  // enter the same address as above
  $mail->SetFrom("");
  $mail->Subject = $subject;
  $mail->Body = "<div>User Reported<div><p>Name: ".$username."</p><p>Email: ".$useremail."</p></div></div>"."<div>".$message."</div>";
  // this is the mail address, where your mail is sent
  $mail->AddAddress("");
  if(!$mail->Send()) {
    return 0;
  } else {
    return 1;
  }
}

?>
