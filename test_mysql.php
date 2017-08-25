<?php
$servername = "localhost";
$username = "username";
$password ="123456";
$dbname = "php";
// 创建连接
$conn =new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// 创建数据表
/* $sql_ctable = "CREATE table test(
id int(6) unsigned auto_increment primary key,
firstname varchar(30) not null,
lastname varchar(30) not null,
email varchar(50),
reg_date timestamp)";
if ($conn->query($sql_ctable) === TRUE) {
    echo "表创建成功";
} else {
    echo "创建表错误" . $conn->error;
} */

$sql_insert_test= "insert into test(firstname,lastname,email) 
values('John','Doe','jion@example.com');";
$sql_insert_test.= "insert into test(firstname,lastname,email) 
values('John','Doe','jion@example.com');";
$sql_insert_test.= "insert into test(firstname,lastname,email) 
values('John','Doe','jion@example.com')";
if($conn->multi_query($sql_insert_test) === true){
	echo "插入成功";
}else{
	echo "Error:".$sql_insert_test."<br>".$conn->error;
}
$conn->close();
?>