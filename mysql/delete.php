<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>删除数据</title>
</head>
<body>

	<?php 
		require 'conn.php';

		$sql = "delete from test where name = '全蛋'";

		$mysqli -> query($sql);
		if ($mysqli -> affected_rows) {
			echo "删除成功！" . $mysqli -> affected_rows . " 行受影响";
		} else {
			echo "删除失败！" . $mysqli -> affected_rows . " 行受影响";
		}

		$mysqli -> close();
	 ?>

</body>
</html>