<?php
 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
class Mailer{
// Instantiation and passing `true` enables exceptions
public function dathangmail($tieude,$noidung,$maildathang)
{
$mail = new PHPMailer(true);
 $mail->CharSet='UTF-8';
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'uitcakeshop@gmail.com';// SMTP username
    $mail->Password = 'nseg stpi junf muqx'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
 
    //Recipients
    $mail->setFrom('uitcakeshop@gmail.com', 'CakeShop');

    $mail->addAddress($maildathang, ''); // Add a recipient
    //$mail->addAddress('ellen@example.com'); // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    /* $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = $tieude;
    $mail->Body = $noidung;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
?>