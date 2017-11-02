<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>include 引入文件</title>
</head>
<body>

	<h3>欢迎浏览!</h3>
	<pre>
通过 include 或 require 语句，可以将 PHP 文件的内容插入另一个 PHP 文件（在服务器执行它之前）。

include 和 require 语句是相同的，除了错误处理方面：
	•require 会生成致命错误（E_COMPILE_ERROR）并停止脚本
	•include 只生成警告（E_WARNING），并且脚本会继续
	</pre>



	<p>以下为引入文件内容</p>
	<?php //include 'footer.php'; ?>
	<?php
		require 'footer.php'; #当引用出错时不会执行下面的代码
	?>
	<?php 
		echo "<br>" . $val . ' 要使用我必须先引我进来!';
	 ?>
</body>
</html>