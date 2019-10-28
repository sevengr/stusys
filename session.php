<?php

session_start();

if (!isset($_SESSION['ischecked'])){
	header("Location:login.php");
}
?>