<?php
    session_start();
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql = "delete from product where code='$id'";
     mysql_query($sql) or die("shibai");
	 if(mysql_affected_rows($db)!=0){
    echo "<script>alert('删除成功！');window.location='product_manage.php'</script>";
	}
?>
