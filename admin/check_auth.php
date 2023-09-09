<?php
	include_once("config.php");
	if($_COOKIE['login'] != $login && $_COOKIE['pass'] != $password){
		header("Location:/admin/login.php");
	}
	
?>

