<?php
session_start();

 $conn = mysqli_connect('localhost','root','123456');
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	
$ids = $_GET["ids"];
 
if(empty($_SESSION["gwc"]))
{
    //1.购物车是空的，第一次点击添加购物车
    $arr = array(
        array($ids,1)
    );
    $_SESSION["gwc"]=$arr;
    exit("<script type='text/javascript'>alert('加入购物车成功！');history.go(-1);</script>");
}
else
{
    //不是第一次点击
    //判断购物车中是否存在该商品
    $arr = $_SESSION["gwc"]; //先存一下
 
    $chuxian = false;
    foreach($arr as $v)
    {
        if($v[0]==$ids)
        {
            $chuxian = true;
        }
    }
 
    if($chuxian)
    {
        //3.如果购物车中有该商品
 
        for($i=0;$i<count($arr);$i++)
        {
            if($arr[$i][0]==$ids)
            {
                $arr[$i][1]+=1;
            }
        }
 		
        $_SESSION["gwc"] = $arr;
        exit("<script type='text/javascript'>alert('加入购物车成功！');history.go(-1);</script>");
    }
    else
    {
        //2.如果购物车中没有该商品
        $asg = array($ids,1);
        $arr[] = $asg;
        $_SESSION["gwc"] = $arr;
        exit("<script type='text/javascript'>alert('加入购物车成功！');history.go(-1);</script>");
    }
 
}
?>