<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>数组的使用</title>
</head>
<body>

	<h3>索引数组</h3>
	<?php 
		$cars = array('Volvo', 'BMW', 'SAAB');
		echo "I like " . $cars[0] . '、' . $cars[1] . ' and ' . $cars[2] . '. <br />';
		echo '该数组长度为:' . count($cars) . '<br/>'; // count() 获取数组长度
		echo "便历数组<br/>";

		for ($i=0; $i < count($cars); $i++) { 
			echo "$cars[$i]" . '<br/>';
		}
	 ?>

	<h3>关联数组</h3>
	<?php 
		$age = array('Peter' => 24 , 'Ben' => '32', 42 => 'Joe');

		echo $age['Peter'];
		echo "<br/>";
		echo $age['Ben'];
		echo "<br/>";
		echo $age[42];
		echo "<br/> 遍历关联数组 <br/>";
		foreach ($age as $key => $value) {
			echo "Key = " . $key . ', value = ' . $value;
			echo "<br/>";
		}
	 ?>

	<h3>多维数组</h3>
	<?php 
		$info = array (
			array('Volvo', 22, 'Yellow'),
			array('BMW', 32, 'Black'),
			array('SAAB', 44, 'Red'),
			array('Lan Rover', 23, 'Green')
		);

		echo $info[0][0] . ": 库存: " . $info[0][1] . ' :颜色: ' . $info[0][2] . '<br>';
		echo $info[1][0] . ": 库存: " . $info[1][1] . ' :颜色: ' . $info[1][2] . '<br>';
		echo $info[2][0] . ": 库存: " . $info[2][1] . ' :颜色: ' . $info[2][2] . '<br>';
		echo $info[3][0] . ": 库存: " . $info[3][1] . ' :颜色: ' . $info[3][2] . '<br>';
		echo '遍历二维数组<br>';

		for ($row = 0; $row < count($info); $row++) { 
			for ($col = 0; $col < count($info[$row]); $col++) { 
				echo $info[$row][$col] . ' : ';
				if ($col == 2) {
					echo "<br>";
				}
			}
		}
	 ?>


</body>
</html>