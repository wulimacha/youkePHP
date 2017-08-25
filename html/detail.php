<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link href="../bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="../css/buttoncss.css" rel="stylesheet" type="text/css"/>
		<link href="../css/index_css.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../css/city-picker.css">
		<title>商品详情</title>
	</head>

	<body style="padding: 0px;">
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
							<a href="#">Link <span class="sr-only">(current)</span></a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" style="text-align: center;">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right" style="color:white;">
						<!--<li>
							<a href="#" class="btn" data-target="#myModal-login" data-toggle="modal"><span class="glyphicon glyphicon-user" style="color: white;"></span>登录</a>
						</li>
						<li>
							<a href="#" class="btn" data-target="#myModal-register" data-toggle="modal"><span class="glyphicon glyphicon-pencil" style="color: white;"></span>注册</a>
						</li>-->
						<?php
							session_start();
							if(isset($_SESSION['username'])){						
							    echo "<li>欢迎会员".$_SESSION['username']."</li>";
							    echo "<li><a href='loginout.php'>退出</a></li>";							
							}else{
					    
							    echo "<li><a href=\"#\" class=\"btn\" data-target=\"#myModal-login\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-user\" style=\"color: white;\"></span>登录</a></li>";
								echo "<li><a href=\"#\" class=\"btn\" data-target=\"#myModal-register\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-pencil\" style=\"color: white;\"></span>注册</a></li	>";
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
		<!--导航条-end-->

		<!--输入框-start-->
		<div class="row">
			<div class="div-input" style="">
				<input class="col-md-5 col-lg-10" type="text" class="form-control" placeholder="Search" style="border:none;">
				<a><span class="glyphicon glyphicon-search"></span></a>
			</div>
		</div>
		<!--输入框-end-->

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
				<button data-target="#myModal-Collection" data-toggle="modal" onmouseover="this.style.backgroundColor = 'rgb(255,70,78)';" onmouseout="this.style.backgroundColor = '#2b2b2b';" style="border: none;background-color: #2B2B2B;">
					<span class="glyphicon glyphicon-heart" style="width: 23px;height: 30px;margin-top: 10px;"></span>
				</button>
			</div>
		</div>
		<!--侧边导航-end-->

		<!--商品信息-start-->
		<?php
			$id = $_GET['id'];
			$conn = mysqli_connect('localhost','root','123456');
			if(mysqli_errno($conn)){
				echo mysqli_errno($conn);
				exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
			}
			mysqli_select_db($conn,'php');
			mysqli_set_charset($conn,'utf8');
			$sql_select_goods = "select * from goods where id = '".$id."'";
			$result = mysqli_query($conn,$sql_select_goods);
			if($row = mysqli_fetch_assoc($result)){
				echo '
			<div class="container hidden-xs">
			<div class="row" style="margin-top: 20px;margin-right: 100px;">
				<div class="col-md-3 col-sm-3 col-xs-10" style="margin-top: 50px;">
					<img class="img-style" src="../'.$row['smallurl'].'" />
				</div>
				<div class="col-md-9 col-sm-9 col-xs-10 ">
					<div class="row">
						<h4 style="margin-left: 60px;">"'.$row['description'].'"</h4>
					</div>
					<div class="row" style="margin-top: 25px;">
						<div class="col-md-2 col-sm-2 col-xs-2 textcenter">
							<span>地址</span>
						</div>
						<!--地址选择-start-->
						<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 25px;">
							<div class="city-picker-selector" id="city-picker-search">
								<div class="selector-item storey province">
									<a href="javascript:;" class="selector-name reveal df-color ">省份</a>
									<input type="hidden" name="userProvinceId" class="input-price val-error" value="" data-required="userProvinceId">
									<div class="selector-list listing hide">
										<div class="selector-search">
											<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
										</div>
										<ul>
											<li>北京市</li>
											<li>天津市</li>
										</ul>
									</div>
								</div>
								<div class="selector-item storey city">
									<a href="javascript:;" class="selector-name reveal df-color forbid">城市</a>
									<input type="hidden" name="userCityId" class="input-price val-error" value="" data-required="userCityId">
									<div class="selector-list listing hide">
										<div class="selector-search">
											<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
										</div>
										<ul></ul>
									</div>
								</div>
								<div class="selector-item storey district">
									<a href="javascript:;" class="selector-name reveal df-color forbid">区县</a>
									<input type="hidden" name="userDistrictId" class="input-price val-error" value="" data-required="userDistrictId">
									<div class="selector-list listing hide">
										<div class="selector-search">
											<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
										</div>
										<ul></ul>
									</div>
								</div>
							</div>
						</div>
						<!--地址选择-end-->

					</div>
					<div class="row" style="margin-top: 50px;">
						<div class="col-md-2 col-sm-2 textcenter">
							<span>服务</span>
						</div>
						<div class="col-md-10 col-sm-10">
							<span class="badge badge-style">折</span>
							<span>本商品由优客买手砍价</span>
						</div>
						<div class="col-md-offset-2 col-md-10 col-sm-10">
							<span class="badge badge-style">24</span>
							<span>支付成功后，24小时内发货</span>
						</div>
					</div>
					<div class="row" style="margin-top: 25px;">
						<div class="col-md-2 col-sm-2 textcenter">
							<span>颜色</span>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="btn-group">
								<button class="btn btn-default btnblue">红色</button>
								<button class="btn btn-default btnblue">白色</button>
								<button class="btn btn-default btnblue">橙色</button>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 textcenter">
							<span>尺码</span>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="btn-group">
								<select>
									<option>38</option>
									<option>39</option>
									<option>40</option>
									<option>41</option>
									<option>42</option>
									<option>43</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 25px;">
						<div class="col-md-2 col-sm-2 textcenter">
							<span>数量</span>
						</div>
						<div class="col-md-6 col-sm-6">
							<input id="num" type="number" value="1" onchange="sum()"/> 单价&yen;
							<span id="price" class="badge badge-style">'.$row['price'].'</span> 库存量
							<span class="badge badge-style">'.$row['quantity'].'</span>件
						</div>
						<div class="col-md-4 col-sm-4 ">
							总计：&yen;<span id="sum" class="titleh">'.$row['price'].'</span>
						</div>
					</div>
					<div class="row" style="margin-top: 25px;">
						<div class="col-md-offset-2 col-sm-offset-2 col-md-6 col-sm-6">
							<div class="col-md-6 sol-sm-6">
								<button class="btn btn-primary">立即购买</button>
							</div>
							<div class="col-md-6 sol-sm-6">
								<a href="addcart.php?ids='.$id.'"><button class="btn btn-primary">加入购物车</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			';
			}		
		?>		
		<!--商品信息-end-->
		<input type="number" onchange="" />
		<hr />
		<div class="container hidden-xs" style="">
			<div class="row" style="background-color:rgb();width: 90%;">
				<span style="font-family:'楷体';font-size: 16px;">您可能还喜欢</span>
			</div>
			<div class="row" style="margin-top: 50px;">
					<?php
						for($i = 0;$i < 4;$i ++){
							echo "<div class=\"col-md3 col-sm-3 divred\">";
							echo "<img class=\"img-style\" src=\"../images/youke/goods.JPG\" />";
							echo "</div>";
						}
					?>
			</div>
			<div class="row" style="margin-top: 50px;">
					<?php
						for($i = 0;$i < 4;$i ++){
							echo "<div class=\"col-md3 col-sm-3 divred\">";
							echo "<img class=\"img-style\" src=\"../images/youke/goods.JPG\" />";
							echo "</div>";
						}
					?>				
			</div>
		</div>
		<!--手机端显示-start-->
		<div class="container visible-xs">
			<div class="row" style="margin-top: 50px;">
				<div class="col-xs-8 col-xs-offset-2">
					<img class="img-style" src="../images/youke/goods.JPG" />
				</div>
			</div>
			<div class="row" style="margin-top: 50px;">
				<div class="col-xs-8 col-xs-offset-2">
					<span>乔丹格兰全掌气垫跑步鞋2016秋冬新款男士运动鞋男旅游</span>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter" style="padding-top: 48px;">
					<span>地址</span>
				</div>
				<!--地址选择-start-->
				<div class="col-xs-8">
					<div class="city-picker-selector" id="city-picker-search">
						<div class="selector-item storey province">
							<a href="javascript:;" class="selector-name reveal df-color ">省份</a>
							<input type="hidden" name="userProvinceId" class="input-price val-error" value="" data-required="userProvinceId">
							<div class="selector-list listing hide">
								<div class="selector-search">
									<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
								</div>
								<ul>
									<li>北京市</li>
									<li>天津市</li>
								</ul>
							</div>
						</div>
						<div class="selector-item storey city">
							<a href="javascript:;" class="selector-name reveal df-color forbid">城市</a>
							<input type="hidden" name="userCityId" class="input-price val-error" value="" data-required="userCityId">
							<div class="selector-list listing hide">
								<div class="selector-search">
									<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
								</div>
								<ul></ul>
							</div>
						</div>
						<div class="selector-item storey district">
							<a href="javascript:;" class="selector-name reveal df-color forbid">区县</a>
							<input type="hidden" name="userDistrictId" class="input-price val-error" value="" data-required="userDistrictId">
							<div class="selector-list listing hide">
								<div class="selector-search">
									<input type="text" class="input-search" value="" placeholder="拼音、中文搜索">
								</div>
								<ul></ul>
							</div>
						</div>
					</div>
				</div>
				<!--地址选择-end-->
			</div>
			<div class="row" style="margin-top: 50px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>服务</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<span class="badge badge-style">折</span>
					<span>本商品由优客买手砍价</span>
				</div>
				<div class="col-xs-offset-4 col-xs-8" style="padding-left: 40px;">
					<span class="badge badge-style">24</span>
					<span>支付成功后，24小时内发货</span>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>颜色</span>
				</div>
				<div class="col-sx-8">
					<div class="btn-group" style="padding-left: 40px;">
						<button class="btn btn-default btnblue">红色</button>
						<button class="btn btn-default btnblue">白色</button>
						<button class="btn btn-default btnblue">橙色</button>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>尺码</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<select>
						<option>38</option>
						<option>39</option>
						<option>40</option>
						<option>41</option>
						<option>42</option>
						<option>43</option>
					</select>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>数量</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<input type="number" />
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>单价</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<span class="badge badge-style">&yen;9.9</span>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>库存量:</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<span class="badge badge-style">10</span>件
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-2 col-xs-offset-2 textcenter">
					<span>总计:</span>
				</div>
				<div class="col-xs-8" style="padding-left: 40px;">
					<span class="titleh">&yen;9.9</span>
				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-xs-6 col-xs-offset-3">
					<div class="col-xs-6">
						<button class="btn btn-primary">立即购买</button>
					</div>
					<div class="col-xs-6">
						<button class="btn btn-primary">加入购物车</button>
					</div>
				</div>
			</div>
		</div>
		<!--手机端显示-end-->
		
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
								<img src="../'.$n[10].'" style="width: 130px;height: 150px;" />
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
								<a href="delcart.php?id='.$i.'"><button class="btn btn-default" style="margin-left: 30px;">删除</button></a>
							</div>
						</div>	';							
						        	}
						    }
						    }
						    else{
						    	echo'
						    	<h3 class="titlew textcenter">购物车中空空如也！</h3>
						    	';
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
		
		<!--底部声明-start-->
		<div class="" style="margin-left: 0px;background-color: #2b2b2b;color: white;padding: 20px;margin-top: 25px;">
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

		<script type=" text/javascript " src="../jq/jquery-3.1.0.js "></script>
		<script type="text/javascript " src="../bootstrap-3.3.0/docs/dist/js/bootstrap.js "></script>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/citydata.js"></script>
		<script type="text/javascript" src="../js/cityPicker-1.0.0.js?v=1"></script>
		<script type="text/javascript" src="../js/user_js.js"></script>
		<script type="text/javascript">
			$(function() {
				//模拟城市-联动/搜索
				$('#city-picker-search').cityPicker({
					dataJson: cityData,
					renderMode: true,
					search: true,
					linkage: true
				});
			});
		</script>
	</body>

</html>