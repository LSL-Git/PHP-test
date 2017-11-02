<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>异常处理</title>
</head>
<body>

	<?php 
		function checkNum($num)			
		{
			if ($num > 1) {
				# 新建异常信息
				throw new Exception("Value must be 1 or below");
			}
			return true;
		}

		try {
			checkNum(3); // 触发异常
			echo "如果你看到这条信息，证明num小于或等于1";
		} catch (Exception $e) { // 捕获异常
			echo "<b>Message:</b>" . $e -> getMessage(); // 显示异常信息
		} finally {
			echo "<br>finally...";
		}	

	 ?>

	<H3>自定义Exception类</H3>
	<?php 
		/**
		* 自定义Exception类
		*/
		class customException extends Exception
		{
			
			public function errorMessage()
			{
				$errMsg = "Error on line: " . $this -> getLine() . " in " . $this -> getFile()
				. ": <b>" . self::getMessage() . "</b> is not  a valid E-mail address";
				return $errMsg;
			}
		}

		// set_exception_handler("exception_handler"); // 设置顶层异常处理器

		$email = "someone@example...com";

		try {
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) { // 判断是否是有效邮箱地址
				throw new customException($email);	// 调用自己定义的异常类			
			} else {
				echo $email . ' is a valid address<br>';
			}
				
		} catch (customException $e) {
			echo $e -> errorMessage() . "<br>";// 调用自己定义的错误提示方法提示错误信息	
		}

		try {
			if (strpos($email, "example") !== FALSE) {
				throw new Exception("$email is an example E-mail");
				echo "string";
			}
		} catch (Exception $e1) {
			echo $e1 -> getMessage();
		}
	 ?>

</body>
</html>