<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include_once "./include/extends/conf_mail.php";   //サーバー設定情報


require_once __DIR__ . '/include/phpmailer/src/Exception.php';
require_once __DIR__ . '/include/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/include/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
/**
 * 
 */
$mail = new PHPMailer(true);
class sendmail  
{
	
	public function sendmailto_one($data){
			try {
				global $mail;
		 		// Server settings
		    	// $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
				$mail->isSMTP();
				$mail->Host =HOST_MAIL ;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "tls";
				$mail->Port = POST_MAIL;
				$mail->CharSet = "UTF-8";

			    $mail->Username = MAIL_NAME; // YOUR gmail email
			    $mail->Password = PASS_MAIL; // YOUR gmail password

			    // Sender and recipient settings
				$mail->setFrom(MAIL_NAME, '熱海観光マップ「愛PHONE」');
			    $mail->IsHTML(true);
			    $mail->AllowEmpty = true;

			    // echo "Email message sent.";	
	    		$mail->addAddress($data["mail"],"" );
	    		$mail->Body = $data["content"];
	    		// $mail->addReplyTo('vuongnb1102@gmail.com', ''); // to set the reply to
	    	 	$mail->Subject = $data["subject"];
			    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
	    		$mail->send();
	    		
			    // Setting the email content
		   
			} catch (Exception $e) {
				echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
			}
		}

}

?>