
<?php 
	/**
	 * We have to put the PHPMailer namespaces at the top of the page.
	*/
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;

	/*
		We have to require the config.php file to use our Gmail account login details.
	*/
	require 'config-mail.php';

	/**
		We have to require the path to the PHPMailer classes.
	*/
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	/**
	 * [The function uses the PHPMailer object to send an email to the address we specify]
	 * @param  [string] $email, [Where our email goes]
	 * @param  [string] $subject, [The email's subject]
	 * @param  [string] $message, [The message]
	 * @return [string]          [Error message, or success]
	 */
	function rand_string($length){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen($chars);
		$str = '';
		for($i = 0;$i < $length;$i++)
		{
			$str .= $chars[rand(0,$size - 1)];
		}
		return $str;
	}
	session_start();
	function sendMail($email){
		$mail = new PHPMailer(true);
	    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	    $mail->isSMTP();
	    $mail->SMTPAuth = true;
	    $mail->Host = MAILHOST;
	    $mail->Username = USERNAME;
	    $mail->Password = PASSWORD;     				
	    
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	    $mail->Port = 587;   									 

	    // Recipients
	    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
	    $mail->addAddress($email);
	    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
	    $mail->IsHTML(true);
	    $mail->Subject = "Reset your password";
		$_SESSION['code'] = rand_string(6); 
		$message = 'Chúng tôi đã nhận được yêu cầu làm mới mật khẩu của bạn gần đây<br>
		Bạn cần nhập mã xác nhận để được cấp quyền làm mới mật khẩu<br>
		Mã xác nhận của bạn là : '.'<b>'.$_SESSION['code'].'</b>';
	    $mail->Body = $message;
	    //$mail->AltBody = $message;
	    if(!$mail->send()){
	    	return "Email not found. Please try again";
	    }else{
	    	return "success";
	    }
	}
?>