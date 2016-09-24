<?Php   session_start(); 
	$_SESSION['option']=$_GET["option"];
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];		
?>
<?php 	switch ($_GET["option"]) {
			case "com_seccion_new": 
			 	include_once ( $_SERVER ["DOCUMENT_ROOT"].'/webadmin/mantenimiento/Form-Insertar-seccion.php'); 
				 break;				
			 }  ?>