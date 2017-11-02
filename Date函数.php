<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Date()函数</title>
</head>
<body>

	<pre>
•d - 表示月里的某天（01-31）
•m - 表示月（01-12）
•Y - 表示年（四位数）
•1 - 表示周里的某天
	</pre>

	<?php 
		echo "现在日期是:" . date("Y/m/d") . "<br>";
		echo "现在日期是:" . date("Y.m.d") . "<br>";
		echo "现在日期是:" . date("Y-m-d") . "<br>";
		echo "现在是:" . date("l") . "<br>";
	 ?>

<pre>
•h - 带有首位零的 12 小时小时格式
•i - 带有首位零的分钟
•s - 带有首位零的秒（00 -59）
•a - 小写的午前和午后（am 或 pm）
</pre>
	
	<?php 
		// 设置默认时区
		// Asia/Shanghai – 上海 
		// Asia/Chongqing – 重庆 
		// Asia/Urumqi – 乌鲁木齐 
		// Asia/Hong_Kong – 香港 
		// Asia/Macao – 澳门 
		// Asia/Taipei – 台北 
		// Asia/Singapore – 新加坡 
		date_default_timezone_set("Asia/Shanghai");
		echo "现在的时间是:" . date("h:i:s a");

		// echo "time:" . date('Y-m-d h:i:s a l');
	 ?>

	<h3>通过 PHP mktime() 创建日期</h3>
	<?php 
		$d = mktime(22, 28, 03, 9, 22, 2017);
		echo "创建日期是:" . date("Y-m-d h:i:s a", $d);
	 ?>

	<h3>通过 PHP strtotime() 用字符串来创建日期</h3>
	<?php 
		$d2 = strtotime("10:32 pm Sep 22 2017");
		echo "创建日期是:" . date("Y-m-d h:i:s a", $d2) . "<br>";

		$d3 = strtotime("tomorrow");
		echo "明天日期:" . date("Y-m-d h:i:s a", $d3) . "<br>";

		$d4 = strtotime("next Sat");
		echo "下周星期六日期是:" . date("Y-m-d h:i:s a", $d4) . "<br>";

		$d5 = strtotime("+3 Months");
		echo "三个月后现在的时间:" . date("Y-m-d h:i:s a", $d5) . "<br>";

		$startdate = strtotime("Saturday"); // 这周星期六
		$enddate = strtotime("+6 weeks",$startdate); // 六周后的星期六

		while ($startdate < $enddate) {
		  echo date("M d", $startdate),"<br>";
		  $startdate = strtotime("+1 week", $startdate);
		}

		$d1 = strtotime("October 31");
		$d2 = ceil(($d1 - time())/60/60/24);
		echo "距离十月三十一日还有：" . $d2 ." 天。";

		// echo "time()" . time() ;
	 ?>

</body>
</html>