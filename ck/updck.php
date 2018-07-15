<?php
    session_start();
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql="select * from stor_manage where stor_id='$id'";
	$rs=mysql_query($sql); 
?>
<?php
 if($_POST["updck"]){
     $id=$_POST["stor_id"];
	 $stor_name=$_POST["stor_name"];
	 $remark=$_POST["remark"];
     $sql="UPDATE  stor_manage set  stor_name='$stor_name',remark= ' $remark'  where stor_id='$id'";
      mysql_query($sql) or die("shibai");
	   if(mysql_affected_rows($db)!=0){
  		echo "<script >alert('修改成功！');window.location='store.php'</script>";
       }
	 }
?>
<body>

<form id="addck" name="addck" method="post" action="" >
  <table border="0"  align="center" bordercolor="#FFFFFF" bgcolor="#CCCC66">
  <tr>
    <td colspan="4" align="right" bgcolor="#FFFFFF"> <a href='store.php'><font color="#FF0000">返回</font></a></td>
    </tr>
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">修改仓库信息</th>
    </tr>
	
    <tr>
    <?php
  	while ($rows=mysql_fetch_array($rs))
	{
	?>
    <tr>
      <td width="95" bgcolor="#FFFFFF">仓库编号:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="stor_id" id="stor_id" readonly="readonly" value="<?php echo $rows["stor_id"]?>" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">仓库名:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="stor_name" id="stor_name"  value="<?php echo $rows["stor_name"]?>" /></td>
    </tr>
	  <tr>
      <td width="95" bgcolor="#FFFFFF">备注:</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="remark" id="remark" value="<?php echo $rows["remark"]?>"  /></td>
    </tr>    

    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="updck" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
	   <?php
	}
  ?>
  </table>
</form>
</body>