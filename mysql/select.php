<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>读取数据库数据</title>
</head>
<body>

	<?php 
		require 'conn.php';

		// $sql = "select id, name from test";
		// $sql = "select id, name from test where id < 4";
		$sql = "select id, name from test order by id DESC"; // DESC 根据id降序排序 ASC 根据id升序排序
		$result = $mysqli -> query($sql);
		echo "<br>";
		if ($result -> num_rows > 0) {
			// 输出数据
			while ($row = $result -> fetch_assoc()) {
				// print_r($row);
				echo "ID:" . $row['id'] . " - Name:" . $row['name'] . "<br>";
			}
		} else {
			echo "0 结果";
		}

		$mysqli -> close();
	 ?>

</body>
</html>