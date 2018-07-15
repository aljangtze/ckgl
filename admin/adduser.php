<?php
session_start();
include_once("../conn/conn.php");
 if ($_SESSION['name']==0) {
	echo "<script language=JavaScript>alert('您没有权限访问当前页面！');location.href='use_man.php'</script>";
	exit;
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<title>超市仓库库存管理系统</title>
<script language="javascript">
<!--
function adddo(){
	if(document.adduser.usernames.value == ""){
		alert("管理员名称不能为空!");
		return false;
	}

	if(document.adduser.pwd.value ==""){
		alert("密码不能为空!");
		return false;
	}
	if(document.adduser.pwd2.value != document.adduser.pwd.value){
		alert("两次密码不一致!");
		return false;
	}
}
-->
</script>
</head>





<body>

<?php
 
	if($_POST["add"])
	{  
		$username=$_POST["usernames"];
		$pwd=$_POST["pwd"];
	    $grade=$_POST["grade"];
		include_once("../conn/conn.php");
		$sql="insert into admin (name,pwd,user_mark) values ('$username','$pwd',' $grade')";
		mysql_query($sql)or die("失败");
		echo "<script language=javascript>alert('添加成功！');window.location='adduser.php'</script>";
		?>
		<?php
	}
?>

<form id="adduser" name="adduser" method="post" action="" >
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
   <tr>
    <td colspan="4" align="right" bgcolor="#FFFFFF"> <a href='user_manage.php'><font color="#FF0000">返回</font></a></td>
    </tr>
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">管理员信息添加</th>
    </tr>
	

    <tr>
      <td width="95" bgcolor="#FFFFFF">用户名:</td>
      <td width="400" bgcolor="#FFFFFF"><input type="text" name="usernames" id="usernames" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">密码:</td>
      <td width="400" bgcolor="#FFFFFF"><input type="password" name="pwd" id="pwd" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">确认密码:</td>
      <td width="400" bgcolor="#FFFFFF"><input type="password" name="pwd2" id="pwd2" /></td>
    </tr>
	 <tr>
      <td width="95" bgcolor="#FFFFFF">管理权限：</td>
      <td width="400" bgcolor="#FFFFFF">  <select name="grade"  id="select">
              <option value="1">系统管理员</option>
              <option value="0">仓库管理员</option>

              </select>
			  </td>
    </tr>
    

    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="add" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>

<p>&nbsp; </p>
</body>
</html>
