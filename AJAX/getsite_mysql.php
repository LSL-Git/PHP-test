<?php 
	// $q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

	$q = $_GET["q_"];


	if (empty($q)) {
		echo "请选择一个网站！";
		exit();
	}

	// 连接数据库
	$conn = mysqli_connect("localhost", "root", ""); 

	if (!$conn) {
		die("数据库连接失败！");
	}

	// 选择数据库
	mysqli_select_db($conn, "mmorpg");
	// 设置编码，防止中文乱码
	mysqli_set_charset($conn, "utf8");
	// MySQL 选择语句
	$sql = "select * from Websites where id = '" . $q . "'";
	// 执行查询
	$result = mysqli_query($conn,$sql);
	// 显示数据库操作相关的错误信息
	if (!$result) {
		print("Error:\n" .  mysqli_error($conn));
		exit();
	}

	echo "<table border='1'>
		<tr>
		<th>ID</th>
		<th>网站名</th>
		<th>网站 URL</th>
		<th>Alexa 排名</th>
		<th>国家</th>
		</tr>";
	// 遍历数据库数据
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td><a href='" . $row['url'] . "'>" . $row['name'] . "</a></td>";
		echo "<td>" . $row['url'] . "</td>";
		echo "<td>" . $row['alexa'] . "</td>";
		echo "<td>" . $row['country'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	mysqli_close($conn);
 ?>