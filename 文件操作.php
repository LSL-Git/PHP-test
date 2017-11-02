<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文件的操作</title>
</head>
<body>

	<?php 
		#r 打开文件为只读。文件指针在文件的开头开始。 
		#w 打开文件为只写。删除文件的内容或创建一个新的文件，如果它不存在。文件指针在文件的开头开始。 
		#a 打开文件为只写。文件中的现有数据会被保留。文件指针在文件结尾开始。创建新的文件，如果文件不存在。 
		#x 创建新文件为只写。返回 FALSE 和错误，如果文件已存在。 
		#r+ 打开文件为读/写、文件指针在文件开头开始。 
		#w+ 打开文件为读/写。删除文件内容或创建新文件，如果它不存在。文件指针在文件开头开始。 
		#a+ 打开文件为读/写。文件中已有的数据会被保留。文件指针在文件结尾开始。创建新文件，如果它不存在。 
		#x+ 创建新文件为读/写。返回 FALSE 和错误，如果文件已存在。 

		# fopen() 打开文件 参数一：文件名  参数二：文件打开模式 r为只读 or die（） 文件打不开是的提示,且不会执行下面的代码
		$myFile = fopen("file.txt", 'r') or die('Unable to open file!');
		# fread() 读取打开的文件 参数一：读取文件的文件名 参数二：读取的最大字节
		# filesize() 可获取读取文件的字节数
		echo fread($myFile, filesize('file.txt'));
		echo "-----------------------------------------<br>";
		$myFile = fopen("file.txt", 'r') or die('Unable to open file!');
		# 读取单行文本，而且读取完一行会将指针移动到下一行，如果之前已fread过文件，则这里要重新打开文件
		echo fgets($myFile);
		echo fgets($myFile);
		# feof() 检验是否已到达文件的最后
		while(!feof($myFile)) {
			echo fgets($myFile);
		}
		echo "-----------------------------------------<br>";
		# 上边指针已读取到最后，所以得重新打开文件
		$myFile = fopen("file.txt", 'r') or die('Unable to open file!');
		# fgetc() 读取单个字符，都去完一个字符指针将移动到下一个字符
		echo fgetc($myFile);
		# fclose() 关闭文件
		fclose($myFile);
	 ?>


	<?php 
		# 模式w会覆盖原来内容
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "Hello PHP!\n";
		# fwrite（）文件写入  参数一：写入文件  参数二：写入内容
		fwrite($myfile, $txt);
		$txt = "你好 世界！";
		fwrite($myfile, $txt);
		fclose($myfile);
	 ?>
	 <br>
	 -----------------------------------------
	 <br>
	 <br>
	 <form action="upload_file.php" method="post" enctype="multipart/form-data">
	 	<label for="file">FileName:</label>
	 	<input type="file" name="file" id="file">
	 	<br>
	 	<input type="submit" name="submit" value="提交">
	 </form>

</body>
</html>