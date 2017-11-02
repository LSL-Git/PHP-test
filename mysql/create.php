<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>创建表</title>
</head>
<body>

	<?php 
		require 'conn.php';
		$sql_drop_tb = "DROP TABLE IF EXISTS test";
		$sql_create_tb = "create table test (
			id int primary key, 
			name varchar(255) character set utf8
		)ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		
		if (!$mysqli->query($sql_drop_tb) || !$mysqli->query($sql_create_tb)) { // 新建表
			echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		} else {
			echo "Table cration success!<br>";
		}

	 ?>

</body>
</html>