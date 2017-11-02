<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>插入数据</title>
</head>
<body>

	<?php 
		require 'conn.php';

		//gbk 转 utf-8
		function enc($c){
			return iconv('gbk','utf-8',$c); 
		}
		// utf-9 转 gb2312
		function dec($c){
			return iconv('utf-8','gb2312',$c);
		}

		// 定义函数
		function Insert($mysqli, $id, $name)
		{
			# 使用预处理语句
			$sql = "insert into test(id, name) values (?,?)";

			$stmt = mysqli_stmt_init($mysqli);
			// 预处理语句
			if (mysqli_stmt_prepare($stmt, $sql)) {
				// 绑定参数
				// 参数二：i 表示整数 s 表示字符串 d 表示双精度浮点数 b 表示布尔数， 对应插入字段的类型和个数
				mysqli_stmt_bind_param($stmt, 'is', $id, $name);

				// 执行插入
				if(mysqli_stmt_execute($stmt)) {
					echo "数据插入成功！". $stmt -> affected_rows . "行受影响.";
				} else {
					echo "数据插入失败！" . $mysqli -> error;
				}
			}

			$stmt -> close();
		}

		Insert($mysqli, 0, "洋葱");

		##################################
		// if(!($stmt = $mysqli->prepare($sql))) {
		// 	echo "Prepare failed:(" . $mysqli->errno . ") " . $mysqli->error;
		// }

		// $id = 1;
		// $name = "李狗蛋";

		// do {
		// 	if (!$stmt->bind_param("is", $id, $name)) {
		// 		echo "Binding parameters failed:(". $stmt->errno . ") " . $stmt->error;
		// 	}
			
		// 	if (!$stmt->execute()) {
		// 		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		// 	}

		// 	$id++;
		// 	print_r("affected row:" . $stmt->affected_rows);
		// 	echo "<br>";
			
		// } while ($id <= 10);


		# 插入多条数据
		$sql = "insert into test(id, name) values (1, '张三');";
		$sql .= "insert into test(id, name) values (2, 'Tom');";
		$sql .= "insert into test(id, name) values (3, '李四')";

		if ($mysqli -> multi_query($sql) === TRUE) {
			echo "<br>新纪录插入成功！". $mysqli -> affected_rows . "行受影响.";
		} else {
			echo "Error:" . $sql . "<br>" . $mysqli -> error;
		}

		$mysqli->close();
	 ?>

</body>
</html>