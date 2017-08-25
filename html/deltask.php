<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost','root','123456');
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	$sql_deltask = "delete from task where id = $id";
	$result = mysqli_query($conn,$sql_deltask);
	if($result){
		exit("<script type='text/javascript'>alert('删除成功！');history.go(-1);</script>");
	}
	else{
		exit("<script type='text/javascript'>alert('删除失败！');history.go(-1);</script>");
	}
?>