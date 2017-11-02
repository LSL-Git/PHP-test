<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>数组排序</title>
</head>
<body>

	<h3>sort()数组按首字或数字母升序</h3>
	<?php 
		$cars = array('Volvo', 'BMW', 'SAA');
		$age = array(2,3,43,32,2,3,43,32,44);

		sort($cars);
		sort($age);

		for ($i = 0; $i < count($cars); $i++) { 
			echo "$cars[$i]" . '<br>';
		}

		for ($j = 0; $j < count($age); $j++) { 
			echo "$age[$j]" . '<br>';
		}
	 ?>

	 <h3>rsort()数组按首字或数字母降序</h3>
	<?php 
		$cars = array('Volvo', 'BMW', 'SAA');
		$age = array(2,3,43,32,2,3,43,32,44);

		rsort($cars);
		rsort($age);

		for ($i = 0; $i < count($cars); $i++) { 
			echo "$cars[$i]" . '<br>';
		}

		for ($j = 0; $j < count($age); $j++) { 
			echo "$age[$j]" . '<br>';
		}
	 ?>

	<h3>根据值对数组进行升序排序 - asort()</h3>
	<?php 
		$arr = array('A' => 3, 'B' => 4, 'C' => 1);
		asort($arr);

		foreach ($arr as $key => $value) {
			echo "Key = " . $key . ' value = ' . $value . '<br />';
		}
	 ?>

	<h3>根据键对数组进行升序排序 - ksort()</h3>
	<?php 
		$arr = array('A' => 3, 'B' => 4, 'C' => 1);
		ksort($arr);

		foreach ($arr as $key => $value) {
			echo "Key = " . $key . ' value = ' . $value . '<br />';
		}
	 ?>

	<h3>根据值对数组进行降序排序 - arsort()</h3>
	<?php 
		$arr = array('A' => 3, 'B' => 4, 'C' => 1);
		arsort($arr);

		foreach ($arr as $key => $value) {
			echo "Key = " . $key . ' value = ' . $value . '<br />';
		}
	 ?>

	<h3>根据键对数组进行降序排序 - krsort()</h3>
	<?php 
		$arr = array('A' => 3, 'B' => 4, 'C' => 1);
		krsort($arr);

		foreach ($arr as $key => $value) {
			echo "Key = " . $key . ' value = ' . $value . '<br />';
		}
	 ?>

</body>
</html>