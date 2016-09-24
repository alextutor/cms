<?php  session_start(); 
   $INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
   extract($_POST);   
   
   //$inicioclases=date("Y-m-d",strtotime($inicioclases));   
   include($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  
	
	$ccodubigeo="";$ylati=""; $xlong=""; 
	$save_contenido= "INSERT INTO pagesucursal
					(
					ccodpage,cnomsucursal,ccodubigeo,
					cdiroficina,cod_google_map,
					horario_atencion,localprincipal,anchomapa,altomapa,   clatsucursal,clonsucursal,ctelsucursal,cfaxsucursal,cmovsucursal,cnexsucursal,
					cemasucursal,curlsucursal,cestsucursal,dfecsucursal,dfecmodifica,ccodusuario 
					)
						values(
							'" . $selectpage ."',
							'" . $titulo. "', 
							'" . $ccodubigeo . "', 
							'" . $direccion . "', 
							'" . $cod_google_map . "',
							'" . $horario_atencion . "',
							'" . $localprincipal . "',
							'" . $anchomapa . "',
							'" . $altomapa . "', 
							'" . $ylati . "', 
							'" . $xlong . "', 
							'" . $tfijo. "', 
							'" . $tfax . "', 
							'" . $tmovil . "', 
							'" . $nextel . "', 
							'" . $email . "', 
							'" . $web . "', 
							'1', 						
							now(),
							now(),
							'" .$_SESSION['id_usuario']. "'
							)";				
		
	//db_query($save_contenido);	
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar Agencia");		

     
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_agencia&mensaje=La Agencia ha sido Ingresada correctamente' 
</script> 
