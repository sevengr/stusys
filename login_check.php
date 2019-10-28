<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$user=$_POST['user'];
$passwd=$_POST['passwd'];

$sql="select * from glyxxb where zh='".$user."' and mm='".$passwd."'";

$result=mysql_query($sql);
if($result){

$num=mysql_num_rows($result);
if ($num>0) {
	$row=mysql_fetch_array($result);
	$_SESSION['ischecked']="ok";
	$_SESSION['user']=$user;
	$_SESSION['glyid']=$row['id'];
	$_SESSION['js']=$row['js'];
    echo "yes";
}else{	
	echo "no";
	}
}

mysql_close($conn);
?>