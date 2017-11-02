<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AJAX 与 XML </title>
	<script type="text/javascript">
		function showCD(str) {
			var txtHint = document.getElementById("txtHint");
			if (str == "") {
				txtHint.innerHTML = "";
				return;
			}

			if (window.XMLHttpRequest) {
				// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行
				xmlhttp = new XMLHttpRequest();
			} else {
				// IE6, IE5 浏览器执行
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					txtHint.innerHTML = xmlhttp.responseText;
				}
			}
			// q= 等于号左右最好不加加空格 否则获取时写['q'] 读不到传输的数据
			xmlhttp.open("GET", "getxml.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>
</head>
<body>

	<form>
		<select name="cds" onchange="showCD(this.value)">
			<option value="">选择一个CD：</option>
			<option value="Bob Dylan">Bob Dylan</option>
			<option value="Joe Cocker">Joe Cocker</option>
			<option value="Dolly Parton">Dolly Parton</option>
		</select>
	</form>

	<div id="txtHint"><b>CD信息将在这里列出...</b></div>

</body>
</html>