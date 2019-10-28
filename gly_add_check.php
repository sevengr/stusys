<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$user=$_POST['user'];
$passwd=$_POST['passwd'];
$role=$_POST['role'];

$sql="insert into glyxxb(zh,mm,js) values('".$user."','".$passwd."','".$role."')";

$result=mysql_query($sql);
if($result){
	echo "yes";
}else{
	echo "no";
}

mysql_close($conn);
?>