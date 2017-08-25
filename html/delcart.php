<?php
	session_start();
$id = $_GET['id'];
$arr = $_SESSION['gwc'];
$arr[$id];
if($arr[$id][1] > 1){
	$arr[$id][1] = $arr[$id][1] - 1;
	$_SESSION['gwc'] = $arr;
	exit("<script type='text/javascript'>alert('删除成功！');history.go(-1);</script>");
}
else{
	unset($arr[$id]);
	$_SESSION['gwc'] = $arr;
	exit("<script type='text/javascript'>alert('删除成功！');history.go(-1);</script>");
}

?>