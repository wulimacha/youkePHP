<?php
	session_start();
$id = $_GET['id'];
$conn = mysqli_connect('localhost','root','123456');
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	
	if($id){
		$sql_search_goods = "select * from task where id = ".$id." and userid = ".$_SESSION['userid']."";
	$result = mysqli_query($conn,$sql_search_goods);
	if($result){
		if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class=\"row\">";
				echo "<div class=\"col-lg-2 col-md-2 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-calendar\" style=\"color: red;\"></span>2017-07-25</div>";
				echo "<div class=\"col-lg-4 col-md-4 col-sm-4 textcenter\">订单号：".$row['id']."</div>";
				echo "<div class=\"col-lg-2 col-md-3 col-sm-2 textcenter\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['username']."</div>";
				echo "<div class=\"col-lg-2 col-md-3 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-comment\" style=\"color: cornflowerblue;\"></span>在线咨询</div>";
				echo "</div>";
				echo "<div class=\"row\" style=\"border: 1px solid #E0E0E0;height: 150px;\">";
				echo "<div class=\" col-md-2 col-sm-2\" style=\"padding: 15px;\">";
				echo "<img class=\"img-style\" src=../".$row['smallurl']." style=\"width: 100px\"/>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"margin-top: 50px;\">";
				echo "<p>".$row['remarks']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-1 col-md-1 col-sm-1\" style=\"margin-top: 50px;\">";
				echo "<p class=\"titleh\">&yen;".$row['price']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-1 col-md-1 col-sm-1\" style=\"margin-top: 50px;\">";
				echo "<p class=\"titleh1\">".$row['quantity']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;\">";
				echo "<p>&yen;".$row['price']."</p>";
				echo "<p>包邮</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;\">";
				echo "<p>98%</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;\">";
				echo "<a href=\"javascript:void(0);\"><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 14px;width: 100%\">确认完成</button></a>";
				echo "<a href=\"javascript:void(0);\" onclick=\"show_mytask(".$row['id'].",'mytask')\"><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 15px;width: 100%;margin-top: 10px;\">删除请求</button></a>";											
				echo "</div>";											
				echo "</div>";
			}
		}
		else{
			echo "没有此订单！";
		}
	}
	else{
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	}
	else if($id == ""){
		$sql_select_goods = "select * from task where userid = ".$_SESSION['userid']."";
		$result = mysqli_query($conn,$sql_select_goods);
		if($result && mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class=\"row\">";
				echo "<div class=\"col-lg-2 col-md-2 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-calendar\" style=\"color: red;\"></span>2017-07-25</div>";
				echo "<div class=\"col-lg-4 col-md-4 col-sm-4 textcenter\">订单号：".$row['id']."</div>";
				echo "<div class=\"col-lg-2 col-md-3 col-sm-2 textcenter\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['username']."</div>";
				echo "<div class=\"col-lg-2 col-md-3 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-comment\" style=\"color: cornflowerblue;\"></span>在线咨询</div>";
				echo "</div>";
				echo "<div class=\"row\" style=\"border: 1px solid #E0E0E0;height: 150px;\">";
				echo "<div class=\" col-md-2 col-sm-2\" style=\"padding: 15px;\">";
				echo "<img class=\"img-style\" src=../".$row['smallurl']." style=\"width: 100px\"/>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"margin-top: 50px;\">";
				echo "<p>".$row['remarks']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-1 col-md-1 col-sm-1\" style=\"margin-top: 50px;\">";
				echo "<p class=\"titleh\">&yen;".$row['price']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-1 col-md-1 col-sm-1\" style=\"margin-top: 50px;\">";
				echo "<p class=\"titleh1\">".$row['quantity']."</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;\">";
				echo "<p>&yen;".$row['price']."</p>";
				echo "<p>包邮</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;\">";
				echo "<p>98%</p>";
				echo "</div>";
				echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;\">";
				echo "<a href=\"javascript:void(0);\"><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 14px;width: 100%\">确认完成</button></a>";
				echo "<a href=\"javascript:void(0);\" onclick=\"show_mytask(".$row['id'].",'mytask')\"><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 15px;width: 100%;margin-top: 10px;\">删除请求</button></a>";											
				echo "</div>";											
				echo "</div>";
			}
		}
	}
	
?>