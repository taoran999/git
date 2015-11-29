<?php
//1、连接数据库服务器
$conn = @mysql_connect("localhost","root","123456");  //@用于屏蔽错误
if($conn){  //判断数据库服务器是否连接成功
	//echo "数据库连接成功！";
}
else{
	echo "数据库连接失败";
}
//2、选择数据库
mysql_select_db("member");
//3、设置数据库编码
mysql_query("set names utf8");
?>