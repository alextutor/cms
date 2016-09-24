<?Php session_start();
//addslashes estaba en titulo,$resumen,$tags,$contenido
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
//-------	 
$option=$_GET["option"];
?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	 	         
    extract($_POST);  
	 $seccion=$selectseccion; /*viene de tabla seccion campo ccodseccion*/
  $save_contenido= "UPDATE contenido 	SET						
						ccodpage= '" .$pagina. "',
						estado= '" .$estado. "',						
						ccodcategoria= '1',
						ccodmodulo= '2000',						
						ccodestcontenido= '2001',												
						cnomcontenido= '" .$cnomcontenido. "',
						camicontenido= '" .$camicontenido. "',
						crescontenido= '',
						ctagcontenido= '',
						cimgcontenido= '" .$cimgcontenido. "',
						url_video= '" .$url_video. "',
						cordcontenido= '" .$cordcontenido. "',
   					    cestcontenido= '1',
						ctipcontenido= '1',						
						curlcontenido='',						
						cestcomentario='1',
						dfeccontenido=now(),
						ccodusuario= '" .$_SESSION['webuser_id']. "',
						dfecmodifica=now() 																			
						WHERE ccodcontenido = '" . $ccodcontenido . "'";
	//echo $save_contenido;exit;
	//db_query($save_contenido);
	$sqlcontenido =mysql_query($save_contenido) or die ("problema con Actualiza contenido");	
	
	 $save_seccioncontenido= "UPDATE seccioncontenido 	SET						
						ccodpage= '" .$pagina. "',
						ccodseccion= '" .$seccion. "',	
						cordcontenido= '" .$cordcontenido. "' 		
						WHERE ccodcontenido = '" . $ccodcontenido . "'";
	$sqlcontenido =mysql_query($save_seccioncontenido) or die ("problema con Actualiza seccioncontenido");	
	
?>
<script language='JavaScript'>    
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+'/webadmin/index.php?option=com_videos&mensaje=El Video ha sido Actuzalizado correctamente'
</script> 	


