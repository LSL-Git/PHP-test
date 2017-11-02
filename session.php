<!DOCTYPE html>
<?php 
	session_start(); // 启用会话
	//$_SESSION['view'] = 1; // 存储会话数据
	$_SESSION['name'] = "瞌睡虫";

	if (isset($_SESSION['view'])) {
		$_SESSION['view'] = $_SESSION['view'] + 1;
		echo "欢迎回来！" . $_SESSION['name'] . ' +' . $_SESSION['view'];
	} else {
		echo "你好:" . $_SESSION['name'] . ",初次见面!";
		$_SESSION['view'] = 0;
	}
 ?>

<html>
<head>
	<meta charset="utf-8">
	<title>Session的基础用法</title>
</head>
<body>

	<?php 
		// 检索会话数据
		echo "<br>PageViews:" . $_SESSION['view'];
	 ?>

 	<?php 
		//unset($_SESSION['view']); // 释放制定session变量
	 ?>

	<?php 
		//session_destroy(); // 彻底删除session
	 ?>
</body>
</html>