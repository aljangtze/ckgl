<body>
<?php
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql="select * from product where code='$id'";
	$rs=mysql_query($sql); 
?>
  <?php
    if($_POST["updsp"]){
	$in_date=date('Y-m-d H:i:s');
	 $code=$_POST["code"];
	$p_name=$_POST["p_name"];
    $in_num=$_POST["in_num"];
    $store_id=$_POST["store_id"];
	$in_price=$_POST["in_price"];
	$out_price=$_POST["out_price"];
	$remark=$_POST["remark"];
	include_once("../conn/conn.php");
	$d_sql="delete  from product where code='$code'";
	mysql_query($d_sql)or die("shibai");
    $sql="insert into  product(p_name,code,stor_id,in_date,in_num,in_price,out_price,remark)" .
	" values ('$p_name','$code','$store_id','$in_date','$in_num','$in_price','$out_price','$remark')";
     mysql_query($sql)or die("shibai");
 	 echo "<script>alert('修改成功！');window.location='product_manage.php'</script>";
	
}
?>
<form id="form1" name="form1" method="post" action="" onSubmit="">
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
  	 <tr>
    <td colspan="4" align="right" bgcolor="#FFFFFF"> <a href='product_manage.php'><font color="#FF0000">返回</font></a></td>
    </tr>
   
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">修改商品信息</th>
    </tr>

	 <?php
  	while ($rows=mysql_fetch_array($rs))
	{
	?>
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品货号:</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="code" size="40" maxlength="40"  value="<?php echo $rows["code"]?>" /></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">商品名称</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="p_name" size="40" maxlength="40"  value="<?php echo $rows["p_name"]?>" /></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">商品数量</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="in_num" size="40" maxlength="40"  value="<?php echo $rows["in_num"]?>" /></td>
    </tr>
	<tr>
      <td width="95" bgcolor="#FFFFFF">仓库</td>
      <td width="535" bgcolor="#FFFFFF"> 
	  <select name="store_id">
	  		<?php

	  		$sql = "SELECT * FROM `stor_manage`";
	  		$query = mysql_query($sql);
	  		while ($row = mysql_fetch_array($query)) {
	  			echo "<option value=\"{$row[0]}\">仓库编号：{$row[0]}  仓库名：{$row[1]}</option>";
	  		}
	  		?>
	  		</select></td>
    </tr>
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品进价</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="in_price" size="40" maxlength="40"  value="<?php echo $rows["in_price"]?>" /></td>
    </tr>
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品售价</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="out_price" size="40" maxlength="40"  value="<?php echo $rows["out_price"]?>" /></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">备注</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="remark" size="40" maxlength="40"  value="<?php echo $rows["remark"]?>" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit"  name="updsp" value="修改" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
		   <?php
	}
  ?>
  </table>
</form>

</body>