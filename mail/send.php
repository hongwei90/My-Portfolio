<?php
/**
 * 
 * 使用smtp 发送邮件.
 * @param array or string $destAddress
 * @param string $subject 主题
 * @param string $content 内容
 * @param string $fromName 发件人称谓
 * @return boolean success true &nbsp;*/


function smtp_send_mail($destAddress ,$subject , $content ,$fromName) {
	require_once 'class.phpmailer.php';      //视情况改动
	$mail = new PHPMailer (); //得到一个PHPMailer实例
	

	$mail->CharSet = "UTF-8";
	$mail->IsSMTP (); //设置采用SMTP方式发送邮件
	$mail->Host = "smtp.mxhichina.com"; //设置邮件服务器的地址
	$mail->Port = 25; //设置邮件服务器的端口，默认为25
	

	$mail->From = "info@au56.com"; //设置发件人的邮箱地址
	$mail->FromName = $fromName; //设置发件人的姓名
	$mail->SMTPAuth = true; //设置SMTP是否需要密码验证，true表示需要
	

	$mail->Username = "info@au56.com";    //你登录 163 的用户名
	$mail->Password = '';
	$mail->Subject = $subject; //设置邮件的标题
	

	$mail->AltBody = "text/html"; // optional, comment out and test
	$mail->Body = $content;
	
	$mail->IsHTML ( true ); //设置内容是否为html类型
	//$mail->WordWrap = 50;                                 //设置每行的字符数
	$mail->AddReplyTo ( "info@au56.com", $fromName); //设置回复的收件人的地址
	

	if (is_array ( $destAddress )) {
		foreach ( $destAddress as $address ) {
			$mail->AddAddress ( $address ); //设置收件的地址
		}
	} else {
		$mail->AddAddress ( $destAddress ); //设置收件的地址
	}
	
	if (! $mail->Send ()) { //发送邮件
		return FALSE;
	} 
	return true;
}
?>
