
 <?php
    include_once("../conn/conn.php");
	$sql="select * from product";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagesize=5;
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno = "";
	if(isset($_GET["pageno"]))
		$pageno=$_GET["pageno"];
	else
		$pageno = 0;
	
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from product order by code asc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>


<div align="center">
  <h1><font color="#0066FF">查看商品</font></h1>
</div>
  <table width="800" align="center" border="2" bgcolor="">
 

	     <tr>
				<th>商品货号</th>
				<th>商品名称</th>
				<th>库存号</th>
				<th>进货日期</th>
			    <th>商品数量</th>
				<th>商品价格</th>
			</tr>
		
  <?php
  	while ($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
    <td ><?php echo $rows["code"]?></td>
	 <td ><?php echo $rows["p_name"]?></td>
	  <td ><?php echo $rows["stor_id"]?></td> 
	   <td ><?php echo $rows["in_date"]?></td>  
	   <td ><?php echo $rows["in_num"]?></td> 
	   <td ><?php echo $rows["out_price"]?></td> 
	   </tr>
	 
	<?php
	}
  ?>
</table>


<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
	if($pageno==1)
	{
	?>
	首页 | 上页 | <a href="?pageno=<?php echo $pageno+1?>">下页</a> | <a href="?pageno=<?php echo $pagecount ?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上页</a> | 下页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上页</a> | <a href="?pageno=<?php echo $pageno+1?>">下页</a> | <a href="?pageno=<?php echo $pagecount ?>">末页</a>
	<?php
	}
?>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
	for($i=1;$i<=$pagecount;$i++)
	{
	?>
    <a href="?pageno=<?php echo $i?>"><?php echo $i?></a>
    <?php
	}
?></td>

<td bgcolor="#FFFFFF">
<form name="frm" action="" method="get" style="margin:0px;">
<input type="text" name="pogeno" size="3" value="<?php echo $pageno?>" />
<input type="submit" value="go" />
</form></td>
  </tr>
</table>



