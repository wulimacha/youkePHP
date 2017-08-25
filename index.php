<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet" />
		<link href="css/buttoncss.css" rel="stylesheet" />
		<link href="css/index_css.css" rel="stylesheet" />
	</head>

	<body>
		<!--导航条-start-->
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="background-color:#2B2B2B;border: none;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" style="margin-left: 10px;" data-toggle="collapse" data-target="#navbar-top" aria-expanded="false">
						<span class="glyphicon glyphicon-th-large" style="color: white;"></span>
					</button>
					<a class="navbar-brand" href="#">Brand</a>
				</div>
				<div class="collapsed navbar-collapse" id="navbar-top">
					<ul class="nav navbar-nav" style="text-align: center;">
						<li class="">
							<a href="#">首页 <span class="sr-only">(current)</span></a>
						</li>
						<li>
							<a href="#">服饰</a>
						</li>
						<li>
							<a href="#">美妆</a>
						</li>
						<li>
							<a href="#">鞋包</a>
						</li>
						<li>
							<a href="#">居家</a>
						</li>
						<li>
							<a href="#">配饰</a>
						</li>
						<li>
							<a href="#">家纺</a>
						</li>
						<li>
							<a href="#">运动</a>
						</li>
						<li>
							<a href="#">数码家电</a>
						</li>						
					</ul>
					<ul class="nav navbar-nav navbar-right" style="color: white;">
						<!--<li>
							<a href="#" class="btn" data-target="#myModal-login" data-toggle="modal"><span class="glyphicon glyphicon-user" style="color: white;"></span>登录</a>
						</li>
						<li>
							<a href="#" class="btn" data-target="#myModal-register" data-toggle="modal"><span class="glyphicon glyphicon-pencil" style="color: white;"></span>注册</a>
						</li>-->
						<?php
							session_start();
							if(isset($_SESSION['username'])){						
							    echo '<li><a >欢迎会员  '.$_SESSION['username'].'</a></li>
							          <li><a href="html/loginout.php">退出</a></li>';							
							}else{
					    
							    echo '<li><a href="#" class="btn" data-target="#myModal-login" data-toggle="modal"><span class="glyphicon glyphicon-user" style="color: white;"></span>登录</a></li>
									  <li><a href="#" class="btn" data-target="#myModal-register" data-toggle="modal"><span class="glyphicon glyphicon-pencil" style="color: white;"></span>注册</a></li	>';
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
		<!--导航条-end-->

		<!--输入框-start-->
		<div class="row">
			<div class="div-input">
				<input class="col-md-5 col-lg-10" type="text" class="form-control" placeholder="Search" style="border:none;">
				<a><span class="glyphicon glyphicon-search"></span></a>
			</div>
		</div>
		<!--输入框-end-->

		<!--巨幕-start-->
		<div class="jumbotron div-jumbotron">
			<h1</h1>
				<p>...</p>
				<p>
					<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
				</p>
		</div>
		<!--巨幕-end-->

		<!--标签页-start->-->
		<div class="row textcenter">
			<ul class="nav nav-tabs" style="background-color: #2B2B2B;">
				<li role="presentation" class="active col-md-4 col-sm-4">
					<a href="#tabs-first" data-toggle="tab">Home</a>
				</li>
				<li role="presentation" class="col-md-4 col-sm-4">
					<a href="#tabs-second" data-toggle="tab">Profile</a>
				</li>
				<li role="presentation" class="col-md-4 col-sm-4">
					<a href="#tabs-third" data-toggle="tab">Messages</a>
				</li>
			</ul>
		</div>

		<!--标签页-end->-->

		<!--标签页内容面板-start-->

		<div class="row">
			<div class="tab-content">
				<div class="tab-pane active" id="tabs-first">
					<div class="tab_content">
						<div class="container">
							<div class="row">
								<?php
									$conn = mysqli_connect('localhost','root','123456');
									if(mysqli_errno($conn)){
										echo mysqli_errno($conn);
										exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
									}
									mysqli_select_db($conn,'php');
									mysqli_set_charset($conn,'utf8');
									$count_sql = "select count(id) as c from goods where type = '每日上新'";
									$result = mysqli_query($conn,$count_sql);
									$data = mysqli_fetch_assoc($result);
									$count = $data['c'];
									if(isset($_GET['page'])){
										$page = (int)$_GET['page'];
									}
									else{
										$page = 1;
									}
									$num = 8;
									$total = ceil($count/$num);	
									if($page <= 1){
										$page = 1;
									}
									if($page >= $total){
										$page = $total;
									}							
									$offset = ($page - 1) * $num;
									$previous = $page - 1;
									$next = $page +1;
									$sql_select_goods = "select * from goods where type = '每日上新' limit $offset,$num";
									$result = mysqli_query($conn,$sql_select_goods);
									if($result && mysqli_num_rows($result)){
										while($row = mysqli_fetch_assoc($result)){
											echo "<a href=\"html/detail.php?id=".$row['id']."\"><div class=\"col-md-3 col-xs-6 col-lg-3 col-sm-3 divred\">";
											echo "<img class=\"img-style\" src=".$row['smallurl']." />";
											echo "<h3>&yen;".$row['price']."</h3>";
											echo "<button class=\"btn \" type=\"submit\" id=\"\">立即购买</button>";
											echo "<a href=\"html/addcart.php?ids=".$row['id']."\"><button class=\"btn \" style=\"margin-left:50px;\" type=\"submit\" id=\"\">加入购物车</button></a>";
											echo "</div></a>";
										}
											echo "</div>";
											echo "<div class=\"row\">";									
											echo "<!--分页-start-->";
											echo "<div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-7 col-lg-offset-5 col-md-offset-4 col-sm-offset-3 col-xs-offset-2\">";
											echo "<nav aria-label=\"Page navigation\">";	
											echo "<ul class=\"pagination pagination-lg\">";											
											echo "<li>";			
											echo "<a href=\"index.php?page=".$previous."\" aria-label=\"Previous\">";				
											echo "<span aria-hidden=\"true\">&laquo;</span>";					
											echo "</a>";			
											echo "</li>";	
										for($i = 1;$i <= $total;$i ++ ){		
											echo "<li>";			
											echo "<a href=\"index.php?page=".$i."\">".$i."</a>";				
											echo "</li>";												
											}			
											echo "<li>";			
											echo "<a href=\"index.php?page=".$next."\" aria-label=\"Next\">";				
											echo "<span aria-hidden=\"true\">&raquo;</span>";					
											echo "</a>";				
											echo "</li>";			
											echo "</ul>";		
											echo "</nav>";	
											echo "</div>";																					
											echo "<!--分页-end-->";
									}
									else{
										exit("<script type='text/javascript'>alert('失败！');history.go(-1);</script>");
									}
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="tabs-second">
					<div class="tab_content">
						<div class="container">
							<div class="row">
								<?php
									$conn = mysqli_connect('localhost','root','123456');
									if(mysqli_errno($conn)){
										echo mysqli_errno($conn);
										exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
									}
									mysqli_select_db($conn,'php');
									mysqli_set_charset($conn,'utf8');
									$count_sql = "select count(id) as c from goods where type = '9.9包邮'";
									$result = mysqli_query($conn,$count_sql);
									$data = mysqli_fetch_assoc($result);
									$count = $data['c'];
									if(isset($_GET['page'])){
										$page = (int)$_GET['page'];
									}
									else{
										$page = 1;
									}
									$num = 8;
									$total = ceil($count/$num);	
									if($page <= 1){
										$page = 1;
									}
									if($page >= $total){
										$page = $total;
									}							
									$offset = ($page - 1) * $num;
									$previous = $page - 1;
									$next = $page +1;
									$sql_select_goods = "select * from goods where type = '9.9包邮' limit $offset,$num";
									$result = mysqli_query($conn,$sql_select_goods);
									if($result && mysqli_num_rows($result)){
										while($row = mysqli_fetch_assoc($result)){
											echo "<a href=\"html/detail.php?id=".$row['id']."\"><div class=\"col-md-3 col-xs-6 col-lg-3 col-sm-3 divred\">";
											echo "<img class=\"img-style\" src=".$row['smallurl']." />";
											echo "<h3>&yen;".$row['price']."</h3>";
											echo "<button class=\"btn \" type=\"submit\" id=\"\">立即购买</button>";
											echo "<a href=\"html/addcart.php?ids=".$row['id']."\"><button class=\"btn \" style=\"margin-left:50px;\" type=\"submit\" id=\"\">加入购物车</button></a>";
											echo "</div></a>";
										}
											echo "</div>";
											echo "<div class=\"row\">";									
											echo "<!--分页-start-->";
											echo "<div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-7 col-lg-offset-5 col-md-offset-4 col-sm-offset-3 col-xs-offset-2\">";
											echo "<nav aria-label=\"Page navigation\">";	
											echo "<ul class=\"pagination pagination-lg\">";											
											echo "<li>";			
											echo "<a href=\"index.php?page=".$previous."\" aria-label=\"Previous\">";				
											echo "<span aria-hidden=\"true\">&laquo;</span>";					
											echo "</a>";			
											echo "</li>";	
										for($i = 1;$i <= $total;$i ++ ){		
											echo "<li>";			
											echo "<a href=\"index.php?page=".$i."\">".$i."</a>";				
											echo "</li>";												
											}			
											echo "<li>";			
											echo "<a href=\"index.php?page=".$next."\" aria-label=\"Next\">";				
											echo "<span aria-hidden=\"true\">&raquo;</span>";					
											echo "</a>";				
											echo "</li>";			
											echo "</ul>";		
											echo "</nav>";	
											echo "</div>";																					
											echo "<!--分页-end-->";
									}
									else{
										exit("<script type='text/javascript'>alert('失败！');history.go(-1);</script>");
									}
								?>
							</div>
						</div>					
					</div>
				</div>

				<div class="tab-pane" id="tabs-third">
					<div class="tab_content">
						<div class="container">
							<div class="row">
								<?php
									$conn = mysqli_connect('localhost','root','123456');
									if(mysqli_errno($conn)){
										echo mysqli_errno($conn);
										exit;
									}
									mysqli_select_db($conn,'php');
									mysqli_set_charset($conn,'utf8');
									$sql_select_goods = "select * from goods where type = '今日推荐' limit 0,8";
									$result = mysqli_query($conn,$sql_select_goods);
									if($result && mysqli_num_rows($result)){
										while($row = mysqli_fetch_assoc($result)){
											echo "<div class=\"col-md-3 col-xs-6 col-lg-3 col-sm-3 divred\">";
											echo "<img class=\"img-style\" src=".$row['smallurl']." />";
											echo "<h3>".$row['price']."</h3>";
											echo "</div>";
										}
									}
								?>
							</div>
						</div>
						<!--分页-start-->
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-7 col-lg-offset-5 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
				<nav aria-label="Page navigation">
					<ul class="pagination pagination-lg">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li>
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">5</a>
						</li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<!--分页-end-->
					</div>
				</div>
			</div>
			
		</div>
		<!--标签页内容面板-end-->

		<!--登录弹出框-start->-->
		<div class="modal fade" id="myModal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">用户登录</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" role="form" action="html/login.php">
							<div class="form-group" style="padding-left: 0px;">
								<label for="username" class="col-sm-2 col-md-3 control-label">手机号码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="Login-addon-phone">
											<span class="glyphicon glyphicon-phone"></span>
										</span>
										<input class="form-control has-success" autofocus="autofocus" type="text" id="login-phone" name="login-phone" aria-describedby="Login-addon-phone" onblur="checkphone1()"/>
									</div>
								</div>
								<p class="p-show col-md-offset-4 col-sm-offset-2 col-xs-offset-1" id="login-phone-show"></p>
							</div>
							<div class="form-group" style="padding-left: 0px;">
								<label for="username" class="col-sm-2 col-md-3 control-label">密码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="Login-addon-password">
											<span class="glyphicon glyphicon-lock"></span>
										</span>
										<input class="form-control has-success" disabled="disabled" type="password" id="login-password" name="login-password" aria-describedby="Login-addon-password" />
									</div>
								</div>
								<p class="p-show col-md-offset-4 col-sm-offset-2 col-xs-offset-1" id="login-phone-show"></p>
							</div>
							<input type="submit" hidden="hidden" id="login-submit"/>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit" onclick="loginsubmit()">登录</button>
						<button class="btn btn-success" data-dismiss="modal" type="button">取消</button>
					</div>
				</div>
			</div>
		</div>
		<!--登录弹出框-start-->

		<!--注册弹出框-start-->
		<div class="modal fade" id="myModal-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">用户注册</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" role="form" action="html/register.php" name="register-form">
							<div class="form-group" style="padding-left: 0px;">
								<label for="username" class="col-sm-2 col-md-3 control-label">手机号码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="register-addon-phone">
											<span class="glyphicon glyphicon-phone"></span>
										</span>
										<input autofocus="autofocus" class="form-control has-success" type="tel" id="register-phone" name="register-phone" aria-describedby="basic-addon-phone" onblur="checkphone()" onkeyup="checkphone()"/>
									</div>
								</div>
								<p class="p-show col-md-offset-4 col-sm-offset-2 col-xs-offset-1" id="register-phone-show"></p>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 col-md-3 control-label">密码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="register-addon-password">
											<span class="glyphicon glyphicon-lock"></span>
										</span>
										<input class="form-control has-success" disabled="disabled" type="password" id="register-password" name="register-password" aria-describedby="basic-addon-password" />
									</div>
								</div>
								<p class="p-show col-md-offset-4 col-sm-offset-2 col-xs-offset-1" id="register-password-show"></p>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 col-md-3 control-label">确认密码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="register-addon-cofpassword">
											<span class="glyphicon glyphicon-lock"></span>
										</span>
										<input class="form-control has-success" disabled="disabled" type="password" id="register-cofpassword" name="register-cofpassword" aria-describedby="basic-addon-cofpassword" onblur="checkcofpassword()" />
									</div>
								</div>
								<p class="p-show col-md-offset-4 col-sm-offset-2 col-xs-offset-1" id="register-cofpassword-show"></p>
							</div>
							<input type="submit" class="hidden" id="register-submit"/>
						</form>			
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" id="post-register" onclick="registersubmit()" disabled="disabled">注册</button>
						<button class="btn btn-success" data-dismiss="modal" type="button">取消</button>
					</div>
				</div>
			</div>
		</div>
		<!--注册弹出框-start-->

		<!--购物车弹出框start-->
		<div class="modal fade" id="myModal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>购物车</h4>
					</div>
					<div class="modal-body">
						<?php 
							//session_start();

							 $conn = mysqli_connect('localhost','root','123456');
							if(mysqli_errno($conn)){
								echo mysqli_errno($conn);
								exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
							}
							mysqli_select_db($conn,'php');
							mysqli_set_charset($conn,'utf8');
							$arr=array();
 
						    if(!empty($_SESSION["gwc"]))
						    {
						        $arr=$_SESSION["gwc"];
						    }
						 
						    foreach($arr as $v)
						    {
						    	$i = -1;
						    	$i = $i + 1;
						        $sql="select * from goods where id='".$v[0]."'";
						        $att=mysqli_query($conn,$sql);
						        	while($n = mysqli_fetch_array($att)){							   
					    echo '<div class="row" style="margin-top:25px;">
							<div class="col-md-1 col-lg-1 col-sm-1">
								<input type="checkbox" id="allselect" hidden="hidden" name="allselect"/>
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<img src="'.$n[10].'" style="width: 130px;height: 150px;" />
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<p>'.$n[7].'</p>
								<p>颜色:
									<font color="red" size="4">大红</font>
								</p>
								<p>尺码:
									<font color="red" size="4">42</font>
								</p>
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<label>数量：</label>
								<input type="number" value="'.$v[1].'" style="width: 45px;text-align: center;" />
							</div>
							<div class="col-md-2 col-lg-2 col-sm-2">
								<font color="red" size="5">&yen;'.$n[5].'</font>
							</div>						
						</div>
						<div class="row">
							<div class="col-md-9 col-lg-9 col-sm-9 col-xs-3">

							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<a href="html/delcart.php?id='.$i.'"><button class="btn btn-default" style="margin-left: 30px;">删除</button></a>
							</div>
						</div>	';							
						        	}
						    }							
						?>
						<hr>		
						<div class="row" style="margin-top: 25px;">
							<div class="col-md-2 col-lg-2 col-sm-2" style="margin-top: 10px;">
								<input type="checkbox" id="selectall" onclick="selectAll(this,'allselect')" hidden="hidden"/>
								<label id="labelselect" hidden="hidden">全选</label>
							</div>
							<div class="col-md-7 col-lg-7 col-sm-7 col-xs-3">

							</div>
							<div class="col-md-5 col-lg-5 col-sm-5" style="float: right;">
								<button class="btn btn-default" style="margin-left: 30px;" onclick="showcheckbox();">编辑</button>
								<button class="btn btn-default" style="margin-left: 30px;" onclick="isselect(this,'allselect')">批量删除</button>
							</div>
						</div>					
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit" id="post-register">结算</button>
						<button class="btn btn-primary" data-dismiss="modal" type="button">取消</button>
					</div>
				</div>
			</div>
		</div>
		<!--购物车弹出框end-->
						<input type="checkbox" checked="checked"/>
		<!--收藏夹弹出框start-->
		<div class="modal fade" id="myModal-Collection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>收藏夹</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-1 col-lg-1 col-sm-1">
								<input type="checkbox" />
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<img src="images/youke/goods.JPG" style="width: 130px;height: 150px;" />
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<p>春季新款男士低帮休闲鞋</p>
								<p>颜色:
									<font color="red" size="4">大红</font>
								</p>
								<p>尺码:
									<font color="red" size="4">42</font>
								</p>
							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<label>数量：</label>
								<input type="number" value="1" style="width: 45px;text-align: center;" />
							</div>
							<div class="col-md-2 col-lg-2 col-sm-2">
								<font color="red" size="5">&yen98</font>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 col-lg-2 col-sm-2" style="margin-top: 10px;">
								<input type="checkbox" />
								<label>全选</label>
							</div>
							<div class="col-md-7 col-lg-7 col-sm-7 col-xs-3">

							</div>
							<div class="col-md-3 col-lg-3 col-sm-3">
								<button class="btn btn-default" style="margin-left: 30px;">批量删除</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit" id="post-register">加入购物车</button>
						<button class="btn btn-primary" data-dismiss="modal" type="button">取消</button>
					</div>
				</div>
			</div>
		</div>
		<!--收藏夹弹出框end-->

		<!--侧边导航-start-->
		<div class="div-right hidden-xs">
			<div class="div-right-user">
				<a href="html/user.php">
					<button onmouseover="this.style.backgroundColor = 'rgb(255,70,78)';" onmouseout="this.style.backgroundColor = '#2b2b2b';" style="border: none;background-color: #2B2B2B;">
					<span class="glyphicon glyphicon-user" style="width: 23px;height: 30px;margin-top: 10px;color: white;"></span>
				</button>
				</a>
			</div>
			<div class="div-right-cart">
				<button data-target="#myModal-cart" data-toggle="modal" onmouseover="this.style.backgroundColor = 'rgb(255,70,78)';" onmouseout="this.style.backgroundColor = '#2b2b2b';" style="border: none;background-color: #2B2B2B;">
					<span class="glyphicon glyphicon-shopping-cart"></span>
					<span style="color: white;">购物车</span>
					<span class="badge"><?php $attr = array(); $attr = $_SESSION["gwc"]; echo count($attr);?></span>
				</button>
			</div>
			<div class="div-right-Collection">
				<button data-target="#myModal-Collection" data-toggle="modal" onmouseover="this.style.backgroundColor = 'rgb(255,70,78)';" onmouseout="this.style.backgroundColor = '#2b2b2b';" style="border: none;background-color: #2B2B2B;">
					<span class="glyphicon glyphicon-heart" style="width: 23px;height: 30px;margin-top: 10px;"></span>
				</button>
			</div>
		</div>
		<!--侧边导航-end-->

		<!--底部声明-start-->
		<div class="" style="margin-left: 0px;background-color: #2b2b2b;color: white;padding: 20px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<p>平台介绍：</p>
						<p>本平台是由本公司开发组的一款用于代购商品交易的电商平台。采用第三方支付的方式加强平台交易安全性。</p>
					</div>
					<div class="col-md-4 col-xs-12">
						<p>平台介绍：</p>
						<p>本平台是由本公司开发组的一款用于代购商品交易的电商平台。采用第三方支付的方式加强平台交易安全性。</p>
					</div>
					<div class="col-md-4 col-xs-12">
						<p>平台介绍：</p>
						<p>本平台是由本公司开发组的一款用于代购商品交易的电商平台。采用第三方支付的方式加强平台交易安全性。</p>
					</div>
				</div>
				<hr>
				<div class="row col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left: 30px;">
					<input class="form-control" placeholder="咨询意见或建议！" type="text" style="border-radius: 5px;width: 60%;display: inline;" />
					<button href="#" class="btn btn-default " style="border-radius: 5px;color: #009999;height:37px;padding-bottom: 10px;">发送</button>
				</div>
			</div>
		</div>
		<!--底部声明-end-->

		<script type=" text/javascript " src="jq/jquery-3.1.0.js "></script>
		<script type="text/javascript " src="bootstrap-3.3.0/docs/dist/js/bootstrap.js "></script>
		<script type="text/javascript" src="js/user_js.js"></script>
		<script type="text/javascript ">
			//			var input_register_phone = document.getElementById("register-phone ");
			
			//			var btn = document.getElementById("post-register ")
			function checkphone() {
				var show_register_phone = document.getElementById("register-phone-show")
				var val = document.getElementById("register-phone").value;

				var reg = /^1[345678]\d{9}$/;
				if(val == '') {
					show_register_phone.style.color = "red ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "请输入手机号！ ";
				} else if(reg.test(val)) {
					show_register_phone.style.color = "green ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "输入正确！";
					document.getElementById("register-password").disabled = false;
					document.getElementById("register-cofpassword").disabled = false;
				} else {
					show_register_phone.style.color = "red ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "输入错误，请重新输入！ ";
				}
			};
			function checkphone1(){
				var show_register_phone = document.getElementById("login-phone-show")
				var val = document.getElementById("login-phone").value;

				var reg = /^1[345678]\d{9}$/;
				if(val == '') {
					show_register_phone.style.color = "red ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "请输入手机号！ ";
				} else if(reg.test(val)) {
					show_register_phone.style.color = "green ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "输入正确！";
					document.getElementById("login-password").disabled = false;
				} else {
					show_register_phone.style.color = "red ";
					show_register_phone.innerHTML = " ";
					show_register_phone.innerHTML = "输入错误，请重新输入！ ";
				}
			};
			
			function checkcofpassword() {
				var pw = document.getElementById("register-password").value;
				var cofpw = document.getElementById("register-cofpassword").value;
				var show_register_cofpassword = document.getElementById("register-cofpassword-show");
				if(pw != cofpw) {
					show_register_cofpassword.style.color = "red ";
					show_register_cofpassword.innerHTML = " ";
					show_register_cofpassword.innerHTML = "两次输入不一致，请重新输入！";
				} else {
					show_register_cofpassword.innerHTML = " ";
					if(document.getElementById("register-phone-show").innerHTML == "输入正确！"){
						document.getElementById("post-register").disabled = false;
					}
				}
			}
			function registersubmit(){			
			document.getElementById("register-submit").click();
			};	
			function loginsubmit(){
				document.getElementById("login-submit").click();
			}
			/*function isselect(obj,cname) {
				//alert("GG");
				var checkboxs = document.getElementsByName(cname);
				for(var i = 0; i < checkboxs1.length; i++){
					if(checkboxs1[i].checked){
						var ids = new Array();
						var idc =  Number(checkboxs1[i].id); 
						ids.push(idc);		
						//alert(ids);
						//console.log(ids);
					}		
				}
				for(var i = 0; i < ids.length; i ++){
					var a = a + "ids[i]";
				}
				alert(a);
				var jsonString = JSON.stringify(ids);
					$.ajax({
						type:"post",
						url:"../html/delcart.php",
						data:{data:ids},
						cache:false;
						async:true,
						success:function(){
							alert("ok");
						}
					});
			}*/
			function showcheckbox(){
			 	var checkboxs = document.getElementsByName("allselect");
			 	for(var i = 0; i < checkboxs.length; i ++){
			 		checkboxs[i].hidden = false;
			 	}
				document.getElementById("selectall").hidden = false;
				document.getElementById("labelselect").hidden = false;
}
		</script>
	</body>

</html>