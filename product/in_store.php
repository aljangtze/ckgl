<body>
<?php

  include_once("../conn/conn.php");
  ?>
  <?php
    if(isset($_POST["addsp"])){
	
	$in_date=date('Y-m-d H:i:s');
	$code=$_POST["code"];
	 $s_sql="select code from product where code='$code'";
	 $s_result=mysql_query( $s_sql);
	 $s_row=mysql_fetch_array($s_result);
	 if($s_row){
	 echo "<script>alert('仓库编号已存在！');window.location='in_store.php'</script>";
	 }
	 else{
	$p_name=$_POST["p_name"];
    $in_num=$_POST["in_num"];
    $store_id=$_POST["store_id"];
	$in_price=$_POST["in_price"];
	$out_price=$_POST["out_price"];
	$remark=$_POST["remark"];
	include_once("../conn/conn.php");
    $sql="insert into  product(p_name,code,stor_id,in_date,in_num,in_price,out_price,remark)" .
		" values ('$p_name','$code','$store_id','$in_date','$in_num','$in_price','$out_price','$remark')";
     mysql_query($sql)or die("shibai");
 	 echo "<script>alert('添加成功！');window.location='in_store.php'</script>";
	}
}
?>
<div align="center">
  <h1><font color="#0066FF">商品入库</font></h1>
</div>
<form id="form1" name="form1" method="post" action="" onSubmit="">
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
  
   
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">添加商品</th>
    </tr>
	
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品货号:</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="code" size="40" maxlength="40"/></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">商品名称</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="p_name" size="40" maxlength="40"/></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">商品数量</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="in_num" size="40" maxlength="40"/></td>
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
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="in_price" size="40" maxlength="40"/></td>
    </tr>
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品售价</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="out_price" size="40" maxlength="40"/></td>
    </tr>
    <tr>
      <td width="95" bgcolor="#FFFFFF">备注</td>
      <td width="535" bgcolor="#FFFFFF"><input type="text" name="remark" size="40" maxlength="40"/></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit"  name="addsp" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>

</body>