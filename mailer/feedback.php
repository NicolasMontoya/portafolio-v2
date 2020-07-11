<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'POP3.php';
require 'form_setting.php';

if(isset($_POST)){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	$messages  = "<h3>New message from the site " .$fromName. "</h3> \r\n";
	$messages .= "<ul>";
	$messages .= "<li><strong>Name: </strong>" .$name."</li>";
	$messages .= "<li><strong>Email: </strong>" .$email."</li>";
	$messages .= "<li><strong>Message: </strong>" .$message."</li>";
	$messages .= "</ul> \r\n";

	$mail = new PHPMailer;

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.privateemail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@nicolasmontoya.com';                     // SMTP username
    $mail->Password   = 'koalac96';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


	$mail->From = $from;
	$mail->FromName = $fromName;
	$mail->addAddress($to, 'Admin');

	$mail->isHTML(true); 
	$mail->CharSet = $charset;
	$mail->Subject = $subj;
	$mail->Body    = $messages;

	if(!$mail->send()) {
	    print json_encode(array('status'=>0));
	} else {
	    print json_encode(array('status'=>1));
	}

}
	
?>