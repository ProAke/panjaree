<?php

function getPHPmailer(){
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->CharSet	= "UTF-8";
	//$mail->From     = "icarstudio@jiesoftwarehouse.com";
	// $mail->From     = "admin@montessoritams.com";
	// $mail->FromName = "รวมพลังหาร2.com";
	$mail->isHTML(true); 
	$mail->SMTPAuth   = true; 

	$mail->Host = "mail.jiesoftwarehouse.com"; // SMTP server
	$mail->Port = 25; // พอร์ท
	$mail->Username = "montessoritams@jiesoftwarehouse.com"; // account SMTP
	$mail->Password = "13579montessoritams"; // รหัสผ่าน SMTP	

	//$mail->AddAddress("admin@montessoritams.com", "montessoritams.com");
	//$mail->AddCC("worapot.dmas@gmail.com", "รวมพลังหาร2.com");
	//$mail->AddCC("mcnet007@gmail.com", "baantonmai.ac.th");	
	

	return $mail;
}


?>