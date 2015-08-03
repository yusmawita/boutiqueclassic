<?php

// example on using PHPMailer with GMAIL

include("class.phpmailer.php");
include("class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

$mail             = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port

$mail->Username   = "butikclassic01@gmail.com";  // GMAIL username
$mail->Password   = "mariavewiliya";            // GMAIL password

//$mail->From       = "rizkihamdani01@gmail.com";
$mail->FromName   = "Butik Classic";
$mail->Subject    = "Newsletter";
$mail->WordWrap   = 50; // set word wrap
$body             = "http://berniaga.com/";//Message
$mail->MsgHTML($body);

//send mail too
//$mail->AddAddress("memberemail","Membername");
$mail->AddAddress("rizkihamdani01@gmail.com","Rizki Hamdani");
$mail->AddAddress("butikclassic01@gmail.com","");

$mail->AddAttachment("../themes/images/products/BY03 Kalung.jpg", "BY03 Kalung.jpg"); // attachment

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}

?>
