<?php

require 'log.php';

include("db_connect.php");
session_start();

$code = md5(uniqid(rand(), false));
$code = substr($code, 0, 6);
$code = strtoupper($code);

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

	$select = "SELECT * from login where email='$email'";
	$rSelect = mysqli_query($conn, $select);

	if(mysqli_num_rows($rSelect) == 0){
		echo "<script type='text/javascript'>alert('No existing email.'); window.location.href='forgotPassword.php';</script>";
	}else{
		require 'Mailer.php';
		$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webandmobileattendance2018@gmail.com';                 // SMTP username
$mail->Password = 'iics@2014';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('webandmobileattendace2018@gmail.com', 'Web and Mobile Attendance');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Recovery';
$mail->Body    = "Your recovery password is $code.";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	echo "<script type='text/javascript'>alert('Email not sent.'); window.history.back;</script>";
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'Message has been sent';
	  //update code in the database
	$query1 = "UPDATE login SET code = md5('$code') WHERE email = '$email'";
	$result1 = mysqli_query($conn,$query1);
	$log->lwrite('Recovery password sent to: '. $email);
	$log->lclose();
	header('Location: emailSent.php');
}


}
}


?>