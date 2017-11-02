<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>表单验证</title>
</head>
<body>

	<?php 
		$name = $email = $gender = $comment = $website = "";
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		var_dump($_SERVER["REQUEST_METHOD"]);
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "名字不能留空!";
			} else {
				$name = text_input($_POST["name"]);
				// 检查名字是否包含字母和空格
				if (!preg_match("/^[a-zA-Z]*$/", $name)) {
					$nameErr = "只允许字母和空格!";
				}
			}
			
			if (empty($_POST["email"])) {
				$emailErr = "邮箱不能留空!";
			} else {
				$email = text_input($_POST["email"]);
				 // 检查电邮地址语法是否有效
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
					$emailErr = "邮箱地址无效!";
				}
			}
			
			if (empty($_POST["gender"])) {
				$genderErr = "性别必选!";
			} else {
				$gender = text_input($_POST["gender"]);
			}

			if (empty($_POST["website"])) {
				$website = "";
			} else {
				$website = text_input($_POST["website"]);
				 // 检查 URL 地址语言是否有效（此正则表达式同样允许 URL 中的下划线）
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
					$websiteErr = "无效的 URL";
				}
			}
			
			$comment = text_input($_POST["comment"]);
			
		}

		function text_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	 ?>


	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td>Name:</td>
				<td>
					<input type="text" name="name">
					<span style="color: red;">* <?php echo $nameErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>E-mail:</td>
				<td>
					<input type="email" name="email" placeholder="Enter Email...">
					<span style="color: red;">* <?php echo $emailErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>WebSite:</td>
				<td>
					<input type="text" name="website">
					<span style="color: red;"><?php echo $websiteErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>Sex:</td>
				<td>
					<input type="radio" name="gender" value="male">男
					<input type="radio" name="gender" value="fmale">女
					<span style="color: red;">* <?php echo $genderErr; ?></span>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					Comment:
					<br>
					<textarea name="comment" rows="5" cols="40"></textarea>
				</td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>

	<?php 
		echo "你的输入：";
		echo "<br>";
		echo 'Name:' . $name;
		echo "<br>";
		echo 'E-mail:' . $email;
		echo "<br>";
		echo 'Sex:' . $gender;
		echo "<br>";
		echo 'Comment:' . $comment;
		echo "<br>";
		echo 'WebSite:' . $website;
	 ?>

</body>
</html>