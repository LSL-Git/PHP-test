<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>过滤器 多个</title>
</head>
<body>

	<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		Name: <input type="text" name="name">
		Age: <input type="text" name="age">
		Email: <input type="text" name="email">
		<input type="submit" name="submit" value="提交">
	</form>

	<?php 
		function convertSpace($value)
		{
			return str_replace("_", " ", $value) . "<br>";
		}

		$filters = array(
			"name" => array(
				"filter" => FILTER_SANITIZE_STRING
			),
			"age" => array(
				"filter" => FILTER_VALIDATE_INT,
				"options" => array(
					"min_range" => 1,
					"max_range" => 120
				)
			),
			"email" => FILTER_VALIDATE_EMAIL,
		);

		$result = filter_input_array(INPUT_GET, $filters);
		$string = "Peter_is_a_great_guy!";

		// var_dump($result);
		if (!$result["age"]) {
			echo "Age must be a number between 1 and 120 .<br>";
		} else {
			echo "Age is valid.<br>";
		}
		if (!$result["email"]) {
			echo "Email is not valid.<br>";
		} else {
			echo "Email is valid.<br>";
		}
		if (!$result["name"]) {
			echo "User input is not valid.<br>";
		} else {
			echo "User input is valid.<br>";
		}
		// print_r(array("options" => "convertSpace"));				
		echo filter_var($string, FILTER_CALLBACK, array("options" => "convertSpace"));
	 ?>

</body>
</html>