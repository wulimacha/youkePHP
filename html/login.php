<?php
$username = trim($_POST['login-phone']);
$password = md5(trim($_POST['login-password']));
$conn = mysqli_connect('localhost','root','123456');
if(mysqli_errno($conn)){
	echo mysqli_errno($conn);
	exit;
}
mysqli_select_db($conn,'php');
mysqli_set_charset($conn,'utf8');
$sql_select = "select id,username,password from user where username = '".$username."'";
$result = mysqli_query($conn,$sql_select);
if($result && mysqli_num_rows($result)){
$row = mysqli_fetch_assoc($result);
		if($password == $row['password'] ){
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['userid'] = $row['id'];
			exit ("<script type='text/javascript'>alert('登录成功！');history.go(-1);</script>");
		}
		else{
			exit ("<script type='text/javascript'>alert('密码错误！');history.go(-1);</script>");
		}
	;
	
}
else{
	exit ("<script type='text/javascript'>alert('登录失败，用户未注册！');history.go(-1);</script>");
}
?>