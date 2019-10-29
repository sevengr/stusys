<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$mid=$_GET['mid'];

$sql2="select * from xsxxb where xh='".$mid."'";

$result2=mysql_query($sql2);
$num=mysql_num_rows($result2);

if($num>0){
    $url="xs_update.php";
    header("refresh:1;$url");
}else{
	echo "no";
}

mysql_close($conn);
?>