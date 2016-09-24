<?Php  if ( extension_loaded( "zlib" ) ) ob_start( "ob_gzhandler" );
	session_start();	
	//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	//include_once ( $INC_DIR . '/webadmin/header.php');
?>
<?php								
	 include_once ( $INC_DIR . '/include/funciones_web.php');
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	 extract($_POST);
	    //$cimgcontenido="";
	    $seccion=$selectseccion; /*viene de tabla seccion campo ccodseccion*/
	 	$new_cod = $pagina.date('ymdHis').codigo_azar(4);
	 	$save_contenido= "INSERT INTO contenido 
						(
						ccodcontenido,
						ccodpage,
						ccodcategoria,
						ccodmodulo,
						ccodestcontenido,
						cnomcontenido,
						camicontenido,
						crescontenido,
						ctagcontenido,
						cimgcontenido,
						url_video,
						cordcontenido,
						cestcontenido,
						ctipcontenido,
						curlcontenido,
						cestcomentario,
						dfeccontenido,
						ccodusuario,
						dfecmodifica,
						estado)
						values(
						'" . $new_cod . "', 
						'" . $pagina. "', 
						'1',
						'2000',   
						'2001', 
						'" . $cnomcontenido . "', 
						'VI" . $new_cod . "', 
						'', 
						'', 
						'" . $cimgcontenido. "', 
						'" . $url_video. "', 
						'" . $orden. "',
						'1',
						'1',
						'',				
						'1',
						now(), 
						'" .$_SESSION['webuser_id']. "',
						now(),
						'" . $estado ."'
						)";		
	//db_query($save_contenido);
	//echo $save_contenido;exit;
	$sqlInsertVideo =mysql_query($save_contenido) or die ("problema con insertar  contenido");					
			 
	$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$pagina."','" . $seccion . "', '" . $new_cod . "' )";
	db_query($save_seccion);

?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_videos&mensaje=El Video ha sido Ingresada correctamente' 
</script> 
