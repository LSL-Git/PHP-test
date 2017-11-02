<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>XML 解析器</title>
</head>
<body>

	<h1>Expat 解析器</h1>

	<?php 
		// 创建 XML 解析器
		$parser = xml_parser_create();

		// 元素开始时使用的函数
		function start($parser, $ele_name, $ele_attrs)
		{
			switch ($ele_name) {
				case 'NOTE':
					echo "-- NOTE --<br>";
					break;
				case 'TO':
					echo "To:";
					break;
				case 'FROM':
					echo "From:";
					break;
				case 'HEADING':
					echo "Heading:";
					break;
				case 'BODY':
					echo "Message:";
					break;
			}
		}
		// 元素结束时使用的函数
		function stop($parser, $ele_name)		
		{
			echo "<br>";
		}
		// 查找字符数据时使用的函数
		function char($parser, $data)
		{
			echo $data;
		}
		// 指定元素处理程序为 start() 和 stop() 函数
		xml_set_element_handler($parser, "start", "stop");
		// 制定数据处理程序为 char() 函数
		xml_set_character_data_handler($parser, "char");
		// 打开xml文件.模式为 r 只读
		$fp = fopen("test.xml", "r");

		// 便历输出数据
		while ($data = fread($fp, 4096)) {
			xml_parse($parser, $data, feof($fp)) or //使用xml解析器解析数据
			die(sprintf("XML Error: %s at line %d",
			xml_error_string(xml_get_error_code($parser)), // 出错代码
			xml_get_current_line_number($parser))); // 出错位置
		}

		echo "string☺😘<br>";

		// 释放xml解析器
		xml_parser_free($parser);
	 ?>

	 <h1>XML DOM</h1>

	<?php 
		// 初始化xml解析器
		$xmlDoc = new DOMDocument();
		// 加载xml
		$xmlDoc -> load("test.xml");

		print($xmlDoc -> saveXML() . "<br>");

		$x = $xmlDoc->documentElement;
		foreach ($x->childNodes AS $item)
		{
			print $item->nodeName . " = " . $item->nodeValue . "<br>";
		}
	 ?>

	<h1>SimpleXML</h1>
	<?php 
		$xml = simplexml_load_file("test.xml");
		print_r($xml);

		echo "<br>Heading:" . $xml -> heading; // 获取指定元素
	 ?>


</body>
</html>