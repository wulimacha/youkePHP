<?php
if(trim($_POST['register-password']) != trim($_POST['register-cofpassword'])){
	exit('两次密码不一致，请重新输入！');
}
$username = trim($_POST['register-phone']);
$password = md5(trim($_POST['register-password']));
$time = time();
$ip = $_SERVER['REMOTE_ADDR'];
$conn = mysqli_connect('localhost','root','123456');
if(mysqli_errno($conn)){
	echo mysqli_errno($conn);
	exit;
}
mysqli_select_db($conn,'php');
mysqli_set_charset($conn,'utf8');

$sql_check_username = "select username from user where username = '".$username."'";
$result = mysqli_query($conn,$sql_check_username);
if($result && mysqli_num_rows($result)){
	exit ("<script type='text/javascript'>alert('用户已存在！');history.go(-1);</script>");
}
else{
	$sql_insert_user = "insert into user(username,password,createtime,createip) 
values ('".$username."','".$password."','".$time."','".$ip."')";

$result = mysqli_query($conn,$sql_insert_user);

if($result){
	$sql_select_id = "select id from user where username = '".$username."'";
	$result1 = mysqli_query($conn,$sql_select_id);
	if($result1 && mysqli_num_rows($result1)){
		$row1 = mysqli_fetch_assoc($result1);
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['userid'] = $row1['id'];
	}
	
	exit ("<script type='text/javascript'>alert('注册成功！');history.go(-1);</script>");
}
else{
	exit ("<script type='text/javascript'>alert('注册失败！');history.go(-1);</script>");
}
}

/*$sql_insert_user = "insert into user(username,password,createtime,createip) 
values ('".$username."','".$password."','".$time."','".$ip."')";

$result = mysqli_query($conn,$sql_insert_user);

if($result){
	echo '成功';
}
else{
	echo '失败';
}*/
//echo '当前用户插入的ID为'.mysqli_insert_id($conn);
mysqli_close($conn);
?>