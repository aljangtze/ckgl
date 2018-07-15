<?php
	ob_start();
    session_start();
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql="select * from admin where id='$id'";
	$rs=mysql_query($sql);
    

?>
<?php

 if($_POST["upd"]){
     $id=$_POST["id"];
	 $grade=$_POST["grade"];
     $sql="UPDATE  admin set user_mark= '$grade' where id='$id'";
      mysql_query($sql) or die("shibai");
	   if(mysql_affected_rows($db)!=0){
  		echo "<script language=javascript>alert('修改成功！');window.location='user_manage.php'</script>";
       }
	
?>
<form id="upd" name="upd" method="post" action="" >
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
   <tr>
    <td colspan="4" align="right" bgcolor="#FFFFFF"> <a href='user_manage.php'><font color="#FF0000">返回</font></a></td>
    </tr>
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">修改管理员的权限</th>
    </tr>
 <?php
  	while ($rows=mysql_fetch_array($rs))
	{
	?>

	  <tr>
      <td width="95" bgcolor="#FFFFFF">ID:</td>
      <td width="400" bgcolor="#FFFFFF"><input type="text" name="id" id="id" readonly="readonly"  value="<?php echo $rows["id"]?>" /></td>
    </tr>


    <tr>
      <td width="95" bgcolor="#FFFFFF">用户名:</td>
      <td width="400" bgcolor="#FFFFFF"><input type="text" name="usernames" id="usernames" readonly="readonly" value="<?php echo $rows["name"]?>"  /></td>
    </tr>

	
      <td width="95" bgcolor="#FFFFFF">管理权限：</td>
      <td width="400" bgcolor="#FFFFFF">  <select name="grade"  id="select">
              <option value="1">系统管理员</option>
              <option value="0">仓库管理员</option>

              </select>
			  </td>
    </tr>
    

    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="upd" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
    <?php
	}
  ?>
  </table>
</form>