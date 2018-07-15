<?php

	session_start();
    include_once("conn/conn.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css1.css" rel="stylesheet" type="text/css">
<title>登录页面</title>
<style type="text/css">
<!--
body {
	background-image: url(img/8.jpg);
}
-->
</style></head>

<body>
<?php
	$POST_dl="";
	if(isset($_POST["dl"]))
	{
		$POST_dl=$_POST["dl"];
	}
	if($POST_dl=="登陆")
	{
		include_once("conn/conn.php");
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		$code=$_POST["code"];
		if($code<>$_SESSION["auth"])
		{
		echo "<script >alert('验证码不正确');location.href='login.php';</script>";
		
		}
		$sql="select * from admin where name='$username'";
		$rs=mysql_query($sql) or die('shibai');
		if(mysql_num_rows($rs)<1)
		{
		 
		  echo"<script>alert('用户不存在！');location.href='login.php';</script>"; 
		  }
		 
		   else{
		    $row=mysql_fetch_array($rs);
			if($row['password']!=$pwd){
			echo"<script>alert('密码错误！');location.href='login.php';</script>";
			}
		else{
			  
			 $_SESSION["username"]=$_POST["username"];
			$_SESSION["pwd"]=$_POST["pwd"];
			$_SESSION["name"]=$row['user_mark'];
			 $_SESSION["login"]="YES";
	        echo"<script>alert('登录成功');location.href='frame.php';</script>";
	   }
		
		}
		}
		
	
?>

<form id="frm" name="frm" method="post" action="" onSubmit="return check()">
  <table width="350"  align="center">
    
    <tr>
      <td>用户名 : </td>
      <td><input name="username" type="text" id="username" /></td>
    </tr>
    <tr>
      <td>密码 : </td>
      <td><input name="pwd" type="password" id="pwd" /></td>
    </tr>
	<tr>
		<td>验证码:</td>
		<td><input name="code" type="text" id="code" size="4" />
		&nbsp;&nbsp;&nbsp;&nbsp;<img src="verify.php" style="vertical-align:middle" /></td>
	</tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="dl" value="登陆" />
      <input type="reset" name="Submit2" value="取消" /></td>
    </tr>
  </table>
</form>


</body>
</html>
