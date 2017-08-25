<?php
	session_start();
if(isset($_SESSION['username'])){
	
}
else{
	exit ("<script type='text/javascript'>alert('请登录！');history.go(-1);</script>");
}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>个人中心</title>
		<link href="../bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="../css/buttoncss.css" rel="stylesheet" type="text/css"/>
		<link href="../css/index_css.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript">
			window.onload = function(){
	    		var tabid= location.href.hash;
			    if(tabid && tabid.length>0){
			         var tab = document.querySelector(tabid);
			         tab.onclick();
			    }
			}
		</script>
				
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
					<ul class="nav navbar-nav navbar-right">
						<!--<li>
							<a href="#" class="btn" data-target="#myModal-login" data-toggle="modal"><span class="glyphicon glyphicon-user" style="color: white;"></span>登录</a>
						</li>
						<li>
							<a href="#" class="btn" data-target="#myModal-register" data-toggle="modal"><span class="glyphicon glyphicon-pencil" style="color: white;"></span>注册</a>
						</li>-->
						<?php
//							session_start();
							if(isset($_SESSION['username'])){						
							    echo '<li><a >欢迎会员  '.$_SESSION['username'].'</a></li>
							          <li><a href="loginout.php">退出</a></li>';							
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
		<!--登录弹出框-start->-->
		<div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">用户登录</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" role="form" action="login.php">
							<div class="form-group" style="padding-left: 0px;">
								<label for="username" class="col-sm-2 col-md-3 control-label">手机号码：</label>
								<div class="col-sm-10 col-md-9">
									<div class="input-group">
										<span class="input-group-addon" id="Login-addon-phone">
											<span class="glyphicon glyphicon-phone"></span>
										</span>
										<input class="form-control has-success" autofocus="autofocus" type="text" id="login-phone" name="login-phone" aria-describedby="Login-addon-phone" onblur="checkphone()"/>
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
						<form class="form-horizontal" method="post" role="form" action="register.php" name="register-form">
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
		<div class="container">
			<div class="row">

				<!--左侧标签页start-->
				<div class="col-lg-2 col-md-2 col-sm-2 " style="margin-top: 50px;border: none;">
					<div class="usernavleft" style="border: 1px solid #E0E0E0;text-align: center;">
						<h4 class="" style="color: grey;font-family: '微软雅黑';font-size: 13px;">那天科技</h4>
						<hr />
						<h2 class="titleh">我的订单</h2>
						<h3 class="titleh1"><a href="#tabs-buy" data-toggle="tab" >购物订单</a></h3>
						<h3 class="titleh1"><a href="#tabs-sale" data-toggle="tab" >销售订单</a></h3>
						<hr />
						<h2 class="titleh">个人发布</h2>
						<h3 class="titleh1"><a href="#tabs-releasetask" data-toggle="tab" >发布任务</a></h3>
						<h3 class="titleh1"><a href="#tabs-releasegoods" data-toggle="tab" >发布商品</a></h3>
						<hr />
						<h2 class="titleh">个人信息</h2>
						<h3 class="titleh1"><a href="#tabs-myrelease" data-toggle="tab" >我的发布</a></h3>
						<h3 class="titleh1"><span class="glyphicon glyphicon-shopping-cart" style="color: rgb(255,70,70);"></span><a href="#tabs-cart" data-toggle="tab">购物车</a><span class="badge badge-style">4</span></h3>
						<h3 class="titleh1"><span class="glyphicon glyphicon-heart" style="color: rgb(255,70,70);"></span><a href="#tabs-colection" data-toggle="tab">收藏夹</a><span class="badge badge-style">4</span></h3>
						<h3 class="titleh1"><a href="#tabs-evaluate" data-toggle="tab" >我的评价</a></h3>
						<hr />
						<h2 class="titleh">账户设置</h2>
						<h3 class="titleh1"><a href="#tabs-information" data-toggle="tab">基本资料</a></h3>
						<h3 class="titleh1"><a href="#tabs-address" data-toggle="tab">收货地址</a></h3>
						<hr />
					</div>
				</div>
				<!--左侧标签页end-->

				<!--内容面板start-->
				<div class="col-lg-10 col-md-10 col-sm-10 " style="margin-top: 60px;">
					<div class="" style="width: 100%;margin-bottom: 30px;border: 1px solid #E0E0E0;padding:10px">
						<p class="titleh"><span class="badge badge-style">!</span>安全提示：</p>
						<p class="titlew">近期有不法分子伪造优客客服电话和银行电话以邀请注册，帐号升级变更，订单异常等理由要求提供个人信息。请不要相信，谨防诈骗!</p>
					</div>
					<div class="tab-content">
						<!--购物订单start-->
						<div class="tab-pane active" id="tabs-buy">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									我的订单
								</li>
								<li>
									购物订单
								</li>
							</ol>
							<div class="">
								<ul class="nav nav-tabs">
									<li role="presentation" class="active">
										<a href="#tabs-buy-allorder" data-toggle="tab">全部订单</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-notpay" data-toggle="tab">待付款</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-notsend" data-toggle="tab">待发货</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-nottake" data-toggle="tab">待收货</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-notevaluate" data-toggle="tab">待评价</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-cusservice" data-toggle="tab">退款售后</a>
									</li>
									<li role="presentation">
										<a href="#tabs-buy-sale" data-toggle="tab">销售</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<!--全部订单内容start-->
								<div class="tab-pane active" id="tabs-buy-allorder">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%;">确认收货</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--全部订单内容start-->

								<!--带付款内容start-->
								<div class="tab-pane" id="tabs-buy-notpay">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%;">付款</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">取消订单</button>
											</div>
										</div>
									</div>
								</div>
								<!--付款内容end-->
								<!--待发货内容start-->
								<div class="tab-pane" id="tabs-buy-notsend">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--待发货内容end-->

								<!--待收货内容start-->
								<div class="tab-pane" id="tabs-buy-nottake">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">确认收货</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--待收货内容end-->

								<!--待评价内容start-->
								<div class="tab-pane" id="tabs-buy-notevaluate">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">评价</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--待评价内容end-->
								
								<!--退款售后内容start-->
								<div class="tab-pane" id="tabs-buy-cusservice">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">取消</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--退款售后内容end-->
								
								<!--销售内容start-->
								<div class="tab-pane" id="tabs-buy-sale">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />
									<div>
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
											<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
											<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
											<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
										</div>
										<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
											<div class=" col-md-2 col-sm-2" style="padding: 15px;">
												<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
												<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh">&yen98</p>
											</div>
											<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
												<p class="titleh1">1</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
												<p>&yen98</p>
												<p>包邮</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<p>已发货</p>
												<p>订单详情</p>
												<p>查看物流</p>
											</div>
											<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">确认收货</button>
												<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%;">退款/退货</button>
											</div>
										</div>
									</div>
								</div>
								<!--销售内容end-->
							</div>
						</div>
						<!--购物订单end-->

						<!--销售订单start-->
						<div class="tab-pane" id="tabs-sale">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									我的订单
								</li>
								<li>
									销售订单
								</li>
							</ol>
							<div class="">
								<ul class="nav nav-tabs">
									<li role="presentation" class="active">
										<a href="#tabs-sale-allorder" data-toggle="tab">全部订单</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-notpay" data-toggle="tab">待付款</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-notsend" data-toggle="tab">待发货</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-nottake" data-toggle="tab">待收货</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-notevaluate" data-toggle="tab">待评价</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-cusservice" data-toggle="tab">退款售后</a>
									</li>
									<li role="presentation">
										<a href="#tabs-sale-sale" data-toggle="tab">销售</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
							<!--全部订单内容start-->
							<div class="tab-pane active" id="tabs-sale-allorder">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">确认收货</button>
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">退款/退货</button>
										</div>
									</div>

								</div>
							</div>
							<!--全部订单内容start-->
							
							<!--待付款内容start-->
							<div class="tab-pane" id="tabs-sale-notpay">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">修改价格</button>
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">备注</button>
										</div>
									</div>

								</div>
							</div>
							<!--待付款内容start-->
							
							<!--待发货内容start-->
							<div class="tab-pane" id="tabs-sale-notsend">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">已发货</button>
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">备注</button>
										</div>
									</div>

								</div>
							</div>
							<!--待发货内容start-->
							
							<!--待收货内容start-->
							<div class="tab-pane" id="tabs-sale-nottake">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">备注</button>
											<!--<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">退款/退货</button>-->
										</div>
									</div>

								</div>
							</div>
							<!--待收货内容start-->
							
							<!--待评价内容start-->
							<div class="tab-pane" id="tabs-sale-notevaluate">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">评价</button>
											<!--<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">退款/退货</button>-->
										</div>
									</div>

								</div>
							</div>
							<!--待评价内容start-->
							
							<!--退款售后内容start-->
							<div class="tab-pane" id="tabs-sale-cusservice">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">完成</button>
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">备注</button>
										</div>
									</div>

								</div>
							</div>
							<!--退款售后内容start-->
							
							<!--销售内容start-->
							<div class="tab-pane" id="tabs-sale-sale">
								<div class="" style="margin-top: 10px;">
									<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
									<button>订单搜索</button>
								</div>
								<hr />

								<div>
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-3 textcenter"><span class="glyphicon glyphicon-calendar" style="color: red;"></span>2017-07-25</div>
										<div class="col-lg-4 col-md-4 col-sm-4 textcenter">订单号：5705615679984</div>
										<div class="col-lg-2 col-md-3 col-sm-2 textcenter"><span class="glyphicon glyphicon-user"></span>慕小哀</div>
										<div class="col-lg-2 col-md-3 col-sm-3 textcenter"><span class="glyphicon glyphicon-comment" style="color: cornflowerblue;"></span>在线咨询</div>
									</div>
									<div class="row" style="border: 1px solid #E0E0E0;height: 150px;">
										<div class=" col-md-2 col-sm-2" style="padding: 15px;">
											<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
											<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh">&yen98</p>
										</div>
										<div class="textcenter col-lg-1 col-md-1 col-sm-1" style="margin-top: 50px;">
											<p class="titleh1">1</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 50px;border-left: 1px solid #E0E0E0;">
											<p>&yen98</p>
											<p>包邮</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<p>已发货</p>
											<p>订单详情</p>
											<p>查看物流</p>
										</div>
										<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">修改价格</button>
											<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%">备注</button>
										</div>
									</div>

								</div>
							</div>
							</div>
							<!--销售内容start-->
						</div>
						<!--销售订单end-->

						<!--发布任务start-->
						<div class="tab-pane" id="tabs-releasetask">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人发布
								</li>
								<li>
									发布任务
								</li>
							</ol>
							<div class="row">
								<div class="col-md-offset-4 col-sm-offset-4 col-md-4 col-sm-4">
									<form action="get_task.php" method="post" enctype="multipart/form-data" id="file_upload">
										<p>图片预览：</p>
										<div id="test-image-preview">
											<img class="img-style" id="img-show"/>
										</div>
										<p>
											<input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="filechange(event)">
										</p>
										<p id="test-file-info"></p>
										<input type="submit" id="post-file" hidden="hidden"/>
									<!--</form>-->
								</div>
							</div>
							<hr />
							<div class="row" style="text-align: center;">
								<!--<form method="post" action="../get_task.php">-->
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label class="paddingtop5 control-label col-md-5 col-sm-5">品牌:</label>
											<div class="col-md-7 col-sm-7 ">
												<input id="brand" name="brand" class="form-control img-style" type="text" placeholder="品牌" />
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">产地:</label>
											<div class="col-md-7 col-sm-7">
												<input id="placeofpro" name="placeofpro" class="form-control" type="text" placeholder="产地" />
											</div>

										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">类别:</label>
											<div class="col-md-7 col-sm-7">
												<select name="type" id="type" class="form-control">
													<option selected="selected">化妆品</option>
													<option>服饰</option>
													<option>箱包</option>
													<option>居家</option>
													<option>配饰</option>
													<option>数码电子</option>
													<option>运动</option>
													<option>美食</option>
												</select>
											</div>
										</div>

									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">商品名称:</label>
											<div class="col-md-7 col-sm-7">
												<input id="name" name="name" class="form-control" type="text" placeholder="商品名称" />
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">备注:</label>
											<div class="col-md-7 col-sm-7">
												<input id="remarks" name="remarks" class="form-control" type="text" placeholder="备注" />
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">出价:</label>
											<div class="col-md-7 col-sm-7">
												<input id="price" name="price" class="form-control" type="text" placeholder="出价" />
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">收货地址:</label>
											<div class="col-md-7 col-sm-7">
												<select id="address" name="address" class="form-control">
													<option selected="selected">收货地址1</option>
													<option>收货地址2</option>
													<option>收货地址3</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">支付方式:</label>
											<div class="col-md-7 col-sm-7">
												<select name="paymenttype" id="pymenttype" class="form-control">
													<option selected="selected">货到付款</option>
													<option>支付宝</option>
													<option>微信</option>
													<option>其它</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 margintop10">
										<div class="form-group">
											<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">购买数量:</label>
											<div class="col-md-7 col-sm-7">
												<input id="quantity" name="quantity" class="form-control" type="number" />
											</div>
										</div>
									</div>
									<input type="submit" hidden="hidden" id="post-task"/>
									
								</form>
								<div class="col-md-4 col-sm-6 margintop10">
									<button class="button button-glow button-border button-rounded button-primary" onclick="releastask()">发布任务</button>
								</div>
							</div>
						</div>
						<!--发布任务end-->

						<!--发布商品start-->
						<div class="tab-pane" id="tabs-releasegoods">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人发布
								</li>
								<li>
									发布商品
								</li>
							</ol>
							<div class="row">
								<div class="col-md-offset-4 col-sm-offset-4 col-md-4 col-sm-4">
									<form action="get_goods.php" method="post" enctype="multipart/form-data" id="file_upload">
										<p>图片预览：</p>
										<div id="test-image-preview">
											<img class="img-style" id="img-show1" style="" />
										</div>
										<p>
											<input type="file" id="file1" name="file1" accept="image/gif, image/jpeg, image/png, image/jpg" onchange="filechange1(event)">
										</p>
										<p id="test-file-info"></p>
									<!--</form>-->
								</div>
							</div>
							<hr />
							<div class="row" style="text-align: center;">
								<div class="col-md-12 col-sm-12 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-3 col-sm-3">关键字:</label>
										<div class="col-md-7 col-sm-7">
											<input id="keyword" name="keyword" class="form-control" type="text" />
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-3 col-sm-3">商品描述:</label>
										<div class="col-md-7 col-sm-7">
											<textarea id="description" name="description" class="img-style" rows="5" cols="50"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-5 col-sm-5">品牌:</label>
										<div class="col-md-7 col-sm-7">
											<input id="brand" name="brand" class="form-control img-style" type="text" placeholder="品牌" />
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-5 col-sm-5">产地:</label>
										<div class="col-md-7 col-sm-7">
											<!--<textarea rows="5" cols="50"></textarea>-->
											<input id="placeofpro" name="placeofpro" class="form-control img-style" type="text" placeholder="产地" />
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label for="" class="paddingtop5 control-label col-md-5 col-sm-5">类别:</label>
										<div class="col-md-7 col-sm-7">
											<select id="type" name="type" class="form-control">
												<option selected="selected">化妆品</option>
												<option>服饰</option>
												<option>箱包</option>
												<option>居家</option>
												<option>配饰</option>
												<option>数码电子</option>
												<option>运动</option>
												<option>美食</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-5 col-sm-5">售价:</label>
										<div class="col-md-7 col-sm-7">
											<!--<textarea rows="5" cols="50"></textarea>-->
											<input id="price" name="price" class="form-control img-style" type="text" placeholder="单位：RMB" />
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-5 col-sm-5">库存量:</label>
										<div class="col-md-7 col-sm-7">
											<!--<textarea rows="5" cols="50"></textarea>-->
											<input id="quantity" name="quantity" class="form-control img-style" type="text" placeholder="" />
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 margintop10">
									<div class="form-group">
										<label class="paddingtop5 control-label col-md-5 col-sm-5">发货地:</label>
										<div class="col-md-7 col-sm-7">
											<input id="sendofpro" name="sendofpro" class="form-control img-style" type="text" placeholder="" />
										</div>
									</div>
								</div>
								<input id="post-goods" name="post-goods" type="submit" hidden="hidden"/>
							</form>
								<div class="col-md-4 col-sm-6 margintop10">
									<button class="button button-glow button-border button-rounded button-primary" onclick="releasgoods()">发布任务</button>
								</div>
							</div>
						</div>
						<!--发布商品end-->
						<!--我的发布start-->
						<div class="tab-pane" id="tabs-myrelease">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人信息
								</li>
								<li>
									我的发布
								</li>
							</ol>
							<div class="">
								<ul class="nav nav-tabs">
									<li role="presentation" class="active">
										<a href="#tabs-myrelease-goods" data-toggle="tab">商品</a>
									</li>
									<li role="presentation">
										<a href="#tabs-myrelease-task" data-toggle="tab">代购请求</a>
									</li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane active" id="tabs-myrelease-goods">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />															
									<div>
										<?php
											if(isset($_SESSION['userid'])){
											$conn = mysqli_connect('localhost','root','123456');
											if(mysqli_errno($conn)){
												echo mysqli_errno($conn);
												exit;
											}
											mysqli_select_db($conn,'php');
											mysqli_set_charset($conn,'utf8');
											
												$sql_select_goods = "select * from goods where userid = ".$_SESSION['userid']."";
												$result = mysqli_query($conn,$sql_select_goods);
												if($result && mysqli_num_rows($result)){
												
												while($row = mysqli_fetch_assoc($result)){
												echo "<div class=\"row\" style=\"margin-top:25px\">";
												echo "<div class=\"col-lg-2 col-md-2 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-calendar\" style=\"color: red;\"></span>2017-07-25</div>";
												echo "<div class=\"col-lg-4 col-md-4 col-sm-4 textcenter\">订单号：".$row['id']."</div>";
												echo "<div class=\"col-lg-2 col-md-3 col-sm-2 textcenter\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['username']."</div>";
												echo "<div class=\"col-lg-2 col-md-3 col-sm-3 textcenter\"><span class=\"glyphicon glyphicon-comment\" style=\"color: cornflowerblue;\"></span>在线咨询</div>";
												echo "</div>";
												echo "<div class=\"row\" style=\"border: 1px solid #E0E0E0;height: 150px;\">";
												echo "<div class=\" col-md-2 col-sm-2\" style=\"padding: 15px;\">";
												echo "<img class=\"img-style\" src=../".$row['smallurl']." style=\"width: 100px\" />";
												echo "</div>";
												echo "<div class=\"textcenter col-lg-2 col-md-2 col-sm-2\" style=\"margin-top: 50px;\">";
												echo "<p>".$row['description']."</p>";
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
												echo "<button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 15px;width: 100%\">查看详情</button>";
												echo "<a href=\"delgoods.php?id=".$row['id']."\"><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%\">下架商品</button></a>";
												echo "</div>";											
												echo "</div>";
											}
											}											
										}
										else{
											exit ("<script type='text/javascript'>history.go(-1);</script>");
										}
										?>
									</div>
								</div>
								<div class="tab-pane" id="tabs-myrelease-task">
									<div class="" style="margin-top: 10px;">
										<input class="col-lg-2" type="text" placeholder="输入商品名称或订单编号查询！" />
										<button>订单搜索</button>
									</div>
									<hr />

									<div>
										<?php
											if(isset($_SESSION['userid'])){											
												$sql_select_goods = "select * from task where userid = ".$_SESSION['userid']."";
												$result = mysqli_query($conn,$sql_select_goods);
												if($result && mysqli_num_rows($result)){
												
												while($row = mysqli_fetch_assoc($result)){
													$id = $row['id'];
													$smallurl = $row['smallurl'];
													$remarks = $row['remarks'];
													$price = $row['price'];
													$quantity = $row['quantity'];
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
												echo "<a href=deltask.php?id=".$row['id']."><button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;font-size: 15px;width: 100%\">删除请求</button></a>";
												echo "<button class=\"button button-glow button-border button-rounded button-primary\" style=\"padding: 0px 5px;border: none;margin-top: 10px;font-size: 14px;width: 100%\">确认完成</button>";
												echo "</div>";											
												echo "</div>";
											}
											}											
										}
										else{
											exit ("<script type='text/javascript'>history.go(-1);</script>");
										}
										?>										
									</div>
								</div>
							</div>
						</div>
						<!--我的发布end-->

						<!--购物车start-->
						<div class="tab-pane" id="tabs-cart">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人信息
								</li>
								<li>
									购物车
								</li>
							</ol>

							<hr />

							<div class="row margintop10" style="border: 1px solid #E0E0E0;height: 150px;">
								<div class="col-md-1 col-sm-1" style="margin-top: 60px;">
									<input type="checkbox" id="allselect" name="allselect" />
								</div>
								<div class=" col-md-2 col-sm-2" style="padding: 15px;">
									<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
									<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
								</div>
								<div class="textcenter col-lg-3 col-md-3 col-sm-3" style="margin-top: 20px;">
									<p class="titleh1">颜色: </p>
									<p class="titleh1">RB/9953/兰色</p>
									<p class="titleh1">尺码: 42</p>
								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
									<div class="form-group">
										<div class="col-md-10 col-sm-12">
											<input class="" type="number" placeholder="数量" style="width: 100%;" />
										</div>
										<p class="titleh">&yen98</p>
									</div>

								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
									<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">删除</button>
									<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 12px;width: 100%">移入收藏夹</button>
								</div>
							</div>

							<div class="row margintop10" style="border: 1px solid #E0E0E0;height: 150px;">
								<div class="col-md-1 col-sm-1" style="margin-top: 60px;">
									<input type="checkbox" id="allselect" name="allselect" />
								</div>
								<div class=" col-md-2 col-sm-2" style="padding: 15px;">
									<img class="img-style" src="../images/youke/goods.JPG" style="width: 100px" />
								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="margin-top: 50px;">
									<p>慕小爱绿色新鲜水果黄瓜农家自种</p>
								</div>
								<div class="textcenter col-lg-3 col-md-3 col-sm-3" style="margin-top: 20px;">
									<p class="titleh1">颜色: </p>
									<p class="titleh1">RB/9953/兰色</p>
									<p class="titleh1">尺码: 42</p>
								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
									<div class="form-group">
										<div class="col-md-10 col-sm-12">
											<input class="" type="number" placeholder="数量" style="width: 100%;" />
										</div>
										<p class="titleh">&yen98</p>
									</div>

								</div>
								<div class="textcenter col-lg-2 col-md-2 col-sm-2" style="height: 100%;padding-top: 25px;border-left: 1px solid #E0E0E0;">
									<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">删除</button>
									<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;margin-top: 10px;font-size: 12px;width: 100%">移入收藏夹</button>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="col-md-2 col-sm-2">
									<input type="checkbox" id="selectAll" onclick="selectAll(this,'allselect')" />
									<label>全选</label>
								</div>
								<div class="col-md-2 col-sm-2">
									<a class="btn">批量删除</a>
								</div>
								<div class="col-md-2 col-sm-2">
									共计<span style="font-size: 20px;color: rgb(255,70,78);">2</span>件
								</div>
								<div class="col-md-4 col-sm-4">
									总计（不含运费）:<span style="font-size: 20px;color: rgb(255,70,78);">&yen;98</span>
								</div>
								<div class="col-md-2 col-sm-2">
									<button class="button button-glow button-border button-rounded button-primary" style="padding: 0px 5px;border: none;font-size: 15px;width: 100%">结算</button>
								</div>
							</div>
						</div>
						<!--购物车end-->

						<!--收藏夹start-->
						<div class="tab-pane" id="tabs-colection">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人信息
								</li>
								<li>
									收藏夹
								</li>
							</ol>

							<hr />

							<div class="row">
								<div class="col-md-3 col-sm-3 divred " style="padding: 5px;height: 100%;">
									<img class="img-style" src="../images/youke/goods.JPG" />
									<h5>
										<input type="checkbox" id="allselectc" name="allselectc"/>
										<span>慕小爱绿色新鲜水果黄瓜农家自种</span>
									</h5>
									<h3 style="color: rgb(255,70,78);font-size: 20px;">&yen;19.9</h3>
								</div>
								<div class="col-md-3 col-sm-3 divred " style="padding: 5px;height: 100%;">
									<img class="img-style" src="../images/youke/goods.JPG" />
									<h5>
										<input type="checkbox" id="allselectc" name="allselectc"/>
										<span>慕小爱绿色新鲜水果黄瓜农家自种</span>
									</h5>
									<h3 style="color: rgb(255,70,78);font-size: 20px;">&yen;19.9</h3>
								</div>
								<div class="col-md-3 col-sm-3 divred " style="padding: 5px;height: 100%;">
									<img class="img-style" src="../images/youke/goods.JPG" />
									<h5>
										<input type="checkbox" id="allselectc" name="allselectc"/>
										<span>慕小爱绿色新鲜水果黄瓜农家自种</span>
									</h5>
									<h3 style="color: rgb(255,70,78);font-size: 20px;">&yen;19.9</h3>
								</div>
								<div class="col-md-3 col-sm-3 divred " style="padding: 5px;height: 100%;">
									<img class="img-style" src="../images/youke/goods.JPG" />
									<h5>
										<input type="checkbox" id="allselectc" name="allselectc"/>
										<span>慕小爱绿色新鲜水果黄瓜农家自种</span>
									</h5>
									<h3 style="color: rgb(255,70,78);font-size: 20px;">&yen;19.9</h3>
								</div>
								<div class="" style="clear: both;"></div>
								<div class="col-md-3 col-sm-3 divred " style="padding: 5px;height: 100%;">
									<img class="img-style" src="../images/youke/goods.JPG" />
									<h5>
										<input type="checkbox" id="allselectc" name="allselectc"/>
										<span>慕小爱绿色新鲜水果黄瓜农家自种</span>
									</h5>
									<h3 style="color: rgb(255,70,78);font-size: 20px;">&yen;19.9</h3>
								</div>
							</div>

							<hr />

							<div class="row">
								<div class="col-md-2 col-sm-2">
									<input type="checkbox" onclick="selectAll(this,'allselectc')" />
									<label>全选</label>
								</div>
								<div class="col-md-2 col-sm-2">
									<a class="btn">批量删除</a>
								</div>
							</div>

						</div>
						<!--收藏夹end-->

						<!--我的评价start-->
						<div class="tab-pane" id="tabs-evaluate">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									个人信息
								</li>
								<li>
									我的评价
								</li>
							</ol>
							<div class="row">
								<div class="row textcenter col-md-12 col-sm-12" style="background-color: #e0e0e0;margin-top: 20px;margin-left: 15px;padding: 15px;">
									<div class="col-md-2 col-sm-2">
										评价
									</div>
									<div class="col-md-4 col-sm-4">
										评语
									</div>
									<div class="col-md-3 col-sm-3">
										商家
									</div>
									<div class="col-md-3 col-sm-3">
										商品
									</div>
								</div>
							</div>

							<hr />

							<div class="row">
								<div class="textcenter col-md-2 col-sm-2" style="padding-top: 20px;">
									<span class="glyphicon glyphicon-thumbs-up" style="color: rgb(255,70,78);"></span> 好评!
								</div>
								<div class="textcenter col-md-4 col-sm-4">
									衣服收到，是想象中的很满意，做工细整齐，物流快，正好这几天穿，喜欢的亲们赶快下手吧！
								</div>
								<div class="textcenter col-md-3 col-sm-3">
									全勇运动户外特卖店
								</div>
								<div class="textcenter col-md-3 col-sm-3">
									李宁 女式 团购系列简约拼色无帽外套 AWDH484-1
								</div>
							</div>
							<hr />

							<div class="row">
								<div class="textcenter col-md-2 col-sm-2 style=" padding-top: 20px; "">
									<span class="glyphicon glyphicon-thumbs-up" style="color: rgb(255,70,78);"></span> 好评!
								</div>
								<div class="textcenter col-md-4 col-sm-4">
									衣服收到，是想象中的很满意，做工细整齐，物流快，正好这几天穿，喜欢的亲们赶快下手吧！
								</div>
								<div class="textcenter col-md-3 col-sm-3">
									全勇运动户外特卖店
								</div>
								<div class="textcenter col-md-3 col-sm-3">
									李宁 女式 团购系列简约拼色无帽外套 AWDH484-1
								</div>
							</div>
							<hr />
						</div>
						<!--我的评价end-->

						<!--基本资料start-->
						<div class="tab-pane" id="tabs-information">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									账户设置
								</li>
								<li>
									基本资料
								</li>
							</ol>
							<form method="post" action="modinfo.php" enctype="multipart/form-data">
							<?php
								$sql_select_user = "select id,username,url from user where username = '".$_SESSION['username']."'";
								$result = mysqli_query($conn,$sql_select_user);
								if($result && mysqli_num_rows($result)){
									while($row = mysqli_fetch_assoc($result)){
										
										echo "<div class=\"row\">";
										echo "<div class=\"col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4 textcenter\">";
										echo "<img id=\"img-show2\" class=\"img-style\" src=".$row['url'].">";
										echo "<p>";
										echo "<input style=\"visibility:hidden;\" type=\"file\" id=\"file2\" name=\"file2\" accept=\"image/gif, image/jpeg, image/png, image/jpg\" onchange=\"filec
											hange2(event)\">";
										echo "</p>";	
										echo "<div>头像</div>";
										echo "</div>";
										echo "</div>";
										echo "<div class=\"row\" style=\"margin-top: 20px;\">";
										echo "<div class=\"col-md-12 col-sm-12 textcenter\" style=\"font-size: 20px;font-weight:bold;\">";
										echo "昵称：<span>".$row['username']."</span>";
										echo "</div>";
										echo "</div>";
										echo "<div class=\"row\" style=\"margin-top: 20px;\">";
										echo "<div class=\"col-md-12 col-sm-12 textcenter\" style=\"font-size: 20px;font-weight:bold;\">";
										echo "手机号：<input type=\"text\" id=\"input-phone\" name=\"input-phone\" value=".$row['username']." readonly=\"true\" style=\"border: none;width: 125px;\" />";
										echo "</div>";
										echo "</div>";
										echo "<div class=\"row\" style=\"margin-top: 20px;\">";
										echo "<div class=\"col-md-12 col-sm-12 textcenter\" style=\"font-size: 20px;font-weight:bold;\">";
										echo "<button class=\"btn btn-primary\" id=\"btn-modi-phone\" onclick=\"modiphone()\">修改</button>";
										echo "<button class=\"btn btn-primary\" id=\"btn-save-phone\" style=\"margin-left:100px;\" disabled=\"false\" onclick=\"savephone()\">保存</button>";								
										echo "</div>";
										echo "</div>";
										echo "<input type=\"submit\" id=\"post-userinfo\"/>";
										
									}
								}
							?>
							</form>
							
						</div>
						<!--基本资料end-->

						<!--收货地址start-->
						<div class="tab-pane" id="tabs-address">
							<ol class="breadcrumb">
								<li>
									<a href="user.html">个人中心</a>
								</li>
								<li>
									账户设置
								</li>
								<li>
									收货地址
								</li>
							</ol>
							<div class="row">
								<div class="col-md-4 col-sm-4 divred" id="address1" style="margin-top: 20px;" onclick="redok(this.id)">
									<h4 class="titleh">收货地址一</h4>
									<textarea rows="4" class="img-style" readonly="true" style="border: none;"> 广东省珠海市香洲区唐家湾金凤路北京理工大学珠海学院 ( 张力 收)15992680980</textarea>

									<div class="row">
										<div style="float: right;">
											<span class="glyphicon glyphicon-ok" style="color: rgb(255,70,78);visibility:hidden;"></span>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 divred" id="address2" style="margin-top: 20px;" onclick="redok(this.id)">
									<h4 class="titleh">收货地址一</h4>
									<textarea rows="4" class="img-style" readonly="true" style="border: none;"> 广东省珠海市香洲区唐家湾金凤路北京理工大学珠海学院 ( 张力 收)15992680980</textarea>

									<div class="row">
										<div style="float: right;">
											<span class="glyphicon glyphicon-ok" style="color: rgb(255,70,78);visibility:hidden;"></span>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 divred" id="address3" style="margin-top: 20px;" onclick="redok(this.id)">
									<h4 class="titleh">收货地址一</h4>
									<textarea rows="4" class="img-style" readonly="true" style="border: none;"> 广东省珠海市香洲区唐家湾金凤路北京理工大学珠海学院 ( 张力 收)15992680980</textarea>

									<div class="row">
										<div style="float: right;">
											<span class="glyphicon glyphicon-ok" style="color: rgb(255,70,78);visibility:hidden;"></span>
										</div>
									</div>
								</div>
								<div style="clear: both;"></div>
								<div class="col-md-4 col-sm-4 divred" id="address4" style="margin-top: 20px;" onclick="redok(this.id)">
									<h4 class="titleh">收货地址一</h4>
									<textarea rows="4" class="img-style" readonly="true" style="border: none;"> 广东省珠海市香洲区唐家湾金凤路北京理工大学珠海学院 ( 张力 收)15992680980</textarea>

									<div class="row">
										<div style="float: right;">
											<span class="glyphicon glyphicon-ok" style="color: rgb(255,70,78);visibility:hidden;"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--收货地址end-->

					</div>
				</div>

				<!--内容面板end-->
			</div>
			<script type="text/javascript">
			</script>
			<!--购物车弹出框start-->
			<div class="modal fade" id="myModal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>购物车</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-1 col-lg-1 col-sm-1">
									<input type="checkbox" />
								</div>
								<div class="col-md-3 col-lg-3 col-sm-3">
									<img src="../images/youke/goods.JPG" style="width: 130px;height: 150px;" />
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
									<!--<input type="button" value="-" />-->
									<label>数量：</label>
									<input type="number" value="1" style="width: 45px;text-align: center;" />
									<!--<input type="button" value="+" />-->
								</div>
								<div class="col-md-2 col-lg-2 col-sm-2">
									<font color="red" size="5">&yen98</font>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-lg-2" style="margin-top: 10px;">
									<input type="checkbox" />
									<label>全选</label>
								</div>
								<div class="col-md-3 col-lg-3" style="float: right;padding-left: 30px;">
									<button class="btn btn-default">批量删除</button>
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
									<img src="../images/youke/goods.JPG" style="width: 130px;height: 150px;" />
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
					<a href="#">
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
					<button onmouseover="this.style.backgroundColor = 'rgb(255,70,78)';" onmouseout="this.style.backgroundColor = '#2b2b2b';" style="border: none;background-color: #2B2B2B;">
					<span class="glyphicon glyphicon-heart" style="width: 23px;height: 30px;margin-top: 10px;"></span>
				</button>
				</div>
			</div>
			<!--侧边导航-end-->

			<!--底部声明-start-->
			<div class="row margintop10">
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
			</div>

			<!--底部声明-end-->

			<script type="text/javascript " src="../jq/jquery-3.1.0.js "></script>
			<script type="text/javascript " src="../bootstrap-3.3.0/docs/dist/js/bootstrap.js "></script>
			<script type="text/javascript" src="../js/user_js.js"></script>		
			<script type="text/javascript">
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
			function checkphone(){
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
			
			</script>		
	</body>
</html>