<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$mid=$_POST['mid'];

$sql="DELETE FROM zyxxb WHERE zybm = '".$mid."'";
$sql2="select * from zyxxb where zybm='".$mid."'";

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