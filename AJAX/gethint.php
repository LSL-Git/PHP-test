<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
	<?php 
		// 将姓名填充到数组中
		$a[]="Anna";
		$a[]="Brittany";
		$a[]="Cinderella";
		$a[]="Diana";
		$a[]="Eva";
		$a[]="Fiona";
		$a[]="Gunda";
		$a[]="Hege";
		$a[]="Inga";
		$a[]="Johanna";
		$a[]="Kitty";
		$a[]="Linda";
		$a[]="Nina";
		$a[]="Ophelia";
		$a[]="Petunia";
		$a[]="Amanda";
		$a[]="Raquel";
		$a[]="Cindy";
		$a[]="Doris";
		$a[]="Eve";
		$a[]="Evita";
		$a[]="Sunniva";
		$a[]="Tove";
		$a[]="Unni";
		$a[]="Violet";
		$a[]="Liza";
		$a[]="Elizabeth";
		$a[]="Ellen";
		$a[]="Wenche";
		$a[]="Vicky";

		######### 将数据库中的数据也添加到 $a[] 列表中
		//gbk 转 utf-8
		function enc($c){
			return iconv('gbk','utf-8',$c); 
		}

		$conn = odbc_connect("myAccess", "", "");
		$sql = "select Name from Dang";
		$rs = odbc_exec($conn, $sql);
		while (odbc_fetch_row($rs)) {
			// enc函数用于调节字符类型,防止乱码
			$a[] = enc(odbc_result($rs, "Name"));
		}
		##########

		// 从请求URL地址中获取 q 参数
		$q = $_GET["q"]; 

		// 如果 q > 0 查找是否有匹配的字符串
		if (strlen($q) > 0) {
			$hint = "";
			for ($i = 0; $i < count($a); $i++) { 
				// strtolower 将大写转换成小写  从 a 中截取和 b 长度相同的字符串 并比较是否相等,相等则将a赋给hint
				if (strtolower($q) == strtolower(substr($a[$i], 0, strlen($q)))) {
					if ($hint == "") {
						$hint = $a[$i];
					} else {
						$hint = $hint . " , " . $a[$i];
					}
				}
			}
		}
		
		// 如果没有匹配值设置输出为 "no suggestion" 
		if ($hint == "") {
			$response = "No Suggestion";
		} else {
			$response = $hint;
		}

		//输出返回值
		echo $response;

		// print_r($a);
	 ?>
 </body>
 </html>