<?php
    session_start();
    include_once("../conn/conn.php");
    $id=$_GET['id'];
    $sql = "delete from stor_manage where stor_id='$id'";
    mysql_query($sql) or die("shibai");
	
    echo "<script>alert('删除成功！');window.location='store.php'</script>";
	
	
?>