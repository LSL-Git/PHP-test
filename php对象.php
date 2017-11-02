<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP对象</title>
</head>
<body>

	<?php 
		/**
		* 
		*/
		class Car
		{
			var $color;
			function Car($color = 'green')
			{
				$this->color = $color;
			}

			function what_color() {
				return $this->color;
			}
		}

		function print_vars($obj) {
			// get_object_vars 获取对象的值 $prop对象属性  $val 属性对应的值
			foreach (get_object_vars($obj) as $prop => $val) {
				echo "\t$prop = $val\n";
			}
		}

		// 实例化一个对象
		$herbie = new Car('Red');
		// 显示属性
		echo "\herbie: Properties\n";
		print_vars($herbie);
	 ?>

</body>
</html>