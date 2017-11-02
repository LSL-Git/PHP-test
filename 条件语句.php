<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>条件语句</title>
</head>
<body>

	<?php 
		$t = date('H');

		// echo $t;

		if ($t < '20') {
			echo "Have a good day!";
		} else {
			echo "Have a good nigth!";
		}

		if (false) { 
			echo "你好";
		} elseif (false) {
			echo "我好";
		} else {
			echo "大家好!";
		}

		var_dump($t);
	 ?>

	<?php 
		$x = 2;

		switch ($x) {
			case 1:
				echo "Number 1";
				break;
			
			case 2:
				echo "Number 2";
				break;

			case 3:
				echo "Number 3";
				break;

			default:
				echo "No number between 1 to 3";
				break;
		}
	?>


	<?php 
		echo "<br>";
		$y = 1;
		while ($y <= 10) {
			echo "The Number is $y <br/>";
			$y++;
		}

		$y = 1;
		do {
			echo "The Number is $y <br/>";
			$y++;
		} while ($y <= 10);
	?>

	<?php 
		for ($i=0; $i <= 10 ; $i++) { 
			echo "for 循环 $i <br>";
		}
	 ?>

	<h3>foreach 循环只适用于数组，并用于遍历数组中的每个键/值对。</h3>
	<?php 
		$arr = array('Volvo' => 'Red', 'BMW' => 'Write', 'SAAB' => 'Yellow');
		foreach ($arr as $key => $value) {
			echo "My $key the color is $value <br>";
		}
	 ?>
</body>
</html>