<?php
// Load Composer's autoloader
require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true); 

// assign values to variables
$name = $_POST['name'];
$email = $_POST['email'];
$sub = $_POST['subject'];
$msg = $_POST['message'];
try {

    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cntctdemo@gmail.com';                     // SMTP username
    $mail->Password   = 'contact#12';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email,$name);
	$mail->addReplyTo($email,$name);
    $mail->addAddress('cntctdemo@gmail.com');     // Add a recipient
    
    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $msg;

    $mail->send();
    echo 'Message has been sent';
} 
catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>