<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$zybm=$_POST['zybm'];
$zymc=$_POST['zymc'];
$xbbm=$_POST['xbbm'];

$sql="insert into zyxxb(zybm,zymc,xbbm) values('".$zybm."','".$zymc."','".$xbbm."')";
$sql2="select * from xbxxb where xbbm='".$xbbm."'";

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