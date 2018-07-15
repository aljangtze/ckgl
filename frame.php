<?php
session_start();
if($_SESSION["login"]!="YES"){
 echo"<script>alert('你还没有登陆,无法进入主页面');</script>";
 exit;
}
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<frameset rows="60,*" cols="*">
    <frame src="top.php" name="topFrame">

  <frameset rows="*"  cols="10.3%,*" >
  <frame src="left.php" name="leftFrame" >
  <frame src="main.php" name="mainFrame">
</frameset>
</frameset>
<noframes></noframes>
</html>

