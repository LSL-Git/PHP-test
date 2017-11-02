<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>错误处理</title>
</head>
<body>

	<?php 
		function errorInfo($errno, $errstr)
		{
			echo "<b>Error:</b> [$errno] $errstr<br>";
			echo "Ending Script...";
			// die();
			error_log("Error:[$errno] $errstr", 1, "1748359995@qq.com", "From: webmaster@exmaple.com");
		}

		set_error_handler("errorInfo", E_USER_WARNING);// 设置错误处理程序

		// echo "$string";
		// fopen("filename.txt", "r");
	 ?>

	<?php 
		$test = 3;
		if ($test > 1) {
			trigger_error("Velue test must be 1 or below", E_USER_WARNING);
		}

		echo "$string"; // 脚本已停止，将不会被执行
	 ?>

</body>
</html>