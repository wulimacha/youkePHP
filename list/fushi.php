<?php
?>
<html>
	<head>
		<title>服饰</title>
	</head>
	<body>
		<link href="../bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet" />
		<link href="../css/buttoncss.css" rel="stylesheet" />
		<link href="../css/index_css.css" rel="stylesheet"/>
		
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
						<li>
							<a href="#" class="btn" data-target="#myModal-login" data-toggle="modal"><span class="glyphicon glyphicon-user" style="color: white;"></span>登录</a>
						</li>
						<li>
							<a href="#" class="btn" data-target="#myModal-register" data-toggle="modal"><span class="glyphicon glyphicon-pencil" style="color: white;"></span>注册</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--导航条-end-->
		
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
					<span class="badge">4</span>
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
	</body>
</html>