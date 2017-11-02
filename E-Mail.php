<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>发送邮件</title>
</head>
<body>

	<?php 
		$to = "1748359995@qq.com";
		$subject = "Test mail";
		$message = "Hi! This is a sample email message!";
		$from = "someonelse@exmaple.com";
		$headers = "from:" . $from;
		mail($to, $subject, $message, $headers);
		echo "Mail Sent.";
	 ?>

</body>
</html>