<?php 
	$q = $_GET["q"];

	// 创建DOM对象
	$xmlDoc = new DOMDocument();
	// 加载xml文件到DOM对象中
	$xmlDoc -> load("cd_catalog.xml");
	// 获取xml文档下所有<ARTIST>元素
	$x = $xmlDoc -> getElementsByTagName("ARTIST");

	$y = null;

	for ($i = 0; $i < $x -> length; $i++) {
		# 处理元素节点 对比每个 artist 元素是否与$q 相等
		if ($x -> item($i) -> childNodes -> item(0) -> nodeValue == $q) {
			// 获取对应元素的父节点 即<CD>节点
			$y = ($x -> item($i) -> parentNode);
		}
	}

	if (!is_null($y)) {
		// 获取cd节点的所有子节点
		$cd = ($y -> childNodes);

		for ($i = 0; $i < $cd -> length; $i++) { 
			# 显示子节点的内容
			if ($cd -> item($i) -> nodeType == 1) {
				echo "<b>" . $cd -> item($i) -> nodeName . ":</b>";
				echo $cd -> item($i) -> childNodes -> item(0) -> nodeValue . "<br>";
			}
		}
	} else {
		echo "内容已丢失~！";
	}
	
 ?>