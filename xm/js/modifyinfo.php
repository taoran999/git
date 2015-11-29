<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include_once("conn.php");
$username = $_POST['username'];
$pw = $_POST['pw'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$fav = $_POST['fav'];
$fav1 = '';
foreach($fav as $a){   //专门针对数组的循环语句，常用于遍历数组
	$fav1 .=$a;  //$fav1 = $fav . $a;
}
if($pw){  //说明要更新密码
    $sql = "update userinfo set pw = '".md5($pw)."',email = '$email',sex = '$sex',fav = '$fav1' where username = ''";
}
else{  //
	$sql = "update userinfo set email = '$email',sex = '$sex',fav = '$fav1' where username = '$username'";
}
$result = mysql_query($sql);
if(mysql_affected_rows() == -1){
	echo "<script>alert('更新数据出错！');history.back();</script>";
}
else
	echo "<script>alert('更新数据成功！');location.href='modify.php';</script>";
?>

</body>
</html>