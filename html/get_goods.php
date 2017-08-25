<?php
	$brand = trim($_POST['brand']);
	$placeofpro = trim($_POST['placeofpro']);
	$type = trim($_POST['type']);
	$keyword = trim($_POST['keyword']);
	$price = trim($_POST['price']);
	$sendofpro = trim($_POST['sendofpro']);
	$description = trim($_POST['description']);
	$quantity = $_POST['quantity'];
	session_start();
	$userid = $_SESSION['userid'];
	$conn = mysqli_connect('localhost','root','123456');
	
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	if ((($_FILES['file']["type"] == "image/gif") 
	|| ($_FILES["file"]["type"] == "image/JPG")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/jpeg") 
	|| ($_FILES["file"]["type"] == "image/pjpeg")) 
	&& ($_FILES["file"]["size"] < 100000)) 
	{ 
		if ($_FILES["file"]["error"] > 0) 
		{ 
			exit ("<script type='text/javascript'>alert('" . $_FILES["file"]["error"] . "');history.go(-1);</script>");
		} 
		else 
		{ 
		if (file_exists("images/youke/goods/" . $_FILES["file"]["name"])) 
		{ 
			exit ("<script type='text/javascript'>alert('文件".$_FILES["file"]["name"]."已存在！');history.go(-1);</script>");
		} 
		else 
		{ 
			move_uploaded_file($_FILES["file"]["tmp_name"], 
			"images/youke/goods/" . $_FILES["file"]["name"]); 			
		} 
		} 
	} 
	else 
	{ 
		exit ("<script type='text/javascript'>alert('文件格式不符合要求！');history.go(-1);</script>");
	} 

$sql_insert_goods = "insert into goods(brand,type,placeofpro,keyword,price,sendofpro,description,quantity,userid,smallurl)
values('".$brand."','".$type."','".$placeofpro."','".$keyword."',".$price.",'".$sendofpro."','".$description."',
".$quantity.",".$userid.",'images/youke/goods/".$_FILES["file"]["name"]."')";
$result = mysqli_query($conn,$sql_insert_goods);
if($result){
	exit ("<script type='text/javascript'>alert('发布成功！');history.go(-1);</script>");
}
else{
	exit ("<script type='text/javascript'>alert('发布失败！');history.go(-1);</script>");
}
mysqli_close($conn);
?>