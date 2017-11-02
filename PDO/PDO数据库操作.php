<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDO</title>
</head>
<body>

	<h2>PDO 连接数据库</h2>
	<?php 
		// PDO 方式操作适用多种数据库 PDO 应用在 12 种不同数据库中
		$servername = "localhost";
		$username = "root";
		$password = "";
		$myDb = "mydbPDO";

		try {
			// 创建MySQL链接对象
			$conn = new PDO("mysql:host=$servername;dbname=$myDb", $username, $password);
			echo "连接成功！";
		} catch (PDOException $e) {
			echo $e -> getMessage();
		}
		
	 ?>

	<h2>创建数据库</h2>
	<?php 
		try {
			// 设置 PDO 错误模式为异常
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "create database " . $myDb;

			// 使用exec(),因为没有结果返回
			// $conn -> exec($sql);

			echo "数据库创建成功!<br>";

			echo "<h2>新建表</h2>";
			$sql2 = "create table myGuests (
				id int(6) unsigned auto_increment primary key,
				firstname varchar(30) not null,
				lastname varchar(30) not null)";
			// 执行 sql 语句
			// $conn -> exec($sql2);
			echo "数库表 myGuests 创建成功!";

			echo "<h2>插入 数据 </h2>";
			//$sql3 = "insert into myGuests (id, firstname, lastname) values (0,'Json','Doe')";
			// $sql3 = "insert into myGuests (id, firstname, lastname) values (0,'范','玮琪')"; // 插入
			// $sql3 = "delete from myGuests where firstname = 'John0'"; // 删除
			$sql3 = "update myGuests set firstname = 'John0' where id = 5"; // 更新

			$conn -> exec($sql3);
			echo "插入数据成功!";

			echo "<h2>插入多条数据</h2>";
			// 开始事务
			$conn -> beginTransaction();
			// sql语句
			for ($i = 0; $i < 5; $i++) { 
				// $conn -> exec("insert into myGuests (id, firstname, lastname) values (0, 'John$i','Deo')");
			}
			// 提交事务
			$conn -> commit();
			echo "新记录插入成功";

		} catch (PDOException $e) {
			// 如果执行失败回滚
			$conn -> rollback();
			echo "<br>" . $e -> getMessage();
		}
	 ?>

	 <h2>预处理语句</h2>
	<?php 
		try {
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql4 = "insert into myGuests(firstname, lastname) values (:firstname, :lastname)";
			// 预处理 sql 并绑定参数
			$stmt = $conn -> prepare($sql4);
			$stmt -> bindParam(':firstname', $fname);
			$stmt -> bindParam(':lastname', $lname);

			// 插入行
			$fname = "MD";
			$lname = "EF";
			// $stmt -> execute();
			// 插入其他行
			$fname = "Mary";
			$lname = "Moe";
			// $stmt -> execute();
			echo "插入新记录成功!";
		} catch (PDOException $e) {
			echo "ERROR:" . $e -> getMessage();
		}
	 ?>

	<h2>PDO+(预处理)</h2>
	<?php 
		echo "<table style='border: solid 1px black;'>";
		echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
		/**
		* 
		*/
		class TableRows extends RecursiveIteratorIterator // 继承递归迭代器
		{	// 加一个下划线的函数为私有的
			// 加两个下划线的函数一般都是系统默认的,系统预定义的 包括 __construct、__destruct、__clone、__toString
			// __construct 构造方法,当一个对象创建时调用此方法
			function __construct($it)
			{
				// ::引用类里面的静态方法或者属性，而且不需要实例化！
				// parent::__construct 调用父类的 __construct 方法
				// self 表示调用自身
				parent::__construct($it, self::LEAVES_ONLY);
			}

			function current()
			{
				return "<td style='width:150px; border:1px solid black;''>" . parent::current() . "</td>";
			}

			function beginChildren()
			{
				echo "<tr>";
			}

			function endChildren()
			{
				echo "</tr>" . "\n";
			}
		}

		try {
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt2 = $conn -> prepare('select id, firstname, lastname from myGuests');
			$stmt2 -> execute();

			// 设置结果集为关联数组
			$result = $stmt2 -> setFetchMode(PDO::FETCH_ASSOC);
			// print_r($stmt2 -> fetchAll());
			foreach (new TableRows(new RecursiveArrayIterator($stmt2 -> fetchAll())) as $key => $value) {
				echo $value;
			}
		} catch (PDOException $e) {
			echo "ERROR" . $e -> getMessage();
		}

		echo "</table>";

	 ?>
	<?php 
		// 关闭连接
		$conn = null;
	 ?>
</body> 
</html>