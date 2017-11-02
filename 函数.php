<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>函数定义</title>
</head>
<body>

	<?php 
		// 自定义函数需调用才会运行
		function Fun1()
		{
			echo "无参函数<br>"; 
		}

		Fun1();# 无参函数

		function Fun2($value)
		{
			echo "带参函数 一个参数 : $value <br>";
		}

		Fun2('瞌睡虫'); # 带参函数 一个参数 : 瞌睡虫 

		function Fun3($value = 'default value') {
			echo "默认参数 : $value <br>";
		}

		Fun3(); # 默认参数 : default value 
		Fun3('我是新的参数'); # 默认参数 : 我是新的参数 

		function Fun4($x, $y) {
			return $x + $y;
		}

		echo "有返回值函数, 返回值为: " . Fun4(2,5); # 有返回值函数, 返回值为: 7 
	 ?>
</body>
</html>