<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$xbbm=$_POST['xbbm'];
$xbmc=$_POST['xbmc'];
$xybm=$_POST['xybm'];

$sql="insert into xbxxb(xbbm,xbmc,xybm) values('".$xbbm."','".$xbmc."','".$xybm."')";
$sql2="select * from xyxxb where xybm='".$xybm."'";

$result2=mysql_query($sql2);
$num=mysql_num_rows($result2);

if($num>0){
	$result=mysql_query($sql);
	if($result){
		echo "yes";
	}else{
		echo "no";
	}
}else{
	echo "noxy";
}



mysql_close($conn);
?>