<?php
$conn = mysqli_connect('localhost','root','123456');
									if(mysqli_errno($conn)){
										echo mysqli_errno($conn);
										exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
									}
									mysqli_select_db($conn,'php');
									mysqli_set_charset($conn,'utf8');
									$type = $_GET['type'];
									$count_sql = "select count(id) as c from goods where type = '".$type."'";
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
									$sql_select_goods = "select * from goods where type = '".$type."' limit $offset,$num";
									$result = mysqli_query($conn,$sql_select_goods);
									if($result && mysqli_num_rows($result)){
										while($row = mysqli_fetch_assoc($result)){
											echo "<a href=\"html/detail.php?id=".$row['id']."\"><div class=\"col-md-3 col-xs-6 col-lg-3 col-sm-3 divred\" style=\"margin-top:25px;\">";
											echo "<img class=\"img-style\" src=".$row['smallurl']." />";
											echo "<h3>&yen;".$row['price']."</h3>";
											echo "<button class=\"btn \" type=\"submit\" id=\"\">立即购买</button>";
											echo "<a href=\"html/addcart.php?ids=".$row['id']."\"><button class=\"btn \" style=\"margin-left:50px;\" type=\"submit\" id=\"\">加入购物车</button></a>";
											echo "</div></a>";
										}
											echo "</div>";
											/*echo "<div class=\"row\">";									
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
											echo "<!--分页-end-->";*/
									}
									else{
										exit("<script type='text/javascript'>alert('失败！');history.go(-1);</script>");
									}
?>