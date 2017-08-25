<?php
	$conn = mysqli_connect('localhost','root','123456');
	if(mysqli_errno($conn)){
	echo mysqli_errno($conn);
	exit;
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	$sql_insert_task = "insert into goods(type,smallurl) values('服饰','images/youke/".$_FILES["file"]["name"]."')";
	if ((($_FILES['file']["type"] == "image/gif") 
	|| ($_FILES["file"]["type"] == "image/JPG")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/jpeg") 
	|| ($_FILES["file"]["type"] == "image/pjpeg")) 
	&& ($_FILES["file"]["size"] < 100000)) 
	{ 
		if ($_FILES["file"]["error"] > 0) 
		{ 
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; 
		} 
		else 
		{ 
			echo "Upload: " . $_FILES["file"]["name"] . "<br />"; 
			echo "Type: " . $_FILES["file"]["type"] . "<br />"; 
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />"; 
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"; 
		if (file_exists("images/youke/" . $_FILES["file"]["name"])) 
		{ 
			echo $_FILES["file"]["name"] . " already exists. "; 
		} 
		else 
		{ 
			move_uploaded_file($_FILES["file"]["tmp_name"], 
			"images/youke/" . $_FILES["file"]["name"]); 
			mysqli_query($conn,$sql_insert_task);
			echo "Stored in: " . "images/youke/" . $_FILES["file"]["name"]; 
			
		} 
		} 
	} 
	else 
	{ 
		echo "Invalid file"; 
	} 
?>