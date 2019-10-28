<?php

define("HOST","localhost");
define("USER","root");
define("PASSWD","root");

$conn=mysql_connect(HOST,USER,PASSWD);

if(!$conn)
{
	die('Could not connect:' .mysql_error());
}

$dbselect=mysql_select_db("jy",$conn);

if(!$dbselect)
{
	die('Can\'t use DataBase:' .mysql_error());
}

mysql_query("set names 'utf8'");
?>