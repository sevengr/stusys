<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$mid=$_POST['mid'];

$sql="DELETE FROM xyxxb WHERE xybm = '".$mid."'";
$sql2="select * from xyxxb where xybm='".$mid."'";

$result2=mysql_query($sql2);
$num=mysql_num_rows($result2);

if($num>0){
	$result=mysql_query($sql);
	echo "yes";
}else{
	echo "no";
}

mysql_close($conn);
?>