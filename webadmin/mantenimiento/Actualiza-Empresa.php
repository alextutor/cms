<?Php session_start();
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
	$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];

?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	 	         
 $paginacion=$_POST['paginacion']; 
  extract($_POST); 

  $Update_contenido= "UPDATE page SET  
  							canagoogle='" . addslashes($canagoogle). "', 
  							cscriptfacebook='" . addslashes($cscriptfacebook). "',
  							Script_chat='" . addslashes($Script_chat). "',							 							 						
							fb_admins_facebook = '" . $fb_admins_facebook . "', 
							fb_app_id_facebook = '" . $fb_app_id_facebook . "', 
							rutaimages = '" . $rutaimages. "',
							cnikpage     = '" . $cnikpage. "',
							camipage = '" . $camipage . "', 
							cnompage   = '" . $cnompage . "', 
							crazpage  = '" . $crazpage . "', 
							clogo  = '" . $clogo . "', 
							ctitpage  = '" . $ctitpage . "',
							cfavicon  = '" . $cfavicon . "',
							cdespage  = '" . $cdespage . "', 
							ctagpage  = '" . $ctagpage . "', 														
							cemacontacto = '" . $cemacontacto . "', 
							cemaventas = '" . $cemaventas. "', 
							
							ccodmoneda = '" . $ccodmoneda. "', 														
							
							ctelefonopri= '" . $ctelefonopri . "', 
							ctelefonosec= '" . $ctelefonosec . "', 							
							tmovil1= '" . $tmovil1 . "', 
							tmovil2= '" . $tmovil2 . "',
							tmovil3 = '" . $tmovil3. "',
							tmovil4 = '" . $tmovil4. "',
							cprovincia= '" . $cprovincia . "',	
							cdistrito= '" . $cdistrito . "',							 
							cdirecempresa= '" . $cdirecempresa . "', 						
							chorarioatencion= '" . $chorarioatencion . "', 
							
							cprovincia2= '" . $cprovincia2 . "',	
							cdistrito2= '" . $cdistrito2 . "',							 
							cdirecempresa2= '" . $cdirecempresa2 . "',
							
							cod_google_map= '" . $cod_google_map . "', 
							anchomapa= '" . $anchomapa . "', 
							altomapa= '" . $altomapa . "', 
							imagen_mapa= '" . $imagen_mapa . "',
							
							credYoutube= '" . $credYoutube . "', 
							credTwitter= '" . $credTwitter . "', 
							credFacebook= '" . $credFacebook . "' 
							 							
							 where ccodpage ='".$_POST['id']."'	";														
	
	//echo $Update_contenido;exit;
	$Update_empresa=mysql_query($Update_contenido,$conexion) or die ("problema con Actualiza Empresa");	
	
?>
<script language='JavaScript'>    
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+'/webadmin/index.php?option=com_empresa&mensaje=La Empresa ha sido Actualizado correctamente'
</script> 	


