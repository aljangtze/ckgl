<?php
if($_POST["addck"]){
      include_once("../conn/conn.php");
	 $stor_id=$_POST["stor_id"];
	 $s_sql="select stor_id from stor_manage where stor_id='$stor_id'";
	 $s_result=mysql_query( $s_sql);
	 $s_row=mysql_fetch_array($s_result);
	 if($s_row)
	 echo "<script>alert('仓库编号已存在！');window.location='store.php'</script>";
	 else{    
    $sql="insert into`stor_manage` (`stor_id`,`stor_name`,`remark`) values ('$_POST[stor_id]','$_POST[stor_name]','$_POST[remark]')";
    mysql_query($sql)or die("失败");
	echo "<script>alert('添加成功！');window.location='store.php'</script>";
	}
}
?>
<body>
<form id="addck" name="addck" method="post" action="" >
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
      <tr>
       <td colspan="4" align="right" bgcolor="#FFFFFF"> <a href='store.php'><font color="#FF0000">返回 </font></a></td></th>
    </tr>
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">添加仓库信息</th>
    </tr>
	

    <tr>
      <td width="95" bgcolor="#FFFFFF">仓库编号:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="stor_id" id="ck" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">仓库名:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="stor_name" id="ckm" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">备注:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="remark" id="bz" /></td>
    </tr>    

    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="addck" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>