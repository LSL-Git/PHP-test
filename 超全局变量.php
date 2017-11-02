<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>超全局变量</title>
</head>
<body>

	<?php 
		var_dump($_SESSION);
		// var_dump($_COOKIE);
	 ?>

	<h3>method='post'</h3>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Name:<input type="text" name="uname">
		<input type="submit" name="submit">
	</form>

	<h3>$_REQUEST</h3>
	<?php 
		$name = $_REQUEST['uname'];
		echo "Name:" . $name;
	 ?>

	<h3>$_POST</h3>
	<?php 
		$name2 = $_POST['uname'];
		echo "Name2:" . $name2;
	 ?>


	<h3>$_GET</h3>
	<?php 
		$name3 = $_GET['uname'];
		echo "Name2:" . $name3;
	 ?>

</body>
</html>