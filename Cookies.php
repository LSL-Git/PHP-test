<!DOCTYPE html>
<?php 
	setcookie("user", "瞌睡虫", time() + 3600); // 创建cookie 设置保存时间为1小时
	setcookie("psw", '12345', time() + 3600);
	if (isset($_COOKIE['user'])) { // 判断是存在user
		echo "Welcome: " . $_COOKIE['user'] . '<br>';
	} else {
		echo "Welcome guest!";
	}
	//setcookie('user','',time() - 3600); // 删除cookie 将时间设置到1小时前
 ?> 
<html>
<head>
	<meta charset="utf-8">
	<title>Cookies的基础用法</title>
</head>
<body>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		请输入密码:
		<input type="text" name="psw">
		<input type="submit" name="submit" value="提交">
	</form>

	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (!empty($_POST["psw"])) {
				// $_COOKIE['psw'] 可以获取到 cookie中"psw"的值
				if ($_POST["psw"] == $_COOKIE['psw']) {
					echo "<h2>登陆成功</h2>";
				} else {
					echo "密码错误!<br>";
				}
			} else {
				echo "密码不能为空!<br>";
			}
		}
		//echo "<br>Cookie Value:" . $_COOKIE['user'] . '<br>'; // 查看cookie的值

		print_r($_COOKIE); // 查看所有cookie
	 ?>

</body>
</html>