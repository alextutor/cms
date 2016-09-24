<?Php session_start();
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	 	         
 $paginacion=$_POST['paginacion']; 
  extract($_POST); 
  $Update_contenido= "UPDATE pagesucursal SET
							ccodpage     = '" . $selectpage. "',
							cnomsucursal = '" . $titulo . "', 
							ccodubigeo   = '" . $ccodubigeo . "', 
							cdiroficina  = '" . $direccion . "', 
							cod_google_map  = '" . $cod_google_map . "', 
							horario_atencion  = '" . $horario_atencion . "',
							localprincipal  = '" . $localprincipal . "',
							anchomapa  = '" . $anchomapa . "', 
							altomapa  = '" . $altomapa . "', 														
							clatsucursal = '" . $ylati . "', 
							clonsucursal = '" . $xlong. "', 
							ctelsucursal = '" . $tfijo . "', 
							cfaxsucursal = '" . $tfax . "', 
							cmovsucursal = '" . $tmovil . "', 
							cnexsucursal = '" . $nextel . "', 
							cemasucursal = '" . $email . "', 
							curlsucursal = '" . $web . "', 
							dfecmodifica = now()
							where ccodsucursal ='".$_POST['id']."'	";							
							
	$Update_agencia=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza contenido");	
	
?>
<script language='JavaScript'>    
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+'/webadmin/index.php?option=com_agencia&mensaje=La Agencia ha sido Actualizado correctamente'
</script> 	


