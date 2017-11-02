<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AJAX RSS 阅读器 </title>
	<script type="text/javascript">
		function showRss(str) {
			var out = document.getElementById("rssOutput");

			if (str.length == 0) {
				out.innerHTML = "";
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
					out.innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open("GET","getrss.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>
</head>
<body>

	<form>
		<select onchange="showRss(this.value)">
			<option value="">选择一个 RSS-feed：</option>
			<option value="rss">读取RSS的数据</option>
		</select>
	</form>
	<br>
	<div id="rssOutput">RSS-feed 数据列表...</div>

</body>
</html>