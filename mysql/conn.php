<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<title>MySQL 数据库连接</title>
</head>
<body>


	<?php 
		require 'app_config.php';
		
		$mysqli = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME);
		if ($mysqli->connect_error) {
			die("Connected failed:" . $mysqli->connect_error);
		} else {
			echo "数据库" . DATABASENAME . "连接成功！";
		}

		// 设置编码，防止中文乱码
		mysqli_set_charset($mysqli, "utf8");
	 ?>

</body>
</html>