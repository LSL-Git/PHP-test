<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>练习1</title>
</head>
<body>

	<h3>php变量对大小写敏感 且单引号等价双引号</h3>
	
	<?php 
		$color='red';
		echo 'My car is '  .$color."<br>";
		echo "My house is" .$COLOR."<br>"; //没有定义变量的会报错
		echo "My boat is" .$Color."<br>";
	?>

	<h3>变量信息的容器 </h3>
	<?php 
	$x = 5;
	$y = 6;
	$z = $x + $y;
	echo $z;
	?>

	<h3>PHP 变量规则：</h3>
		<h4>•变量以 $ 符号开头，其后是变量的名称</h4>
		<h4>•变量名称必须以字母或下划线开头</h4>
		<h4>•变量名称不能以数字开头</h4>
		<h4>•变量名称只能包含字母数字字符和下划线（A-z、0-9 以及 _）</h4>
		<h4>•变量名称对大小写敏感（$y 与 $Y 是两个不同的变量</h4>
 

	<h3>全局变量与局部变量,定义函数,使用global关键字函数可访问全局变量</h3>
	<?php 
	$x = 5; // 全局作用域
	function MyFunction() {
		$Y = 7; // 局部作用域
		global $x;
		echo "<p>测试函数内部的变量</p>";
		echo "变量x是: $x<br>";
		echo "变量y是:$Y";
	}

	MyFunction();

	echo "<p>测试函数外部的变量</p>";
	echo "变量x是:$x<br>";
	echo "变量y是:$Y";
	?>

	<h3>$GLOBALS[index]的数组中存储了所有的全局变量。下标存有变量名。这个数组在函数内也可以访问，并能够用于直接更新全局变量</h3>

	<?php 
		$i = 20;
		$j = 32;

		function MyTest() {
			$GLOBALS['j'] = $GLOBALS['i'] + $GLOBALS['j'];
		}

		MyTest();
		echo $i;
		echo "<br/>";
		echo $j;
	 ?>

	 <h3> static 关键词</h3>
	 <h4>•echo - 能够输出一个以上的字符串
		•print - 只能输出一个字符串，并始终返回 1</h4>

	 <?php 
	 	function MyTest2() {
	 		static $h = 9;
	 		echo $h;
	 		echo "<br/>";
	 		$h++;
	 	}

	 	MyTest2();
	 	MyTest2();
	 	MyTest2();

	 	$q = print('arg<br/>');
	 	echo $q;
	  ?>

	  <?php 
	  	$car = array('Volvo', 'BMW', 'SAAB',12);
	  	echo "string " , "int ", "float ", 'double ', 'bool ', 'char ', "byte";
	 	echo "<br/>";
	  	echo "My car is a {$car[0]}<br/>";

	  	var_dump($car);
	   ?>

	   <h3>strlen() 函数返回字符串的长度，以字符计。</h3>

	   <?php 
	   		echo strlen("string");
	    ?>

	    <h3>strpos() 函数用于检索字符串内指定的字符或文本。</h3>

	    <?php 
	    	echo strpos("hello world", 'world');
	     ?>

	<h3>如需设置常量，请使用 define() 函数 - 它使用三个参数：</h3>
	     <pre>	     	
1.首个参数定义常量的名称
2.第二个参数定义常量的值
3.可选的第三个参数规定常量名是否对大小写敏感。默认是 false。
	     </pre>

	     <?php 
	     	define('G', 'Welcome to my php page!');
	     	echo G;
	     	echo "<br/>";
	     	define('f', 'Hello PHP', true);
	     	echo f;
	     	echo "<br/>";
	     	echo F;
	      ?>

</body>
</html>