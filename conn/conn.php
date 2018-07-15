<?php
$db = @mysql_connect('localhost','root','123456');//数据库服务器连接（服务器，用户名，密码）
if (!$db) {
	exit("数据库连接操作失败!");
}
$conn = mysql_select_db('ck',$db);//连接选择操作的数据库（shoes为数据库名可修改成自己建的数据库名）
if (!$conn) {
	exit("操作失败,数据库不存在!");
}
mysql_query("SET NAMES utf-8");

?>