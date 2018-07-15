<?php
session_start();
 if ($_SESSION['name']==0) {
	echo "<script language=JavaScript>alert('您没有权限访问当前页面！');location.href='../admin/use_man.php'</script>";
	exit;
}
include_once("../conn/conn.php");
$time=time();
$gb_time = date("Y-m-d",$time);
$perNum = 10;//每页显示数目
$page = $_GET['page'];
$offset = ($_GET['page']-1) * $perNum;
if ($offset < 1) {
	$offset = 0;
}
$sql = "SELECT * FROM out_product where out_date = '$gb_time'";
$query = mysql_query($sql);


?>

<title>超市仓库库存管理系统</title>

</head>

<body>
<div align="center">
  <h1><font color="#0000FF">销售记录</font></h1>
</div>
<p align="center"><br />
<div align="center">
  <table width="500"border="1"bgcolor="#0066FF">
    <tr>
      <td width="107">今日销售提示:</td>
	    <td width="381">
	    <?php

	     $sql2 = "SELECT SUM(out_num),SUM((out_price-in_price)*out_num) FROM out_product where out_date= '$gb_time'";
	    $a = mysql_query($sql2);
	    $num_rows = mysql_num_rows($query); //返回商品数目
	    if ($num_rows> 0){
	    	$gain = mysql_fetch_row($a);//SQL查询结果以数组存储
	    	echo "共售出{$gain[0]}件,赢利{$gain[1]}元.";
	    }else {
	    	echo '今日无销售！';
	    }
	    ?>
		</td>
    </tr>
  </table>
</div>
<br />
<div id="sales">
  <div align="center" ><a href="sales.php"><font color="#0066FF">今日销售清单</font></a> | <a href="sales_month.php"><font color="#0066FF">本月销售清单</font></a><br />
  </div>
  <table width="700" align="center" border="2"bgcolor="">
		
			<tr>
				<th>货号</th>
				<th>商品名</th>
				<th>进货价</th>
				<th>售出价</th>
				<th>售出数量</th>
				<th>赢利</th>
				<th>销售时间</th>

			</tr>
		
		<tbody>
	<?php
         while ($row = mysql_fetch_array($query)) {

         $gain=($row[5]-$row[4])*$row[6];
		echo "<tr class=\"{$a}\">
				<td>{$row[2]}</td>
				<td>{$row[1]}</td>
				<td>{$row[4]}</td>
				<td>{$row[5]}</td>
				<td>{$row[6]}</td>
				<td>{$gain}</td>
				<td>{$row[3]}</td>

			</tr>";
	}
		?>
		</tbody>
  </table>
</div>
<div align="center"> 总页数：
    <?php
    $sql = "SELECT COUNT(*) FROM out_product";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $total = ceil($row[0] / $perNum);
    echo $total;
?>
  页 <a href="sales.php?page=<?php echo $page -1;?>">前一页</a>
    <?php
    for ($i = 1; $i <= $total; $i++) {
    	echo "&nbsp;&nbsp;<a href=\"sales.php?page={$i}\">{$i}</a>";
    }
?>
  &nbsp; <a href="sales.php?page=<?php echo $page +1;?>">后一页</a> </div>
</body>

</html>
