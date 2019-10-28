<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$mid=$_POST['mid'];

$sql="DELETE FROM bjxxb WHERE bjbm = '".$mid."'";
$sql2="select * from bjxxb where bjbm='".$mid."'";

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