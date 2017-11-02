<?php 
	// var_dump($_FILES);

	// 限制上传文件类型
	if ((($_FILES["file"]["type"] == "image/gif") 
		|| $_FILES["file"]["type"] == "image/jpeg"  // firefox 识别jpg
		|| $_FILES["file"]["type"] == "image/pjpeg") // ie 识别jpg
		&& $_FILES["file"]["size"] < 50000) { // 上传文件小于50kb 默认最大上传大小为8388608/1024kb 即8M

		if ($_FILES["file"]["error"] > 0) {
			echo "Error:" . $_FILES["file"]["error"] . "<br>"; // 上传错误信息
		} else {
			echo "Upload:" . $_FILES["file"]["name"] . "<br>"; // 上传文件名
			echo "Type:" . $_FILES["file"]["type"] . "<br>"; // 上传文件类型
			echo "Size:" . ($_FILES["file"]["size"] / 1024) . "kb <br>"; // 上传文件大小
			echo "Temp stored in:" . $_FILES["file"]["tmp_name"] . "<br>";; // 上传文件的临时文件 传完会自动删除

			if (file_exists("upload/" . $_FILES["file"]["name"])) { // 判断是否已存在相同文件
				echo "Error:" . $_FILES["file"]["name"] . " already exists!";
			} else {
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]); // 将文件从临时文件目录复制到指定目录
				echo "Stored in:" . "upload/" . $_FILES["file"]["name"];
			}
		}	
	} else {
		echo "Invalid file!";
	}
	
 ?>