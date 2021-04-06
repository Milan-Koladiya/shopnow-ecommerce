<?php	
	function sendOTP($emailid,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
	   $mail->AddReplyTo('milankoladiya444@gmail.com','Milan Koladiya');
                                $mail->SetFrom('milankoladiya444@gmail.com','Milan Koladiya');
                                $mail->AddAddress($emailid);
                                $mail->Subject= "OTP to Login";
                                $mail->MsgHTML($message_body);
                                $result=$mail->Send();
                                if(!$result) {
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }else {
                                    	return $result;  
                                } 
	}
?>