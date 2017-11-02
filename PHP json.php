<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>php and json</title>
</head>
<body>

	<?php 
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		echo json_encode($arr);
		echo "<br>";
		// 转换为json格式数据
		class Emp {
			public $name = "";
			public $hobbies = "";
			public $birthdate = "";
		}

		$e = new Emp();
		$e -> name = 'Tomcat';
		$e -> hobbies = 'Run';
		$e -> birthdate = date('m/d/Y h:i:s a', strtotime("9/10/2017 11:32:29 p"));

		$json = json_encode($e);

		echo $json;
		echo "<br>";
		var_dump(json_decode($json));
		echo "<br>";
		var_dump(json_decode($json,true));
	 ?>

</body>
</html>