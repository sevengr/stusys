<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$bjbm=$_POST['bjbm'];
$bjmc=$_POST['bjmc'];
$zybm=$_POST['zybm'];

$sql="insert into bjxxb(bjbm,bjmc,zybm) values('".$bjbm."','".$bjmc."','".$zybm."')";
$sql2="select * from zyxxb where zybm='".$zybm."'";

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