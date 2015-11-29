<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
//1、连接数据库服务器
$conn = @mysql_connect("localhost","root","112233");  //@用于屏蔽错误
if($conn){  //判断数据库服务器是否连接成功
	echo "数据库连接成功！";
}
else{
	echo "数据库连接失败";
}
//2、选择数据库
mysql_select_db("yzq");
//3、设置数据库编码
mysql_query("set names utf8");
//4、执行具体的数据库操作
//查询当前用户名是否被占用
//变量命名方法，一般采用驼峰法（大驼峰和小驼峰）
$sql = "select * from userinfo where username = '".$_POST['username']."'";  //构建查询语句
$result = mysql_query($sql); //执行sql查询，返回结果集（resource类型)
$num = mysql_num_rows($result); //判断返回结果集中的记录行数
//echo $num."<br>"; 
if($num){ //如果返回结果集中的记录行数非0（1），则说明此用户名已经被占用
	echo "<script language='javascript'>alert('对不起，您输入的用户名已经被占用了！');history.back();</script>";  //在客户端弹出错误提示
	exit;
}
//将新注册的信息写入数据库
$fav1 = '';
foreach($_POST['fav'] as $vaule){  //遍历数组
	$fav1 .= $vaule; //将数组元素拼接在一起
}
$sql = "insert into userinfo (username,pw,sex,fav,email) values ('".$_POST['username']."','".md5($_POST['pw'])."','".$_POST['sex']."','".$fav1."','".$_POST['email']."')";  //构建一个插入新记录的sql语句
$result = mysql_query($sql);  //执行查询
echo $sql;
echo mysql_error();
if(mysql_affected_rows()>0){ //查询受影响的记录行数
	echo "<script language='javascript'>alert('注册成功！');location.href='zcb1.html';</script>";
}
else{
	echo "<script language='javascript'>alert('注册失败');location.href='zcb1.html';</script>";
}

echo "你输入的用户名是：".$_POST['username']."<br>";
echo "你输入的密码是：".$_POST['pw']."<br>";
echo "你输入的确认密码是：".$_POST['cpw']."<br>";
echo "你输入的邮箱是：".$_POST['email']."<br>";
echo "你输入的性别是：".$_POST['sex']."<br>";
echo "你输入的爱好是：".$_POST['fav']."<br>";

?>
</body>
</html>