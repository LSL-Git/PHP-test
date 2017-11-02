<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>更新数据库数据</title>
</head>
<body>

	<?php 
		require 'conn.php';

		$sql = "update test set name = '全蛋' where id = 4";

		// print_r($mysqli -> query($sql));
		$mysqli -> query($sql);
		if ($mysqli -> affected_rows) {
			echo "更新成功！" . $mysqli -> affected_rows . " 行受影响";
		} else {
			echo "更新失败！" . $mysqli -> affected_rows . " 行受影响";
		}

		$mysqli -> close();
	 ?>

</body>
</html>