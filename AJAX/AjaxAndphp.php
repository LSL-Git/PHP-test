<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ajax 与 PHP</title>
	<script type="text/javascript">
		function showHint(str) {
			if (str.length == 0) { // 当输入字符长度为0时 显示 ""
				document.getElementById('txtHint').innerHTML = "";
				return;
			}

			if (window.XMLHttpRequest) {
				// IE+7. Firefox, Chrome, Opera, Safari 浏览器执行的代码
				xmlhttp = new XMLHttpRequest(); // 创建XMLHttpRequest对象
			} else {
				// IE6, IE5 浏览器执行的代码
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			// 创建在服务器响应就绪时执行的函数
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
				}
			}
			// url末端 参数q包含输入内容
			xmlhttp.open("GET", "gethint.php?q=" + str, true); 
			// 向服务器上的文件发送请求
			xmlhttp.send(); 
		}
	</script>
</head>
<body>

	<p><b>在文本框中输入一个姓名:</b></p>
	<form action="">
		姓名:<input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>返回值:<span id="txtHint"></span></p>


</body>
</html>