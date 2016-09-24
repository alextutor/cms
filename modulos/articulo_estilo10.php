<?php session_start(); 
	include_once($_SERVER['DOCUMENT_ROOT'].'/include/pagina-actual.php');  	
	//echo $_SESSION["pagina_retorno"];exit;
	if ($_SESSION['id_usu_web']==""){	//si esta vacio el codigo del usuario			
		$_SESSION['pagina_retorno']=$pagina_actual;
		//echo $_SESSION['pagina_retorno'];exit;
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/control-usuario/form-ingresa-registrate.php');
	}else{
		include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/comentario-combinado-multiple/form-enviar-comentario.php'); 				
	}
?>