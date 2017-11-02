<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ODBC 应用</title>
</head>
<body>

	<?php 		
		//gbk 转 utf-8
		function enc($c){
			return iconv('gbk','utf-8',$c); 
		}
		// utf-9 转 gb2312
		function dec($c){
			return iconv('utf-8','gb2312',$c);
		}

		$conn = odbc_connect("myAccess", "", ""); // 连接到ODBC数据源 用户和密码都为空

		if (!$conn) {
			exit("连接数据库失败！");
		}

		var_dump($conn);

		//$sql = dec("select * from Dang where 性别 = '女'"); // 选择语句
		// $sql = dec("insert into Dang(NO,Name) values (108,'张全蛋')"); // 插入语句
		//$sql = dec("update Dang set Name = '全蛋' where Name = '张全蛋'"); // 更新语句
		//$sql = dec("delete * from Dang where Name = '全蛋'"); // 删除对应数据

		// $rs = odbc_exec($conn, $sql); // 执行sql语句
		// print_r($rs);

		// print_r(odbc_result($rs, 1)); // 从记录中第一个字段的值

		// if (!$rs) {
		// 	exit("sql 语句错误！");
		// }

		// echo "<table border='1' ><tr>";
		// echo "<th>序号</th>";
		// echo "<th>姓名</th>
		// 	<th>性别</th>
		// 	<th>班别</th></tr>";

		// while (odbc_fetch_row($rs)) { // 判断是否读到最后
			
		// 	$NO = odbc_result($rs, "NO"); // 读取字段为 NO 的值
		// 	$Name = enc(odbc_result($rs, "Name")); // 读取字段为 Name 的值
		// 	$Sex = enc(odbc_result($rs, dec("性别"))); // 读取性别 dec（）函数转换编码
		// 	$Class = enc(odbc_result($rs, dec("个人身份")));
		// 	echo "<tr><td>$NO</td>";
		// 	echo "<td>$Name</td>";
		// 	echo "<td>$Sex</td>";
		// 	echo "<td>$Class</td></tr>";
		// }

		odbc_close($conn);  // 关闭连接
		// echo "</table>";
	 ?>
</body>
</html>