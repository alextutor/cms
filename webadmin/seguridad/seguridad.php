<?php  session_start();
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');

 // echo $_SESSION['permitido'] ;
if ($_SESSION['permitido'] != "SI") { 
    //si no existe, envio a la página de autentificacion 	
	echo "<script type='text/javascript'>
	 document.location.href='" . ROOT_PATH ."/webadmin/index.php?errorusuario=no permitido';
	</script>";
	//   header("Location: http://www.infodisfap.com/seguridad/index.php"); 
		//ademas salgo de este script 
	   exit(); 
		} 
?> 