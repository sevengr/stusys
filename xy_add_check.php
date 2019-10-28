<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$xybm=$_POST['xybm'];
$xymc=$_POST['xymc'];

$sql="insert into xyxxb(xybm,xymc) values('".$xybm."','".$xymc."')";

$result=mysql_query($sql);
if($result){
	echo "yes";
}else{
	echo "no";
}

mysql_close($conn);
?>