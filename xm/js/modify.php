<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
.pwcolor {
	color:#0CF;
}
</style>

</head>

<body>
<?php
$username = $_SESSION['login'];
include_once("conn.php");
$sql = "select * from userinfo where username = '$username'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if(!$num){
	echo "<script>alert('未找到该用户');location.href=index.php</script>";
	exit;	
	}
$info = mysql_fetch_array($result );  //从记录集中取得一条记录，并生成一个数组
?>
<div id="singup">
  <h1>会员资料修改</h1>
  <form action="zcb.php" method="post"  onSubmit="return Validator.Validate(this,3)">
    <table width="489" height="305" border="1">
      <tr>
        <td width="119"><div align="right">用户名</div></td>
        <td width="354"><div align="left"></div>
          <label for="username"></label>
          <input type="text" name="username" id="username"  dataType="Chinese" msg="真实姓名只允许中文" value="<?php echo $username?>" readonly="readonly"/></td>
      </tr>
      <tr>
        <td><div align="right">密码</div></td>
        <td><div align="left">
            <label for="pw"></label>
            <input type="text" name="pw" id="pw" dataType="SafeString"   msg="密码不符合安全规则" />
          </div></td>
      </tr>
      <tr>
        <td><div align="right">确认密码</div></td>
        <td bgcolor="#FFFFFF"><div align="left">
            <label for="cpw"></label>
            <input type="text" name="cpw" id="cpw" />
        <span class="pwcolor">如果不更新密码，请留空</span></div></td>
      </tr>
      <tr>
        <td><div align="right">邮箱</div></td>
        <td><div align="left">
            <label for="email"></label>
            <input type="text" name="email" id="email" dataType="Email" msg="信箱格式不正确" value="<?php echo $info['email']?>"/>
          </div></td>
      </tr>
      <tr>
        <td><div align="right">性别</div></td>
        <td><p>
            <label>
              <input name="sex" type="radio" id="RadioGroup1_0" value="男" checked="checked"  <?php if($info['sex'] == '男'){ echo " checked='checked'"; }?> />
              男 </label>
            <input type="radio" name="sex" value="女" id="RadioGroup1_1" <?php if($info['sex'] == '女'){?> <?php }?> />
            女 <br />
          </p></td>
      </tr>
      <tr>
        <td><div align="right">爱好</div></td>
        <td><p>
            <label>
              <input name="fav[]" type="checkbox" id="CheckboxGroup1_0" value="看电视"  <?php if(strpos($info['fav'],'看电视') !== false){?> checked="checked" <?php }?>/>
              看电视 </label>
            <br />
            <label>
              <input type="checkbox" name="fav[]" value="玩电脑" id="CheckboxGroup1_1" <?php if(strpos($info['fav'],'玩电脑') !== false){?> checked="checked" <?php }?>/>
              玩电脑 </label>
            <br />
          </p></td>
      </tr>
      <tr>
        <td><div align="right">
            <input type="submit" name="button" id="singup1" value="修改" />
          </div></td>
        <td><input name="button2" type="reset" id="singup2" value="重置" /></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>