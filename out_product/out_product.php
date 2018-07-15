<?php
include_once("../conn/conn.php");
// if($_SESSION["login"]!="YES"){
 // echo"<script>alert('你还没有登陆,无法进入主页面');</script>";
 // exit;
//}
?>
<?php
if($_POST["tj"]){
$code=$_POST["code"];
$sql="select * from `product` where code='$code'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$out_num=$_POST["out_num"];
$num=$row["in_num"]-$_POST["out_num"];
if($num>0){
    $sql_outpro="update product set  in_num = '$num' WHERE code ='$code'";

    $out_date=date('Y-m-d H:i:s');
	$sql_outstor="insert into  out_product (p_name ,code ,out_date ,in_price ,out_price ,out_num ,`stor_id` )" .
			"VALUES ('$row[p_name]', '$row[code]','$out_date', '$row[in_price]', '$row[out_price]', '$out_num', '$row[stor_id]')";
	mysql_query($sql_outstor)or die("shibai");
	mysql_query($sql_outpro)or die("sb");
	echo "<script>alert('商品成功售出！');window.location='out_product.php'</script>";
}
else {
	 echo "<script>alert('商品库存不足！');window.location='out_product.php'</script>";
}
}
?>


<div align="center">
  <h1><font color="#0066FF">出售商品</font></h1>
</div>
<form id="form1" name="form1" method="post" action="" onSubmit="">
  <table border="0"  align="center" bordercolor="#000000" bgcolor="#CCCC66">
   
    <tr>
      <th colspan="4" bgcolor="#FFFFFF">销售商品</th>
    </tr>
	
	 <tr>
      <td width="95" bgcolor="#FFFFFF">商品货号:</td>
      <td width="200" bgcolor="#FFFFFF"><select name="code">
	  		<?php

	  		$sql = "SELECT * FROM  product";
	  		$query = mysql_query($sql);
	  		while ($row = mysql_fetch_array($query)) {
	  			echo "<option value=\"{$row[2]}\"> 商品货名：{$row[2]}</option>";
	  		}
	  		?>
	  		</select></td>
    </tr>

    <tr>
      <td width="95" bgcolor="#FFFFFF">数量</td>
      <td width="300" bgcolor="#FFFFFF"><input type="text" name="out_num" size="40" maxlength="40"/></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit"  name="tj" value="确认" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>


