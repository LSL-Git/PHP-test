<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>过滤器filter</title>
</head>
<body>

	<?php 
		$int = 123;

		$int_options = array(
			"options" => array( // options 固定值
				"min_range" => 0, // 最小值
				"max_range" => 100 // 最大值
			)
		);
		// 过滤单一变量 即$int
		if(!filter_var($int, FILTER_VALIDATE_INT, $int_options)) {
			echo "Integer is not valid";
		} else {
			echo "Integer is valid";
		}
	 ?>

	 <hr>
	 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	 	Email : <input type="text" name="email">
	 	Url: <input type="text" name="url">
	 	<input type="submit" name="submit" value="提交">
	</form>

	<hr>
	<?php 
		// filter_has_var() - 检查是否存在指定输入类型的变量。
		if (!filter_has_var(INPUT_POST, "email")) {
			echo "Input type does not exists<br>";
		} else {
			if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
				echo "E-mail is not valid<br>";
			} else {
				echo "E-mail is valid<br>";
			}
		}

		if (!filter_has_var(INPUT_POST, "url")) {
			echo "Input type does not exists<br>";
		} else {
			if (!filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL)) {
				echo $_POST['url'] . " is not valid<br>";
			} else {
				echo $_POST['url'] . " is valid<br>";
			}
		}
	 ?>

</body>
</html>