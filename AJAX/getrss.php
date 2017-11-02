<?php 
	print_r($_GET);

	$xmlDoc = new DOMDocument();
	$xmlDoc -> load("rss_demo.xml");

	// 读取channel中的元素
	$channel = $xmlDoc -> getElementsByTagName('channel') -> item(0);
	$channel_title = $channel -> getElementsByTagName('title') -> item(0) -> childNodes -> item(0) -> nodeValue;
	$channel_link = $channel -> getElementsByTagName('link') -> item(0) -> childNodes -> item(0) -> nodeValue;
	$channel_desc = $channel -> getElementsByTagName('description') -> item(0) -> childNodes -> item(0) -> nodeValue;

	echo "<p><a href='" . $channel_link . "'>" . $channel_title . "</a>";
	echo("<br>");
	echo($channel_desc . "</p>");

	$x = $xmlDoc -> getElementsByTagName("item");
	// 输出 "<item>" 中的元素
	for ($i = 0; $i < $x -> length; $i++) { 
		$item_title = $x -> item($i) -> getElementsByTagName('title') -> item(0) -> childNodes -> item(0) -> nodeValue;
		$item_link = $x -> item($i) -> getElementsByTagName('link') -> item(0) -> childNodes -> item(0) -> nodeValue;
		$item_desc = $x -> item($i) -> getElementsByTagName('description') -> item(0) -> childNodes -> item(0) -> nodeValue;
		echo "<p><a href='" . $item_link . "'>" . $item_title . "</a>";
		echo("<br>");
		echo($item_desc . "</p>");
	}
 ?>