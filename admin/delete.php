<?php
	ob_start();
    session_start();
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql = "delete from admin where id='$id'";
     mysql_query($sql) or die("shibai");
    echo "<script>alert('删除成功！');window.location='user_manage.php'</script>";
   
?>
