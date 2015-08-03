<?php
include("class.phpmailer.php");// mail
include("class.smtp.php"); // mail

echo broadcarstemail("New Message from Xampp","test");
function sendSMS($number,$message){
	$link = "https://reguler.zenziva.net/apps/smsapi.php?userkey=nz1ct5&passkey=1234&nohp=$number&pesan=$message";
	$xml=simplexml_load_file($link);
	$ket =  $xml->message[0]->text; 
	return $ket;
}

function broadcarstemail($e_message,$p_image){
	$mail             = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port

	$mail->Username   = "cvmyuni@gmail.com";  // GMAIL username
	$mail->Password   = "wahyuniutami";            // GMAIL password

	//$mail->From       = "cvmyuni@gmail.com";
	$mail->FromName   = "Butik Classic";
	$mail->Subject    = "Newsletter";
	$mail->WordWrap   = 50; // set word wrap
	$mail->MsgHTML($e_message);

	//send mail too
	$mail->AddAddress("rizkihamdani01@gmail.com","rizki");	
	//$mail->AddAddress("memberemail","Membername");	
	/*$query="SELECT *
			FROM member";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$mail->AddAddress("$data[6]","$data[3]");
	}*/

	$mail->AddAttachment("themes/images/products/S.jpg", "S.jpg"); // attachment

	$mail->IsHTML(true); // send as HTML

	if(!$mail->Send()) {
		echo "Mail Not Send<br>";;
		echo "Mail Error : <br>".$mail->ErrorInfo."<br><br>";;
		return "";
	} else {
		return "OK\n";
	}
}
?>