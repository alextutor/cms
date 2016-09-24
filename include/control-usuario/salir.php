<?php session_start(); 
	$_SESSION['id_usu_web']="";
	session_destroy(); 	
	header ("Location: /index.php");
?> 