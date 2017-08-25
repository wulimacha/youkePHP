<?php
	session_start();
	$conn = mysqli_connect('localhost','root','123456');
	
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit("<script type='text/javascript'>alert('数据库连接失败！');history.go(-1);</script>");
	}
	mysqli_select_db($conn,'php');
	mysqli_set_charset($conn,'utf8');
	
	$sql_select_url = "select url from user where username = '".$_SESSION['username']."'";
if ((($_FILES['file2']["type"] == "image/gif") 
	|| ($_FILES["file2"]["type"] == "image/JPG")
	|| ($_FILES["file2"]["type"] == "image/png")
	|| ($_FILES["file2"]["type"] == "image/jpeg") 
	|| ($_FILES["file2"]["type"] == "image/pjpeg")) 
	&& ($_FILES["file2"]["size"] < 100000)) 
	{ 
		if ($_FILES["file2"]["error"] > 0) 
		{ 
			exit ("<script type='text/javascript'>alert('" . $_FILES["file2"]["error"] . "');history.go(-1);</script>");
		} 
		else 
		{ 
			if (file_exists("../images/youke/user/" . $_FILES["file2"]["name"])) 
			{ 
				exit ("<script type='text/javascript'>alert('文件".$_FILES["file2"]["name"]."已存在！');history.go(-1);</script>");
			} 
			else 
			{ 
				move_uploaded_file($_FILES["file2"]["tmp_name"], 
				"../images/youke/user/" . $_FILES["file2"]["name"]); 
				
					
				$result1 = mysqli_query($conn,$sql_select_url);
				
									
					if($result1){
						$row = mysqli_fetch_assoc($result1);
						$file = $row['url'];
						$result2 = @unlink ($file); 
						if($result2){
							$old_name = "../images/youke/user/".$_FILES["file2"]["name"];
							$type = substr($_FILES["file2"]["type"],6);
							$new_name = "../images/youke/user/".$_SESSION['username'].".".$type;
							$sql_alter_url = " update user set url = '".$new_name."' where username = '".$_SESSION['username']."'";
							$result3 = rename("$old_name","$new_name");
							if($result3){
								$result = mysqli_query($conn,$sql_alter_url);
								if($result){
									exit ("<script type='text/javascript'>alert('修改头像成功！');</script>");
								}
								else{
									exit ("<script type='text/javascript'>alert('修改头像失败！');</script>");
								}
							}
							else{
								exit ("<script type='text/javascript'>alert('重命名失败！');</script>");
							}													
						}
						else{
							exit ("<script type='text/javascript'>alert('删除失败！');</script>");
						}
						
					}
					
					
			} 
		} 
	} 
	else 
	{ 
		exit ("<script type='text/javascript'>alert('文件格式不符合要求！');history.go(-1);</script>");
	} 
?>